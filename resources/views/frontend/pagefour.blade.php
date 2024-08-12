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
                                <form class="needs-validation" novalidate method="POST" action="{{ route('store') }}">
                                      @csrf
                                    <label for="name">Protocol</label>
                                    <input type="text" id="protocol" name="user_protocol">
                                    <label for="name">Host</label>
                                    <input type="text" id="name" name="user_host">
                                    <label for="name">Port</label>
                                    <input type="text" id="text" name="user_port">
                                    <label for="name">User</label>
                                    <input type="text" id="name" name="user_name">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="user_password" >
                                    <label for="URL">Path URL</label>
                                    <input type="url" id="url" name="url_path" placeholder="enter URL here">
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
    </script>