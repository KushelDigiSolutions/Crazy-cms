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
                        <label for="email">UserName</label>
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
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="{{ route('facebook.login') }}" class="btn btn-block btn-primary">
                        <!-- <i class="fab fa-facebook mr-2"></i>  -->
                        Sign in using Facebook
                    </a>
                    <a href="{{ route('google.login') }}" class="btn btn-block btn-danger">
                        <!-- <i class="fab fa-google-plus mr-2"></i>  -->
                        Sign in using Google+
                    </a>
                    <a href="{{ route('github.login') }}" class="btn btn-block btn-dark">
                        <!-- <i class="fab fa-github mr-2"></i>  -->
                        Sign in using Github
                    </a>
                </div>
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register a new Account</a>
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