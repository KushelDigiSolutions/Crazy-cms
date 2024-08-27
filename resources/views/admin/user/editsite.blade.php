<!-- resources/views/home.blade.php -->
@extends('layouts.home_header')

@section('title', 'Preview Page')

@section('content')
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet">
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
<style>
 .tag {
            display: inline-block;
            margin: 5px;
        }
        .tag .close {
            margin-left: 5px;
            cursor: pointer;
            color: white;
        }
        #healthMeter {
            margin-top: 10px;
        }
        .counter {
            font-size: 0.9em;
            color: gray;
        }
        .suggestion {
            margin-bottom: 20px;
            background: #fcffcb;
            padding: 10px;
            border-radius: 10px;
        }
        .autocomplete-suggestions {
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            position: absolute;
            z-index: 1000;
            background: white;
            width: calc(100% - 20px);
        }
        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
        }
        .autocomplete-suggestion:hover {
            background: #f0f0f0;
        }
        .offcanvas{
            z-index: 99999 !important;
        }
    </style>
   <div class="Projects">
    <div id="secondDiv">
     {!! $htmlContent !!} 
    
    </div>

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
        </div>
    </div>
        @endif

    <div class="preview_sect">
   <div class="test_sect">

        <div class="preview_btn">
            @if($subs_id == 2)
            <button  type="button" data-bs-toggle="offcanvas" data-bs-target="#seoSidebar" aria-controls="seoSidebar">Seo Settings</button> @endif
            <select name="history_updated" id="history_updated">
                <option value="">History Page</option>
                @foreach($histories as $history)
                <option value="{{$history['id']}}">{{$history["name"]}}</option>
                @endforeach
            </select>
            <select name="pages" id="pages">
                <option value="">Select Page</option>
                @foreach($files as $mfile)
                <option @if($filename == $mfile) selected @endif value="{{$mfile}}">{{$mfile}}</option>
                @endforeach
            </select>
        </div>
      <div class="first_preview">
          <span>{{$filename}} Page</span>
          
      </div>
      <div class="second_preview">
           <div class="preview_svg">
           <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25562 6.34897L6.7366 8.82996L5.35282 10.2137L0.509552 5.37049L5.35282 0.527222L6.7366 1.91102L4.25562 4.392H11.2729C15.5962 4.392 19.1008 7.89666 19.1008 12.2199C19.1008 16.5431 15.5962 20.0478 11.2729 20.0478H2.46653V18.0909H11.2729C14.5153 18.0909 17.1438 15.4624 17.1438 12.2199C17.1438 8.97747 14.5153 6.34897 11.2729 6.34897H4.25562Z" fill="#7E8299"/>
</svg>

<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.8169 6.34897H8.79963C5.55721 6.34897 2.92871 8.97747 2.92871 12.2199C2.92871 15.4624 5.55721 18.0909 8.79963 18.0909H17.606V20.0478H8.79963C4.47641 20.0478 0.971741 16.5431 0.971741 12.2199C0.971741 7.89666 4.47641 4.392 8.79963 4.392H15.8169L13.3359 1.91102L14.7198 0.527222L19.563 5.37049L14.7198 10.2137L13.3359 8.82996L15.8169 6.34897Z" fill="#E1E3EA"/>
</svg>


           </div>

           <div class="preview_btn">
               <button onclick="savePage()"> Save</button>
           </div>
      </div>
   </div>
</div>

</div>

   <!-- Modal for Image Upload -->
   <div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="imageUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageUploadModalLabel">Upload New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" id="imageInput" accept="image/*">
                <div>
                    <img id="imagePreview" style="max-width: 100%; display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="uploadImageButton">Upload Image</button>
            </div>
        </div>
    </div>
</div>
<div id="floatingToolbar" style="display:none; position:absolute; background-color:lightgrey; border:1px solid #ccc; padding:5px;">
  <button id="duplicateButton">Duplicate</button>
</div>
<div id="imageUploadModal" class="modal">
    <div class="modal-content">
        <input type="file" id="imageInput">
        <button id="uploadImageButton">Upload</button>
    </div>
</div>

<!-- Link Edit Modal -->
<div class="modal fade" id="linkEditModal" tabindex="-1" role="dialog" aria-labelledby="linkEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkEditModalLabel">Edit Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                <div id="imageUploadSection" style="display: none;">
                    <hr>
                    <h5>Upload Image</h5>
                    <input type="file" id="imageInput" accept="image/*">
                    <div>
                        <img id="imagePreview" src="#" alt="Preview" style="max-width: 100%; max-height: 300px; display: none;">
                    </div>
                    <button type="button" class="btn btn-primary mt-2" id="uploadImageButton">Upload Image</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveLinkButton">Save changes</button>
            </div>
        </div>
    </div>
</div>



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
    $('#pages').on('change', function() {
        // Get the value of the selected option
        var selectedValue = $(this).val();
        
        // Optionally, you can get the text of the selected option
        var selectedText = $(this).find('option:selected').text();

        // Ask for confirmation
        var isConfirmed = confirm("Are you sure you want to change the page?");
        
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


</script>

<script src="{{asset('admin/customjs/editor.js')}}"></script>
</body>
@endsection