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
    {{'Register'}}
@endsection

        <!-- <div id="sign-login-page1">
            <div class="sign-up-banner">
                <div class="sign-up-container">
                    <div class="sign-up-content">
                       <div class="sign-up-left-image">
                        <h1>
                            Welcome to <br><span>Crazy Simple</span>
                        </h1>
                        <img src="{{asset('admin/img/login2.png')}}" alt="">
                       </div>
                       <div class="sign-up-right-form">
                       <img src="{{asset('admin/img/login1.png')}}" alt="">
                        <h2>Sign Up</h2>
                        <form>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="user_name">
                          
                            <label for="email">Email:</label>
                            <input type="email" id="mail" name="user_email">
                         
                            <label for="password">Password:</label>
                            <input type="password" id="password"       name="user_password">
                            <label for="password"> Confirm Password:</label>
                            <input type="password" id="password"       name="user_password">
                            <p style="
                            font-size: 18px;
                            text-align: end;
                            color: #5E6278;
                            cursor: pointer;
                        ">Forgot Password?</p>
                        </form> 
                        <div class="sign-up-button">
                            <button type="submit">Sign Up</button>
                        </div>
                        <p style="padding-top: 15px; font-size: 18px;">Already have account <a href="/register"><span style="font-weight: 600; cursor: pointer;">Log In</span></a> </p>
                       </div>
                    </div>
                </div>
            </div>
        </div> -->

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
                        <div class="login-right-form register-right-form">
                            <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header card_header11 text-center">
                <!-- <a href="/" class="h1"><b>{{ config('app.name') }}</a> -->
                <img src="{{asset('admin/img/login1.png')}}" alt="">
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3 input_gp11">
                        <label for="email">Name</label>
                        <input id="name" class="form-control" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name">
                        <!-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div> -->
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="input-group mb-3 input_gp11">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username">
                        <!-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div> -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="input-group mb-3 input_gp11">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password">
                        <!-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div> -->
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="input-group mb-3 input_gp11">
                        <label for="confirmPassword">Confirm Password</label>
                        <input id="confirmPassword" class="form-control" type="password" name="confirmPassword" required
                            autocomplete="current-password">
                        <!-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div> -->
                        <x-input-error :messages="$errors->get('confirmPassword')" class="mt-2" />
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary ichk_pm">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="{{ route('facebook.login') }}" class="btn btn-block btn-primary">
                       
                        Sign in using Facebook
                    </a>
                    <a href="{{ route('google.login') }}" class="btn btn-block btn-danger">
                       
                        Sign in using Google+
                    </a>
                    <a href="{{ route('github.login') }}" class="btn btn-block btn-dark">
                       
                        Sign in using Github
                    </a>
                </div>
                <!-- <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p> -->
                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center">Login</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        
        
    
</x-guest-layout>
