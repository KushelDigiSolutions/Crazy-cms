<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FTPService
{
    protected $connection;
    protected $ftpType;
    protected $port;
    protected $host;
    protected $username;
    protected $password;
    protected $location;

    public function __construct($ftpType, $port, $host, $username, $password, $location)
    {
        $this->ftpType = $ftpType;
        $this->port = $port;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->location = $location;

        $this->connect();
    }

    private function connect()
    {
        try {
            if ($this->ftpType === 'ftp') {
                $this->connection = ftp_connect($this->host, $this->port);
                $login = ftp_login($this->connection, $this->username, $this->password);
            } elseif ($this->ftpType === 'sftp') {
                $this->connection = ssh2_connect($this->host, $this->port);
                ssh2_auth_password($this->connection, $this->username, $this->password);
                $this->connection = ssh2_sftp($this->connection);
            } else {
                throw new \Exception('Invalid connection type');
            }

            if (!$login) {
                throw new \Exception('Unable to log in with provided credentials');
            }

            if ($this->ftpType === 'ftp') {
                ftp_chdir($this->connection, $this->location);
            }

        } catch (\Exception $e) {
            Log::error('FTP/SFTP Connection Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function listFiles()
    {
        try {
            $files = [];
    
            if ($this->ftpType === 'ftp') {
                // Retrieve list of files from the directory
                $files = ftp_nlist($this->connection, ".");
            } elseif ($this->ftpType === 'sftp') {
                $sftp = $this->connection;
                $directory = "ssh2.sftp://$sftp" . $this->location;
                $allFiles = scandir($directory);
                $files = array_diff($allFiles, ['.', '..']);
            }
    
            // Log the full list of files for debugging
            Log::info('All files: ', $files);
    
            // Filter to include only .html and .php files
            $filteredFiles = array_filter($files, function ($file) {
                return preg_match('/\.(html|php)$/i', $file);
            });
    
            // Reset array keys to ensure they start from 0
            $filteredFiles = array_values($filteredFiles);
    
            // Prioritize index.php or index.html by moving them to the top
            $priorityFiles = ['index.php', 'index.html'];
            usort($filteredFiles, function ($a, $b) use ($priorityFiles) {
                $aPriority = in_array($a, $priorityFiles) ? 0 : 1;
                $bPriority = in_array($b, $priorityFiles) ? 0 : 1;
                return $aPriority <=> $bPriority;
            });
    
            // Log the filtered and prioritized list of files for debugging
            Log::info('Filtered and prioritized files: ', $filteredFiles);
    
            return $filteredFiles;
        } catch (\Exception $e) {
            Log::error('List Files Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
    


    public function checkHtmlCssContent($fileName)
    {
        try {
            $content = $this->getFileContent($fileName);
            $htmlPercent = substr_count($content, '<html>') / strlen($content) * 100;
            $cssPercent = substr_count($content, 'style') / strlen($content) * 100;
            return ['html' => $htmlPercent, 'css' => $cssPercent];
        } catch (\Exception $e) {
            Log::error('Check HTML/CSS Content Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function fileExists($filename)
    {
        try {
            if ($this->ftpType === 'ftp') {
                // Check if the file exists on the FTP server
                $fileList = ftp_nlist($this->connection, ".");
                return in_array($filename, $fileList);
            } elseif ($this->ftpType === 'sftp') {
                $sftp = $this->connection;
                $filePath = "ssh2.sftp://$sftp" . $this->location . '/' . $filename;
                return file_exists($filePath);
            } else {
                throw new \Exception('Invalid connection type');
            }
        } catch (\Exception $e) {
            Log::error('File Exists Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


    public function getFileContent($filename, $websiteUrl)
{
    try {
        // Check if the file exists on the server
        if (!$this->fileExists($filename)) {
            throw new \Exception('File not found: ' . $filename);
        }

        // Get the file content
        if ($this->ftpType === 'ftp') {
            ob_start();
            ftp_get($this->connection, "php://output", $filename, FTP_BINARY);
            $fileContent = ob_get_clean();
        } elseif ($this->ftpType === 'sftp') {
            $sftp = $this->connection;
            $fileContent = file_get_contents("ssh2.sftp://$sftp" . $this->location . '/' . $filename);
        }

        if (empty($fileContent)) {
            throw new \Exception('File content is empty');
        }

        // Initialize DOMDocument
        $dom = new \DOMDocument();
        @$dom->loadHTML($fileContent, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Update all <img>, <link>, <script> tags and divs with background images
        $this->updateElementsWithBaseUrl($dom, 'img', 'src', $websiteUrl);
        $this->updateElementsWithBaseUrl($dom, 'link', 'href', $websiteUrl);
        $this->updateElementsWithBaseUrl($dom, 'script', 'src', $websiteUrl);
        $this->updateBackgroundImagesWithBaseUrl($dom, 'div', 'style', $websiteUrl);

        // Add data-editor="true" to all elements
        $this->addDataEditorAttribute($dom);

        // Extract metadata (title, description, and tags)
        $metaData = $this->extractMetaData($dom);

        // Return the modified HTML content and metadata
        return [
            'html_content' => $dom->saveHTML(),
            'meta_data' => $metaData
        ];

    } catch (\Exception $e) {
        Log::error('Get File Content Error: ' . $e->getMessage());
        throw new \Exception($e->getMessage());
    }
}

// Helper function to update elements with the base URL
protected function updateElementsWithBaseUrl($dom, $tagName, $attribute, $baseUrl)
{
    $tags = $dom->getElementsByTagName($tagName);
    foreach ($tags as $tag) {
        $attrValue = $tag->getAttribute($attribute);

        // Prepend the base URL if the attribute is a relative URL (starting with './', '/', or without 'http'/'https')
        if ($attrValue && !preg_match('/^(http|https|\/\/)/i', $attrValue)) {
            // Remove leading './' or '/' before prepending base URL
            $newAttrValue = rtrim($baseUrl, '/') . '/' . ltrim(preg_replace('/^\.\//', '', $attrValue), '/');
            $tag->setAttribute($attribute, $newAttrValue);
        }
    }
}


// New function to handle divs with background images
protected function updateBackgroundImagesWithBaseUrl($dom, $tagName, $attribute, $baseUrl)
{
    $tags = $dom->getElementsByTagName($tagName);
    foreach ($tags as $tag) {
        $styleAttr = $tag->getAttribute($attribute);

        // Check if style contains background-image and process it
        if (preg_match('/background-image\s*:\s*url\((["\']?)([^"\')]+)\1\)/', $styleAttr, $matches)) {
            $bgImageUrl = $matches[2];

            // Prepend the base URL if the background-image URL is relative
            if (!preg_match('/^(http|https|\/\/)/i', $bgImageUrl)) {
                $newBgImageUrl = rtrim($baseUrl, '/') . '/' . ltrim($bgImageUrl, '/');
                $newStyleAttr = str_replace($bgImageUrl, $newBgImageUrl, $styleAttr);
                $tag->setAttribute($attribute, $newStyleAttr);
            }
        }
    }
}

// Helper function to add data-editor="true" to all elements
protected function addDataEditorAttribute($dom)
{
    $xpath = new \DOMXPath($dom);
    $allElements = $xpath->query('//*');

    foreach ($allElements as $element) {
        $element->setAttribute('data-editor', 'true');
    }
}

// Helper function to extract metadata (title, description, and meta keywords)
protected function extractMetaData($dom)
{
    $metaData = [
        'title' => '',
        'description' => '',
        'tags' => []
    ];

    // Extract title
    $titleElements = $dom->getElementsByTagName('title');
    if ($titleElements->length > 0) {
        $metaData['title'] = $titleElements->item(0)->nodeValue;
    }

    // Extract meta description and meta keywords (tags)
    $metaElements = $dom->getElementsByTagName('meta');
    foreach ($metaElements as $meta) {
        $nameAttr = strtolower($meta->getAttribute('name'));
        if ($nameAttr === 'description') {
            $metaData['description'] = $meta->getAttribute('content');
        } elseif ($nameAttr === 'keywords') {
            $metaData['tags'] = array_map('trim', explode(',', $meta->getAttribute('content')));
        }
    }

    return $metaData;
}

    


    public function renameFile($oldFileName, $newFileName)
    {
        try {
            if ($this->ftpType === 'ftp') {
                if (!ftp_rename($this->connection, $oldFileName, $newFileName)) {
                    throw new \Exception('File rename failed');
                }
            } elseif ($this->ftpType === 'sftp') {
                $sftp = $this->connection;
                $oldFile = "ssh2.sftp://$sftp" . $this->location . '/' . $oldFileName;
                $newFile = "ssh2.sftp://$sftp" . $this->location . '/' . $newFileName;
                if (!rename($oldFile, $newFile)) {
                    throw new \Exception('File rename failed');
                }
            }
        } catch (\Exception $e) {
            Log::error('Rename File Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function saveFile($fileName, $content)
    {
        try {
            if ($this->ftpType === 'ftp') {
                if (ftp_exists($this->connection, $fileName)) {
                    throw new \Exception('File already exists');
                }
                if (!ftp_put($this->connection, $fileName, $content, FTP_BINARY)) {
                    throw new \Exception('File upload failed');
                }
            } elseif ($this->ftpType === 'sftp') {
                $sftp = $this->connection;
                $file = "ssh2.sftp://$sftp" . $this->location . '/' . $fileName;
                if (file_exists($file)) {
                    throw new \Exception('File already exists');
                }
                file_put_contents($file, $content);
            }
        } catch (\Exception $e) {
            Log::error('Save File Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function createBackup()
    {
        try {
            // Placeholder for backup logic
            // Consider using ZipArchive or similar library to create a backup
            return 'Backup creation not implemented';
        } catch (\Exception $e) {
            Log::error('Create Backup Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
