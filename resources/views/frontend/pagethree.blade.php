<!-- resources/views/home.blade.php -->
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

              <a class="ekaa" href="{{url('/')}}"><img class="home-link" src="{{asset('admin/img/summer.svg')}}" alt=""></a> 
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
    <div class=" planCont com1">
        <!-- <img src="./image/sideImg.png" class="planSideImg" alt=""> -->

        <div class="row row1 justify-content-md-center">
            <div class="col-lg-12 col-sm-10 hghgk  text-center">
                <h2 class="overflow-hidden same_hide">CrazySimpleCMS Pricing</h2>
                <p class="same_some mt-3">There are three different options available for CrazySimpleCMS Content
                    Management System. The <span>Standard</span> Plan is a robust website editor that works for most
                    application.  The <span>Professional</span> Plan includes everything, PLUS the enhanced Data Base
                    Features. The <span>Premium</span> Plan is advance website editing tools.</p>
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
                        <img src="{{asset('admin/img/plan1.png')}}" alt="" />
                        <p>STANDARD</p>
                    </div>

                    <div class="planWhitewrap">
                        <p class="dollorHead">
                               <span class="only">(Only $5 per month)</span>
                            <img class="suy" src="{{asset('admin/img/chose.svg')}}" alt="">
                        </p>

                      
                        
                        <div class="for_span">
                              <span class="span1">$60</span>
                            <span class="span2">/Yearly</span>
                        </div>

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
                            <span class="only">(Only $5 per month)</span>
                            <img class="suy" src="{{asset('admin/img/chose1.svg')}}" alt="">
                        </p>
                        <div class="for_span">
                            <span class="span1">$96</span>
                            <span class="span2">/Yearly</span>
                        </div>
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
                             <span class="only">(Only $5 per month)</span>
                            <img class="suy" src="{{asset('admin/img/chose2.svg')}}" alt="">
                        </p>
                        <div class="for_span">
                             <span class="span1">$192</span>
                            <span class="span2">/Yearly</span>
                        </div>

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

<script>
    let st = document.querySelector("#srt");
    st.classList.add("song");
</script>
@endsection