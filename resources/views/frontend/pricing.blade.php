<!-- resources/views/home.blade.php -->
@extends('layouts.home')

@section('CarzyCMS', 'Preview Page')

@section('content')

@php
    use Illuminate\Support\Facades\DB;

    // Fetch setting data
    $setting = DB::table('settings')->first();
@endphp

@if ($setting && $setting->status === 0)
    <h1 style="background: yellow;">This is under Maintenance</h1>
@else


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

   <a class="ekaa" href="{{ url('/') }}"><img class="home-link" src="{{asset('admin/img/summer.svg')}}" alt=""></a>
      <!-- link back to homepage -->
      <a href="{{url('/features')}}" class="navSinItem">Features</a>
      <a  href="{{url('/pricing')}}" class="navSinItem">Pricing</a>
      <!-- <a href="#" class="navSinItem">Offers</a>
      <a href="#"> <button class="navSinBtn"><span>CONTACT</span></button></a> -->
      <a href="{{url('/login')}}"> <button class="navSinBtn"><span>SIGN IN</span></button></a>
    </div>
  </nav>
</div>
</section>
@endif

<section id="what_we_do">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-12 text-center">
      <h2>Pricing</h2>
      <!-- <img src="{{asset('admin/img/what.svg')}}" alt=""> -->

      <form id="customerRegistration">
@csrf
<section id="Plan">
    <div>
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
                            <span><s style="font-size: 30px; font-weight: 100;color: gray;">(${{$subscription->mrp}})</s></span>
                        </p>
                        <span class="only">(Only ${{$subscription->monthly_price}} per month)</span>
                        <div class="planPoint">

                        @php
                            // Decode JSON string to an associative array
                            $data = json_decode($subscription->items, true);
                            $items = $data ?? []; // Use empty array if 'items' key is not present
                        @endphp
                            @foreach($items as $item)
                                <div class="singlePoint">
                                    @if(isset($item["status"]) && $item["status"] == true)
                                    <img src="{{asset('admin/img/correct.png')}}" alt="" />
                                    @else
                                    <img src="{{asset('admin/img/cancel.png')}}" alt="" />
                                    @endif
                                    <p>{{$item["descriptions"] ?? 'Not Available' }}</p>
                                </div>
                            @endforeach
                           
                        </div>
                        @if($subscription->status)  
                           <button class="chooseBtn2" type="button" data-id="{{$subscription->id}}" onclick="window.location.href='{{ route('admin.addmysites') }}?isPlan=1'" id="plan_{{$sid}}"><span>Choose Plan</span></button>
                        @else
                            <p class="notavailable">NOT AVAILABLE NOW</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <input type="hidden" T name="plan" id="plan" value="0"/>
        
        </div>

       <!-- <button type="button" onclick="customerRegistrationBtn(event)" class="btn btn-primary brn-sm">Signup And Pay</button> -->
        </div>
</section>

    </div>
  </div>
  <!-- <div class="row row2 justify-content-md-center">
    <div class="col-lg-9 col-md-12 col-sm-12  -center">
      <p>
        “ Have you ever wished for a simple way to make quick
        <span> text or image </span> adjustments to your
        <span> website </span> without the need for a web developer or
        complex software? Until recently, making minor updates to your
        website could be a real challenge. Most people would have to rely
        on developers or learn HTML just to make small changes. But times
        have changed.
      </p>
      <p>
        As a web developer, I've encountered countless clients who asked,
        <span>"Can I make changes to my website on my own?"</span> My
        answer was always <span> "Yes."</span> However, the reality was
        that without the right software and some
        <span> HTML </span> knowledge, the majority of website owners
        found it nearly impossible to edit their sites independently.
        That's why I decided to come up with a solution.
      </p>
      <p>
        I've developed a <span> user-friendly tool </span> that allows you
        to effortlessly <span> edit your website.</span> With just a few
        clicks, you can modify text and images and publish your changes.
        No need to install any software or learn HTML. It's as simple as
        using a standard text editor.
      </p>
      <p>
        You can put it to the test right now. Just enter your website
        address, and within moments, our system will
        <span> analyze your site,</span> providing you with an editable
        view using the "What You See Is What You Get" (WYSIWYG) approach.
        All you need to do is point to the text or image you want to edit,
        click when the area is highlighted, make your
        <span> changes,</span> and <span>save.</span>
      </p>
      <p>
        Empower yourself to take control of your website's content
        <span> without the hassle </span> of technical complexities. Try
        our user-friendly solution and experience the ease of making
        updates at your <span> fingertips. </span>
      </p>
    </div>
  </div> -->
</div>
</section>
@endsection
