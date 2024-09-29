@extends('layouts.home_header')
@section('title', 'Preview Page')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <style>
        #gjs {
            margin-top: 50px;
            height: calc(100vh - 113px) !important;
        }
        .gjs-cv-canvas{
            width: 100%;
        }
        .modal-content {
            padding: 20px;
            max-width: 100%;
        }
        .cropper-container {
            max-height: 400px;
            width: 100%;
        }
        .uploaded-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        .uploaded-images img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 2px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }
        .upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            border: 2px dashed #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .upload-container:hover {
            background-color: #f0f0f0;
        }
        .upload-icon {
            font-size: 48px;
            color: #aaa;
        }
        .upload-text {
            margin-top: 10px;
            color: #666;
        }
        nav{
            height:90px;
        }
        nav .links-container{
            height:auto !important;
        }
    </style>


<div class="previewHeader">
<section id="navbar">

    <div class="navCont">


        <nav class="navSome">

            <img class="navbarImg" src="{{asset('admin/img/summer.svg')}}" alt="">


            <input type="checkbox" id="sidebar-active" />



            <label for="sidebar-active" class="open-sidebar-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg>
            </label>

            <label id="overlay" for="sidebar-active"></label>

            <div class="links-container">

                <label for="sidebar-active" class="close-sidebar-button">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg>
                </label>

              <a class="ekaa" href="{{url('/')}}"><img class="home-link" src="{{asset('admin/img/summer.svg')}}" alt=""></a> 
                <!-- link back to homepage -->
                <a href="#" class="navSinItem">Features</a>
                <a id="srt" href="{{url('/page3')}}" class="navSinItem">Pricing</a>
                <!-- <a href="#" class="navSinItem">Offers</a>
      <a href="#"> <button class="navSinBtn"><span>CONTACT</span></button></a> -->
                <a href="{{url('/login')}}"> <button class="navSinBtn"><span>SIGN IN</span></button></a>

            </div>

        </nav>

    </div>


</section>
</div>

<div style="position: relative; top:50px;">
    <div id="gjs"></div>
</div>


<div class="preview_sect">
   <div class="test_sect">
      <div class="first_preview">
          <a class = "a_one" href="">Pages</a>
          <a href="">Home</a>
      </div>
 

        <div class="preview_btn">
            <button onclick="gotoFtp()">Save Changes</button>
        </div>
      </div>
   </div>
</div>

    <!-- Bootstrap Modal for image upload and cropping -->
    <div id="imageUploadModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload and Crop Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" id="imageInput" accept="image/*" class="form-control">
                    <div id="cropperContainer" class="cropper-container mt-3" style="display: none;">
                        <img id="imageToCrop" src="" alt="Image to crop">
                    </div>
                    <div class="uploaded-images mt-3">
                        <!-- Existing uploaded images will be displayed here -->
                    </div>
                    <button id="uploadImageButton" class="btn btn-primary mt-2">Upload and Crop</button>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveLinkButton">Save changes</button>
            </div>
        </div>
    </div>
</div>

    <!-- Load JavaScript files -->
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <script>
        var webUrl = "{{ $webUrl }}";
    </script>
    <script src="{{asset('admin/customjs/editor.js')}}"></script>
@endsection