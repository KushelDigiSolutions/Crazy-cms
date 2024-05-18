<link rel="stylesheet" href="{{asset('admin/customcss/style.css')}}">
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
    @section('title', 'Welcome')
    <section id="navbar">

<div class="navCont">


  <nav>

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

      <img class="home-link" src="{{asset('admin/img/summer.svg')}}" alt="">
      <!-- link back to homepage -->
      <a href="#" class="navSinItem">Features</a>
      <a href="#" class="navSinItem">Pricing</a>
      <a href="#" class="navSinItem">Offers</a>
      <a href="#"> <button class="navSinBtn"><span>CONTACT</span></button></a>
      <a href="/login"> <button class="navSinBtn"><span>SIGN IN</span></button></a>

    </div>

  </nav>

</div>


</section>

<section id="banner_first">
<div class=" com1">
  <div class="row">
    <div class="col-lg-6 col-md-9 banner_left">
      <h1>Welcome to Crazy Simple</h1>
      <p>
        We aren’t Crazy, but we do give you tools galore to easily produce
        your website.
      </p>
      <button type="button" class="btn btn-light">
        <span> GET STARTED</span>
      </button>
    </div>

    <!-- this is right slider banner  -->
    <div class="col-lg-6 banner_right">
      <div class="slider">
        <div class="slides">
          <!-- radio button  -->
          <input type="radio" name="radio-btn" id="radio1" />
          <input type="radio" name="radio-btn" id="radio2" />
          <input type="radio" name="radio-btn" id="radio3" />
          <input type="radio" name="radio-btn" id="radio4" />

          <!-- radio btn end -->

          <!-- slide iamge start  -->
          <div class="slide first">
            <img src="{{asset('admin/img/Group.png')}}" alt="banner1" />
          </div>
          <div class="slide">
            <img src="{{asset('admin/img/Group.png')}}" alt="banner1" />
          </div>
          <div class="slide">
            <img src="{{asset('admin/img/Group.png')}}" alt="banner1" />
          </div>
          <div class="slide">
            <img src="{{asset('admin/img/Group.png')}}" alt="banner1" />
          </div>

          <!-- slide img end  -->

          <!-- autmatiic  navigate start -->
          <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
          </div>
          <!-- autmatiic  navigate end -->
        </div>

        <!-- manual navigation start  -->
        <div class="navigaWrap">
          <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
          </div>
        </div>
        <!-- manual navigation end -->
      </div>
    </div>
  </div>
</div>
</section>

<section id="email_section">
<div class=" com1 webAdWrap">
  <div class="row">
    <p>Empower Yourself to Easily <span> Modify Your Website</span></p>
  </div>

  <div class="websiteAdd">

    <div class="webInput">
      <img src="{{asset('admin/img/chain.svg')}}" alt="" />
      <input type="text" placeholder="Enter your website Address" />
    </div>

    <div class="startBtn">Start</div>

  </div>

</div>

</section>

<section id="what_we_do">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <h2>What We Do</h2>
    </div>
  </div>
  <div class="row row2 justify-content-md-center">
    <div class="col-lg-9 col-md-12 col-sm-12 text-center">
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
  </div>
</div>
</section>

<section id="About_us">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <h2 class="overflow-hidden">About US</h2>
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
        <p class="para1">
          Unlock the Power of MyCrazySimple: Simplify Website Editing
        </p>
        <p class="para2">
          Welcome to MyCrazySimple, a revolutionary solution that
          transforms the way you manage your website. What sets us apart?
          Unlike other platforms, we work seamlessly with most HTML
          websites. You don't need to migrate to a special platform; we
          empower you to control your site effortlessly.
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
        <p class="para1">Boost Your SEO with Regular Updates</p>
        <p class="para2">
          One of the key benefits of keeping your website content fresh is
          the positive impact it can have on your search engine rankings
          (SEO). Whether you're a restaurant owner adjusting menu prices,
          showcasing new project images, or promoting holiday specials,
          maintaining an up-to-date website is crucial. MyCrazySimple
          provides you with the flexibility to make these changes and
          more.
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
        <p class="para1">What You Can Edit</p>
        <p class="para2">
          With MyCrazySimple, you can easily edit text and images on your
          website. However, please note that changes to the site's
          structure, fonts, or colors are not currently supported.
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
        <p class="para1">Experience the Free Demo</p>
        <p class="para2">
          Curious to see how MyCrazySimple works? Try our FREE demo – no
          installations, no credit card required. The demo allows you to
          experience how user-friendly it is to edit your website. Simply
          provide your website address, and our system will generate a
          visual editor, enabling you to "Click To Edit" text and images
          on your site.
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
        <p class="para1">Moving Forward with MyCrazySimple</p>
        <p class="para2">
          If you're impressed by the demo and want to utilize this website
          editing tool, you can create an account and provide FTP access
          to your hosting account. Our straightforward instructions will
          guide you through this process. FTP access allows our online
          website editor to publish changes to your live site. Plans start
          at just $5 per month, ensuring affordability for all budgets.
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
        <p class="para1">Standard and Professional Packages</p>
        <p class="para2">
          Choose between two packages: Standard and Professional. The
          Standard plan allows text edits, while the Professional plan
          includes the media library, enabling you to change and upload
          new images. The Standard plan is priced at $5 per month, and the
          Professional plan is available for just $8 per month.
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
        <p class="para1">Media Library for Image Control</p>
        <p class="para2">
          The media library offers access to all your website's images,
          allowing you to upload new ones and swap them out with ease. You
          can also edit the "ALT" tags for each image, which can have a
          positive impact on SEO.
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
        <p class="para1">Your Peace of Mind</p>
        <p class="para2">
          We prioritize your website's security. Before publishing any
          changes, we create a backup of your site, ensuring that
          unintended results can be easily undone.
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
        <p class="para1">The Future of MyCrazySimple</p>
        <p class="para2">
          Choose between two packages: Standard and Professional. The
          Standard plan allows text edits, while the Professional plan
          includes the media library, enabling you to change and upload
          new images. The Standard plan is priced at $5 per month, and the
          Professional plan is available for just $8 per month.
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

  <div class="plainChoice">
    <span class="monthy">Monthly</span>

    <input type="checkbox" class="plaininput" id="check" />
    <label for="check" class="plainBtn"></label>

    <span class="yearly">Yearly</span>
  </div>

  <div class="row2">
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
            <!-- <img src="{{asset('admin/img/jn.png')}}" alt=""> -->
          </p>

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
            <!-- <img src="{{asset('admin/img/jk1.svg')}}" alt=""> -->
          </p>

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
            <!-- <img src="{{asset('admin/img/jk2.svg')}}" alt=""> -->
          </p>

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
</div>
</section>

<section id="freqQuestion">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <h2 class="overflow-hidden">Frequently Asked Questions</h2>
    </div>
  </div>

  <div class="row2">
    <div class="faq">
      <div class="question">
        <h3>Q. How Does MyCrazySimple Work?</h3>

        <img src="{{asset('admin/img/plus.png')}}" class="plus1" alt="" />
      </div>

      <div class="answer">
        <p>
          MyCrazySimple is an online website editor that simplifies the
          process of making updates to your HTML website. It provides you
          with an intuitive interface, making it easy to locate and edit
          text or images directly on your site.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>
          Q. Can I Edit My HTML Website Without Any Coding Knowledge?
        </h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="" />
      </div>

      <div class="answer">
        <p>
          lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. A
          magnam deleniti vel enim aliquid atque quaerat neque quibusdam
          laborum. In cupiditate quasi cumque esse eius delectus dicta
          nisi fugit odit.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. What Kind of Changes Can I Make?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="" />
      </div>

      <div class="answer">
        <p>
          lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. A
          magnam deleniti vel enim aliquid atque quaerat neque quibusdam
          laborum. In cupiditate quasi cumque esse eius delectus dicta
          nisi fugit odit.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Is There a Learning Curve?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="" />
      </div>

      <div class="answer">
        <p>
          lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. A
          magnam deleniti vel enim aliquid atque quaerat neque quibusdam
          laborum. In cupiditate quasi cumque esse eius delectus dicta
          nisi fugit odit.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Do I Need to Install Any Software or Plugins?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="" />
      </div>

      <div class="answer">
        <p>
          lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. A
          magnam deleniti vel enim aliquid atque quaerat neque quibusdam
          laborum. In cupiditate quasi cumque esse eius delectus dicta
          nisi fugit odit.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. What's the Cost of Using MyCrazySimple?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="" />
      </div>

      <div class="answer">
        <p>
          lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. A
          magnam deleniti vel enim aliquid atque quaerat neque quibusdam
          laborum. In cupiditate quasi cumque esse eius delectus dicta
          nisi fugit odit.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Are There Any Backup Features in Case of Mistakes?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="" />
      </div>

      <div class="answer">
        <p>
          lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. A
          magnam deleniti vel enim aliquid atque quaerat neque quibusdam
          laborum. In cupiditate quasi cumque esse eius delectus dicta
          nisi fugit odit.
        </p>
      </div>
    </div>

    <div class="faq">
      <div class="question">
        <h3>Q. Can I Collaborate with Others on Website Editing?</h3>

        <img src="{{asset('admin/img/plus.png')}}" alt="" />
      </div>

      <div class="answer">
        <p>
          lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. A
          magnam deleniti vel enim aliquid atque quaerat neque quibusdam
          laborum. In cupiditate quasi cumque esse eius delectus dicta
          nisi fugit odit.
        </p>
      </div>
    </div>
  </div>
</div>
</section>
<script src="{{asset('admin/customjs/footer.js')}}"></script>
  <!-- bootstrap cdn  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="{{asset('admin/customjs/app1.js')}}"></script>
</x-guest-layout>
