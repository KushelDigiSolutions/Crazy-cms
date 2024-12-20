<!-- resources/views/home.blade.php -->
@extends('layouts.home_header')

@section('title', 'Preview Page')

@section('content')
<header id="header">
        <nav class="navbar navbar-light  justify-content-between">
            <div>
                <a class="navbar-brand">Pages</a>
                <a href="" class="item">Home</a>
                 <a href="" class="item">Home</a>
            </div>
            <form class="form-inline">
                <div class="icons_div">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.25559 7.34897L8.73657 9.82996L7.35279 11.2137L2.50952 6.37049L7.35279 1.52722L8.73657 2.91102L6.25559 5.392H13.2729C17.5961 5.392 21.1008 8.89666 21.1008 13.2199C21.1008 17.5431 17.5961 21.0478 13.2729 21.0478H4.46649V19.0909H13.2729C16.5153 19.0909 19.1438 16.4624 19.1438 13.2199C19.1438 9.97747 16.5153 7.34897 13.2729 7.34897H6.25559Z"
                            fill="#7E8299" />
                    </svg>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.3547 7.34897L14.8737 9.82996L16.2575 11.2137L21.1008 6.37049L16.2575 1.52722L14.8737 2.91102L17.3547 5.392H10.3374C6.01417 5.392 2.50952 8.89666 2.50952 13.2199C2.50952 17.5431 6.01417 21.0478 10.3374 21.0478H19.1438V19.0909H10.3374C7.09501 19.0909 4.4665 16.4624 4.4665 13.2199C4.4665 9.97747 7.09501 7.34897 10.3374 7.34897H17.3547Z"
                            fill="#7E8299" />
                    </svg>
                </div>
                <button class="btn preview_btn my-2 my-sm-0" type="submit">Preview</button> <div id="paypal-button-container"></div>
            </form>
        </nav>
    </header>
   <div class="Projects">
    <div class="Projects_con">
        <div id="gjs"></div>
       

    </div>

   </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.19.5/grapes.min.js"></script>
<script>
    const editor = grapesjs.init({
        container: '#gjs',
        fromElement: true,
        height: '100vh',
        width: 'auto',
        storageManager: false,
    });

    // Function to fetch URL content and load into editor
    // Function to load jQuery and then execute scripts
function loadjQueryAndScripts(url) {
    // Load jQuery from a CDN
    var script = document.createElement('script');
    script.src = "https://code.jquery.com/jquery-3.6.0.min.js"; // Replace with the version you need
    script.onload = function() {
        // jQuery loaded, now execute your scripts
        loadUrlContent(url); // Call your function after jQuery is loaded
    };
    document.head.appendChild(script);
}

// Function to fetch URL content and inject into Grape.js
async function loadUrlContent(url) {
    try {
        const response = await fetch(url);
        const text = await response.text();
        
        // Create a temporary container to parse the fetched HTML
        const tempContainer = document.createElement('div');
        tempContainer.innerHTML = text;
        
        // Extract CSS and inject it into Grape.js
        const stylesheets = tempContainer.querySelectorAll('link[rel="stylesheet"]');
        stylesheets.forEach(link => {
            editor.CssComposer.add(link.outerHTML);
        });
        
        // Set the main content (excluding scripts and possibly other elements)
        editor.DomComponents.getWrapper().set('content', tempContainer.innerHTML);

        // Inject and execute scripts within the Grape.js environment after jQuery is loaded
        const scripts = tempContainer.querySelectorAll('script');
        scripts.forEach(script => {
            const newScript = document.createElement('script');
            newScript.textContent = script.textContent;
            newScript.onload = function() {
                // Script executed successfully
                console.log('Script loaded:', script.src);
            };
            newScript.onerror = function() {
                // Handle script loading error
                console.error('Error loading script:', script.src);
            };
            editor.Canvas.getFrameEl().contentDocument.body.appendChild(newScript);
        });
        
    } catch (error) {
        console.error('Error fetching the URL:', error);
    }
}





    // Example URL to load
    const urlToEdit = '{{ url('/website/index.html') }}';
 // Load jQuery from a CDN
var script = document.createElement('script');
script.src = "https://code.jquery.com/jquery-3.6.0.min.js"; // Replace with the version you need
script.onload = function() {
    // jQuery loaded, now execute your scripts
    loadUrlContent(urlToEdit); // Call your function after jQuery is loaded
};
document.head.appendChild(script);
</script>
</body>
 
@endsection