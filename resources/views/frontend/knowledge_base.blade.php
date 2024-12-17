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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {

            font-family: "Poppins", sans-serif;

        }
         h1,h2,h3,h4,h5,label{
             overflow:hidden;
         }
         
       .systeml{
        display: flex;
        justify-content: end;
       }
       .systeml input{
        outline: none;
        border: 1px solid #000000;
        padding:10px 10px;
        border-radius: 5px;
       }
        .background-news {

            background-image: url("https://res.cloudinary.com/dgif730br/image/upload/v1733829610/kushel_digi_knowledge_base-01_jghemz.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin-top:5rem;


        }

        .main-content {

            padding: 140px 55px 135px 55px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            /*margin-top: 4rem !important;*/

        }

        .main-cover-content {

            gap: 15px;
           

        }

        .head-part-1 h5 {

            color: #ffffff;
            font-size: 30px !important;
            font-weight: 700;
            /* line-height: 20px; */

        }

        .head-part-3 {

            color: #ffffff;
            font-size: 20px !important;
            font-weight: 400;
            /* line-height: 20px; */

        }

        .event h2 {

            color: #ffffff;
            font-size: 34px !important;
            font-weight: 700;

        }

        .col-three {
            padding: 40px 60px 50px 60px !important;
        }

        .main-content-hoot {
            justify-content: center;
        }

        .apple button {

            border: 1px solid #535559 !important;
            border-radius: 0px !important;

        }

        /* .apple
    {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    } */

        .rander:hover {

            background-color: #FF751C !important;
            border: none !important;
            color: #ffffff !important;
        }

        .first-one {

            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.05em;
            width: 71px;
            height: 37px;
        }

        .second-one {

            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.05em;
            width: auto;
            height: 37px;

        }

        .third-one {

            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.05em;
            width: auto;
            height: 37px;

        }

        .fourth-one {

            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.05em;
            width: 156px;
            height: 37px;

        }

        .rander {

            color: #535559 !important;

        }


        .cont-color-grey {

            background: #F6F8FA;

        }

        .read-more {
            color: #0F3D5F;

        }

        .read-more:hover {

            color: #253746 !important;

        }

        .eleven-headinf-main-head h2 {
            text-align: center;
            color: #222222;
            font-size: 34px;
            font-weight: 400;
            line-height: 44px;
            margin-bottom: 50px;
        }

        .eleven-headinf-main-head h2 span {
            font-weight: 600;
        }

        .eleven-card {
            border: none !important;
        }

        .insta-certify-eleven {
            background-color: #F6F8FA;
        }

        .insta-certify-eleven-container {
            display: block;
            margin: auto;
            max-width: 1440px;
            width: 100%;
            padding: 60px 100px;
        }

        .eleven-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;

        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }

        .card-titless {
            color: #222222;
            font-size: 20px;
            font-weight: 600;
            line-height: 30px;
            text-align: left;
            max-width: 13em;
            width: 100%;
        }

        .elevensection-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 40px;
        }

        .elevensection-btn button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 20px;
            border-radius: 30px;
            background-color: #fff;
            color: #444444;
            border: none;
            font-size: 14px;
            font-weight: 400;
            line-height: 19.92px;
            text-align: left;

        }

        .button-down-content {

            display: flex;
            justify-content: center;
            justify-content: center;
            gap: 12px;
            margin-top: 15px;

        }

        .shantara-hover:hover {

            background-color: #EC691F !important;
            border-color: #EC691F !important;

        }

        .dairy:hover {

            background-color: #343a40 !important;
            border-color: #343a40 !important;
        }

        .aeri:hover path {

            fill: white;

        }

        .last {

            background-image: url("https://admin.instacertify.com/backend/admin/media/background-last.png");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            padding: 60px;

        }

        .head-yet h2 {

            font-size: 30px;
            font-weight: 500;
            line-height: 51px;
            color: #FFFFFF;
            margin-bottom: 30px !important;
        }

        .main-content-1 {

            flex-direction: column;
            align-items: center;
            gap: 20px;

        }

        .hash-code {

            background-color: #FF751C !important;

        }

        .input-part {

            gap: 25px;

        }

        .input-part input {

            border-radius: 7px;
            border: none !important;
            padding: 13px 15px;
            outline: none !important;

        }

        .input-part label {

            color: #fff;
            font-size: 16px;
            font-weight: 500;
            line-height: 20px;
            text-align: left;

        }

        .name-input {

            flex-direction: column;
            font-size: 15px;
            font-weight: 500;
            line-height: 20px;
            color: #FFFFFF;

        }

        .email-input {

            flex-direction: column;
            font-size: 15px;
            font-weight: 500;
            line-height: 20px;
            color: #FFFFFF;

        }

        .phone-input {

            flex-direction: column;
            font-size: 15px;
            font-weight: 500;
            line-height: 20px;
            color: #FFFFFF;


        }

        .btn-submit {

            margin-top: 35PX;
            border: none;
            border-radius: 5px;

        }

        .btn-submit button {

            color: #FFFFFF;
            padding: 7px 60px !important;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            text-align: left;

        }



        @media(max-width:962px) {

            .insta-certify-eleven-container {
                padding: 40px;
            }
        }

        @media(max-width:870px) {

            .card-body h2 {
                font-size: 14px !important;
                line-height: 23px !important;
            }

            .read-more {
                font-size: 13px;
            }

            .col-three {
                padding: 40px 30px 50px 30px !important;
            }
        }

        @media(max-width:700px) {

            .input-part {

                flex-direction: column;
                width: 100%;

            }

            .col-three {
                padding: 40px 115px 50px 115px !important;
            }
        }

        @media(max-width:450px) {

            .apple {
                display: flex;
                flex-wrap: wrap;
            }
        }

        @media(max-width:365px) {
            .card-body h2 {
                font-size: 16px !important;
                line-height: 25px !important;
            }

            .col-three {
                padding: 40px 20px 50px 20px !important;
            }
        }

        @media(max-width:320px) {
            .main-content {
                padding: 100px 50px 90px 40px;
            }

            .card-body h2 {
                font-size: 13px !important;
                line-height: 20px !important;
            }

            .read-more {
                font-size: 12px;
            }

            .button-down-content {
                gap: 10px;
                margin-top: 10px;
            }

            .col-three {
                padding: 40px 15px 50px 15px !important;
            }
        }
    </style>

<x-front-header-component />

<section id="what_we_do" class="ahte_are">
   <div id="event-update">


        <section class="background-news">



            <div class="container">
                <div class="row ">
                    <div class=" col-md-12 content">


                        <div class="main-content">

                            <div class="main-cover-content d-flex  align-middle">

                                <div class="head-part-1">
                                    <h5>Knowledge base</h5>
                                </div>


                                <!--<div class="head-svg-2">-->
                                <!--    <svg width="12" height="20" viewBox="0 0 12 20" fill="none"-->
                                <!--        xmlns="http://www.w3.org/2000/svg">-->
                                <!--        <path-->
                                <!--            d="M2.35658 19.1666L0.729492 17.5395L8.26908 9.99992L0.729492 2.46034L2.35658 0.833252L11.5232 9.99992L2.35658 19.1666Z"-->
                                <!--            fill="white"></path>-->
                                <!--    </svg>-->
                                <!--</div>-->

                                <!--<div class="head-part-3">-->
                                <!--    <h5>Resource</h5>-->
                                <!--</div>-->

                            </div>

                            <!--<div class="event">-->
                            <!--    <h2>News</h2>-->
                            <!--</div>-->


                        </div>
                    </div>
                </div>
            </div>


        </section>


        <section class="cont-color-grey">


            <div class="container col-three">
                <div class="systeml">
                   <input type="search" id="searchBox" placeholder="Search">
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="main-content-hoot d-flex">

                            <div class="btn-group  apple" role="group" aria-label="Default button group">

                                <a href="{{url('/')}}/knowledge-base"  class="btn btn-outline-secondary first-one rander">ALL</a>
                                @foreach($blogCategory as $bc)
                                <a href="{{url('/')}}/knowledge-base?limit=10&offset=0&category_id={{$bc->id}}"
                                    class="btn btn-outline-secondary second-one rander">{{$bc->category_name}}</a>
                                @endforeach

                            </div>

                        </div>



                        <div class="container eleven-headinf-main mt-5">
                            <div class="row eleven-flex-wrap">
                                <!-- First Row -->
                                @foreach($blogs as $blog)
                                <div class="col-md-4 mb-4">
                                    <div class="card eleven-card">
                                        <img src="{{ url('/').'/'.$blog->image }}"
                                            class="card-img-top" alt="Card image">
                                        <div class="card-body">
                                            <h2 class="card-titless">{{$blog->name}}
                                            </h2>
                                            <a href="{{ url('/').'/knowledge-base-detail/'.$blog->id }}" class="read-more">VIEW SECTION</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>


                        </div>



                    </div>
                </div>
            </div>




        </section>


        <!--<section>-->

        <!--    <div class="container-fluid  last">-->

        <!--        <div class="row">-->

        <!--            <div class="col-md-12">-->

        <!--                <div class="main-content-1 d-flex">-->

        <!--                    <div class="head-yet">-->

        <!--                        <h2>Request A Call Back</h2>-->

        <!--                    </div>-->

        <!--                    <div class="input-part d-flex ">-->

        <!--                        <div class="name-input d-flex">-->
        <!--                            <label for="full-name">Full Name</label>-->
        <!--                            <input type="text" placeholder="Enter your name...">-->
        <!--                        </div>-->

        <!--                        <div class="email-input d-flex">-->
        <!--                            <label for="e-mail">Email Address</label>-->
        <!--                            <input type="email" placeholder=" Your email address...">-->
        <!--                        </div>-->

        <!--                        <div class="phone-input d-flex">-->
        <!--                            <label for="phone">Phone</label>-->
        <!--                            <input type="number" placeholder="Phone Number">-->
        <!--                        </div>-->

        <!--                    </div>-->

        <!--                    <div class="btn-submit">-->

        <!--                        <button class="btn hash-code" type="submit">Submit</button>-->

        <!--                    </div>-->



        <!--                </div>-->

        <!--            </div>-->

        <!--        </div>-->

        <!--    </div>-->

        <!--</section>-->




<script>
    document.getElementById('searchBox').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            var searchValue = event.target.value;
            var url = '{{url('/')}}/knowledge-base?search=' + encodeURIComponent(searchValue) + '&limit=10&offset=0';
            window.location.href = url;
        }
    });
</script>


    </div>
</section>

@endif

@endsection