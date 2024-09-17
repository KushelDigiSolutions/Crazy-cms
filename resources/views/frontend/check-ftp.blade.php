<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('admin/customcss/ftp.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=Ab9fUDw9DAjpGg1CbtS66FdSWnzg17U2eWO5l5nJVhNAMyNhBokZnd5KLdsV_ymQqSm86if24bXEKGV1
&currency=USD"></script>


    <section>
        <div id="crazy-crm-page1">
            <div class="crazy-crm-banner">
                <div class="crazy-crm-container">
                    <div class="crazy-crm-content">
                        <div class="crazy-crm-left-form">
                            <h1 class="text-start">We Need Some Information to Save Your Changes</h1>
                            <p class="text-start">Before proceeding, we need to first test the compatibility of your website with MyCrazySimpleCMS. To ensure your changes can be saved, please grant access to your hosting account. By providing FTP access, MyCrazySimpleCMS will be able to apply your edits directly to your website. Click <b  data-bs-toggle="modal" data-bs-target="#exampleModal">HERE</b> to find out how to locate and provide this information.</p>
      
                            <div class="crazy-crm-left-form-main">
                                <form id="analyzeServerForm">
                                    @csrf
                                    <label for="protocol">Protocol</label>
                                    <select name="protocol" id="protocol" required>
                                        <option value="ftp">FTP</option>
                                        <option value="sftp">SFTP</option>
                                    </select>
                                    <label for="host">Ftp Username</label>
                                    <input type="text" id="host" placeholder="Server IP Address" name="host">
                                    <label for="port">Port</label>
                                    <input type="text" id="port" placeholder="20/21" name="port" >
                                    <label for="username">User</label>
                                    <input type="text" placeholder="Username" id="username" name="username">
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="Password" id="password" name="password">
                                    <label for="directory">Path URL</label>
                                    <input type="text" id="directory" placeholder="Website location" name="directory">
                                    <label for="directory">Website URL</label>
                                    <input type="text" id="url" value="@if(!empty($siteurl)){{$siteurl}}@endif" @if(!empty($siteurl)) disabled @endif placeholder="Website URL" name="url">
                                    <div id="errortxt"></div>
                                    <div class="crazy-crm-button">
                                        <button type="submit">Continue</button>
                                    </div>
                                </form>
                            </div>
                            <div id="paypal-button-container"></div>
                        </div>
                       <div class="crazy-crm-right-image">
                        <img src="{{asset('admin/img/ftp.png')}}" alt="the">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    
    
    $(document).ready(function() {
    $('#analyzeServerForm').on('submit', function(e) {

        const pretight = document.getElementById("pretight");
        var webUrlInput = $("#webUrlInput").val();

        var elementdata = `<div class="set">
            <img src = "https://res.cloudinary.com/ecommerce-website/image/upload/v1725709329/aronswebsites-_bmrgzo.gif" alt="web"/>
        </div>`;

        e.preventDefault();

        let hasError = false;
        $('#result').html(''); 

        $('#analyzeServerForm input, #analyzeServerForm select').each(function() {
            if ($(this).val().trim() === '') {
                hasError = true;
                $(this).css('border', '1px solid red'); 
            } else {
                $(this).css('border', ''); 
            }
        });

        if (hasError) {
            $('#result').html('<p style="color:red;">Please fill in all required fields.</p>');
            return;
        }
        pretight.innerHTML = elementdata;
        $.ajax({
            url: "{{ route('analyze.ftp') }}",
            method: 'POST',
            data: {
                host: $('input[name="host"]').val(),
                username: $('input[name="username"]').val(),
                password: $('input[name="password"]').val(),
                directory: $('input[name="directory"]').val(),
                url: $('input[name="url"]').val(),
                protocol:  $('select[name="protocol"]').val(),
                _token: '{{ csrf_token() }}' 
            },
            success: function(response) {
                pretight.innerHTML = '';
                if(response.analysis_result == 1){pretight.innerHTML
                    if (confirm("Congratulations, your website is compatible with our platform") == true) {
                        window.location.href = "{{ route('front.signup') }}";
                    } else {
                        alert("Thank you.");
                    }
                } else {
                    alert("Sorry, your website does not meet the minimum requirements for our platform.");
                }
            },
            error: function(xhr) {
                pretight.innerHTML = '';
                console.log(xhr);
            
            // Extract the error message and show it in an alert
            let errorMessage = '';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage =  xhr.responseJSON.message;
            }
            alert(errorMessage);
            
            $('#errortxt').html('<p>' + errorMessage + '</p>');
            }
        });
    });
});
    
    </script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Instructions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <iframe src="{{url('/site.pdf')}}" width="100%" height="600px" style="border: none;"></iframe>
      </div>
    </div>
  </div>
</div>

<div id="pretight"></div>
