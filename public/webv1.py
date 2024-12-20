import os
import requests
from bs4 import BeautifulSoup
from urllib.parse import urljoin
import sys
import re

def save_webpage_with_original_links(url, save_folder):
    headers = {
        'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
    }
    
    # Create the directory to save the webpage
    if not os.path.exists(save_folder):
        os.makedirs(save_folder)
    
    # Get the HTML content of the page
    response = requests.get(url, headers=headers)
    soup = BeautifulSoup(response.content, 'html.parser')
    
    # Function to update resource URLs to original server links
    def update_resource_url(tag, attr):
        if tag.has_attr(attr):
            original_url = urljoin(url, tag[attr])
            tag[attr] = original_url
    
    # Update linked resources
    for tag in soup.find_all(['img', 'link', 'script']):
        if tag.name == 'img' and tag.get('src'):
            update_resource_url(tag, 'src')
        elif tag.name == 'link' and tag.get('href'):
            update_resource_url(tag, 'href')
        elif tag.name == 'script' and tag.get('src'):
            update_resource_url(tag, 'src')
    
    # Update inline styles with background-image URLs
    for tag in soup.find_all(style=True):
        if 'background-image' in tag['style']:
            bg_url_match = re.search(r'url\((["\']?)([^)]+)\1\)', tag['style'])
            if bg_url_match:
                old_url = bg_url_match.group(2)
                new_url = urljoin(url, old_url.strip('"\''))
                tag['style'] = tag['style'].replace(old_url, new_url)
    
    # Save the modified HTML with original resource links
    html_file_path = os.path.join(save_folder, 'index.html')
    with open(html_file_path, 'w', encoding='utf-8') as file:
        file.write(str(soup))

# Example usage:
if __name__ == "__main__":
    if len(sys.argv) < 3:
        print("Usage: python script.py <url> <save_folder>")
        sys.exit(1)
    
    url = sys.argv[1]
    save_folder = sys.argv[2]
    
    save_webpage_with_original_links(url, save_folder)
