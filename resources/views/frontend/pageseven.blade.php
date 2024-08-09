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
                       
                       <div class="crazy-crm-right-image">
                        <img src="{{asset('admin/img/ftp.png')}}" alt="the">
                       </div>
                       <div class="crazy-crm-left-form">
                            <h1>Sign Up</h1>
                            <div class="crazy-crm-left-form-main">
                                <form>
                                    <div class="d-flex">
                                    <div class="dright">
                                    <label for="name">First Name</label>
                                    <input class="prot" type="name" id="name" name="user_protocol">
                                    </div>
                                    <div class="dright">
                                    <label for="name">Last Name</label>
                                    <input class="prot" type="name" id="name" name="user_host">
                                    </div>
                                    </div>
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email">
                                    <label for="mobile">Mobile No </label>
                                    <input type="number" id="mobile" name="mobile">
                                    <label for="password">Password </label>
                                    <input type="password" id="password" name="user_password" >
                                    <label for="URL">Confirm Password</label>
                                    <input type="password" id="url" name="url_path">
                                </form> 
                            </div>
                            <div class="crazy-crm-button">
                                <button type="submit">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>