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
                            <h1>Please Fill Some Details</h1>
                            <div class="crazy-crm-left-form-main">
                                <form id="analyzeServerForm">
                                      @csrf
                                    <label for="name">Protocol</label>
                                    <select name="protocol" id="protocol">
                                        <option value="ftp">Ftp</option>
                                        <option value="sftp">Sftp</option>
                                    </select>
                                    <label for="name">Host</label>
                                    <input type="text" id="name" placeholder="Server IP Address" name="host">
                                    <label for="name">Port</label>
                                    <input type="text" id="text" placeholder="20/21" name="port">
                                    <label for="name">User</label>
                                    <input type="text" placeholder="username" id="name" name="username">
                                    <label for="password">Password</label>
                                    <input type="password" placeholder="password" id="password" name="password" >
                                    <label for="URL">Path URL</label>
                                    <input type="text" id="url"  placeholder="website location" name="directory">
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
        e.preventDefault();

        // Client-side validation
        let hasError = false;
        $('#result').html(''); // Clear previous results or errors

        // Iterate through each input field to check if it's empty
        $('#analyzeServerForm input[required]').each(function() {
            if ($(this).val() === '') {
                hasError = true;
                $(this).css('border', '1px solid red'); // Highlight the field
            } else {
                $(this).css('border', ''); // Reset the field border
            }
        });

        if (hasError) {
            $('#result').html('<p style="color:red;">Please fill in all required fields.</p>');
            return;
        }

        // If no error, proceed with AJAX request
        $.ajax({
            url: "{{ route('analyze.ftp') }}",
            method: 'POST',
            data: {
                host: $('input[name="host"]').val(),
                username: $('input[name="username"]').val(),
                password: $('input[name="password"]').val(),
                directory: $('input[name="directory"]').val(),
                protocol:  $('select[name="protocol"]').val(),
                postUrl: $('input[name="postUrl"]').val(),
                _token: '{{ csrf_token() }}' // for Laravel CSRF protection
            },
            success: function(response) {
               if(response.analysis_result == 1){
                
                if (confirm("Congratulation your website is compitable with our platform") == true) {
                    window.location.href = "{{ route('front.signup') }}";
                } else {
                    alert("thankyou");
                }
               }else{
                alert("Sorry your website does not meet the minimum requirement to of our platform");
               }
            },
            error: function(xhr) {
                $('#result').html('<p>An error occurred: ' + xhr.status + ' ' + xhr.statusText + '</p>');
            }
        });
    });
});

    </script>
   <!--  <script>

//Ab9fUDw9DAjpGg1CbtS66FdSWnzg17U2eWO5l5nJVhNAMyNhBokZnd5KLdsV_ymQqSm86if24bXEKGV1

//key : EBJxtM9acxnh05C5Gl0svVzbupTpD9CGCNqoNK9u4WIIz4KcDHUtHxIjy0_AGFEuUje8ShY7nehqGbmb
        paypal.Buttons({ 
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00' // Amount to be charged
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    // Optionally, you can send details to your server for processing
                });
            },
            onError: function(err) {
                console.error(err);
             //   alert('An error occurred during the transaction.');
            }
        }).render('#paypal-button-container'); // Display the PayPal button
    </script> -->