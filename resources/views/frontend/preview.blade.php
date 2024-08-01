<!-- resources/views/home.blade.php -->
@extends('layouts.home_header')

@section('title', 'Preview Page')

@section('content')
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet">
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>

   <div class="Projects">
   <header id="header" class="mainHeader">
        <nav class="navbar navbar-light  justify-content-between">
            <div>
                <a class="navbar-brand">Pages</a>
                <a href="" class="item">Home</a>
            </div>
            <form class="form-inline">
                <div class="icons_div">
                    <svg id="undoButton" class="urbtn" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.25559 7.34897L8.73657 9.82996L7.35279 11.2137L2.50952 6.37049L7.35279 1.52722L8.73657 2.91102L6.25559 5.392H13.2729C17.5961 5.392 21.1008 8.89666 21.1008 13.2199C21.1008 17.5431 17.5961 21.0478 13.2729 21.0478H4.46649V19.0909H13.2729C16.5153 19.0909 19.1438 16.4624 19.1438 13.2199C19.1438 9.97747 16.5153 7.34897 13.2729 7.34897H6.25559Z"
                            fill="#7E8299" />
                    </svg>
                    <svg id="redoButton" class="urbtn" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.3547 7.34897L14.8737 9.82996L16.2575 11.2137L21.1008 6.37049L16.2575 1.52722L14.8737 2.91102L17.3547 5.392H10.3374C6.01417 5.392 2.50952 8.89666 2.50952 13.2199C2.50952 17.5431 6.01417 21.0478 10.3374 21.0478H19.1438V19.0909H10.3374C7.09501 19.0909 4.4665 16.4624 4.4665 13.2199C4.4665 9.97747 7.09501 7.34897 10.3374 7.34897H17.3547Z"
                            fill="#7E8299" />
                            </svg>
                </div>
                <button class="btn preview_btn my-2 my-sm-0" id="toggleEditingButton" type="button">Enable Editing</button>
            </form>
        </nav>
    </header>
    <div id="secondDiv">
     <!--    xczzss$htmlContent !!} -->
         <iframe src="http://localhost:8081/crazycms/public/previews/firstchoicediningcom/" id="baba" name="baba"  width="100%" height="100%">
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

<script src="{{asset('admin/customjs/editor.js')}}"></script>
</body>
@endsection