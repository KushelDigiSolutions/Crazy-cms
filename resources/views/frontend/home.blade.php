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
        font-weight:bold;
        font-size:30px;
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
    .if{
        width:528px;
        height:300px;
        border-radius:20px;
    }
    @media only screen and (max-width:500px){
      .if{
        width:100%;
        height:270px;
        border-radius:10px;
    }
     @media only screen and (max-width:450px){
      .if{
        width:100%;
        height:233px;
        border-radius:10px;
    }
     @media only screen and (max-width:380px){
      .if{
        width:100%;
        height:175px;
        border-radius:10px;
    }
    }
</style>

<script>(function(){var pp=document.createElement('script'), ppr=document.getElementsByTagName('script')[0]; stid='TzY3QVA1UEhrNEEwV2dtek80a05xQT09';pp.type='text/javascript'; pp.async=true; pp.src=('https:' == document.location.protocol ? 'https://' : 'http://') + 's01.live2support.com/dashboardv2/chatwindow/'; ppr.parentNode.insertBefore(pp, ppr);})();</script>

    <section id="navbar">

<div class="navCont">


  <nav class="navSome">

    <img class="navbarImg" src="{{asset('admin/img/summer.svg')}}" alt="MyCrazySimpleCMS logo - Simple website editor for non-tech users">


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

   <a class="ekaa" href="{{url('/')}}"><img class="home-link" src="{{asset('admin/img/summer.svg')}}" alt="MyCrazySimpleCMS logo - Simple website editor for non-tech users"></a>
   <a style="overflow:hidden;" class="ekaa" href="{{url('/')}}"><img width="120" height="80" class="home-link" src="{{asset('https://res.cloudinary.com/dgif730br/image/upload/v1733840038/patent-pending-round-ribbon-isolated-label-vector-33102446_apcpp7.png')}}" alt=""></a>
      <!-- link back to homepage -->
      <a href="{{url('/knowledge-base')}}" class="navSinItem">Knowledge Base</a>
      <a href="{{url('/features')}}" class="navSinItem">Features</a>
      <a  href="{{url('/pricing')}}" class="navSinItem">Pricing</a>
      <!-- <a href="#" class="navSinItem">Offers</a>
      <a href="#"> <button class="navSinBtn"><span>CONTACT</span></button></a> -->
      <!--<a href="{{url('/login')}}"> <button class="navSinBtn"><span>SIGN IN</span></button></a>-->
      
      @if (Auth::check())
    <div class="navUserDropdown">
        <a href="{{ url('admin/dashboard') }}" class="navSinItem">Hello {{ Auth::user()->name }} </a>
          
                   
    </div>
@else
    <a href="{{ url('/login') }}">
        <button class="navSinBtn"><span>SIGN IN</span></button>
    </a>
@endif

    </div>

  </nav>

</div>


</section>
@endif
<section id="banner_first">
<div class=" com1">
  <div class="row">
    <div class="col-lg-6 col-md-9 banner_left">
      <h1>Easily Edit Your Website<br/>No Coding Required!</h1>
      <p>Make changes to your website content quickly and effortlessly, whether you're updating text, images, or SEO tags. Perfect for small businesses and website owners who need an easy way to stay in control!</p>
      <!--<button type="button" class="btn btn-light">
        <span> GET STARTED</span>
      </button>-->
    </div>

    <!-- this is right slider banner  -->
    <div class="col-lg-6 banner_right">
      <div class="slider">
        <div class="slides">
          <!-- radio button  -->
          <!-- <input type="radio" name="radio-btn" id="radio1" /> -->
          <!-- <input type="radio" name="radio-btn" id="radio2" />
          <input type="radio" name="radio-btn" id="radio3" />
          <input type="radio" name="radio-btn" id="radio4" /> -->

          <!-- radio btn end -->

          <!-- slide iamge start  -->
          <div class="slide first">
            <!--<img src="{{asset('admin/img/Group.png')}}" alt="banner1" />-->
             <iframe class="if" src="{{asset('admin/img/crafty.mp4')}}" frameborder="0"></iframe>
          </div>
          <!-- <div class="slide">
            <img src="{{asset('admin/img/Group.png')}}" alt="banner1" />
          </div>
          <div class="slide">
            <img src="{{asset('admin/img/Group.png')}}" alt="banner1" />
          </div>
          <div class="slide">
            <img src="{{asset('admin/img/Group.png')}}" alt="banner1" />
          </div> -->

          <!-- slide img end  -->

      </div>
    </div>
  </div>
</div>
</section>

<section id="email_section">
<div class=" com1 webAdWrap">
  <div class="row">
    <p>Enter Your Website URL to Start Editing Now <span>FREE</span>!</p>

  </div>

  <div class="websiteAdd">

    <div class="webInput">
      <img src="{{asset('admin/img/chain.svg')}}" alt="Type in your website address here to use the simple editor." />
      <input class="web_uri" type="ttextext" id="webUrlInput" placeholder="Enter your website Address" />
    </div>

    <div onclick="submitForm()" class="startBtn">Edit Website</div>

  </div>

</div>

</section>

<section id="what_we_do">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <h2>Simple Website Editor Without Coding</h2>
      <!--<img src="{{asset('admin/img/what.svg')}}" alt="Type in your webiste address here.">-->
    </div>
  </div>
  <div class="row row2 justify-content-md-center">
    <div class="col-lg-9 col-md-12 col-sm-12  -center">
      <p>Do you wish that you could make <span>simple text and image</span> changes to your website without a web developer or complex software? </p>
      <p><span>My Crazy Simple CMS does just that!</span></p>
      <p>There are many reasons why you need to edit your website such as;<br/>
      <span> <span class="i">.</span> changing your business hours,<br/>
      <span class="i">.</span> post holiday specials or greetings,<br/>
      <span class="i">.</span> add new updated images,<br/>
      <span class="i">.</span> improve search engine optimization (SEO),<br/>
      <span class="i">.</span> and many more.</span></p>
      <p>MyCrazySimpleCMS.com is an on-line website editor that allows you do all of these things and more.  Just provide your website address and start editing.</p>
      <p>If you like what you see and want to save your changes, simply create an account and provide a few details so your changes can be published.  There are simple instructions provided on how to do that.</p>
    </div>
  </div>
</div>
</section>

<section id="About_us">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <!-- <h2 class="overflow-hidden">About US</h2> -->
      <img src="{{asset('admin/img/sak.svg')}}" alt="Website Editor for non-tech users." />
      
    </div>
  </div>

  <div class="row2 mt-5">
    <div class="inner_section">
      <div class="inner_section_container">
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="32" cy="32" r="32" fill="#0F3D5F" />
          <g clip-path="url(#clip0_1_253)">
            <path
              d="M35.4702 22.0854C37.6081 24.2254 39.7354 26.3569 41.9323 28.5581C41.5363 28.9312 41.0961 29.3234 40.679 29.7409C35.7166 34.704 30.75 39.6607 25.8107 44.6449C25.2715 45.1889 24.6269 45.2901 23.9719 45.4545C21.9625 45.9627 19.951 46.4623 17.9373 46.9536C17.217 47.1286 16.8652 46.7638 17.0443 46.0301C17.6172 43.6814 18.1964 41.3348 18.7883 38.9903C18.8388 38.79 18.9694 38.5876 19.1169 38.44C24.5132 33.0278 29.9159 27.6198 35.3185 22.214C35.3733 22.1592 35.4365 22.1128 35.4702 22.0833V22.0854Z"
              fill="white" />
            <path
              d="M43.8322 26.5783C41.6816 24.4257 39.5648 22.3047 37.4248 20.1604C37.4459 20.1309 37.488 20.0508 37.5491 19.9897C38.2315 19.3023 38.9055 18.6087 39.6027 17.9361C40.8707 16.7133 42.8485 16.6816 44.1397 17.8792C44.8263 18.5159 45.4919 19.1801 46.1238 19.8695C47.3118 21.164 47.2907 23.0468 46.0817 24.3203C45.3529 25.0898 44.5862 25.8235 43.8322 26.5783Z"
              fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_1_253">
              <rect width="30" height="30" fill="white" transform="translate(17 17)" />
            </clipPath>
          </defs>
        </svg>
        <p class="para1">On-line Website Editor</p>
        <p class="para2">What You See Is What You Get (WYSIWYG) editor shows you exactly how your website will appear as you make changes in real-time. The online editor’s "Click to Edit" feature lets you effortlessly modify text or images—no installations, downloads, or complicated tools required.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="32" cy="32" r="32" fill="#0F3D5F" />
          <g clip-path="url(#clip0_1_253)">
            <path
              d="M35.4702 22.0854C37.6081 24.2254 39.7354 26.3569 41.9323 28.5581C41.5363 28.9312 41.0961 29.3234 40.679 29.7409C35.7166 34.704 30.75 39.6607 25.8107 44.6449C25.2715 45.1889 24.6269 45.2901 23.9719 45.4545C21.9625 45.9627 19.951 46.4623 17.9373 46.9536C17.217 47.1286 16.8652 46.7638 17.0443 46.0301C17.6172 43.6814 18.1964 41.3348 18.7883 38.9903C18.8388 38.79 18.9694 38.5876 19.1169 38.44C24.5132 33.0278 29.9159 27.6198 35.3185 22.214C35.3733 22.1592 35.4365 22.1128 35.4702 22.0833V22.0854Z"
              fill="white" />
            <path
              d="M43.8322 26.5783C41.6816 24.4257 39.5648 22.3047 37.4248 20.1604C37.4459 20.1309 37.488 20.0508 37.5491 19.9897C38.2315 19.3023 38.9055 18.6087 39.6027 17.9361C40.8707 16.7133 42.8485 16.6816 44.1397 17.8792C44.8263 18.5159 45.4919 19.1801 46.1238 19.8695C47.3118 21.164 47.2907 23.0468 46.0817 24.3203C45.3529 25.0898 44.5862 25.8235 43.8322 26.5783Z"
              fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_1_253">
              <rect width="30" height="30" fill="white" transform="translate(17 17)" />
            </clipPath>
          </defs>
        </svg>
        <p class="para1">Nothing to Install</p>
        <p class="para2">Simply enter your website address and click “Edit Website” to see a live view of your site. As you hover over text or images, just click to edit them. Your changes appear instantly in real-time—no software installation or setup required.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="32" cy="32" r="32" fill="#0F3D5F" />
          <g clip-path="url(#clip0_1_253)">
            <path
              d="M35.4702 22.0854C37.6081 24.2254 39.7354 26.3569 41.9323 28.5581C41.5363 28.9312 41.0961 29.3234 40.679 29.7409C35.7166 34.704 30.75 39.6607 25.8107 44.6449C25.2715 45.1889 24.6269 45.2901 23.9719 45.4545C21.9625 45.9627 19.951 46.4623 17.9373 46.9536C17.217 47.1286 16.8652 46.7638 17.0443 46.0301C17.6172 43.6814 18.1964 41.3348 18.7883 38.9903C18.8388 38.79 18.9694 38.5876 19.1169 38.44C24.5132 33.0278 29.9159 27.6198 35.3185 22.214C35.3733 22.1592 35.4365 22.1128 35.4702 22.0833V22.0854Z"
              fill="white" />
            <path
              d="M43.8322 26.5783C41.6816 24.4257 39.5648 22.3047 37.4248 20.1604C37.4459 20.1309 37.488 20.0508 37.5491 19.9897C38.2315 19.3023 38.9055 18.6087 39.6027 17.9361C40.8707 16.7133 42.8485 16.6816 44.1397 17.8792C44.8263 18.5159 45.4919 19.1801 46.1238 19.8695C47.3118 21.164 47.2907 23.0468 46.0817 24.3203C45.3529 25.0898 44.5862 25.8235 43.8322 26.5783Z"
              fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_1_253">
              <rect width="30" height="30" fill="white" transform="translate(17 17)" />
            </clipPath>
          </defs>
        </svg>
        <p class="para1">Boost Your SEO</p>
        <p class="para2">Regularly updating your website with fresh content signals to search engines that your site is active and relevant. This improves your rankings, attracts more visitors, and keeps your audience engaged. Fresh content also helps you target new keywords, boosting your visibility in search results.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
      <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="32" cy="32" r="32" fill="#0F3D5F"/>
<g clip-path="url(#clip0_192_514)">
<path d="M43.9919 37.5503C42.3373 36.0347 40.727 34.5591 39.122 33.087C40.642 30.3079 40.8243 27.5618 39.2954 24.8157C37.3807 21.3761 33.3566 19.7893 29.5431 20.9294C25.8376 22.0366 23.3708 25.6361 23.6928 29.4632C23.9653 32.6908 26.3437 35.6298 29.5042 36.5336C30.2067 36.7352 30.4102 37.0324 30.3908 37.7311C30.3377 39.5803 30.3731 41.4313 30.3731 43.2737C25.9172 43.8055 19.5077 38.7374 17.7381 33.3477C15.5067 26.552 18.4725 19.2192 24.8395 15.7953C31.1198 12.4165 38.9733 13.9182 43.5672 19.353C48.1735 24.8018 47.9753 32.5274 43.9919 37.552V37.5503Z" fill="white"/>
<path d="M33.7192 32.6127C36.5223 35.1798 39.2085 37.6408 41.9956 40.194C41.1073 40.6042 40.3039 40.9744 39.4598 41.3637C40.6047 43.7605 41.7284 46.112 42.9088 48.5853C41.9142 49.0545 40.9498 49.5082 39.9058 50C38.7254 47.5476 37.5734 45.1526 36.3825 42.6777C35.5118 43.0444 34.6642 43.4024 33.7192 43.8004V32.6127Z" fill="white"/>
<path d="M32.022 28.8307V33.5148C30.1905 33.8711 28.0351 32.4146 27.2777 30.3654C26.4584 28.1477 27.4883 25.5615 29.6472 24.4179C31.7884 23.2847 34.5278 23.8721 35.9877 25.7787C37.4671 27.7097 37.3237 30.3828 35.6037 32.0948C34.4676 31.0589 33.3297 30.0213 32.0202 28.829L32.022 28.8307Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_192_514">
<rect width="30" height="36" fill="white" transform="translate(17 14)"/>
</clipPath>
</defs>
</svg>

        <p class="para1">Affordable Website Editing Solutions</p>
        <p class="para2">This online tool is both powerful and highly affordable, with plans starting as low as $5. You can effortlessly update your website without needing a developer or dealing with complicated tools. It's a cost-effective solution for maintaining your website with ease.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
      <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="32" cy="32" r="32" fill="#0F3D5F"/>
<g clip-path="url(#clip0_192_558)">
<path d="M30.8388 24.266H26.4883V19.4945H30.8487C30.7323 19.1518 30.6317 18.8601 30.533 18.5684C30.3515 18.0319 30.4561 17.5796 30.8329 17.2683C31.2315 16.9393 31.6655 16.9002 32.1647 17.2193C34.3528 18.6095 36.6474 19.7999 39.0249 20.8376C39.457 21.0256 39.7096 21.3585 39.7116 21.8401C39.7155 22.3414 39.459 22.6781 39.0052 22.8778C36.6317 23.9214 34.3331 25.1041 32.1469 26.5001C31.7089 26.7801 31.2117 26.7429 30.8487 26.4551C30.4738 26.1574 30.3456 25.7071 30.5074 25.2078C30.604 24.9083 30.7165 24.6146 30.8388 24.268V24.266Z" fill="white"/>
<path d="M38.1332 34.3868H33.7649V29.6289H38.1352C38.0089 29.2628 37.8925 28.9574 37.7938 28.646C37.632 28.137 37.7544 27.7043 38.1352 27.4027C38.5337 27.0875 38.95 27.0464 39.4275 27.3499C41.6274 28.7518 43.9379 29.9442 46.3252 30.9917C46.7554 31.1816 47.002 31.5164 47.002 31.9981C47.002 32.4817 46.7554 32.8165 46.3252 33.0064C43.9359 34.054 41.6274 35.2483 39.4275 36.6502C38.952 36.9537 38.5337 36.9145 38.1352 36.5974C37.7563 36.2958 37.632 35.8612 37.7938 35.354C37.8905 35.0525 38.003 34.7569 38.1332 34.3868Z" fill="white"/>
<path d="M30.8941 44.5193H26.5376V39.7595H30.8763C30.7579 39.4051 30.6593 39.1153 30.5626 38.8255C30.389 38.3028 30.5113 37.8407 30.898 37.5391C31.265 37.2533 31.7543 37.222 32.1982 37.5039C34.3863 38.8999 36.6869 40.0806 39.0605 41.1281C39.4985 41.3219 39.753 41.6489 39.7668 42.1188C39.7806 42.6162 39.5103 42.9686 39.0644 43.1624C36.6849 44.2002 34.3903 45.3926 32.2002 46.7827C31.701 47.0999 31.2709 47.0568 30.8704 46.7201C30.4975 46.4068 30.3909 45.9799 30.5606 45.4689C30.6612 45.1693 30.7678 44.8737 30.8921 44.5173L30.8941 44.5193Z" fill="white"/>
<path d="M31.2947 34.4612H26.5535V29.6367H31.2947V34.4612Z" fill="white"/>
<path d="M24.0319 29.6406V34.3613H20.7764V29.6406H24.0319Z" fill="white"/>
<path d="M20.7744 24.2425V19.5375H24.022V24.2425H20.7744Z" fill="white"/>
<path d="M20.8494 39.8319H24.0654V44.5565H20.8494V39.8319Z" fill="white"/>
<path d="M18.393 39.8475V44.5545H17.0671V39.8475H18.395H18.393Z" fill="white"/>
<path d="M18.3141 24.2542H17.0217V19.5355H18.3141V24.2542Z" fill="white"/>
<path d="M17 34.3515V29.6406H18.3121V34.3515H17Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_192_558">
<rect width="30" height="30" fill="white" transform="translate(17 17)"/>
</clipPath>
</defs>
</svg>

        <p class="para1">“Click To Edit” Text</p>
        <p class="para2">MyCrazySimpleCMS’s text editing feature simplifies updating your website’s content. With just a few clicks, you can change your text directly in the online preview—no need to learn HTML. Keep your site up-to-date, enhance SEO, and remove outdated information effortlessly.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
      <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="32" cy="32" r="32" fill="#0F3D5F"/>
<g clip-path="url(#clip0_192_666)">
<path d="M42.4343 21.4286C42.4323 20.7511 42.0302 20.1085 41.417 20.0532C40.5194 19.9734 39.6097 20.0328 38.6695 20.0328V20.5117C38.6675 22.0938 38.6655 23.6758 38.6695 25.2599C38.6695 25.6263 38.5863 25.9394 38.2309 26.0991C37.8817 26.2567 37.6217 26.0745 37.3659 25.8473C36.6836 25.2456 35.9911 24.6582 35.2946 24.0586C35.1647 24.1629 35.0672 24.2387 34.9718 24.3205C34.3443 24.8629 33.7351 25.4298 33.0792 25.9333C32.8924 26.0766 32.5228 26.1502 32.3299 26.0581C32.1309 25.966 32.0233 25.6386 31.9177 25.3971C31.8669 25.2784 31.9075 25.1187 31.9075 24.9775V20.0143C30.9938 20.0143 30.1247 19.9734 29.2637 20.0287C28.6281 20.0717 28.1631 20.6795 28.1367 21.3631C28.1245 21.7151 28.161 22.0712 28.1265 22.4212C28.092 22.7855 28.222 22.9493 28.555 23.1089C30.4353 24.0074 31.4669 25.5322 31.475 27.6259C31.4852 29.7974 30.413 31.3385 28.4677 32.2677C28.3377 32.3312 28.1651 32.4601 28.1468 32.5809C27.9823 33.6349 28.62 34.3819 29.6718 34.3819C33.4163 34.384 37.1588 34.384 40.9032 34.3819C41.8901 34.3819 42.4323 33.8293 42.4323 32.8306C42.4323 30.8658 42.4323 28.903 42.4323 26.9382C42.4323 25.1024 42.4343 23.2644 42.4323 21.4286H42.4343ZM35.1789 32.4069C35.0916 32.4949 34.9697 32.5502 34.8377 32.5502H33.8671C33.6011 32.5502 33.3858 32.3312 33.3858 32.0631C33.3858 31.93 33.4386 31.8072 33.526 31.7192C33.6133 31.6312 33.7351 31.578 33.8671 31.578H34.8377C35.1038 31.578 35.319 31.7949 35.319 32.0631C35.319 32.1961 35.2662 32.3189 35.1789 32.4069ZM37.1933 32.411C37.106 32.499 36.9841 32.5522 36.8521 32.5522H36.0582C35.7921 32.5522 35.5769 32.3353 35.5769 32.0672C35.5769 31.9341 35.6317 31.8113 35.717 31.7233C35.8043 31.6353 35.9241 31.5821 36.0582 31.5821H36.8521C37.1181 31.5821 37.3354 31.799 37.3354 32.0672C37.3354 32.2002 37.2806 32.323 37.1933 32.411ZM40.0849 32.4847C39.3843 32.4929 38.6838 32.4929 37.9832 32.4847C37.7111 32.4806 37.5182 32.3537 37.5283 32.0487C37.5405 31.7438 37.7395 31.6435 38.0116 31.6435C38.3629 31.6455 38.7122 31.6455 39.0635 31.6455C39.4148 31.6455 39.7356 31.6455 40.0727 31.6435C40.3387 31.6414 40.5154 31.7745 40.5296 32.0365C40.5438 32.323 40.3651 32.4806 40.0849 32.4847Z" fill="white"/>
<path d="M24.971 42.9431C24.575 41.4531 24.1892 40 23.8034 38.5448C23.7465 38.3279 23.6896 38.1089 23.6348 37.8899C23.4439 37.1449 23.4744 37.1838 24.0491 36.7192C25.2877 35.7163 26.5528 35.4728 28.1063 36.0458C29.7937 36.668 31.5766 37.0282 33.3189 37.501C33.9504 37.6729 34.2956 38.1805 34.1656 38.7536C34.0357 39.3348 33.4712 39.6541 32.8153 39.4822C31.5299 39.1465 30.2486 38.7925 28.9652 38.4445C28.6667 38.3627 28.4088 38.422 28.3317 38.7474C28.2646 39.0319 28.4657 39.1813 28.7195 39.257C28.7337 39.2611 28.7459 39.2652 28.7601 39.2693C30.015 39.6132 31.2679 39.9591 32.5249 40.2968C33.1645 40.4687 33.7372 40.3377 34.3342 40.0205C36.9598 38.6267 39.6057 37.2738 42.2536 35.9189C42.8831 35.5956 43.5614 35.8125 43.8599 36.3733C44.1706 36.9607 43.9594 37.6259 43.3238 37.9922C40.5032 39.6173 37.6807 41.2362 34.8601 42.8612C34.5555 43.0352 34.2448 43.2092 33.9727 43.4261C33.2783 43.9787 32.5026 43.9992 31.6964 43.8129C30.673 43.5776 29.6577 43.3115 28.6383 43.072C27.4341 42.7875 26.2239 42.5624 24.973 42.9451L24.971 42.9431Z" fill="white"/>
<path d="M30.6568 27.6831C30.6486 29.9611 28.7825 31.8276 26.5224 31.8194C24.2704 31.8112 22.4043 29.9222 22.4043 27.6524C22.4043 25.3438 24.2826 23.4956 26.6158 23.51C28.8455 23.5223 30.6649 25.4031 30.6568 27.6831ZM25.9559 28.3114C25.702 28.0085 25.5051 27.7077 25.2411 27.4907C25.1253 27.3945 24.8309 27.3925 24.6948 27.4764C24.4776 27.6115 24.4857 27.8694 24.6684 28.0618C25.0258 28.4383 25.3792 28.8231 25.7772 29.1547C25.8868 29.2468 26.228 29.2406 26.3193 29.1424C27.0423 28.3585 27.7408 27.5501 28.4109 26.7212C28.4921 26.6209 28.4393 26.275 28.3317 26.187C28.2261 26.099 27.9662 26.1706 27.7855 26.2198C27.6941 26.2443 27.6332 26.3773 27.5601 26.4633C27.0565 27.0446 26.5529 27.6238 25.9538 28.3135L25.9559 28.3114Z" fill="white"/>
<path d="M32.7706 20.0143H37.8025V25.1064C37.108 24.5067 36.4745 23.9623 35.8429 23.4158C35.3068 22.9533 35.2622 22.9533 34.72 23.4261C34.1047 23.9602 33.4874 24.4924 32.8681 25.0245C32.8518 25.0388 32.8173 25.0286 32.7686 25.0327V20.0143H32.7706Z" fill="white"/>
<path d="M21.8277 36.3753C22.2886 36.361 22.4186 36.5923 22.4978 36.887C23.0257 38.8866 23.5557 40.8862 24.0857 42.8858C24.1751 43.2255 24.2685 43.5653 24.3538 43.905C24.4431 44.2693 24.3111 44.5108 23.9476 44.6132C23.5313 44.7298 23.1151 44.8506 22.6968 44.959C22.2277 45.0798 22.0226 44.9509 21.8845 44.431C21.3951 42.6095 20.9118 40.7879 20.4265 38.9664C20.3067 38.5182 20.1849 38.07 20.063 37.6218C19.9148 37.0773 20.0265 36.8665 20.5585 36.7151C21.0154 36.5861 21.4743 36.4695 21.8317 36.3733L21.8277 36.3753ZM22.1363 37.9513C22.1262 37.5788 21.8256 37.2943 21.454 37.3045C21.0783 37.3148 20.8002 37.6095 20.8103 37.9881C20.8205 38.3626 21.1149 38.643 21.4885 38.6328C21.8561 38.6246 22.1444 38.3217 22.1343 37.9513H22.1363Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_192_666">
<rect width="24" height="25" fill="white" transform="translate(20 20)"/>
</clipPath>
</defs>
</svg>

        <p class="para1">Easily Update Website Images</p>
        <p class="para2">The "Media Library" in MyCrazySimpleCMS makes managing your website’s images simple and efficient. You can easily upload, replace, and organize your images all in one place. This feature streamlines your workflow, ensuring your site’s visuals are always up-to-date and looking great.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="32" cy="32" r="32" fill="#0F3D5F" />
          <g clip-path="url(#clip0_1_253)">
            <path
              d="M35.4702 22.0854C37.6081 24.2254 39.7354 26.3569 41.9323 28.5581C41.5363 28.9312 41.0961 29.3234 40.679 29.7409C35.7166 34.704 30.75 39.6607 25.8107 44.6449C25.2715 45.1889 24.6269 45.2901 23.9719 45.4545C21.9625 45.9627 19.951 46.4623 17.9373 46.9536C17.217 47.1286 16.8652 46.7638 17.0443 46.0301C17.6172 43.6814 18.1964 41.3348 18.7883 38.9903C18.8388 38.79 18.9694 38.5876 19.1169 38.44C24.5132 33.0278 29.9159 27.6198 35.3185 22.214C35.3733 22.1592 35.4365 22.1128 35.4702 22.0833V22.0854Z"
              fill="white" />
            <path
              d="M43.8322 26.5783C41.6816 24.4257 39.5648 22.3047 37.4248 20.1604C37.4459 20.1309 37.488 20.0508 37.5491 19.9897C38.2315 19.3023 38.9055 18.6087 39.6027 17.9361C40.8707 16.7133 42.8485 16.6816 44.1397 17.8792C44.8263 18.5159 45.4919 19.1801 46.1238 19.8695C47.3118 21.164 47.2907 23.0468 46.0817 24.3203C45.3529 25.0898 44.5862 25.8235 43.8322 26.5783Z"
              fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_1_253">
              <rect width="30" height="30" fill="white" transform="translate(17 17)" />
            </clipPath>
          </defs>
        </svg>
        <p class="para1">No Need To Learn HTML</p>
        <p class="para2">You don’t need to know HTML with MyCrazySimpleCMS. Simply update your text or swap images, and we’ll ensure your original HTML stays intact. Our system lets you make content changes effortlessly, while we take care of the technical details.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="32" cy="32" r="32" fill="#0F3D5F" />
          <g clip-path="url(#clip0_1_253)">
            <path
              d="M35.4702 22.0854C37.6081 24.2254 39.7354 26.3569 41.9323 28.5581C41.5363 28.9312 41.0961 29.3234 40.679 29.7409C35.7166 34.704 30.75 39.6607 25.8107 44.6449C25.2715 45.1889 24.6269 45.2901 23.9719 45.4545C21.9625 45.9627 19.951 46.4623 17.9373 46.9536C17.217 47.1286 16.8652 46.7638 17.0443 46.0301C17.6172 43.6814 18.1964 41.3348 18.7883 38.9903C18.8388 38.79 18.9694 38.5876 19.1169 38.44C24.5132 33.0278 29.9159 27.6198 35.3185 22.214C35.3733 22.1592 35.4365 22.1128 35.4702 22.0833V22.0854Z"
              fill="white" />
            <path
              d="M43.8322 26.5783C41.6816 24.4257 39.5648 22.3047 37.4248 20.1604C37.4459 20.1309 37.488 20.0508 37.5491 19.9897C38.2315 19.3023 38.9055 18.6087 39.6027 17.9361C40.8707 16.7133 42.8485 16.6816 44.1397 17.8792C44.8263 18.5159 45.4919 19.1801 46.1238 19.8695C47.3118 21.164 47.2907 23.0468 46.0817 24.3203C45.3529 25.0898 44.5862 25.8235 43.8322 26.5783Z"
              fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_1_253">
              <rect width="30" height="30" fill="white" transform="translate(17 17)" />
            </clipPath>
          </defs>
        </svg>
        <p class="para1">Meta Tags</p>
        <p class="para2">Effortlessly manage meta tags for each page to boost your site’s SEO. With MyCrazySimpleCMS, you can edit titles, descriptions, and keywords directly in the editor, enhancing your website’s search engine visibility without the need for technical skills.
        </p>
      </div>
    </div>

    <div class="inner_section">
      <div class="inner_section_container">
        
      <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="32" cy="32" r="32" fill="#0F3D5F"/>
<g clip-path="url(#clip0_192_681)">
<path d="M22.8083 32.9599C22.7969 28.4309 26.4789 24.7096 30.9854 24.6963C35.4995 24.683 39.189 28.3758 39.1966 32.9143C39.2042 37.4888 35.543 41.193 31.0119 41.1968C26.5073 41.2006 22.8196 37.4984 22.8064 32.9599H22.8083ZM31.6965 32.232C31.6965 31.3824 31.6965 30.5804 31.6965 29.7803C31.6965 29.2633 31.4166 28.9307 31.0005 28.9383C30.5959 28.9459 30.3141 29.2709 30.3122 29.7613C30.3065 30.7895 30.3046 31.8176 30.3122 32.8458C30.316 33.3799 30.594 33.6536 31.1254 33.6593C31.8251 33.665 32.5229 33.665 33.2226 33.6593C33.7294 33.6555 34.0528 33.3685 34.049 32.939C34.0452 32.5113 33.7218 32.2377 33.2075 32.232C32.7215 32.2282 32.2373 32.232 31.6984 32.232H31.6965ZM25.6166 32.9466C25.6166 32.5798 25.297 32.2472 24.9339 32.2358C24.5727 32.2225 24.2039 32.5836 24.2039 32.9485C24.2039 33.3115 24.5746 33.6726 24.9339 33.6593C25.2989 33.646 25.6166 33.3134 25.6166 32.9466ZM25.7452 30.5747C26.1328 30.569 26.4354 30.2668 26.4354 29.8848C26.4354 29.5066 26.1215 29.1949 25.7433 29.1911C25.3443 29.1873 25.0247 29.5123 25.0379 29.9076C25.0492 30.2934 25.3537 30.5823 25.7471 30.5766L25.7452 30.5747ZM25.73 35.3184C25.3405 35.3184 25.0379 35.6149 25.0341 36.0007C25.0303 36.3808 25.3348 36.6944 25.7168 36.702C26.112 36.7096 26.4392 36.3865 26.4335 35.995C26.4279 35.613 26.1196 35.3184 25.73 35.3184ZM34.0509 28.334C34.4461 28.334 34.7733 28.0109 34.762 27.6289C34.7506 27.2564 34.4329 26.9485 34.0604 26.9466C33.6727 26.9447 33.3398 27.2773 33.3493 27.6574C33.3588 28.0261 33.6765 28.334 34.0509 28.334ZM34.762 38.2567C34.7695 37.8899 34.4594 37.5706 34.0812 37.5592C33.6878 37.5459 33.3512 37.8576 33.3474 38.2415C33.3436 38.6083 33.6557 38.9333 34.0282 38.9466C34.4178 38.9599 34.7544 38.6463 34.762 38.2586V38.2567ZM31.6965 26.8268C31.6965 26.4258 31.4147 26.135 31.0195 26.1312C30.6318 26.1274 30.3235 26.422 30.316 26.8078C30.3065 27.2012 30.6356 27.5414 31.0195 27.5376C31.392 27.5319 31.6965 27.2126 31.6965 26.8287V26.8268ZM27.9729 28.3321C28.3549 28.3283 28.6688 28.0166 28.6688 27.6422C28.6688 27.2525 28.3341 26.9333 27.9389 26.9447C27.5568 26.9561 27.2675 27.2678 27.2732 27.6593C27.2807 28.0546 27.572 28.3359 27.9729 28.3321ZM36.2843 30.5747C36.6833 30.5747 36.9727 30.2915 36.9802 29.8962C36.9859 29.5104 36.689 29.2006 36.3032 29.1911C35.9061 29.1816 35.5846 29.499 35.5884 29.8962C35.5921 30.2782 35.8966 30.5747 36.2843 30.5766V30.5747ZM36.4167 32.958C36.4205 33.3381 36.7268 33.6536 37.0956 33.6593C37.4738 33.665 37.8029 33.3248 37.7972 32.9371C37.7915 32.5646 37.4757 32.2415 37.1107 32.2358C36.7306 32.2301 36.4129 32.5627 36.4167 32.958ZM36.2748 35.3184C35.8872 35.3222 35.5865 35.6244 35.5865 36.0064C35.5865 36.3884 35.8928 36.6982 36.2729 36.702C36.6776 36.7058 36.9897 36.3903 36.9783 35.9874C36.967 35.5921 36.6739 35.3127 36.2729 35.3165L36.2748 35.3184ZM28.6688 38.2301C28.6575 37.8557 28.3379 37.5554 27.9559 37.5592C27.5436 37.563 27.2543 37.8728 27.2732 38.2871C27.2921 38.671 27.6079 38.9618 27.9937 38.9466C28.37 38.9314 28.6802 38.6026 28.6688 38.232V38.2301ZM31.6965 39.0682C31.6965 38.6824 31.3939 38.3631 31.0214 38.3574C30.6393 38.3498 30.3084 38.6919 30.316 39.0853C30.3235 39.4711 30.6299 39.7676 31.0176 39.7638C31.4128 39.76 31.6965 39.4692 31.6965 39.0701V39.0682Z" fill="white"/>
<path d="M41.4868 23.3051C41.3809 23.2975 41.275 23.2842 41.1672 23.2842C37.8067 23.2842 34.4462 23.269 31.0857 23.2861C26.8383 23.307 23.2168 25.926 21.8893 29.9038C20.1476 35.1227 23.1828 40.8281 28.4835 42.2383C29.2721 42.4473 30.1023 42.5082 30.9174 42.6013C31.4299 42.6602 31.7003 42.8731 31.6965 43.3159C31.6927 43.7549 31.4072 44.0001 30.9004 44.002C25.8984 44.021 21.3787 40.3511 20.2799 35.4667C19.0526 30.0064 21.9649 24.7324 26.7834 22.7255C28.041 22.2028 29.3459 21.8987 30.7113 21.8968C34.1587 21.8892 37.6081 21.893 41.0556 21.8911C41.1993 21.8911 41.343 21.8911 41.4868 21.8911C41.5132 21.8493 41.5378 21.8075 41.5643 21.7638C41.3601 21.587 41.1407 21.4255 40.9535 21.2316C40.6263 20.8933 40.6244 20.4942 40.927 20.1977C41.2031 19.9279 41.6248 19.926 41.9331 20.2282C42.5515 20.8325 43.1604 21.4445 43.7618 22.0641C44.0795 22.3929 44.0795 22.773 43.7637 23.1018C43.1642 23.7232 42.5534 24.3352 41.935 24.9377C41.6248 25.2399 41.205 25.2418 40.9289 24.9719C40.6263 24.6792 40.6263 24.2744 40.9497 23.9399C41.1369 23.746 41.3563 23.5826 41.5605 23.4059C41.5359 23.3716 41.5114 23.3374 41.4868 23.3013V23.3051Z" fill="white"/>
<path d="M42.0352 32.9331C42.0447 33.2962 41.6816 33.6649 41.3166 33.6611C40.9516 33.6573 40.6264 33.3304 40.6188 32.9598C40.6112 32.5911 40.9214 32.2547 41.2901 32.2318C41.6532 32.2109 42.0258 32.5606 42.0352 32.9312V32.9331Z" fill="white"/>
<path d="M36.8648 41.9284C36.8591 42.3218 36.5244 42.6373 36.133 42.6221C35.7661 42.6069 35.4408 42.2705 35.4484 41.9094C35.454 41.535 35.8152 41.1967 36.1916 41.2119C36.566 41.2271 36.8724 41.5521 36.8667 41.9284H36.8648Z" fill="white"/>
<path d="M33.6632 42.2477C34.0489 42.2401 34.3931 42.5746 34.3893 42.9547C34.3856 43.3253 34.0641 43.6503 33.6953 43.6579C33.3095 43.6655 32.9653 43.3291 32.971 42.949C32.9767 42.5765 33.2944 42.2553 33.6651 42.2477H33.6632Z" fill="white"/>
<path d="M40.9516 34.9382C41.3468 34.9382 41.674 35.2613 41.6626 35.6452C41.6532 36.012 41.3298 36.3256 40.9553 36.3294C40.5658 36.3332 40.2405 36.0044 40.25 35.6129C40.2575 35.2328 40.562 34.9401 40.9516 34.9382Z" fill="white"/>
<path d="M39.9322 37.4297C40.318 37.4259 40.6205 37.7167 40.6338 38.1025C40.647 38.4997 40.3369 38.8323 39.9473 38.838C39.5615 38.8437 39.2438 38.5149 39.2476 38.1158C39.2514 37.7205 39.5388 37.4335 39.9322 37.4297Z" fill="white"/>
<path d="M38.3059 39.5699C38.6917 39.5737 38.9905 39.8739 38.9962 40.2598C39.0018 40.6608 38.6898 40.9782 38.2927 40.9744C37.8993 40.9706 37.593 40.6475 37.6043 40.2465C37.6157 39.8587 37.9201 39.5661 38.3059 39.5699Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_192_681">
<rect width="24" height="24" fill="white" transform="translate(20 20)"/>
</clipPath>
</defs>
</svg>

        <p class="para1">How Does It Work</p>
        <p class="para2">To "publish" your temporary changes, your server files need to be updated, which requires FTP access. Our simple, step-by-step instructions will guide you through the process. Additionally, your original website is automatically backed up, allowing for a complete recovery if needed.
        </p>
      </div>
    </div>
  </div>
</div>
</section>

<section id="Plan">
<div class=" planCont com1">
  <!-- <img src="./image/sideImg.png" class="planSideImg" alt=""> -->

  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <h2 class="overflow-hidden">Choose Your Plan</h2>
    </div>
  </div>

  <!-- <div class="plainChoice">
    <span class="monthy">Monthly</span>

    <input type="checkbox" class="plaininput" id="check" />
    <label for="check" class="plainBtn"></label>

    <span class="yearly">Yearly</span>
  </div> -->

  <div class="row2">
    <!-- ffirst  -->
    <div class="inner_section">
      <div class="inner_section_container">
        <div class="planImgWrap">
          <img src="{{asset('admin/img/plan1.png')}}" alt="Standard Plan For Text Only Editing" />
          <p>STANDARD</p>
        </div>

        <div class="planWhitewrap">
          <p class="dollorHead">
                            <span class="span1">$5</span>
                            <span style="font-weight:600;" class="span2">Monthly</span>
                            
                        </p>
                        <p class="sdfh" style="font-weight:bold;">Introductory Price - $60 per year!</p>
                        <span class="only firs">50% OFF!</span>
                        <span class="firs1">(Regular price: $120 per year)</span>

          <!-- scond part  -->
          <div class="planPoint">
            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Text Editor" />
              <p>“Click To Edit” Text Editor</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/cancel.png')}}" alt="Image Editor" />
              <p>“Click To Edit” Image Editor</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/cancel.png')}}" alt="SEO Meta Tag Editor" />
              <p>S.E.O. Image Alt Tags</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/cancel.png')}}" alt="Alt Tag Editor" />
              <p>S.E.O. Meta Tags</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/cancel.png')}}" alt="Advanced Editing Tools" />
              <p>Advanced Website Editing Tools</p>
            </div>
          </div>

          <a style="max-width:261px; width:100%;" href="/register"?isPlan=1"><button class="chooseBtn2"><span>Choose Plan</span></button></a>
        </div>
      </div>
    </div>

    <!-- second  -->
    <div class="inner_section">
      <div class="inner_section_container">
        <div class="planImgWrap anotherplan">
          <img src="{{asset('admin/img/blueColor.png')}}" alt="Professional Plan" />
          <p>PROFESSIONAL</p>
        </div>

        <div class="planWhitewrap">
             <p class="dollorHead">
                            <span class="span1">$8</span>
                            <span style="font-weight:600;" class="span2">Monthly</span>
                           
                        </p>
                         <p class="sdfh" style="font-weight:bold;">Introductory Price - $96 per year!</p>
                          <span class="only firs">50% OFF!</span>
                           <span class="firs1">(Regular price: $192 per year)</span>
          <!--<div class="for_span">-->
          <!--      <span class="span1">$8</span>-->
          <!--  <span class="span2">/Month</span>-->
          <!--</div>-->

          <!-- scond part  -->
          <div class="planPoint">
            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Text Editor" />
              <p>“Click To Edit” Text Editor</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Image Editor" />
              <p>“Click To Edit” Image Editor</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="SEO Meta Tag Editor" />
              <p>S.E.O. Image Alt Tags</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Alt Tag Editor" />
              <p>S.E.O. Meta Tags</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/cancel.png')}}" alt="Advanced Editing Tools" />
              <p>Advanced Website Editing Tools</p>
            </div>
          </div>

          <a style="max-width:261px; width:100%;" href="/register"?isPlan=1"><button class="chooseBtn2"><span>Choose Plan</span></button></a>
        </div>
      </div>
    </div>

    <!-- third  -->
    <div class="inner_section">
      <div class="inner_section_container">
        <div class="planImgWrap">
          <img src="{{asset('admin/img/orangeColor.png')}}" alt="Premium Plan" />
          <p>PREMIUM</p>
        </div>

        <div class="planWhitewrap">
           <p class="dollorHead">
                            <span class="span1">$16</span>
                            <span style="font-weight:600;" class="span2">Monthly</span>
                        </p>
                        <p class="sdfh" style="font-weight:bold;">Introductory Price - $192 per year!</p>
                         <span class="only firs">50% OFF!</span>
                        <span class="firs1">(Regular price: $384 per year)</span>

          <!-- scond part  -->
          <div class="planPoint">
            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Text Editor" />
              <p>“Click To Edit” Text Editor</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Image Editor" />
              <p>“Click To Edit” Images Editor</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="SEO Meta Tag Editor" />
              <p>S.E.O. Image Alt Tags</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Alt Tag Editor" />
              <p>S.E.O. Meta Tags</p>
            </div>

            <div class="singlePoint">
              <img src="{{asset('admin/img/correct.png')}}" alt="Advanced Editing Tools" />
              <p>Advanced Website Editing Tools</p>
            </div>
          </div>

          <p class="notavailable">NOT AVAILABLE NOW</p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<section id="freqQuestion">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center freq">
      <h2 class="overflow-hidden">Frequently Asked Questions</h2>
    </div>
  </div>

  <div class="row2">

    <div class="faq">
      <div class="question">
        <h3>Q. What makes MyCrazySimple different from other website Editors?</h3>

        <img src="{{asset('admin/img/plus.png')}}" class="plus1" alt="How does mycrazysimplecms work?" />
      </div>

      <div class="answer">
        <p>
        MyCrazySimpleCMS stands out by offering a unique solution for non-technical users who want to edit their existing HTML websites without needing to install software or migrate to a new platform. It provides a simple, no-code approach that allows users to make instant text and image edits, directly publishing changes through FTP. Unlike other website editors, there's no need to switch hosting or learn complex coding skills.</p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. How Does MyCrazySimple Work?</h3>

        <img src="{{asset('admin/img/plus.png')}}" class="plus1" alt="How does mycrazysimplecms work?" />
      </div>

      <div class="answer">
        <p>
        MyCrazySimpleCMS is simple to use. Just enter your website URL, and the system provides an editable preview. You can make text and image changes easily, and once you’re done, you publish your updates by providing FTP access.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>
          Q. Can I Edit My HTML Website Without Any Coding Knowledge?
        </h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="No Code website editor." />
      </div>

      <div class="answer">
        <p>
        Yes, with MyCrazySimpleCMS, you can easily edit your HTML website without any coding knowledge. It’s designed to make HTML website updates simple and user-friendly, allowing you to make text and image changes without touching the code.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. How Can You Edit My Website Without Having Access to It?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="How does the editor work?" />
      </div>

      <div class="answer">
        <p>
        Initially, you can edit your website in preview mode using MyCrazySimpleCMS. To publish the changes to your live website, you’ll need to provide FTP access, which allows the system to upload your edits securely.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. What Kind of Changes Can I Make?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="What kind of edits can I make?" />
      </div>

      <div class="answer">
        <p>
        	You can update text, images, and basic content on your website without any coding. MyCrazySimpleCMS allows you to duplicate, delete, and format content, making it easy to manage your website content with this no-code tool.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. What's the Cost of Using MyCrazySimpleCMS?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="What is the cost to use the editor?" />
      </div>

      <div class="answer">
        <p>
        	MyCrazySimpleCMS offers affordable pricing, with two plans currently available, starting at $5 per month. It’s an ideal solution for beginners who want a simple and cost-effective way to edit their website. Best of all, it’s free to try—no credit card required. You can try it right now by simply typing in your website address and start editing immediately! Visit our pricing page for more details.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Do I Need to Install Any Software or Plugins?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Do I need to install anything?" />
      </div>

      <div class="answer">
        <p>
        No, you don’t need to install any software or plugins. MyCrazySimpleCMS is a fully online, no-code tool that you can access directly through your web browser.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Are There Any Backup Features in Case of Mistakes?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Can I undo if there is a problem?" />
      </div>

      <div class="answer">
        <p>
        Yes, MyCrazySimpleCMS automatically creates a backup of your original HTML file before any changes are published. This ensures that you can easily revert your changes if needed, offering peace of mind for small business owners.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Can I Add Formatting Such as Bold, Italic, Underline, etc., to My Text?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Can I format my text?" />
      </div>

      <div class="answer">
        <p>
        MyCrazySimpleCMS is designed for text editing only, meaning you can easily update the content on your website, while the original formatting and styling, such as bold, italic, and underline, remain consistent with your website’s design.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Why Are Some Areas of My Website Not Available for Editing?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Can I edit everything?" />
      </div>

      <div class="answer">
        <p>
        Some areas of your website may not be editable by MyCrazySimpleCMS because they are dynamically generated or part of complex design elements, such as scripts, widgets, or databases. MyCrazySimpleCMS is designed to make it easy to update text and images in the static HTML areas of your website.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Can I Upgrade to the Professional Plan?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Can I upgrade?" />
      </div>

      <div class="answer">
        <p>
        Yes, you can upgrade at any time by simply paying the difference in price. Currently, two of the three plans are available, and upgrading gives you access to additional features and greater flexibility for managing your website content.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Can I Pay Monthly for the Service?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Is there a monthly plan?" />
      </div>

      <div class="answer">
        <p>
        MyCrazySimpleCMS currently offers annual pricing plans only, designed to provide small businesses with a cost-effective and simple website editing solution. This structure helps keep our service affordable while offering the flexibility and features small business owners need.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Can I Edit More Than One Website with My Plan?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Can I edit more than one website?" />
      </div>

      <div class="answer">
        <p>
        Each MyCrazySimpleCMS plan is designed for a single website. However, you can manage multiple websites by adding additional plans under the same login account, allowing you to control all your sites from one convenient dashboard. This gives you the flexibility to handle multiple projects or businesses with ease.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Can I Make Edits to My Website From a Smartphone?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Can I use my smart phone?" />
      </div>

      <div class="answer">
        <p>
        Yes, you can use MyCrazySimpleCMS on your smartphone to make edits to your website, as it is fully mobile-friendly. However, for the best experience and ease of use, we recommend using a desktop computer, especially for more detailed edits or managing larger amounts of content.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Do I Need a Credit Card to Try the Demo?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Do I need to pay to try the editor?" />
      </div>

      <div class="answer">
        <p>
        Free to try with no credit card required! Simply enter your website URL, and you can start editing your site instantly. It’s an ideal way for beginners to experience how easy it is to make changes, completely risk-free.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. What is FTP and Why Do I Need to Provide It?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="What is FTP?" />
      </div>

      <div class="answer">
        <p>
        FTP (File Transfer Protocol) allows MyCrazySimpleCMS to connect to your website's hosting server. Providing FTP details is not required to use the editor, but it is necessary if you want to save and publish your changes to your live website.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. How Do I Get FTP Access Information?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="How do I get my FTP?" />
      </div>

      <div class="answer">
        <p>
        You can obtain your FTP access details from your website hosting provider, typically found in your hosting control panel or account settings. We also have simple instructions available for download to guide you through the process, and a video tutorial will be available soon to make it even easier.


        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Can I Preview Changes Before Publishing?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="Can I preview before publishing?" />
      </div>

      <div class="answer">
        <p>
        Absolutely! MyCrazySimpleCMS uses a WYSIWYG (What You See Is What You Get) approach, allowing you to make edits while previewing your website exactly as it will appear when published. This means you can see all your changes in real time before saving or publishing. Additionally, a backup of your website is automatically created before uploading any changes, ensuring you can easily restore your site in case of any issues.
        </p>
      </div>
    </div>










  </div>
</div>
</section>
@endsection
