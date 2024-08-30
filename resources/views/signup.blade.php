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
<form id="customerRegistration">
@csrf
<section id="Plan">
    <div>
    <div class=" planCont com1">
        <!-- <img src="./image/sideImg.png" class="planSideImg" alt=""> -->

        <div class="row row1 justify-content-md-center">
            <div class="col-lg-12 col-sm-10 hghgk  text-center">
                <h2 class="overflow-hidden same_hide text-center">Congratulations</h2>
                <p class="same_some mt-3 text-center">Congratulation your site on the server {{session('validFtpSite')}} is compitable with our platform kindly sign up and enjoy the crazyCMS</p>
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
               
                <x-input-error :messages="$errors->get('confirmPassword')" class="mt-2" />
            </div>
          
       
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

       @foreach($subscriptions as $sid=>$subscription)
            <!-- ffirst  -->
            <div class="inner_section">
                <div class="inner_section_container">
                    <div class="planImgWrap">
                        @if($sid == 0)    
                            <img src="{{asset('admin/img/plan1.png')}}" alt="" />
                        @elseif($sid == 1)
                            <img src="{{asset('admin/img/blueColor.png')}}" alt="" />
                        @elseif($sid == 2)
                            <img src="{{asset('admin/img/orangeColor.png')}}" alt="" />
                        @endif
                        <p>{{$subscription->name}}</p>
                    </div>

                    <div class="planWhitewrap">
                        <p class="dollorHead">
                            <span class="span1">${{$subscription->price}}</span>
                            <span class="span2">/Yearly</span>
                            <span><s style="
    font-size: 30px;
    font-weight: 100;
    color: gray;
">(${{$subscription->mrp}})</s></span>
                        </p>

                        <span class="only">(Only {{$subscription->monthly_price}} per month)</span>

                        <!-- scond part  -->
                        <div class="planPoint">

                        @php
                            // Decode JSON string to an associative array
                            $data = json_decode($subscription->items, true);
                            $items = $data ?? []; // Use empty array if 'items' key is not present
                        @endphp
                            @foreach($items as $item)
                                <div class="singlePoint">
                                    @if($item["status"] == true)
                                    <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                    @else
                                    <img src="{{asset('admin/img/cancel.png')}}" alt="" />
                                    @endif
                                    <p>{{$item["descriptions"]}}</p>
                                </div>
                            @endforeach
                           
                        </div>
                        @if($subscription->status)  
                            <button class="chooseBtn2" type="button" data-id="{{$subscription->id}}" onclick="setPlan({{$sid}})" id="plan_{{$sid}}"><span>Choose Plan</span></button>
                        @else
                            <p class="notavailable">NOT AVAILABLE NOW</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <input type="hidden" T name="plan" id="plan" value="0"/>
        
        </div>

       <button type="button" onclick="customerRegistrationBtn()" class="btn btn-primary brn-sm">Signup And Pay</button>
        </div>
</section>
</form>


</div> 




<script>
    function setPlan(val){
        $('.chooseBtn2active').removeClass('chooseBtn2active');
        $('.chooseBtn2 span').html('Choose Plan');
        $('#plan_'+val).addClass('chooseBtn2active');
        $('#plan_'+val+" span").html('Choosed');
        $("#plan").val($('#plan_'+val).attr('data-id'));
    }
    let st = document.querySelector("#srt");
    st.classList.add("song");
</script>
<script>
        function customerRegistrationBtn(){
            event.preventDefault(); // Prevent default form submission

            let formData = $(this).serialize(); // Serialize form data
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('customerRegister') }}', // URL for the route
                type: 'POST',
                data: {
                    name: $('input[name="name"]').val(),
                    email: $('input[name="email"]').val(),
                    password: $('input[name="password"]').val(),
                    plan: $('input[name="plan"]').val(),
                },
                success: function(response) {
                    if (response.success) {
                        if (response.exists) {
                            alert('User already exists. Please log in.');
                        } else {
                            // Open PayPal payment gateway with the plan price
                            window.location.href = "{{url('/pay')}}";
                        }
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
                }
            });
        }

      
</script>

@endsection