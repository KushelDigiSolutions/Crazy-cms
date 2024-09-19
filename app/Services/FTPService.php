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

            // Filter to include only .html and .php files, excluding those with 'backup_' followed by digits
            $filteredFiles = array_filter($files, function ($file) {
                return preg_match('/\.(html|php)$/i', $file) && !preg_match('/backup_\d+/i', $file);
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
                if ($this->ftp_exists($this->connection, $fileName)) {
                    throw new \Exception('File already exists');
                }
                if (!ftp_put($this->connection, $fileName, $content, FTP_BINARY)) {
                    throw new \Exception('File upload failed');
                }
            } elseif ($this->ftpType === 'sftp') {
                $sftp = $this->connection;
                $file = "ssh2.sftp://$sftp" . $this->location . '/' . $fileName;
                if ($this->file_exists($file)) {
                    throw new \Exception('File already exists');
                }
                file_put_contents($file, $content);
            }
        } catch (\Exception $e) {
            Log::error('Save File Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function ftp_exists($filename)
    {
        $fileList = ftp_nlist($this->connection, ".");
        return in_array($filename, $fileList);
    }

    public function saveOrUpdateFile($fileName, $content)
    {
        try {
            if ($this->ftpType === 'ftp') {
                // Use a temporary file to handle large content
                $tempFile = fopen('php://temp', 'r+');
                fwrite($tempFile, $content);
                rewind($tempFile);

                // Check if the file exists
                if ($this->ftp_exists($fileName)) {
                    // Update the existing file
                    if (!ftp_fput($this->connection, $fileName, $tempFile, FTP_BINARY)) {
                        throw new \Exception('Failed to update the file');
                    }
                } else {
                    // Create a new file
                    if (!ftp_fput($this->connection, $fileName, $tempFile, FTP_BINARY)) {
                        throw new \Exception('Failed to create the file');
                    }
                }

                fclose($tempFile);
            } elseif ($this->ftpType === 'sftp') {
                $sftp = $this->connection;
                $file = "ssh2.sftp://$sftp" . $this->location . '/' . $fileName;
                
                // Create or update the file
                $tempFile = fopen('php://temp', 'r+');
                fwrite($tempFile, $content);
                rewind($tempFile);
                
                if (file_exists($file)) {
                    // Update the existing file
                    $stream = fopen($file, 'w');
                    if (!$stream) {
                        throw new \Exception('Unable to open file for writing');
                    }
                    stream_copy_to_stream($tempFile, $stream);
                    fclose($stream);
                } else {
                    // Create a new file
                    $stream = fopen($file, 'w');
                    if (!$stream) {
                        throw new \Exception('Unable to create file');
                    }
                    stream_copy_to_stream($tempFile, $stream);
                    fclose($stream);
                }
                
                fclose($tempFile);
            }
        } catch (\Exception $e) {
            Log::error('Save or Update File Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


    public function getMostCommonImageFolder($content)
    {
        try {
            if (!is_string($content)) {
                throw new \Exception('Content must be a string');
            }
    
            // Initialize DOMDocument
            $dom = new \DOMDocument();
            @$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
            // Find all image tags
            $imgTags = $dom->getElementsByTagName('img');
            $folders = [];
    
            // To store the final list of image URLs
            $allImagePaths = [];
    
            foreach ($imgTags as $imgTag) {
                $src = $imgTag->getAttribute('src');
    
                // Make sure the src is a valid URL
                if (filter_var($src, FILTER_VALIDATE_URL)) {
                    // Parse the URL and extract the path
                    $path = parse_url($src, PHP_URL_PATH);
                    
                    // Split the path into its parts
                    $pathParts = explode('/', trim($path, '/'));
    
                    // Build all possible folder paths up to the folder containing the image
                    for ($i = 0; $i < count($pathParts) - 1; $i++) {
                        $folder = '/' . implode('/', array_slice($pathParts, 0, $i + 1));
    
                        // Count occurrences of each folder
                        if (!isset($folders[$folder])) {
                            $folders[$folder] = 0;
                        }
                        $folders[$folder]++;
                    }
    
                    // Add image to the list of all image paths
                    $allImagePaths[] = $src;
                }
            }
    
            // Find the folder with the maximum count
            if (empty($folders)) {
                return null; // No images found
            }
    
            // Find the folder with the highest occurrence
            $mostCommonFolder = array_keys($folders, max($folders))[0];
    
            // Now search for all images in this folder (recursively)
            $imgData['mostCommonFolder'] = $mostCommonFolder;
            $imgData['imagesInFolder'] = $this->getAllImagesInFolder($mostCommonFolder, $allImagePaths);
    
            // Return the images array
            return $imgData;
    
        } catch (\Exception $e) {
            Log::error('Get Most Common Image Folder Error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
    
    /**
     * Recursively finds all image files in the given folder and its subfolders.
     */
    private function getAllImagesInFolder($commonFolder, $allImagePaths)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'bmp'];
        $foundImages = [];
    
        foreach ($allImagePaths as $imagePath) {
            // Check if the image path starts with the common folder path
            if (strpos($imagePath, $commonFolder) !== false) {
                // Extract the file extension
                $extension = pathinfo(parse_url($imagePath, PHP_URL_PATH), PATHINFO_EXTENSION);
    
                // Check if it's a valid image format
                if (in_array(strtolower($extension), $imageExtensions)) {
                    $foundImages[] = $imagePath;
                }
            }
        }
    
        return $foundImages;
    }
    
    public function saveBase64Image($base64Data,$fileName)
{
    try {
        // Remove any data URI prefix (if present)
        $base64Data = preg_replace('/^data:image\/\w+;base64,/', '', $base64Data);

        // Decode the base64 string
        $imageData = base64_decode($base64Data);
        $extension = "png";


        if ($imageData === false) {
            throw new \Exception('Invalid base64 data');
        }

        // Save the image to the server
        $filePath = $this->location . $fileName.'/'.date('d-m-Y-h-s').'.'.$extension;
        $url = $fileName.'/'.date('d-m-Y-h-s').'.'.$extension;
      
        
        if ($this->ftpType === 'ftp') {
            // Use a temporary file to handle large content
            $tempFile = fopen('php://temp', 'r+');
            fwrite($tempFile, $imageData);
            rewind($tempFile);
            // Save the image to the FTP server
            if (!ftp_fput($this->connection, $filePath, $tempFile, FTP_BINARY)) {
                $error = error_get_last();
                throw new \Exception('Failed to upload the image: ' . $error['message']);
            }

            fclose($tempFile);
            return $url;
        } elseif ($this->ftpType === 'sftp') {
            $sftp = $this->connection;
            $file = "ssh2.sftp://$sftp" . $filePath;

            // Save the image to the SFTP server
            $stream = fopen($file, 'w');
            if (!$stream) {
                throw new \Exception('Unable to open file for writing');
            }

            fwrite($stream, $imageData);
            fclose($stream);
        }
    } catch (\Exception $e) {
        Log::error('Save Base64 Image Error: ' . $e->getMessage());
        throw new \Exception($e->getMessage());
    }
}

function getFileExtensionFromBase64($base64Data)
{
    // Check if the base64 data includes a data URI prefix
    if (preg_match('/^data:image\/([a-zA-Z0-9]+);base64,/', $base64Data, $matches)) {
        $mimeType = $matches[1];
        $extensionMap = [
            'jpeg' => 'jpg',
            'jpg'  => 'jpg',
            'png'  => 'png',
            'gif'  => 'gif',
            'webp' => 'webp',
            'svg'  => 'svg'
        ];

        return isset($extensionMap[$mimeType]) ? $extensionMap[$mimeType] : null;
    }

    // Handle case without data URI prefix
    return null;
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
