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

<style>
    .per_yr{
        font-size:30px;
        font-weight:bold;
    }
     .sdfh{
        margin-bottom:0rem !important;
        font-size:20px;
    }
    .firs{
        font-weight:bold;
        font-size:25px;
    }
    .firs1{
        margin-top:-20px;
        font-weight:500 !important;
    }
    .dollorHead{
        margin-bottom:0rem !important;
    }
</style>

<x-front-header-component />

@endif

<section class="hfhf" id="what_we_do">
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
                        <!--<p class="dollorHead">-->
                        <!--    <span class="span1">${{$subscription->price}}</span>-->
                        <!--    <span class="span2">/Yearly</span>-->
                        <!--    <span><s style="font-size: 30px; font-weight: 100;color: gray;">(${{$subscription->mrp}})</s></span>-->
                        <!--</p>-->
                        <!--<span class="only">(Only <span class="per_yr">${{$subscription->monthly_price}}</span>  per month)</span>-->
                         <p class="dollorHead">
                            <span class="span1">${{$subscription->monthly_price}}</span>
                            <span style="font-weight:600;" class="span2">Monthly</span>
                            
                        </p>
                        <p class="sdfh" style="font-weight:bold;">Introductory Price - ${{$subscription->price}} per year!</p>
                        <span class="only firs">50% OFF!</span>
                        <span class="firs1">(Regular price: ${{$subscription->mrp}} per year)</span>
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
                          <a style="max-width:261px; width:100%;" href="/register"><button class="chooseBtn2" type="button" data-id="{{$subscription->id}}" id="plan_{{$sid}}"><span>Choose Plan</span></button></a>
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
