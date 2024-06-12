<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('admin/customcss/ftp.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <section>
        <div id="crazy-crm-page1">
            <div class="crazy-crm-banner">
                <div class="crazy-crm-container">
                    <div class="crazy-crm-content">
                        <div class="crazy-crm-left-form">
                            <h1>Please Fill Some Details</h1>
                            <div class="crazy-crm-left-form-main">
                                <form>
                                    <label for="name">Protocol</label>
                                    <input type="name" id="name" name="user_protocol">
                                    <label for="name">Host</label>
                                    <input type="name" id="name" name="user_host">
                                    <label for="name">Port</label>
                                    <input type="name" id="name" name="user_port">
                                    <label for="name">User</label>
                                    <input type="text" id="name" name="user_name">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="user_password" >
                                    <label for="URL">Path URL</label>
                                    <input type="url" id="url" name="url_path" placeholder="enter URL here">
                                </form> 
                            </div>
                            <div class="crazy-crm-button">
                                <button type="submit">Continue</button>
                            </div>
                        </div>
                       <div class="crazy-crm-right-image">
                        <img src="{{asset('admin/img/ftp.png')}}" alt="the">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>