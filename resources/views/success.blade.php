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

</div> 
<section id="Plan">
    <div>
    <div class=" planCont com1">
        <!-- <img src="./image/sideImg.png" class="planSideImg" alt=""> -->

        <div class="row row1 justify-content-md-center">
            <div class="col-lg-12 col-sm-10 hghgk  text-center">
                <h2 class="overflow-hidden same_hide text-center">Payment Successful</h2>
                <p class="same_some mt-3 text-center">{{ session('status') }}</p>
                <p class="same_some mt-3 text-center">{{ session('user_verification_data') }}</p>
                <p class="same_some mt-3 text-center">You can login and start editing your website</p>
            </div>
        </div>
        <div class="">
                
                <img class=" mts" src="http://localhost:8081/crazycms/public/admin/img/login2.png" alt="">
            </div>
</section>


@endsection