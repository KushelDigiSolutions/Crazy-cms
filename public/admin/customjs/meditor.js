var iframe;
var selectedElement;
let cropper = null;
$(document).ready(function() {

  /*   const pretight = document.getElementById("pretight");
    pretight.innerHTML = `<div class="set">
                            <img src="https://res.cloudinary.com/ecommerce-website/image/upload/v1725709329/aronswebsites-_bmrgzo.gif" alt=""/>
                        </div>`; */

    iframe = $("#myFinalIframe");
    iframe.on('load', function() {
        var iframeDocument = iframe.contents();
    //    pretight.remove();
        // Add styles for editorBorder and duplicate-button
        var style = $(`<style>
                        .duplicate-button, .remove-button{
                            position: absolute;
                            bottom: 10px;
                            right: 50px;
                            cursor: pointer;
                            background: #ffffffdb;
                            border: 1px solid;
                            height: 38px;
                            border-radius: 10px;
                            padding: 5px 10px !important;
                            line-height: 10px;
                        }
                        .duplicate-button svg,.remove-button svg{
                            line-height: 20px;
                            padding: 0;
                            margin: 0;
                            margin-top: 5px;
                        }
                        .remove-button{right:10px;}
                        .remove-button:hover{background: #fd0b32;}
                        .duplicate-button:hover{background: #0F3D5F;}
                        .remove-button:hover svg,.duplicate-button:hover svg{color:#fff !important;}
                        .editorBorder{border:2px dashed #0F3D5F;position:relative;}
                        </style>`);
        iframeDocument.find("head").append(style);
        
        // Function to attach hover events to all elements
        var previousElement = null;
        // Stacks for undo/redo
        var undoStack = [];
        var redoStack = [];

        function attachHoverEvents() {
            iframeDocument.find("*").off("mouseenter mouseleave").hover(
                function() {

                
                    // Remove 'editorBorder' from previously hovered elements
                    if (previousElement && previousElement !== this) {
                        $(previousElement).removeClass("editorBorder");
                        $(previousElement).find(".duplicate-button").remove();
                        $(previousElement).find(".remove-button").remove();
                    }

                    if ($(this).hasClass('slick-arrow')) {
                        return;
                    }
                    // Add 'editorBorder' class to the current element
                    $(this).addClass("editorBorder");

                    // Create the 'Duplicate' button if it doesn't already exist
                    if ($(this).find(".duplicate-button").length === 0) {
                        var button = $(`<span class="duplicate-button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                                        </svg></span>`);
                        var removeBtn = $(`<span class="remove-button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                            </svg></span>`);
                        $(this).append(button);
                        $(this).append(removeBtn);

                        // Handle the click event for the 'Duplicate' button
                        button.on("click", function(event) {
                            event.stopPropagation(); // Prevent click from bubbling up

                            // Save the current state to undo stack before making changes
                            saveStateToUndoStack();
                            // Get the parent element (the one being duplicated)
                            var previousElement = $(this).parent();

                            // Check if the previous element exists
                            if (previousElement.length) {
                                // Clone the previous element
                                var clonedElement = previousElement.clone();

                                // Remove 'editorBorder' class and 'duplicate-button' from the cloned element
                                clonedElement.removeClass('editorBorder');
                                clonedElement.find('.duplicate-button').remove();
                                clonedElement.find('.remove-button').remove();

                                // Insert the cloned element after the original one
                                previousElement.after(clonedElement.prop('outerHTML'));

                                // Re-attach hover events after duplicating
                                attachHoverEvents();
                            } else {
                                alert("No element found to duplicate.");
                            }
                        });
                        removeBtn.on("click", function(event) {
                            event.stopPropagation(); // Prevent click from bubbling up

                            // Save the current state to undo stack before making changes
                            saveStateToUndoStack();
                            // Get the parent element (the one being duplicated)
                            var previousElement = $(this).parent();

                            // Check if the previous element exists
                            if (previousElement.length) {
                                if (confirm("Are you sure") == true) {
                                    previousElement.remove();
                                }
                                // Re-attach hover events after duplicating
                                attachHoverEvents();
                            } else {
                                alert("No element found to duplicate.");
                            }
                        });
                    }

                    // Update reference to the currently hovered element
                    previousElement = this;
                },
                function() {
                    // Remove the 'editorBorder' and 'duplicate-button' when mouse leaves
                    $(this).removeClass("editorBorder");
                    $(this).find(".duplicate-button, .remove-button").remove();

                    // Reset the reference to the previously hovered element
                    if (previousElement === this) {
                        previousElement = null;
                    }
                }
            );
        }
        

        // Save the current state of the iframe content to the undo stack
        function saveStateToUndoStack() {
            var currentState = iframeDocument.find("body").html();
            undoStack.push(currentState);
            // Clear the redo stack whenever a new action is performed
            redoStack = [];
        }

        // Undo the last action
        function undo() {
            if (undoStack.length > 0) {
                // Save the current state to the redo stack
                redoStack.push(iframeDocument.find("body").html());

                // Restore the last state from the undo stack
                var previousState = undoStack.pop();
                iframeDocument.find("body").html(previousState);

                // Re-attach hover events after restoring state
                attachHoverEvents();
            } else {
                alert("No actions to undo.");
            }
        }

        // Redo the last undone action
        function redo() {
            if (redoStack.length > 0) {
                // Save the current state to the undo stack
                undoStack.push(iframeDocument.find("body").html());

                // Restore the last state from the redo stack
                var nextState = redoStack.pop();
                iframeDocument.find("body").html(nextState);

                // Re-attach hover events after restoring state
                attachHoverEvents();
            } else {
                alert("No actions to redo.");
            }
        }

        // Handle keyboard shortcuts for undo and redo
        iframeDocument.on("keydown", function(event) {
            if (event.ctrlKey && event.key === 'z') {
                event.preventDefault(); // Prevent default browser action
                undo();
            } else if (event.ctrlKey && event.key === 'y') {
                event.preventDefault(); // Prevent default browser action
                redo();
            }
        });

        window.addEventListener("message", function(event) {
            if (event.data === "undo") {
                console.log(event.data);
                undo();
            } else if (event.data === "redo") {
                redo();
            }
        });

        // Function to allow inline text editing on double-click
        function handleClickEvents() {
            iframeDocument.find("*").on("click", function(event) {
                event.stopPropagation();
                event.preventDefault(); 
                saveStateToUndoStack();
                var backgroundImage = $(this).css('background-image');
            
                if($(this).is("img") || (backgroundImage && backgroundImage !== 'none')) {
                    $('#imageUploadModal').modal('show');
                    initializeImageInput(this);
                    event.stopPropagation();
                    return;
                } 
                if (!$(this).is("a")) {
                    $(this).attr('contenteditable', 'true');
                    return;
                }else{
                    handleTheLinks(this);
                    return;
                }
                
            
            });
        }
        // Function to handle link clicks and open the modal
        function handleTheLinks(linkElement) {
            // Populate the modal with the link's current properties
            var linkText = $(linkElement).text();
            var linkUrl = $(linkElement).attr('href');
            var linkTarget = $(linkElement).attr('target') || '_self';

            $('#linkText').val(linkText);
            $('#linkUrl').val(linkUrl);
            $('#linkTarget').val(linkTarget);
            console.log("momo");
            // Show the modal
            $('#linkEditModal').modal('show');

            // Save the updated link on clicking "Save changes"
            $('#saveLinkButton').off('click').on('click', function() {
                var updatedText = $('#linkText').val();
                var updatedUrl = $('#linkUrl').val();
                var updatedTarget = $('#linkTarget').val();

                // Update the link in the iframe
                $(linkElement).text(updatedText);
                $(linkElement).attr('href', updatedUrl);
                $(linkElement).attr('target', updatedTarget);

                // Hide the modal after saving changes
                $('#linkEditModal').modal('hide');
                
                // Save the new state to undo stack
                saveStateToUndoStack();
            });
        }

        function initializeImageInput(currentElement) {

            selectedElement = currentElement;
    /* 
            let $imageList = $('<ul class="row"></ul>');
            iframeDocument.find('img').each(function() {
                let imgSrc = $(this).attr('src');
                let $listItem = $('<li class="col-4"></li>').append($('<img>').attr('src', imgSrc));
                $imageList.append($listItem);
            });

            // Log the array or work with it as needed
            $("#mediaCurrent").html($imageList); */

            // Ensure this is called after the modal is shown or the input is added to the DOM
            $('#imageInput').off('change').on('change', function(event) {
                var files = event.target.files;
                if (files && files.length > 0) {
                    var file = files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(document.getElementById('imagePreview'), {
                            aspectRatio: $(currentElement).is('img') ? $(currentElement).width() / $(currentElement).height() : 16 / 9, // default to 16:9 for background images
                            viewMode: 1
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Handle image upload and update the original element
            $('#uploadImageButton').off('click').on('click', function() {
                if (cropper) {
                    // Get the cropped image as a Blob and update the element
                    cropper.getCroppedCanvas().toBlob(function(blob) {
                        var reader = new FileReader();
                        
                        // Read the cropped image and update the src or background-image of the original element
                        reader.onload = function(e) {
                            var dataUrl = e.target.result;
            
                            // Get the CSRF token from the meta tag
                            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                            
                            // Send the Base64 image data to the server via AJAX
                            $.ajax({
                                url: saveImgUrl,  // Update this with your actual upload URL
                                type: 'POST',
                                data: {
                                    img: dataUrl,  // Sending the image data as 'img'
                                    _token: csrfToken  // CSRF token from the meta tag
                                },
                                success: function(response) {
                                    // Assume the server returns { url: "newImageUrl" }
                                    if (response.url) {
                                        if ($(currentElement).is('img')) {
                                            $(currentElement).attr('src', response.url);  // Update <img> element
                                        } else {
                                            $(currentElement).css('background-image', 'url(' + response.url + ')');  // Update background-image
                                        }
                                        
                                        $('#imageUploadModal').modal('hide');  // Hide the modal after updating
                                        saveStateToUndoStack();  // Save the current state to the undo stack
                                    } else {
                                        alert('Error: No URL returned from server.');
                                    }
                                },
                                error: function(xhr) {
                                    alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
                                }
                            });
                        };
            
                        reader.readAsDataURL(blob);  // Read the blob to get the data URL
                    });
                }
            });
            
            $('#mediaCurrent li img').off('click').on('click', function() {
                const imageUrl = $(this).attr("src");
                if ($(currentElement).is('img')) {
                    $(currentElement).attr('src', imageUrl);  // Update <img> element
                } else {
                    $(currentElement).css('background-image', 'url(' + imageUrl + ')'); 
                }
                saveStateToUndoStack();  
                $('#imageUploadModal').modal('hide');
            });

        }
        


        
        
        // Attach hover events when iframe loads
        attachHoverEvents();
        handleClickEvents();

    });

});

$(document).ready(function() {
    // Handle drag-and-drop functionality
    let uploadArea = $('.upload-area');
    let imageInput = $('#imageInput');

    // Highlight the drop zone when dragging over
    uploadArea.on('dragover', function(event) {
        event.preventDefault();
        uploadArea.addClass('dragging');
    });

    // Remove the highlight when dragging leaves
    uploadArea.on('dragleave', function(event) {
        uploadArea.removeClass('dragging');
    });


    // Handle file drop
    uploadArea.on('drop', function(event) {
        event.preventDefault();
        uploadArea.removeClass('dragging');

        // Retrieve the files from the drop event
        let files = event.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            // Assign the dropped file to the hidden input element
            imageInput[0].files = files;

            // Trigger the file change event to handle the upload logic
            imageInput.trigger('change');
        }
    });

    // Handle click on upload area to trigger file input
    uploadArea.on('click', function() {
        imageInput.click();
    });

    // Handle file input change (file selected via drag or manual upload)
    imageInput.on('change', function(event) {
        let files = event.target.files;
        if (files && files.length > 0) {
            let file = files[0];
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle upload button click (just an example, replace with actual upload logic)
 
    function uploadImageUrl(imageUrl) {
        fetch(imageUrl)
        .then(response => response.blob())
        .then(blob => {
            // Create a file from the blob
            let file = new File([blob], "uploaded_image.jpg", { type: blob.type });
            
            // Create a DataTransfer object to simulate file input change
            let dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);

            // Assign the file to the image input element
            imageInput[0].files = dataTransfer.files;

            // Trigger the file change event to handle the upload logic
            imageInput.trigger('change');
        })
        .catch(err => {
            console.error('Error fetching the image from URL:', err);
        });
    }

    



    window.uploadImageUrl = uploadImageUrl;
    window.updateImageCroper = updateImageCroper;
});

