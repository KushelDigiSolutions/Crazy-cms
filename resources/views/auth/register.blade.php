<link rel="stylesheet" href="{{asset('admin/customcss/register.css')}}">
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
<section class="tff">
        <div id="sign-login-page1">
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
        </div>
    </section>
</x-guest-layout>
