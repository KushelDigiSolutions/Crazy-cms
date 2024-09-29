@extends('layouts.home_header')
@section('title', 'Preview Page')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="pretight"></div>
<iframe  id="myFinalIframe" src="{{$webUrl}}"></iframe>
@if($subs_id == 2)
    <div class="offcanvas offcanvas-start" tabindex="-1" id="seoSidebar" aria-labelledby="seoSidebarLabel">
        <div class="offcanvas-header">
            <h5 id="seoSidebarLabel">SEO Elements</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <label for="metaTitle">Meta Title:</label>
                <input type="text" id="metaTitle" class="form-control" maxlength="60" value="{{$seo['title']}}" placeholder="Enter meta title">
                <div id="titleCounter" class="counter">0/60</div>
                <div id="titleSuggestion" class="suggestion"></div>
            </div>
            <div>
                <label for="metaDescription">Meta Description:</label>
                <textarea id="metaDescription" class="form-control" maxlength="160" placeholder="Enter meta description">{{$seo['description']}}</textarea>
                <div id="descriptionCounter" class="counter">0/160</div>
                <div id="descriptionSuggestion" class="suggestion"></div>
            </div>
            <div>
                <label for="tagsInput">Tags:</label>
                <input type="text" id="tagsInput" class="form-control" value="{{ implode(', ', $seo['tags'])}}" placeholder="Add a tag and press Enter">
                <div id="tagsContainer"></div>
                <div id="tagsCounter" class="counter">0/10</div>
                <div id="tagsSuggestion" class="suggestion"></div>
                <div id="autocompleteContainer" class="autocomplete-suggestions"></div>
            </div>
            <div id="healthMeter" class="text-danger">Health: <span id="healthStatus">Bad</span></div>

            <button class="customBtnUpdate" id="updateMetaValues">Update Meta Values</button>
        </div>
    </div>
        @endif

    <div class="preview_sect">
   <div class="test_sect">

        <div class="preview_btn">
            <button onclick="window.location.href='{{ url('/admin/mysites') }}?isPlan=1'">Exit Editor</button>
            @if($subs_id == 2)
            <button  type="button" data-bs-toggle="offcanvas" data-bs-target="#seoSidebar" aria-controls="seoSidebar">Edit Meta Tags</button> @endif
            <select name="history_updated" id="history_updated">
                <option value="">Restore Backup</option>
                @foreach($histories as $history)
                <option value="{{$history['id']}}">{{$history["name"]}}</option>
                @endforeach
            </select>
            <select name="pages" id="pages">
                <option value="">Select Page</option>
    
                @foreach($files as $mfile)
                <option @if($pagename == $mfile) selected @endif value="{{$mfile}}">{{$mfile}}</option>
                @endforeach
            </select>
        </div>
      <div class="first_preview">
          <span class="pagenamescreen">{{$pagename}}</span>
          
      </div>
      <div class="second_preview">
     <!--       <div class="preview_svg">
           <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25562 6.34897L6.7366 8.82996L5.35282 10.2137L0.509552 5.37049L5.35282 0.527222L6.7366 1.91102L4.25562 4.392H11.2729C15.5962 4.392 19.1008 7.89666 19.1008 12.2199C19.1008 16.5431 15.5962 20.0478 11.2729 20.0478H2.46653V18.0909H11.2729C14.5153 18.0909 17.1438 15.4624 17.1438 12.2199C17.1438 8.97747 14.5153 6.34897 11.2729 6.34897H4.25562Z" fill="#7E8299"/>
</svg>

<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.8169 6.34897H8.79963C5.55721 6.34897 2.92871 8.97747 2.92871 12.2199C2.92871 15.4624 5.55721 18.0909 8.79963 18.0909H17.606V20.0478H8.79963C4.47641 20.0478 0.971741 16.5431 0.971741 12.2199C0.971741 7.89666 4.47641 4.392 8.79963 4.392H15.8169L13.3359 1.91102L14.7198 0.527222L19.563 5.37049L14.7198 10.2137L13.3359 8.82996L15.8169 6.34897Z" fill="#E1E3EA"/>
</svg>


           </div> -->
           <div class="preview_btn">
               <button onclick="savePage()">Save/Publish</button>
           </div>
      </div>
   </div>
</div>

</div>




<!-- Link Edit Modal -->
<div class="modal fade" id="linkEditModal" tabindex="-1" role="dialog" aria-labelledby="linkEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkEditModalLabel">Edit Link</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="linkText">Text:</label>
                    <input type="text" class="form-control" id="linkText" placeholder="Enter Link Text">
                </div>
                <div class="form-group">
                    <label for="linkUrl">URL:</label>
                    <input type="text" class="form-control" id="linkUrl" placeholder="Enter URL">
                </div>
                <div class="form-group">
                    <label for="linkTarget">Target:</label>
                    <select class="form-control" id="linkTarget">
                        <option value="_self">Same Window/Tab</option>
                        <option value="_blank">New Window/Tab</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveLinkButton">Save changes</button>
            </div>
        </div>
    </div>
</div>


   <!-- Modal for Image Upload -->
   <div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="imageUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageUploadModalLabel">Upload New Image</h5>
            </div>
            <div class="modal-body">
                <p class="modal-description">Attach the file below</p>

                <div class="row">
                    <div class="col-5">
                        <button class="upload-area">
                                <span class="upload-area-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="340.531" height="419.116" viewBox="0 0 340.531 419.116">
                                <g id="files-new" clip-path="url(#clip-files-new)">
                                    <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="var(--c-action-primary)"/>
                                </g>
                                </svg>
                                </span>
                                <span class="upload-area-title">Drag file(s) here to upload.</span>
                                <span class="upload-area-description">
                                    Alternatively, you can select a file by <br/><strong>clicking here</strong>
                                </span>
                        </button>

                        <input type="file" id="imageInput" style="display:none;" accept="image/*">
                        <div style="margin-top:10px;">
                            <img id="imagePreview" style="max-width: 100%; display: none;">
                        </div>
                    </div>
                    <div class="col-7">
                        <div id="mediaCurrent">
                            @if(count($allImages)>0)
                            <ul class="row">
                            @foreach($allImages as $imgs)
                                <li class="col-4" ><img src="{{$imgs}}" /></li>
                            @endforeach
                            </ul>
                            @else
                                No Images
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="uploadImageButton">Upload Image</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet">
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
<script src="{{asset('admin/customjs/meditor.js')}}"></script>
<script>
function savePage(event) {
    if (event) {
        event.preventDefault(); // Prevent default form submission
    }

    // Remove contenteditable attribute from elements
    var editableElements = document.querySelectorAll('[contenteditable="true"]');
    editableElements.forEach(function(el) {
        el.removeAttribute('contenteditable');
    });

    const pretight = document.getElementById("pretight");
    pretight.innerHTML = `<div class="set">
                            <img src="https://res.cloudinary.com/ecommerce-website/image/upload/v1725709329/aronswebsites-_bmrgzo.gif" alt=""/>
                        </div>`; 

    // Get the iframe document using jQuery
    var iframeDocument = $('#myFinalIframe')[0].contentDocument;

    // Initialize doctype variable
    var doctype = '';

    // Check if iframeDocument.doctype exists before serializing
    if (iframeDocument.doctype) {
        doctype = new XMLSerializer().serializeToString(iframeDocument.doctype);
    }

    // Get the full HTML content of the iframe
    var htmlContent = iframeDocument.documentElement.outerHTML;

    // Combine DOCTYPE and HTML
    var fullHtml = doctype + htmlContent;

    // Serialize form data
    var formData = $(this).serialize();

    // Add the iframe HTML to formData
    formData += '&iframeHtml=' + encodeURIComponent(fullHtml);

    // Set up CSRF token for the request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    // Send AJAX request with formData
    $.ajax({
        url: '{{ url('/admin/updatesite').'/'.$site_id }}', // URL for the route
        type: 'POST',
        data: formData, // Sending the formData including iframe HTML
        success: function(response) {
            pretight.remove();
            if (response.success) {
                alert(response.success);
                // Remove the 'history_id' parameter from the URL
                let url = new URL(window.location.href);
                url.searchParams.delete('history_id'); // Remove 'history_id' parameter

                // Use history.replaceState to update the URL without refreshing
                window.history.replaceState(null, null, url);

                // Reload the page with the updated URL
                location.reload();
            } else {
                alert('An error occurred. Please try again.');
            }
        },
        error: function(xhr) {
            pretight.remove();
            alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
        }
    });
}
$(document).ready(function() {
    $('#pages').on('change', function() {
        // Get the value of the selected option
        var selectedValue = $(this).val();
        
        // Optionally, you can get the text of the selected option
        var selectedText = $(this).find('option:selected').text();

        // Ask for confirmation
        var isConfirmed = confirm("Are you sure you want to change the page? Save your changes before change the page.");
        
        if (isConfirmed) {
            // Do something with the selected value or text
            console.log('Selected Value: ' + selectedValue);
            console.log('Selected Text: ' + selectedText);
            
            // Construct the URL and navigate to the page
            var url = "{{ url('/admin/editsite').'/'.$variable.'/'.$site_id.'/' }}?page=" + selectedValue;
            console.log(url);
            window.location.href = url;
        } else {
            // User canceled the action
            console.log('Page change canceled.');
        }
    });
});
$(document).ready(function() {
    $('#history_updated').on('change', function() {
        // Get the value of the selected option (assuming this is the slug like 'sell-your-home.html')
        var selectedValue = $(this).val();
        
        // Optionally, you can get the text of the selected option
        var selectedText = $(this).find('option:selected').text();

        // Ask for confirmation
        var isConfirmed = confirm("Are you sure you want to go back to " + selectedText + " history page?");
        
        if (isConfirmed) {
            // Get the current URL
            var currentUrl = new URL(window.location.href);
            
            // Get the URLSearchParams object
            var searchParams = new URLSearchParams(currentUrl.search);
            var url = "";
            if (searchParams.has('page')) {
                // Set the value of 'page' to the selectedValue
                //searchParams.set('page', selectedValue);
                url = "{{ url('/admin/editsite').'/'.$variable.'/'.$site_id }}?page=" + searchParams.get('page')+ "&history_id="+selectedValue;
                
            } else {
                // If 'page' does not exist, remove it (in case it was there previously)
                url = "{{ url('/admin/editsite').'/'.$variable.'/'.$site_id }}?history_id="+selectedValue;
            }
            console.log(url);
            window.location.href = url;
        } else {
            // User canceled the action
            console.log('Page change canceled.');
        }
    });
});

$(document).ready(function() {
    let tags = [];
    const predefinedTags = ['SEO', 'Marketing', 'Content', 'Web Development', 'Digital Marketing', 'Social Media', 'Analytics', 'Keywords', 'Traffic', 'Conversion'];

    // Convert comma-separated tags into badges on load if present
    const initialTags = $('#tagsInput').val().split(',');
    initialTags.forEach(tag => {
        tag = tag.trim();
        if (tag && !tags.includes(tag) && tags.length < 10) {
            tags.push(tag);
        }
    });
    renderTags();

    $('#tagsInput').on('input', function() {
        const inputVal = $(this).val().toLowerCase();
        $('#autocompleteContainer').empty();
        if (inputVal) {
            const suggestions = predefinedTags.filter(tag => tag.toLowerCase().includes(inputVal) && !tags.includes(tag));
            suggestions.forEach(tag => {
                $('#autocompleteContainer').append(`<div class="autocomplete-suggestion">${tag}</div>`);
            });
            // Show suggestion box if there are suggestions
            if (suggestions.length > 0) {
                $('#autocompleteContainer').show();
            } else {
                $('#autocompleteContainer').hide();
            }
        } else {
            $('#autocompleteContainer').hide();
        }
    });

    $('#autocompleteContainer').on('click', '.autocomplete-suggestion', function() {
        const tag = $(this).text();
        if (!tags.includes(tag) && tags.length < 10) {
            tags.push(tag);
            renderTags();
            $('#tagsInput').val('');
            $('#autocompleteContainer').empty().hide();
        }
    });

    $('#tagsInput').on('keypress', function(e) {
        if (e.which === 13 || e.which === 188) { // Enter or comma
            e.preventDefault();
            const tagInput = $(this).val().trim();
            const tagArray = tagInput.split(',').map(tag => tag.trim()); // Split by comma

            tagArray.forEach(tag => {
                if (tag && !tags.includes(tag) && tags.length < 10) {
                    tags.push(tag);
                }
            });
            $(this).val('');
            renderTags();
        }
    });

    function renderTags() {
        $('#tagsContainer').empty();
        tags.forEach((tag, index) => {
            $('#tagsContainer').append(`
                <span class="badge bg-primary tag">${tag}<span class="close" data-index="${index}">&times;</span></span>
            `);
        });
        updateHealthMeter();
        updateTagCounter();
    }

    $('#tagsContainer').on('click', '.close', function() {
        const index = $(this).data('index');
        tags.splice(index, 1);
        renderTags();
    });

    function updateHealthMeter() {
        const title = $('#metaTitle').val().trim();
        const description = $('#metaDescription').val().trim();
        const titleLength = title.length;
        const descriptionLength = description.length;
        const keywordCount = countKeywords(title, description, tags);

        let healthStatus = 'Bad';
        let healthClass = 'text-danger';
        let titleSuggestion = '';
        let descriptionSuggestion = '';
        let tagsSuggestion = '';

        // Evaluate health based on metrics
        if (titleLength > 50 && descriptionLength > 150 && keywordCount > 0) {
            healthStatus = 'Good';
            healthClass = 'text-success';
        } else if (titleLength > 30 && descriptionLength > 100 && keywordCount > 0) {
            healthStatus = 'Average';
            healthClass = 'text-warning';
        }

        // Set suggestions based on health status
        if (healthStatus === 'Bad') {
            if (titleLength <= 50) {
                titleSuggestion = 'Consider making your title more descriptive and include relevant keywords.';
            }
            if (descriptionLength <= 150) {
                descriptionSuggestion = 'Your meta description is too short. Aim for a more detailed summary of your content.';
            }
            if (keywordCount === 0) {
                tagsSuggestion = 'Add relevant keywords in your title, description, or tags.';
            }
        }

        $('#healthStatus').text(healthStatus).removeClass('text-danger text-warning text-success').addClass(healthClass);
        $('#titleSuggestion').text(titleSuggestion);
        $('#descriptionSuggestion').text(descriptionSuggestion);
        $('#tagsSuggestion').text(tagsSuggestion);
    }

    function countKeywords(title, description, tags) {
        const allKeywords = [title, description, ...tags];
        const keywordSet = new Set();

        allKeywords.forEach(item => {
            item.split(/\s+/).forEach(word => {
                keywordSet.add(word.toLowerCase());
            });
        });

        return keywordSet.size; // Return unique keyword count
    }

    function updateTagCounter() {
        $('#tagsCounter').text(`${tags.length}/10`); // Update tag counter
    }

    $('#metaTitle').on('input', function() {
        const length = $(this).val().length;
        $('#titleCounter').text(`${length}/60`);
        updateHealthMeter();
    });

    $('#metaDescription').on('input', function() {
        const length = $(this).val().length;
        $('#descriptionCounter').text(`${length}/160`);
        updateHealthMeter();
    });

    // Show character count on load
    const titleLengthOnLoad = $('#metaTitle').val().length;
    const descriptionLengthOnLoad = $('#metaDescription').val().length;
    $('#titleCounter').text(`${titleLengthOnLoad}/60`);
    $('#descriptionCounter').text(`${descriptionLengthOnLoad}/160`);

    // Update health meter on load
    updateHealthMeter();
});

$('#updateMetaValues').on('click', function() {
    // Get the values from the input fields
    var metaTitle = $('#metaTitle').val();
    var metaDescription = $('#metaDescription').val();
    var metaKeywords = $('#tagsInput').val();

    // Access the iframe content
    var iframe = $('#myFinalIframe').contents();

    // Update the <title>
    if (iframe.find('head title').length) {
        iframe.find('head title').text(metaTitle); // Update the existing title
    } else {
        iframe.find('head').append('<title>' + metaTitle + '</title>'); // Create title if it doesn't exist
    }

    // Update the <meta name="description">
    var metaDescriptionTag = iframe.find('head meta[name="description"]');
    if (metaDescriptionTag.length) {
        metaDescriptionTag.attr('content', metaDescription); // Update the existing meta description
    } else {
        iframe.find('head').append('<meta name="description" content="' + metaDescription + '">'); // Create meta description if it doesn't exist
    }

    // Update the <meta name="keywords">
    var metaKeywordsTag = iframe.find('head meta[name="keywords"]');
    if (metaKeywordsTag.length) {
        metaKeywordsTag.attr('content', metaKeywords); // Update the existing meta keywords
    } else {
        iframe.find('head').append('<meta name="keywords" content="' + metaKeywords + '">'); // Create meta keywords if it doesn't exist
    }

    // Feedback to confirm updates
    alert('Meta tags updated successfully.');
});



var saveImgUrl = "{{ url('/admin/saveimages').'/'.$site_id }}";
</script>
</body>
@endsection
<?php /*
@extends('layouts.home_header')

@section('title', 'Preview Page')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    let tags = [];
    const predefinedTags = ['SEO', 'Marketing', 'Content', 'Web Development', 'Digital Marketing', 'Social Media', 'Analytics', 'Keywords', 'Traffic', 'Conversion'];

    // Convert comma-separated tags into badges on load if present
    const initialTags = $('#tagsInput').val().split(',');
    initialTags.forEach(tag => {
        tag = tag.trim();
        if (tag && !tags.includes(tag) && tags.length < 10) {
            tags.push(tag);
        }
    });
    renderTags();

    $('#tagsInput').on('input', function() {
        const inputVal = $(this).val().toLowerCase();
        $('#autocompleteContainer').empty();
        if (inputVal) {
            const suggestions = predefinedTags.filter(tag => tag.toLowerCase().includes(inputVal) && !tags.includes(tag));
            suggestions.forEach(tag => {
                $('#autocompleteContainer').append(`<div class="autocomplete-suggestion">${tag}</div>`);
            });
            // Show suggestion box if there are suggestions
            if (suggestions.length > 0) {
                $('#autocompleteContainer').show();
            } else {
                $('#autocompleteContainer').hide();
            }
        } else {
            $('#autocompleteContainer').hide();
        }
    });

    $('#autocompleteContainer').on('click', '.autocomplete-suggestion', function() {
        const tag = $(this).text();
        if (!tags.includes(tag) && tags.length < 10) {
            tags.push(tag);
            renderTags();
            $('#tagsInput').val('');
            $('#autocompleteContainer').empty().hide();
        }
    });

    $('#tagsInput').on('keypress', function(e) {
        if (e.which === 13 || e.which === 188) { // Enter or comma
            e.preventDefault();
            const tagInput = $(this).val().trim();
            const tagArray = tagInput.split(',').map(tag => tag.trim()); // Split by comma

            tagArray.forEach(tag => {
                if (tag && !tags.includes(tag) && tags.length < 10) {
                    tags.push(tag);
                }
            });
            $(this).val('');
            renderTags();
        }
    });

    function renderTags() {
        $('#tagsContainer').empty();
        tags.forEach((tag, index) => {
            $('#tagsContainer').append(`
                <span class="badge bg-primary tag">${tag}<span class="close" data-index="${index}">&times;</span></span>
            `);
        });
        updateHealthMeter();
        updateTagCounter();
    }

    $('#tagsContainer').on('click', '.close', function() {
        const index = $(this).data('index');
        tags.splice(index, 1);
        renderTags();
    });

    function updateHealthMeter() {
        const title = $('#metaTitle').val().trim();
        const description = $('#metaDescription').val().trim();
        const titleLength = title.length;
        const descriptionLength = description.length;
        const keywordCount = countKeywords(title, description, tags);

        let healthStatus = 'Bad';
        let healthClass = 'text-danger';
        let titleSuggestion = '';
        let descriptionSuggestion = '';
        let tagsSuggestion = '';

        // Evaluate health based on metrics
        if (titleLength > 50 && descriptionLength > 150 && keywordCount > 0) {
            healthStatus = 'Good';
            healthClass = 'text-success';
        } else if (titleLength > 30 && descriptionLength > 100 && keywordCount > 0) {
            healthStatus = 'Average';
            healthClass = 'text-warning';
        }

        // Set suggestions based on health status
        if (healthStatus === 'Bad') {
            if (titleLength <= 50) {
                titleSuggestion = 'Consider making your title more descriptive and include relevant keywords.';
            }
            if (descriptionLength <= 150) {
                descriptionSuggestion = 'Your meta description is too short. Aim for a more detailed summary of your content.';
            }
            if (keywordCount === 0) {
                tagsSuggestion = 'Add relevant keywords in your title, description, or tags.';
            }
        }

        $('#healthStatus').text(healthStatus).removeClass('text-danger text-warning text-success').addClass(healthClass);
        $('#titleSuggestion').text(titleSuggestion);
        $('#descriptionSuggestion').text(descriptionSuggestion);
        $('#tagsSuggestion').text(tagsSuggestion);
    }

    function countKeywords(title, description, tags) {
        const allKeywords = [title, description, ...tags];
        const keywordSet = new Set();

        allKeywords.forEach(item => {
            item.split(/\s+/).forEach(word => {
                keywordSet.add(word.toLowerCase());
            });
        });

        return keywordSet.size; // Return unique keyword count
    }

    function updateTagCounter() {
        $('#tagsCounter').text(`${tags.length}/10`); // Update tag counter
    }

    $('#metaTitle').on('input', function() {
        const length = $(this).val().length;
        $('#titleCounter').text(`${length}/60`);
        updateHealthMeter();
    });

    $('#metaDescription').on('input', function() {
        const length = $(this).val().length;
        $('#descriptionCounter').text(`${length}/160`);
        updateHealthMeter();
    });

    // Show character count on load
    const titleLengthOnLoad = $('#metaTitle').val().length;
    const descriptionLengthOnLoad = $('#metaDescription').val().length;
    $('#titleCounter').text(`${titleLengthOnLoad}/60`);
    $('#descriptionCounter').text(`${descriptionLengthOnLoad}/160`);

    // Update health meter on load
    updateHealthMeter();
});


<<<<<<< Updated upstream
<<<<<<< Updated upstream
function savePage(){
    event.preventDefault(); // Prevent default form submission

            let formData = $(this).serialize(); // Serialize form data
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('customerRegister') }}', // URL for the route
                type: 'POST',
                data: {
                    data: $('input[name="plan"]').val(),
                },
                success: function(response) {
                    if (response.success) {
                        if (response.exists) {
                            alert('User already exists. Please log in.');
                        } else {
                            // Open PayPal payment gateway with the plan price
                            window.location.href = "{{url('/pay')}}";
                        }
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
                }
            });
}

$(document).ready(function() {
    $('#history_updated').on('change', function() {
        // Get the value of the selected option (assuming this is the slug like 'sell-your-home.html')
        var selectedValue = $(this).val();
        
        // Optionally, you can get the text of the selected option
        var selectedText = $(this).find('option:selected').text();

        // Ask for confirmation
        var isConfirmed = confirm("Are you sure you want to go back to " + selectedText + " history page?");
        
        if (isConfirmed) {
            // Get the current URL
            var currentUrl = new URL(window.location.href);
            
            // Get the URLSearchParams object
            var searchParams = new URLSearchParams(currentUrl.search);
            var url = "";
            if (searchParams.has('page')) {
                // Set the value of 'page' to the selectedValue
                //searchParams.set('page', selectedValue);
                url = "{{ url('/admin/editsite').'/'.$variable.'/'.$site_id }}?page=" + searchParams.get('page')+ "&history_id="+selectedValue;
                
            } else {
                // If 'page' does not exist, remove it (in case it was there previously)
                url = "{{ url('/admin/editsite').'/'.$variable.'/'.$site_id }}?history_id="+selectedValue;
            }
            console.log(url);
            window.location.href = url;
        } else {
            // User canceled the action
            console.log('Page change canceled.');
        }
    });
});







</script>

<script src="{{asset('admin/customjs/editor.js')}}"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
<script>
Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  acceptedFiles: 'image/*',
  success: function(file, response){
    // Handle successful upload
  }
};

</script>
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
@endsection
*/
?>