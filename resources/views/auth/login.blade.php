<link rel="stylesheet" href="{{asset('admin/customcss/login.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Wix+Madefor+Display:wght@400..800&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
<x-guest-layout>
    @section('title')
        {{ 'Log in' }}
    @endsection
    <div id="login-page1">
        <div class="login-page-banner">
            <div class="login-page-container">
                <div class="login-page-content">
                    <div class="login-page-left-content">
                        <h1>
                            Welcome to <br><span>Crazy Simple</span>
                        </h1>
                        <img src="{{asset('admin/img/login2.png')}}" alt="">
                    </div>
                    <div class="login-page-right-form">
                        <div class="login-right-form">
                            <img src="{{asset('admin/img/login1.png')}}" alt="">
                            <h2>Login</h2>
                            <div class="login-right-form-main">
                                <form>
                                    <label for="name">Username:</label>
                                    <input type="text" id="name" name="user_name">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="user_password">
                                    <p>Forgot Password?</p>
                                </form>
                            </div>
                            <div class="login-button">
                                <button type="submit">Log In</button>

                                <p>New to Crazysimple <a href="/login"> <span>Sign UP</span></a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
