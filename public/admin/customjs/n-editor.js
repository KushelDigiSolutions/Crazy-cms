  // Initialize GrapesJS editor
  const editor = grapesjs.init({
    container: '#gjs',
    allowScripts: 1,
    // Disable style sanitization for background images
    styleManager: {
        clearProperties: true,
    },
    fromElement: true, // Load content from the page's body
    storageManager: false, // Disable storage
    panels: { defaults: [] }, // Hide default panels
    canvas: {
        styles: ['https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css']
    },
    assetManager: {
        upload: false,
    },
});


let cropper;
let selectedImage;

let selectedComponent;

document.getElementById('saveLinkButton').addEventListener('click', function() {
    if (selectedComponent && selectedComponent.get('tagName') === 'a') {
        // Get the values from the modal inputs
        const linkText = document.getElementById('linkText').value;
        const linkUrl = document.getElementById('linkUrl').value;
        const linkTarget = document.getElementById('linkTarget').value;
        console.log(selectedComponent);
        // Update the content and attributes of the selected link
       // Clear existing text nodes
        selectedComponent.components().each(comp => {
            if (comp.is('textnode')) {
                comp.remove();
            }
        });

        // Add the new text as a text node
        selectedComponent.append({
            type: 'textnode',
            content: linkText
        });

        // Update the href and target attributes
        selectedComponent.addAttributes({
            href: linkUrl,
            target: linkTarget
        });

        // Hide the modal after saving
        $('#linkEditModal').modal('hide');
    }
});

// Open the Link Edit Modal
function openLinkEditModal() {
    selectedComponent = editor.getSelected();
    if (selectedComponent && selectedComponent.get('tagName') === 'a') {
        let linkText = '';
        selectedComponent.components().each(comp => {
            if (comp.is('textnode')) {
                linkText += comp.get('content');
            }
        });
        $('#linkText').val(linkText || '');
        $('#linkUrl').val(selectedComponent.get('attributes').href || '');
        $('#linkTarget').val(selectedComponent.get('attributes').target || '_self');
        $('#linkEditModal').modal('show');
    }
}
// Listen for component double-click event
editor.on('component:selected', function(model) {
    if (model.get('tagName') === 'a') {
        openLinkEditModal();
    }
});



// Override the open-assets command to open your custom modal
editor.Commands.add('open-assets', {
    run(editor) {
        $('#imageUploadModal').modal('show');
    }
});

// Handle image input change
document.getElementById('imageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const image = document.getElementById('imageToCrop');
            image.src = e.target.result;
            $('#cropperContainer').show();
            
            // Initialize Cropper.js
            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(image, {
                aspectRatio: NaN, // Allow any aspect ratio
                viewMode: 1,
                autoCropArea: 1,
            });
        };
        reader.readAsDataURL(file);
    }
});

// Handle upload and crop button click
document.getElementById('uploadImageButton').addEventListener('click', function() {
    if (cropper && selectedImage) {
        // Get cropped image data URL
        const canvas = cropper.getCroppedCanvas();
        const croppedImage = canvas.toDataURL();
        
        // Replace the selected image while keeping its size
        selectedImage.set('src', croppedImage);
        
        // Refresh the asset manager
        editor.AssetManager.add({ src: croppedImage, name: 'Cropped Image' });
        
        $('#imageUploadModal').modal('hide');
        $('#cropperContainer').hide();
        cropper.destroy();
        cropper = null;
    }
});

// Capture the clicked image
editor.on('component:selected', function(model) {
    if (model.get('tagName') === 'img') {
        selectedImage = model;
    }
});






// Function to update uploaded images list
function updateUploadedImages() {
    const imagesContainer = document.querySelector('.uploaded-images');
    imagesContainer.innerHTML = ''; // Clear existing images
    const assets = editor.AssetManager.getAll();
    assets.forEach(asset => {
        if (asset.get('src')) {
            const img = document.createElement('img');
            img.src = asset.get('src');
            img.alt = 'Uploaded Image';
            img.addEventListener('click', () => {
                if (selectedImage) {
                    selectedImage.set('src', asset.get('src'));
                }
            });
            imagesContainer.appendChild(img);
        }
    });
}


// Use editor's 'asset:added' event to update images
editor.on('asset:added', updateUploadedImages);

// Fetch and load HTML content
fetch(webUrl)
    .then(response => response.text())
    .then(html => {
        // Set content in the editor
        html = processBackgroundImages(html)
        editor.setComponents(html);
    })
    .catch(err => console.error('Error loading HTML:', err));


  editor.on('load', function() {
    console.log('Editor is fully loaded and ready');
    updateGrapesJSBackgroundImages(editor); 
  });

// Global variable to store the array of Slick slider background images
var backgroundImagesMap = {};

// Function to find Slick sliders and extract background images
function processBackgroundImages(htmlString) {
  // Create a temporary DOM element to work with the HTML string
  var $tempDiv = $('<div>').html(htmlString);


  // Variable to keep track of dynamic class count
  var classCounter = 1;

  // Find all divs with background-image inline styles
  $tempDiv.find('div[style*="background-image"]').each(function() {
      // Get the current div element
      var $div = $(this);

      // Extract the background image URL from the inline style
      var backgroundImage = $div.css('background-image');

      // Match the URL part inside the background-image CSS
      var urlMatch = backgroundImage.match(/url\(["']?([^"']*)["']?\)/);

      // If a valid background-image URL is found
      if (urlMatch && urlMatch[1]) {
          // Generate a dynamic class name (e.g., crms1, crms2, etc.)
          var dynamicClass = 'crms' + classCounter;

          // Add the dynamic class to the div
          $div.addClass(dynamicClass);

          // Store the class and background image URL in the map
          backgroundImagesMap[dynamicClass] = urlMatch[1];

          // Increment the class counter for the next unique class
          classCounter++;
      }
  });

  // Return the updated HTML string and the backgroundImagesMap
  return $tempDiv.html();
}

function updateGrapesJSBackgroundImages(editor) {
  // Loop through each entry in the global backgroundImagesMap
  for (var className in backgroundImagesMap) {
      if (backgroundImagesMap.hasOwnProperty(className)) {
          // Find all elements in GrapesJS by class name (e.g., crms1, crms2, etc.)
          var elements = editor.getWrapper().find(`.${className}`);

          // Loop through all the matching elements
          elements.forEach(function(component) {
              // Apply the background image style to each component
              component.addStyle({
                  'background-image': `url(${backgroundImagesMap[className]})`
              });

              // Force re-render of the component
              component.view.render();
          });
      }
  }
}




// Reapply the background images after GrapesJS or Slick Slider modifies the DOM
function reapplyBackgroundImages(backgroundImages) {
  backgroundImages.forEach(function(bgData) {
      const slideElement = $('.slides').eq(bgData.slideIndex);
      slideElement.css('background-image', bgData.backgroundImage);
  });
}
