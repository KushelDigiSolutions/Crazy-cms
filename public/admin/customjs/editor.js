var $jQuery1 = jQuery.noConflict(true);
var cropper;

$jQuery1(document).ready(function() {
    var currentElement;

    // Open image uploader on image or background image click
    $jQuery1('#secondDiv').on('click', 'img, [style*="background-image"]', function() {
        currentElement = $jQuery1(this);
        $jQuery1('#imageUploadModal').modal('show');
    });

    // Handle file input change
    $jQuery1('#imageInput').on('change', function(event) {
        var files = event.target.files;
        if (files && files.length > 0) {
            var file = files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $jQuery1('#imagePreview').attr('src', e.target.result).show();
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(document.getElementById('imagePreview'), {
                    aspectRatio: currentElement.is('img') ? currentElement.width() / currentElement.height() : 16 / 9, // default to 16:9 for background images
                    viewMode: 1
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle upload button click
    $jQuery1('#uploadImageButton').off('click').on('click', function() {
        if (cropper) {
            cropper.getCroppedCanvas().toBlob(function(blob) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if (currentElement.is('img')) {
                        currentElement.attr('src', e.target.result);
                    } else {
                        currentElement.css('background-image', 'url(' + e.target.result + ')');
                    }
                    $jQuery1('#imageUploadModal').modal('hide');
                };
                reader.readAsDataURL(blob);
            });
        }
    });

    // Handle link click to show link icon and edit link popup
    $jQuery1('#secondDiv').on('click', 'a', function(e) {
        e.preventDefault();
        var linkElement = $jQuery1(this);
       

        // Open link edit popup
        $jQuery1('#linkEditModal').modal('show');
        $jQuery1('#linkEditModal').on('shown.bs.modal', function() {
            $jQuery1('#linkUrl').val(linkElement.attr('href'));
            $jQuery1('#linkText').val(linkElement.text());
            $jQuery1('#linkTarget').val(linkElement.attr('target'));
            $jQuery1('#saveLinkButton').off('click').on('click', function() {
                var url = $jQuery1('#linkUrl').val();
                var text = $jQuery1('#linkText').val();
                var target = $jQuery1('#linkTarget').val();
                linkElement.attr('href', url);
                linkElement.text(text);
                linkElement.attr('target', target);
                $jQuery1('#linkEditModal').modal('hide');
            });
        });
    });

    // Disable all links inside #secondDiv initially
    $jQuery1('#secondDiv a').click(function(e) { $jQuery1('#linkText').val(linkElement.text());
        e.preventDefault();
    });

    // Enable/disable inline editing with a button click
    $jQuery1('#toggleEditingButton').click(function() {
        var isEditingEnabled = $jQuery1('#secondDiv').attr('contenteditable');
        if (isEditingEnabled) {
            $jQuery1('#secondDiv').removeAttr('contenteditable');
            $jQuery1(this).text('Enable Editing');
        } else {
            $jQuery1('#secondDiv').attr('contenteditable', 'true');
            $jQuery1(this).text('Disable Editing');
        }
    });

    // Enable inline editing on click for paragraphs and spans inside #secondDiv
    $jQuery1('#secondDiv').on('click', 'p, span, a, strong, h1, h2, h3, h4', function() {
        // Toggle contenteditable attribute
        $jQuery1(this).attr('contenteditable', true).focus();
    });

    // Handle blur (focus out) event to save changes
    $jQuery1('#secondDiv').on('blur', 'p, span, a, strong, h1, h2, h3, h4', function() {
        // Remove contenteditable attribute
        $jQuery1(this).removeAttr('contenteditable');
    });

    // Add undo/redo functionality for inline edits
    var editHistory = [];
    var currentEditIndex = -1;

    function saveEditHistory() {
        var content = $jQuery1('#secondDiv').html();
        if (currentEditIndex === -1 || editHistory[currentEditIndex] !== content) {
            editHistory = editHistory.slice(0, currentEditIndex + 1);
            editHistory.push(content);
            currentEditIndex++;
        }
    }

    $jQuery1('#secondDiv').on('input', function() {
        saveEditHistory();
    });

    $jQuery1('#undoButton').click(function() {var $jQuery1 = jQuery.noConflict(true);
        var cropper;
        
        $jQuery1(document).ready(function() {
            var currentElement;
        
            // Open image uploader on image or background image click
            $jQuery1('#secondDiv').on('click', 'img, [style*="background-image"]', function() {
                currentElement = $jQuery1(this);
                $jQuery1('#imageUploadModal').modal('show');
            });
        
            // Handle file input change
            $jQuery1('#imageInput').on('change', function(event) {
                var files = event.target.files;
                if (files && files.length > 0) {
                    var file = files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $jQuery1('#imagePreview').attr('src', e.target.result).show();
                        if (cropper) {
                            cropper.destroy();
                        }
                        cropper = new Cropper(document.getElementById('imagePreview'), {
                            aspectRatio: currentElement.is('img') ? currentElement.width() / currentElement.height() : 16 / 9, // default to 16:9 for background images
                            viewMode: 1
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });
        
            // Handle link click to open link edit popup
            $jQuery1('#secondDiv').on('click', 'a', function(e) {
                e.preventDefault();
                var linkElement = $jQuery1(this);
        
                // Open link edit popup
                $jQuery1('#linkEditModal').modal('show');
        
                // Populate modal fields with current link data
                $jQuery1('#linkUrl').val(linkElement.attr('href'));
                $jQuery1('#linkText').val(linkElement.text());
                $jQuery1('#linkTarget').val(linkElement.attr('target'));
        
                // Save changes on modal save button click
                $jQuery1('#saveLinkButton').off('click').on('click', function() {
                    var url = $jQuery1('#linkUrl').val();
                    var text = $jQuery1('#linkText').val();
                    var target = $jQuery1('#linkTarget').val();
                    
                    linkElement.attr('href', url);
                    linkElement.text(text);
                    linkElement.attr('target', target);
        
                    $jQuery1('#linkEditModal').modal('hide');
                });
            });
        
            // Handle drag-and-drop functionality for images
            $jQuery1('#secondDiv').on('dragover', 'img', function(e) {
                e.preventDefault();
            });
        
            $jQuery1('#secondDiv').on('drop', 'img', function(e) {
                e.preventDefault();
                var currentImg = $jQuery1(this);
                var file = e.originalEvent.dataTransfer.files[0];
                if (file && file.type.match('image.*')) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        currentImg.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        
            // Disable all links inside #secondDiv initially
            $jQuery1('#secondDiv a').click(function(e) {
                e.preventDefault();
            });
        
            // Enable/disable inline editing with a button click
            $jQuery1('#toggleEditingButton').click(function() {
                var isEditingEnabled = $jQuery1('#secondDiv').attr('contenteditable');
                if (isEditingEnabled) {
                    $jQuery1('#secondDiv').removeAttr('contenteditable');
                    $jQuery1(this).text('Enable Editing');
                } else {
                    $jQuery1('#secondDiv').attr('contenteditable', 'true');
                    $jQuery1(this).text('Disable Editing');
                }
            });
        
            // Enable inline editing on click for paragraphs and spans inside #secondDiv
            $jQuery1('#secondDiv').on('click', 'p, span, a, strong, h1, h2, h3, h4', function() {
                // Toggle contenteditable attribute
                $jQuery1(this).attr('contenteditable', true).focus();
            });
        
            // Handle blur (focus out) event to save changes
            $jQuery1('#secondDiv').on('blur', 'p, span, a, strong, h1, h2, h3, h4', function() {
                // Remove contenteditable attribute
                $jQuery1(this).removeAttr('contenteditable');
            });
        
            // Add undo/redo functionality for inline edits
            var editHistory = [];
            var currentEditIndex = -1;
        
            function saveEditHistory() {
                var content = $jQuery1('#secondDiv').html();
                if (currentEditIndex === -1 || editHistory[currentEditIndex] !== content) {
                    editHistory = editHistory.slice(0, currentEditIndex + 1);
                    editHistory.push(content);
                    currentEditIndex++;
                }
            }
        
            $jQuery1('#secondDiv').on('input', function() {
                saveEditHistory();
            });
        
            $jQuery1('#undoButton').click(function() {
                if (currentEditIndex > 0) {
                    currentEditIndex--;
                    $jQuery1('#secondDiv').html(editHistory[currentEditIndex]);
                }
            });
        
            $jQuery1('#redoButton').click(function() {
                if (currentEditIndex < editHistory.length - 1) {
                    currentEditIndex++;
                    $jQuery1('#secondDiv').html(editHistory[currentEditIndex]);
                }
            });
        
            // Initialize edit history with the initial content
            saveEditHistory();
        });
        
        if (currentEditIndex > 0) {
            currentEditIndex--;
            $jQuery1('#secondDiv').html(editHistory[currentEditIndex]);
        }
    });

    $jQuery1('#redoButton').click(function() {
        if (currentEditIndex < editHistory.length - 1) {
            currentEditIndex++;
            $jQuery1('#secondDiv').html(editHistory[currentEditIndex]);
        }
    });

    // Initialize edit history with the initial content
    saveEditHistory();
});
