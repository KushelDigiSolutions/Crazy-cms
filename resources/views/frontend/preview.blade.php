@extends('layouts.home_header')
@section('title', 'Preview Page')
@section('content')
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
<div style="margin-top: 30px;height: calc(100% - 140px);position: absolute;width: 100%;">
<iframe  id="myIframe" src="{{$webUrl}}"    style="width: 100%; height: 100%; border: none; position: absolute;top:0;left: 0;bottom:0;"></iframe>
</div>
<div class="preview_sect">
   <div class="test_sect">
      <div class="first_preview">
          <a class = "a_one" href="">Pages</a>
          <a href="">Home</a>
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
            <button onclick="gotoFtp()">Save Changes</button>
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

<script>
    function gotoFtp(){
        window.location.href = "<?= url('check-ftp/?site=') ?>{{$variable}}";
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet">
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
<script src="{{asset('admin/customjs/editor.js')}}"></script>
</body>
@endsection