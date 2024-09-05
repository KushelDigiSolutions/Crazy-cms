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
    <div class="col-lg-9 text-center">
      <h2>Privacy Policy</h2>
      <!-- <img src="{{asset('admin/img/what.svg')}}" alt=""> -->
    </div>
  </div>
  <div class="row row2 justify-content-md-center">
    <div class="col-lg-9 col-md-12 col-sm-12  -center">
      <p>Last updated: September 03, 2024</p>
      <p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>
      <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy. This Privacy Policy has been created with the help of the Free Privacy Policy Generator.</p>
      <h3>Interpretation and Definitions</h3>
      <h4>Interpretation</h4>
      <p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
      <h4>Definitions</h4>
      <p>For the purposes of this Privacy Policy:</p>
      <ul>
          <li><strong>Account</strong> means a unique account created for You to access our Service or parts of our Service.</li>
          <li><strong>Affiliate</strong> means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority.</li>
      </ul>
    </div>
  </div>
</div>
</section>

@endsection
