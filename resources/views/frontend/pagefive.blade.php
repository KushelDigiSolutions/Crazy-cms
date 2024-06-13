<!-- resources/views/home.blade.php -->
<link rel="stylesheet" href="{{asset('admin/customcss/page5.css')}}">
@extends('layouts.home')

@section('CarzyCMS', 'Preview Page')

@section('content')

<section id="navbar">

    <div class="navCont">


        <nav class="navSome">

            <img class="navbarImg" src="{{asset('admin/img/summer.svg')}}" alt="">


            <input type="checkbox" id="sidebar-active" />



            <label for="sidebar-active" class="open-sidebar-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg>
            </label>

            <label id="overlay" for="sidebar-active"></label>

            <div class="links-container">

                <label for="sidebar-active" class="close-sidebar-button">
                    <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 -960 960 960" width="32">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg>
                </label>

              <a class="ekaa" href="/"><img class="home-link" src="{{asset('admin/img/summer.svg')}}" alt=""></a> 
                <!-- link back to homepage -->
                <a href="#" class="navSinItem">Features</a>
                <a id="srt" href="{{url('/page3')}}" class="navSinItem">Pricing</a>
                <!-- <a href="#" class="navSinItem">Offers</a>
      <a href="#"> <button class="navSinBtn"><span>CONTACT</span></button></a> -->
                <a href="{{url('/login')}}"> <button class="navSinBtn"><span>SIGN IN</span></button></a>

            </div>

        </nav>

    </div>


</section>

<section id="Plan">
    <div>
    <div class=" planCont com1">
        <!-- <img src="./image/sideImg.png" class="planSideImg" alt=""> -->

        <div class="row row1 justify-content-md-center">
            <div class="col-lg-12 col-sm-10 hghgk  text-center">
                <h2 class="overflow-hidden same_hide text-center">Congratulations</h2>
                <p class="same_some mt-3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis deserunt officia, labore reiciendis est eius, dolorem sed placeat delectus nihil iure facilis commodi perspiciatis natus expedita velit, magni soluta unde.</p>
            </div>
        </div>
        

        <!-- <div class="plainChoice">
    <span class="monthy">Monthly</span>

    <input type="checkbox" class="plaininput" id="check" />
    <label for="check" class="plainBtn"></label>

    <span class="yearly">Yearly</span>
  </div> -->

      

        <div id="login-page1" class="ekl">
<div class="login-page-banner ssk">
    <div class="login-page-container ssk2">
        <div class="login-page-content ssk1">
            <div class="login-page-left-content ssk3">
                <h1 class="text-center overflow-hidden">
                    Welcome to <br><span>Crazy Simple</span>
                </h1>
                <img class=" mts"  src="{{asset('admin/img/login2.png')}}" alt="">
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
                <!-- <label for="name">Name</label> -->
                <input placeholder="Name" id="name" class="form-control" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name">
                <!-- <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div> -->
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="input-group mb-3 input_gp11 mt-4">
                <!-- <label for="email">Email</label> -->
                <input id="email" placeholder="Email" class="form-control" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username">
                <!-- <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div> -->
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="input-group mb-3 input_gp11 mt-4">
                <!-- <label for="password">Password</label> -->
                <input id="password" placeholder="Password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
                <!-- <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div> -->
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="input-group mb-3 input_gp11 mt-4">
                <!-- <label for="confirmPassword">Confirm Password</label> -->
                <input placeholder="Confirm Password" id="confirmPassword" class="form-control" type="password" name="confirmPassword" required
                    autocomplete="current-password">
                <!-- <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div> -->
                <x-input-error :messages="$errors->get('confirmPassword')" class="mt-2" />
            </div>
            <div class=" d-flex align-items-center justify-content-between">
                <div class="">
                    <div class="icheck-primary ichk_pm">
                        <input type="checkbox" name="remember" id="remember">
                        <label class="jjj" for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="social-auth-links text-center mb-3 simik">
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
            <a class="text-decoration-none" href="{{ route('login') }}" class="text-center">Login</a>
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
    </div>

    <div class="mt-4">
    <h2 class="text-center overflow-hidden">Choose Your Plan</h2>
    <div class="row2 mt-2">

       
            <!-- ffirst  -->
            <div class="inner_section">
                <div class="inner_section_container">
                    <div class="planImgWrap">
                        <img src="{{asset('admin/img/plan1.png')}}" alt="" />
                        <p>STANDARD</p>
                    </div>

                    <div class="planWhitewrap">
                        <p class="dollorHead">
                            <span class="span1">$60</span>
                            <span class="span2">/Yearly</span>
                            <img class="suy" src="{{asset('admin/img/chose.svg')}}" alt="">
                        </p>

                        <span class="only">(Only $5 per month)</span>

                        <!-- scond part  -->
                        <div class="planPoint">
                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>“Click To Edit” WebSite Text Editor</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/cancel.png')}}" alt="" />
                                <p>Edit WebSite Images – “Media Library”</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/cancel.png')}}" alt="" />
                                <p>S.E.O. meta tags & Image alt tags”</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/cancel.png')}}" alt="" />
                                <p>Meta Tags</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/cancel.png')}}" alt="" />
                                <p>Advanced Website Editing Tools</p>
                            </div>
                        </div>

                        <button class="chooseBtn2"><span>Choose Plan</span></button>
                    </div>
                </div>
            </div>

            <!-- second  -->
            <div class="inner_section">
                <div class="inner_section_container">
                    <div class="planImgWrap anotherplan">
                        <img src="{{asset('admin/img/blueColor.png')}}" alt="" />
                        <p>PROFESSIONAL</p>
                    </div>

                    <div class="planWhitewrap">
                        <p class="dollorHead">
                            <span class="span1">$96</span>
                            <span class="span2">/Yearly</span>
                            <img class="suy" src="{{asset('admin/img/chose1.svg')}}" alt="">
                        </p>

                        <span class="only">(Only $5 per month)</span>

                        <!-- scond part  -->
                        <div class="planPoint">
                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>“Click To Edit” WebSite Text Editor</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>Edit WebSite Images – “Media Library”</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>S.E.O. meta tags & Image alt tags”</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>Meta Tags</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/cancel.png')}}" alt="" />
                                <p>Advanced Website Editing Tools</p>
                            </div>
                        </div>

                        <button class="chooseBtn2"><span>Choose Plan</span></button>
                    </div>
                </div>
            </div>

            <!-- third  -->
            <div class="inner_section">
                <div class="inner_section_container">
                    <div class="planImgWrap">
                        <img src="{{asset('admin/img/orangeColor.png')}}" alt="" />
                        <p>PREMIUM</p>
                    </div>

                    <div class="planWhitewrap">
                        <p class="dollorHead">
                            <span class="span1">$192</span>
                            <span class="span2">/Yearly</span>
                            <img class="suy" src="{{asset('admin/img/chose2.svg')}}" alt="">
                        </p>

                        <span class="only">(Only $5 per month)</span>

                        <!-- scond part  -->
                        <div class="planPoint">
                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>“Click To Edit” WebSite Text Editor</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>Edit WebSite Images – “Media Library”</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>S.E.O. meta tags & Image alt tags”</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>Meta Tags</p>
                            </div>

                            <div class="singlePoint">
                                <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                <p>Advanced Website Editing Tools</p>
                            </div>
                        </div>

                        <p class="notavailable">NOT AVAILABLE NOW</p>
                    </div>
                </div>
            </div>
            
        </div>

       <a class="text-decoration-none" href="/register"><button class="btn btn-primary brn-sm">Signup to pay</button></a>
        </div>
</section>



</div> 




<script>
    let st = document.querySelector("#srt");
    st.classList.add("song");
</script>
@endsection