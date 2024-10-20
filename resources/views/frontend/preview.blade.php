@extends('layouts.home_header')
@section('title', 'Preview Page')
@section('content')
<style>
    .sdr{
        display:none;
        background:white;
        width:200px;
        padding:20px;
        position:fixed;
        top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    
     .sdr11{
        display:none;
        background:white;
        width:200px;
        padding:20px;
        position:fixed;
        top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    }
    .sdr1{
        display:block !important;
    }
    .main{
    display: flex;
    align-items: center;
    gap: 20px;
}
.message{
    position: fixed;
    top: 90%;
    transform: translate(-141px,-30px);
    background: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

@media only screen and (max-width:955px){
    .test_sect{
        flex-wrap:wrap;
        gap:10px;
    }
    .first_preview{
          flex-wrap:wrap;
           gap:10px;
    }
    .main{
        flex-wrap:wrap;
         gap:10px;
    }
    .preview_btn{
        margin-left:0px;
    }
}
</style>
<x-front-header-component />
<iframe  id="myIframe" src="{{$webUrl}}"></iframe>
<div class="preview_sect">
   <div class="test_sect">
      <div class="first_preview">
          <a class = "a_one" href="">Pages</a>
          <a href="">Home</a>
        <div class="main" >
        <div>
            <button class="btn btn-outline-dark" >Exit Editor</button>
            <span class="message"></span>
        </div>
     
        <div>
            <button  class="btn btn-outline-dark">Edit Meta Tags</button>
            <span class="message"></span>
        </div>
     
        <div>
            <button class="btn btn-outline-dark" >Restore Backup</button>
            <span class="message"></span>
        </div>

        <div>
            <button class="btn btn-outline-dark" >Select Page</button>
            <span class="message"></span>
        </div>
     
       
    </div>
      </div>
      <div class="second_preview">
        <!--    <div class="preview_svg">
           <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25562 6.34897L6.7366 8.82996L5.35282 10.2137L0.509552 5.37049L5.35282 0.527222L6.7366 1.91102L4.25562 4.392H11.2729C15.5962 4.392 19.1008 7.89666 19.1008 12.2199C19.1008 16.5431 15.5962 20.0478 11.2729 20.0478H2.46653V18.0909H11.2729C14.5153 18.0909 17.1438 15.4624 17.1438 12.2199C17.1438 8.97747 14.5153 6.34897 11.2729 6.34897H4.25562Z" fill="#7E8299"/>
            </svg>
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.8169 6.34897H8.79963C5.55721 6.34897 2.92871 8.97747 2.92871 12.2199C2.92871 15.4624 5.55721 18.0909 8.79963 18.0909H17.606V20.0478H8.79963C4.47641 20.0478 0.971741 16.5431 0.971741 12.2199C0.971741 7.89666 4.47641 4.392 8.79963 4.392H15.8169L13.3359 1.91102L14.7198 0.527222L19.563 5.37049L14.7198 10.2137L13.3359 8.82996L15.8169 6.34897Z" fill="#E1E3EA"/>
            </svg>
        </div> -->

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
                    <div class="col-12">
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
                   <!--  <div class="col-7">
                        <div id="mediaCurrent">ss</div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="uploadImageButton">Upload Image</button>
            </div>
        </div>
    </div>
</div>

<script>
    function gotoFtp(){
        window.location.href = "<?= url('check-ftp/?site=') ?>{{$variable}}";
    }
</script>

<script>
   const buttons = document.getElementsByClassName("btn");
const messages = document.getElementsByClassName("message");


Array.from(buttons).forEach((button , index) => {
    button.addEventListener("click", () => {

        Array.from(messages).forEach((msg , index2) =>{
            if(index === index2){
                if(msg.textContent === ""){
                    
                    msg.textContent = "You need to  signup"
                     setTimeout(() => {
             msg.textContent = ""
    }, 2000);
                }
                else{
                    
                        msg.textContent = ""
                    }
                }
        })
    });
});

</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet">
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
<script src="{{asset('admin/customjs/editor.js')}}"></script>
</body>
@endsection