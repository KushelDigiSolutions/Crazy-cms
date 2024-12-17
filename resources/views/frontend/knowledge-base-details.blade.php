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

/*---------------------------
	Fonts
----------------------------*/
@import url("https://fonts.googleapis.com/css?family=Hind:400,600|Montserrat:600,700");

/*--------------------------------------------------------------
#0.1    Theme Reset Style
--------------------------------------------------------------*/
html {
  font-size: 15px;
}

body {
  font-family: "Hind", sans-serif;
  font-size: 15px;
  font-size: 1rem;
  -webkit-font-smoothing: antialiased;
  overflow-x: hidden;
}

@media (max-width: 767px) {
  body {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

p {
  font-family: "Montserrat", sans-serif;
  color: black;
  line-height: 1.8em;
  margin-bottom: 30px;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Montserrat", sans-serif;
  font-weight: bold;
  color: #272443;
  margin: 0 0 0.4em;
}

ul {
  padding-left: 0;
  margin: 0;
  list-style-position: inside;
}

a {
  text-decoration: none;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

a:hover,
a:focus {
  text-decoration: none;
}

a:focus {
  outline: none !important;
}

img {
  max-width: 100%;
  height: auto;
}

/*--------------------------------------------------------------
#0.2    Global Elements
--------------------------------------------------------------*/
.page-wrapper {
  position: relative;
  overflow: hidden;
}

.float-right {
  float: right;
}

.wow {
  visibility: hidden;
}

.fi:before {
  margin: 0;
}

.section-padding {
  /* padding: 100px 0; */
}

@media (max-width: 1199px) {
  .section-padding {
    padding: 80px 0;
  }
}

@media (max-width: 767px) {
  .section-padding {
    padding: 70px 0;
  }
}

/*** contact form error handling ***/
.contact-validation-active .error-handling-messages {
  width: 100%;
  margin-top: 15px;
  clear: both;
}

.contact-validation-active label.error {
  color: red !important;
  font-size: 0.93333rem;
  font-weight: normal;
  margin: 5px 0 0 0;
}

.contact-validation-active #loader,
.contact-validation-active #loader-2 {
  display: none;
  margin-top: 10px;
}

.contact-validation-active #success,
.contact-validation-active #success-2,
.contact-validation-active #error,
.contact-validation-active #error-2 {
  width: 100%;
  color: #fff;
  padding: 5px 10px;
  font-size: 16px;
  text-align: center;
  display: none;
}

@media (max-width: 767px) {

  .contact-validation-active #success,
  .contact-validation-active #success-2,
  .contact-validation-active #error,
  .contact-validation-active #error-2 {
    font-size: 15px;
  }
}

.contact-validation-active #success,
.contact-validation-active #success-2 {
  background-color: #009a00;
  border-left: 5px solid green;
  margin-bottom: 5px;
}

.contact-validation-active #error,
.contact-validation-active #error-2 {
  background-color: #ff1a1a;
  border-left: 5px solid red;
}

.contact-validation-active #loader {
  text-align: center;
  color: #fff;
  font-size: 8px;
  font-size: 0.53333rem;
}

/*** back to top **/
.back-to-top {
  background-color: #df1741;
  width: 45px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  display: none;
  position: fixed;
  z-index: 999;
  right: 15px;
  bottom: 15px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -o-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
}

@media (max-width: 991px) {
  .back-to-top {
    width: 35px;
    height: 35px;
    line-height: 35px;
  }
}

.back-to-top:hover {
  background-color: #df1741;
}

.back-to-top i {
  font-size: 18px;
  font-size: 1.2rem;
  color: #fff;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

/** for popup image ***/
.mfp-wrap {
  background-color: rgba(0, 0, 0, 0.9);
  z-index: 99999;
}

.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
  opacity: 0;
  -webkit-backface-visibility: hidden;
  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  -o-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;
}

.mfp-with-zoom.mfp-ready .mfp-container {
  opacity: 1;
}

.mfp-with-zoom.mfp-ready.mfp-bg {
  opacity: 0.8;
}

.mfp-with-zoom.mfp-removing .mfp-container,
.mfp-with-zoom.mfp-removing.mfp-bg {
  opacity: 0;
}

/*** for fancybox video ***/
.fancybox-overlay {
  background: rgba(0, 0, 0, 0.9);
  z-index: 9999 !important;
}

.fancybox-wrap {
  z-index: 99999 !important;
}

/**** style for box layout ***/
.box-layout {
  /*** style for box layout ***/
}

@media screen and (min-width: 1200px) {
  .box-layout {
    width: 100%;
    height: 100%;
    background: url("../images/body-bg.jpg") center center/auto repeat fixed;
  }
}

@media screen and (min-width: 1200px) {
  .box-layout .page-wrapper {
    background-color: #fff;
    width: 1250px;
    margin: 50px auto 0;
  }
}

.section-title,
.section-title-white,
.section-title-s2,
.section-title-s5,
.section-title-s6,
.section-title-s7 {
  margin-bottom: 35px;
}

@media (max-width: 991px) {

  .section-title,
  .section-title-white,
  .section-title-s2,
  .section-title-s5,
  .section-title-s6,
  .section-title-s7 {
    margin-bottom: 35px;
  }
}

.section-title h2,
.section-title-white h2,
.section-title-s2 h2,
.section-title-s5 h2,
.section-title-s6 h2,
.section-title-s7 h2 {
  font-size: 30px;
  font-size: 2rem;
  text-transform: uppercase;
  margin: 0;
  padding-bottom: 0.5em;
  position: relative;
  letter-spacing: -1px;
}

@media (max-width: 1199px) {

  .section-title h2,
  .section-title-white h2,
  .section-title-s2 h2,
  .section-title-s5 h2,
  .section-title-s6 h2,
  .section-title-s7 h2 {
    font-size: 27px;
    font-size: 1.8rem;
  }
}

@media (max-width: 991px) {

  .section-title h2,
  .section-title-white h2,
  .section-title-s2 h2,
  .section-title-s5 h2,
  .section-title-s6 h2,
  .section-title-s7 h2 {
    font-size: 24px;
    font-size: 1.6rem;
  }
}

@media (max-width: 767px) {

  .section-title h2,
  .section-title-white h2,
  .section-title-s2 h2,
  .section-title-s5 h2,
  .section-title-s6 h2,
  .section-title-s7 h2 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

.section-title h2:before,
.section-title-white h2:before,
.section-title-s2 h2:before,
.section-title-s5 h2:before,
.section-title-s6 h2:before,
.section-title-s7 h2:before {
  content: "";
  background-color: #df1741;
  width: 33px;
  height: 5px;
  position: absolute;
  left: 0;
  bottom: 0;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -o-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
}

@media (max-width: 767px) {

  .section-title h2:before,
  .section-title-white h2:before,
  .section-title-s2 h2:before,
  .section-title-s5 h2:before,
  .section-title-s6 h2:before,
  .section-title-s7 h2:before {
    height: 3px;
  }
}

.section-title-white h2 {
  color: #fff;
}

.section-title-s2,
.section-title-s5,
.section-title-s6,
.section-title-s7 {
  text-align: center;
}

.section-title-s2 h2,
.section-title-s5 h2,
.section-title-s6 h2,
.section-title-s7 h2,
.section-title-s2 p,
.section-title-s5 p,
.section-title-s6 p,
.section-title-s7 p {
  color: #fff;
}

.section-title-s2 h2:before,
.section-title-s5 h2:before,
.section-title-s6 h2:before,
.section-title-s7 h2:before {
  left: 50%;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
}

.section-title-s2 h2,
.section-title-s5 h2,
.section-title-s6 h2,
.section-title-s7 h2 {
  margin: 0 0 0.83em;
}

.section-title-s2 p,
.section-title-s5 p,
.section-title-s6 p,
.section-title-s7 p {
  margin: 0;
}

@media screen and (min-width: 1200px) {

  .section-title-s2 p,
  .section-title-s5 p,
  .section-title-s6 p,
  .section-title-s7 p {
    padding: 0 45px;
  }
}

.section-title-s3,
.section-title-s4 {
  margin-bottom: 30px;
}

.section-title-s3 h2,
.section-title-s4 h2 {
  font-size: 30px;
  font-size: 2rem;
  line-height: 1.33em;
  margin: 0.13em 0 0;
  padding-bottom: 0.3em;
  position: relative;
}

@media (max-width: 1199px) {

  .section-title-s3 h2,
  .section-title-s4 h2 {
    font-size: 27px;
    font-size: 1.8rem;
  }
}

@media (max-width: 991px) {

  .section-title-s3 h2,
  .section-title-s4 h2 {
    font-size: 24px;
    font-size: 1.6rem;
  }
}

@media (max-width: 767px) {

  .section-title-s3 h2,
  .section-title-s4 h2 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

.section-title-s3 h2:before,
.section-title-s4 h2:before {
  content: "";
  background-color: #df1741;
  width: 80px;
  height: 2px;
  position: absolute;
  left: 0;
  bottom: 0;
}

.section-title-s3>span,
.section-title-s4>span {
  color: #9a9a9a;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.section-title-s4 h2 {
  margin: 0 0 0.83em;
}

.section-title-s5 h2,
.section-title-s6 h2,
.section-title-s7 h2 {
  color: #272443;
}

.section-title-s5 p,
.section-title-s6 p,
.section-title-s7 p {
  color: #6a6a6a;
}

.section-title-s6 h2,
.section-title-s7 h2 {
  text-transform: none;
}

.section-title-s6 h2:before,
.section-title-s7 h2:before {
  display: none;
}

.section-title-s7 h2 {
  padding-bottom: 0;
}

.theme-btn,
.theme-btn-s2,
.theme-btn-s3,
.theme-btn-s4,
.theme-btn-s5 {
  background-color: #df1741;
  font-size: 16px;
  font-size: 1.06667rem;
  font-weight: 600;
  color: white;
  padding: 5px 28px;
  border: 2px solid #df1741;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -o-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
}

.theme-btn:hover,
.theme-btn-s2:hover,
.theme-btn-s3:hover,
.theme-btn-s4:hover,
.theme-btn-s5:hover {
  background-color: #020b12;
  color: #fff;
}

@media (max-width: 1199px) {

  .theme-btn,
  .theme-btn-s2,
  .theme-btn-s3,
  .theme-btn-s4,
  .theme-btn-s5 {
    font-size: 15px;
    font-size: 1rem;
    padding: 4px 22px;
  }
}

@media (max-width: 991px) {

  .theme-btn,
  .theme-btn-s2,
  .theme-btn-s3,
  .theme-btn-s4,
  .theme-btn-s5 {
    font-size: 14px;
    font-size: 0.93333rem;
    padding: 4px 20px;
  }
}

@media (max-width: 767px) {

  .theme-btn,
  .theme-btn-s2,
  .theme-btn-s3,
  .theme-btn-s4,
  .theme-btn-s5 {
    font-size: 13px;
  }
}

.theme-btn-s2 {
  background-color: #020b12;
  color: #fff;
}

.theme-btn-s2:hover {
  background-color: #df1741;
  color: #272443;
}

.theme-btn-s3:hover {
  border-color: #272443;
  color: #df1741;
}

.theme-btn-s4 {
  background-color: #272443;
  border-color: #272443;
  color: #df1741;
}

.theme-btn-s4:hover {
  background-color: #df1741;
  border-color: #df1741;
  color: #272443;
}

.theme-btn-s5 {
  background-color: transparent;
  border: 2px solid #df1741;
  color: #fff;
}

.theme-btn-s5:hover {
  background-color: #df1741;
}

.form input,
.form textarea,
.form select {
  border-color: #bfbfbf;
  border-radius: 0;
  outline: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: #595959;
}

.form input:focus,
.form textarea:focus,
.form select:focus {
  border-color: #272443;
  -webkit-box-shadow: 0 0 5px 0 #0b3356;
  -moz-box-shadow: 0 0 5px 0 #0b3356;
  -o-box-shadow: 0 0 5px 0 #0b3356;
  -ms-box-shadow: 0 0 5px 0 #0b3356;
  box-shadow: 0 0 5px 0 #0b3356;
}

.form ::-webkit-input-placeholder {
  font-style: 14px;
  font-style: italic;
  color: #595959;
}

.form :-moz-placeholder {
  font-style: 14px;
  font-style: italic;
  color: #595959;
}

.form ::-moz-placeholder {
  font-style: 14px;
  font-style: italic;
  color: #595959;
}

.form :-ms-input-placeholder {
  font-style: 14px;
  font-style: italic;
  color: #595959;
}

.wpcf7-form input,
.wpcf7-form textarea,
.wpcf7-form select {
  display: block;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border-color ease-in-out .15s,
    -webkit-box-shadow ease-in-out .15s;
  -o-transition: border-color ease-in-out .15s,
    box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s,
    -webkit-box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s,
    box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s,
    box-shadow ease-in-out .15s,
    -webkit-box-shadow ease-in-out .15s;
}

.wpcf7-form select {
  font-style: normal;
  background-image: url(../images/select-icon.png);
  background-repeat: no-repeat;
  background-position: calc(100% - 15px) center;
  display: inline-block;
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  cursor: pointer;
}

.wpcf7-form select::-ms-expand {
  /* for IE 11 */
  display: none;
}

.social-links {
  overflow: hidden;
  list-style-type: none;
}

.social-links li {
  float: left;
}

.social-links li a {
  display: block;
  text-align: center;
}

/******************************
	#blog grids
******************************/
.page-title {
  background: url("../images/page-title.jpg") center center/cover no-repeat local;
  height: 260px;
  position: relative;
  width: 100%;
}

@media (max-width: 767px) {
  .page-title {
    height: 220px;
  }
}

.page-title:before {
  content: "";
  background-color: rgba(0, 0, 0, 0.3);
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.page-title .container {
  height: 100%;
  display: table;
}

.page-title .container>.row {
  vertical-align: middle;
  display: table-cell;
}

.page-title h2,
.page-title ol {
  color: #fff;
}

.page-title h2 {
  font-size: 48px;
  font-size: 3.2rem;
  font-weight: 800;
  margin: 1em 0 0.23em;
}

@media (max-width: 1199px) {
  .page-title h2 {
    font-size: 42px;
    font-size: 2.8rem;
  }
}

@media (max-width: 991px) {
  .page-title h2 {
    font-size: 35px;
    font-size: 2.33333rem;
  }
}

@media (max-width: 767px) {
  .page-title h2 {
    font-size: 28px;
    font-size: 1.86667rem;
    font-weight: bold;
  }
}

.page-title .breadcrumb {
  background-color: transparent;
  padding: 0;
}

@media (max-width: 767px) {
  .page-title .breadcrumb {
    text-align: center;
  }
}

.page-title .breadcrumb li {
  font-size: 18px;
  font-size: 1.2rem;
  color: #df1741;
  margin-right: 5px;
}

@media (max-width: 991px) {
  .page-title .breadcrumb li {
    font-size: 15px;
    font-size: 1rem;
  }
}

.page-title .breadcrumb li a {
  color: #fff;
}

.page-title .breadcrumb li a:hover {
  color: #df1741;
}

.page-title .breadcrumb>li+li:before {
  font-family: "FontAwesome";
  content: "\f105";
  color: #fff;
  margin-right: 5px;
}

.preloader {
  width: 100%;
  background-color: #fff;
  width: 100%;
  height: 100%;
  position: fixed;
  z-index: 10001;
}

.preloader div {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

/*************************************
    = service grids
**************************************/
.services-grids {
  overflow: hidden;
}

.services-grids .inner {
  min-height: 254px;
  position: relative;
  overflow: hidden;
}

@media (max-width: 1199px) {
  .services-grids .inner {
    min-height: 218px;
  }
}

.services-grids .details {
  width: 100%;
  height: 100%;
  padding: 60px 50px;
  position: absolute;
  left: 0;
  top: 57%;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  -ms-transition: all 0.5s;
  transition: all 0.5s;
}

@media (max-width: 1199px) {
  .services-grids .details {
    padding: 50px 30px;
  }
}

.services-grids .info {
  position: relative;
}

.services-grids .details h3 {
  padding-top: 50px;
  font-size: 18px;
  font-size: 1.2rem;
  color: black;
  font-weight: 600;
  margin: 0 0 1.2em;
}

@media (max-width: 1199px) {
  .services-grids .details h3 {
    font-size: 17px;
    font-size: 1.13333rem;
    margin: 0 0 1.2em;
  }
}

@media (max-width: 767px) {
  .services-grids .details h3 {
    font-size: 15px;
    font-size: 1rem;
    margin: 0 0 1.2em;
  }
}

.services-grids .details h3 i {
  background: #df1741;
  color: #272443;
  padding: 7px 10px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -o-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
  position: relative;
  left: -5px;
}

@media (max-width: 1199px) {
  .services-grids .details h3 i {
    padding: 5px 8px;
  }
}

.services-grids .details p {
  font-size: 14px;
  font-size: 0.93333rem;
  color: #fff;
  margin: 0 0 1.79em;
}

.services-grids .details .more {
  font-weight: 600;
  color: #272443;
  text-transform: capitalize;
}

.services-grids .grid:hover .details {
  background-color: #df1741;
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  top: 0;
}

.services-grids .grid:hover .details h3 {
  color: #272443;
  margin: 0 0 0.59em;
}

.services-grids .grid:hover .details h3 i {
  background: transparent;
}

.dots-s1 .owl-controls {
  margin-top: 0;
}

.dots-s1 .owl-dots {
  height: 15px;
  /* padding-left: 550px; */
}

.dots-s1 .owl-dots .owl-dot span {
  background: #bfbfbf;
  width: 8px;
  height: 8px;
  margin: 0 7px;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

.dots-s1 .owl-dots .owl-dot.active span,
.dots-s1 .owl-dots .owl-dot:hover span {
  background-color: #df1741;
}

.dots-s1 .owl-dots .owl-dot.active span {
  width: 9px;
  height: 9px;
}

.slider-arrow-s1 .owl-controls {
  margin-top: 0;
}

.slider-arrow-s1 .owl-controls .owl-nav .owl-prev,
.slider-arrow-s1 .owl-controls .owl-nav .owl-next {
  background-color: #df1741;
  width: 34px;
  height: 34px;
  line-height: 37px;
  font-size: 18px;
  font-size: 1.2rem;
  color: #272443;
  padding: 0;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

.slider-arrow-s1 .owl-controls .owl-nav .owl-prev:hover,
.slider-arrow-s1 .owl-controls .owl-nav .owl-next:hover {
  background-color: #df1741;
  color: #272443;
}

@media (max-width: 991px) {

  .slider-arrow-s1 .owl-controls .owl-nav .owl-prev,
  .slider-arrow-s1 .owl-controls .owl-nav .owl-next {
    width: 30px;
    height: 30px;
    line-height: 33px;
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.theme-accordion-s1 {
  margin-bottom: 0;
}

.theme-accordion-s1 .panel-default {
  background: transparent;
  border: 1px solid #dee0e1;
  border-radius: 0;
}

.theme-accordion-s1 .panel-group .panel+.panel {
  margin-top: 8px;
}

.theme-accordion-s1 .panel-heading {
  background-color: transparent;
  padding: 0;
  border-radius: 0;
}

.theme-accordion-s1 .panel-heading a {
  background-color: #df1741;
  font-size: 18px;
  font-size: 1.2rem;
  font-weight: 600;
  color: #222;
  display: block;
  padding: 15px 25px;
  position: relative;
}

@media (max-width: 1800px) {
  .theme-accordion-s1 .panel-heading a {
    background-color: #df1741;
  }
}

@media (max-width: 991px) {
  .theme-accordion-s1 .panel-heading a {
    font-size: 16px;
    font-size: 1.06667rem;
    padding: 12px 20px;
  }
}

@media (max-width: 767px) {
  .theme-accordion-s1 .panel-heading a {
    padding: 12px 15px;
  }
}

.theme-accordion-s1 .panel-heading a:before {
  font-family: "FontAwesome";
  content: "\f107";
  font-size: 20px;
  font-size: 1.33333rem;
  position: absolute;
  right: 25px;
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg);
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

@media (max-width: 991px) {
  .theme-accordion-s1 .panel-heading a:before {
    font-size: 18px;
    font-size: 1.2rem;
    right: 20px;
  }
}

.theme-accordion-s1 .panel-heading .collapsed {
  background-color: #fff;
}

.theme-accordion-s1 .panel-heading .collapsed:before {
  -webkit-transform: rotate(0);
  -ms-transform: rotate(0);
  transform: rotate(0);
}

.theme-accordion-s1 .panel-heading+.panel-collapse>.panel-body {
  background: rgba(255, 255, 255, 0.9);
  border: 0;
  padding: 24px 33px 12px;
}

@media (max-width: 1800px) {
  .theme-accordion-s1 .panel-heading+.panel-collapse>.panel-body {
    background-color: #fff;
  }
}

@media (max-width: 991px) {
  .theme-accordion-s1 .panel-heading+.panel-collapse>.panel-body {
    padding: 20px 20px 10px;
  }
}

@media (max-width: 767px) {
  .theme-accordion-s1 .panel-heading+.panel-collapse>.panel-body {
    padding: 15px 15px 8px;
  }
}

/*************************************
    = team grids
**************************************/
.team-grids .team-grid {
  overflow: hidden;
  position: relative;
}

.team-grids .member-pic-social {
  position: relative;
  overflow: hidden;
}

.team-grids .social {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  -webkit-transition: all 0.6s;
  -moz-transition: all 0.6s;
  -o-transition: all 0.6s;
  -ms-transition: all 0.6s;
  transition: all 0.6s;
}

.team-grids .social-links {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  z-index: 11;
  opacity: 0;
}

.team-grids .member-pic-social:hover .social-links {
  opacity: 1;
}

.team-grids .social-links>li+li {
  margin-left: 20px;
}

.team-grids .social-links li a {
  font-size: 24px;
  font-size: 1.6rem;
  color: #fff;
}

@media (max-width: 1199px) {
  .team-grids .social-links li a {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

.team-grids .social-links li a:hover {
  color: #272443;
}

.team-grids .member-info {
  text-align: center;
  padding-top: 25px;
}

.team-grids .member-info h3 {
  font-size: 22px;
  font-size: 1.46667rem;
  margin: 0 0 3px;
}

@media (max-width: 1199px) {
  .team-grids .member-info h3 {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

@media (max-width: 991px) {
  .team-grids .member-info h3 {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

@media (max-width: 991px) {
  .team-grids .member-info p {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.team-grids .owl-controls .owl-nav {
  width: 100%;
  position: absolute;
  left: 0;
  top: 59%;
  z-index: 10;
}

@media (max-width: 1199px) {
  .team-grids .owl-controls .owl-nav {
    display: none;
  }
}

.team-grids .owl-controls .owl-dots {
  position: relative;
  top: 80px;
  z-index: 10;
}

@media (max-width: 1199px) {
  .team-grids .owl-controls .owl-dots {
    top: 0;
  }
}

.team-grids .owl-controls .owl-nav .owl-prev,
.team-grids .owl-controls .owl-nav .owl-next {
  background: transparent;
  font-size: 24px;
  font-size: 1.6rem;
  color: #272443;
  padding: 0;
  position: absolute;
}

.team-grids .owl-controls .owl-nav .owl-prev:hover,
.team-grids .owl-controls .owl-nav .owl-next:hover {
  background: transparent;
  color: #df1741;
}

.team-grids .owl-controls .owl-nav .owl-prev {
  left: -65px;
}

.team-grids .owl-controls .owl-nav .owl-next {
  right: -65px;
}

.team-grids .owl-controls .owl-dots .active span,
.team-grids .owl-controls .owl-dots .owl-dot:hover span {
  background: #df1741;
}

.square-hover-effect {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  z-index: 10;
}

.square-hover-effect .hover-1,
.square-hover-effect .hover-2,
.square-hover-effect .hover-3,
.square-hover-effect .hover-4 {
  background: #df1741;
  width: 50%;
  height: 50%;
  position: absolute;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  -ms-transition: all 0.5s;
  transition: all 0.5s;
  opacity: 0;
}

.square-hover-effect .hover-1 {
  left: 0;
  top: 0;
}

.square-hover-effect .hover-2 {
  left: 50%;
  top: 0;
}

.square-hover-effect .hover-3 {
  left: 50%;
  top: 50%;
}

.square-hover-effect .hover-4 {
  left: 0;
  top: 50%;
}

.square-hover-effect:hover .hover-1,
.square-hover-effect-parent:hover .hover-1 {
  left: 50%;
  top: 0;
  opacity: 1;
}

.square-hover-effect:hover .hover-2,
.square-hover-effect-parent:hover .hover-2 {
  left: 50%;
  top: 50%;
  opacity: 1;
}

.square-hover-effect:hover .hover-3,
.square-hover-effect-parent:hover .hover-3 {
  left: 0%;
  top: 50%;
  opacity: 1;
}

.square-hover-effect:hover .hover-4,
.square-hover-effect-parent:hover .hover-4 {
  left: 0%;
  top: 0%;
  opacity: 1;
}

/*************************************
    = service sinle sidebar
**************************************/
@media screen and (min-width: 992px) {
  .service-single-sidebar {
    padding-right: 40px;
  }
}

@media (max-width: 991px) {
  .service-single-sidebar {
    margin-top: 80px;
  }
}

.service-single-sidebar ul {
  list-style-type: none;
}

.service-single-sidebar>.widget+.widget {
  margin-top: 50px;
}

.service-single-sidebar .services-link-widget ul>li+li {
  margin-top: 10px;
}

.service-single-sidebar .services-link-widget ul li a {
  background-color: #f5f2f2;
  font-weight: 600;
  color: #242424;
  padding: 14px 20px;
  display: block;
  /* text-transform: uppercase; */
}

@media (max-width: 1199px) {
  .service-single-sidebar .services-link-widget ul li a {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

@media (max-width: 767px) {
  .service-single-sidebar .services-link-widget ul li a {
    font-size: 12px;
    font-size: 0.8rem;
    padding: 10px 15px;
  }
}

.service-single-sidebar .services-link-widget ul li a:hover,
.service-single-sidebar .services-link-widget ul li.current a {
  background-color: #df1741;
}

.service-single-sidebar .download-brocher-widget a {
  background-color: #df1741;
  font-size: 18px;
  font-size: 1.2rem;
  font-weight: 600;
  color: #fff;
  padding: 17px 20px 17px 50px;
  position: relative;
  display: block;
  text-transform: uppercase;
}

@media (max-width: 1199px) {
  .service-single-sidebar .download-brocher-widget a {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

@media (max-width: 767px) {
  .service-single-sidebar .download-brocher-widget a {
    font-size: 13px;
    font-size: 0.86667rem;
    padding: 10px 15px 10px 40px;
  }
}

.service-single-sidebar .download-brocher-widget a i {
  background-color: #272443;
  padding: 5px 10px;
  position: absolute;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.service-single-sidebar .contact-widget {
  border: 2px solid #e9e9e9;
  padding: 30px 25px;
}

.service-single-sidebar .contact-widget h3 {
  font-size: 20px;
  font-size: 1.33333rem;
  margin: 0 0 0.8em;
}

@media (max-width: 991px) {
  .service-single-sidebar .contact-widget h3 {
    font-size: 17px;
    font-size: 1.13333rem;
  }
}

.service-single-sidebar .contact-widget p {
  margin: 0;
}

/**** pagination ****/
.pagination-wrapper {
  text-align: center;
}

.pagination-wrapper .pg-pagination {
  display: inline-block;
  overflow: hidden;
  list-style-type: none;
}

.pagination-wrapper .pg-pagination li {
  float: left;
  margin-right: 10px;
}

@media (max-width: 767px) {
  .pagination-wrapper .pg-pagination li {
    margin-right: 5px;
  }
}

.pagination-wrapper .pg-pagination li:last-child {
  margin-right: 0;
}

.pagination-wrapper .pg-pagination li a {
  font-family: "Montserrat", sans-serif;
  background-color: #272443;
  display: block;
  width: 35px;
  height: 35px;
  line-height: 35px;
  color: #fff;
  font-weight: 500;
}

@media (max-width: 767px) {
  .pagination-wrapper .pg-pagination li a {
    width: 30px;
    height: 30px;
    line-height: 30px;
  }
}

.pagination-wrapper .pg-pagination .active a,
.pagination-wrapper .pg-pagination li a:hover {
  background-color: #df1741;
  color: #272443;
}

/*** blog-sidebar ***/
@media (max-width: 991px) {
  .blog-sidebar {
    margin-top: 80px;
  }
}

@media (max-width: 767px) {
  .blog-sidebar {
    margin-top: 70px;
  }
}

.blog-sidebar .widget {
  margin-bottom: 75px;
}

@media (max-width: 991px) {
  .blog-sidebar .widget {
    margin-bottom: 60px;
  }
}

.blog-sidebar .widget ul {
  list-style: none;
}

.blog-sidebar .widget:last-child {
  margin-bottom: 0;
}

.blog-sidebar h3 {
  font-size: 20px;
  font-size: 1.33333rem;
  color: #0d0d0d;
  margin: 0 0 1.25em;
  text-transform: uppercase;
}

@media (max-width: 767px) {
  .blog-sidebar h3 {
    font-size: 17px;
    font-size: 1.13333rem;
  }
}

.blog-sidebar .category-widget ul li,
.blog-sidebar .archive-widget ul li {
  border-bottom: 1px solid #fff;
}

.blog-sidebar .category-widget ul li>a,
.blog-sidebar .archive-widget ul li>a {
  padding: 10px 0;
}

.blog-sidebar ul li {
  font-size: 15px;
  font-size: 1rem;
  font-weight: bold;
}

.blog-sidebar ul li>a {
  display: block;
  color: #404040;
  position: relative;
}

.blog-sidebar ul li:first-child a {
  padding-top: 0;
}

.blog-sidebar ul li:last-child a {
  padding-bottom: 0;
}

.blog-sidebar ul li:last-child {
  border: 0;
}

.blog-sidebar ul li>a:hover {
  color: #272443;
}

.blog-sidebar ul li>a .badge {
  background-color: transparent;
  font-size: 15px;
  font-size: 1rem;
  color: #404040;
  position: absolute;
  right: 5px;
}

.blog-sidebar ul li>a .badge:before,
.blog-sidebar ul li>a .badge:after {
  font-size: 14px;
  font-size: 0.93333rem;
  position: absolute;
  top: 3px;
}

.blog-sidebar ul li>a .badge:before {
  content: "(";
  left: 0;
}

.blog-sidebar ul li>a .badge:after {
  content: ")";
  right: 0;
}

.blog-sidebar .search-widget input {
  background-color: transparent;
  padding: 8px 12px;
  height: auto;
}

.blog-sidebar .search-widget input:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
  border-color: #272443;
}

@media (max-width: 767px) {
  .blog-sidebar .recent-post-widget ul {
    margin-left: -15px;
  }
}

.blog-sidebar .recent-post-widget ul li {
  border: 0;
  overflow: hidden;
  margin-bottom: 30px;
  position: relative;
}

@media (max-width: 767px) {
  .blog-sidebar .recent-post-widget ul li {
    padding: 0 0 40px 100px;
    overflow: visible;
  }
}

.blog-sidebar .recent-post-widget ul li:last-child {
  margin-bottom: 0;
}

.blog-sidebar .recent-post-widget .post-pic {
  width: 30%;
  float: left;
}

@media (max-width: 767px) {
  .blog-sidebar .recent-post-widget .post-pic {
    width: 70px;
    float: none;
    position: absolute;
    left: 15px;
  }
}

.blog-sidebar .recent-post-widget .details {
  width: 68%;
  float: right;
}

@media (max-width: 767px) {
  .blog-sidebar .recent-post-widget .details {
    width: 100%;
    float: none;
  }
}

.blog-sidebar .recent-post-widget .details>span {
  font-size: 12px;
  font-size: 0.8rem;
  color: #666666;
  text-transform: uppercase;
}

.blog-sidebar .recent-post-widget .details h4 {
  font-size: 14px;
  font-size: 0.93333rem;
  margin: 0.5em 0;
  text-transform: capitalize;
}

@media (max-width: 767px) {
  .blog-sidebar .recent-post-widget .details h4 {
    font-size: 13px;
    font-size: 0.86667rem;
    padding-top: 10px;
  }
}

.blog-sidebar .recent-post-widget .details h4 a {
  color: #000;
}

.blog-sidebar .recent-post-widget .details h4 a:hover {
  color: #272443;
}

.blog-sidebar .tag-widget .all-tags {
  margin-left: -12px;
}

.blog-sidebar .tag-widget .all-tags a {
  font-size: 15px;
  font-size: 1rem;
  font-weight: bold;
  color: gray;
  border: 0;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

.blog-sidebar .tag-widget .all-tags a:hover {
  color: #272443;
}

.blog-sidebar .instagram-widget ul {
  overflow: hidden;
  margin-right: -8px;
}

.blog-sidebar .instagram-widget ul li {
  width: 33.33%;
  float: left;
  padding: 0 8px 8px 0;
}

.blog-sidebar .instagram-widget ul li img {
  max-width: 100%;
}

@media (max-width: 767px) {
  .blog-sidebar .instagram-widget ul li img {
    width: 100%;
  }
}

/**** products grids ***/
.products-grids .grid {
  background-color: #fff;
  -webkit-box-shadow: 0 0 15px 0 #d9d9d9;
  -moz-box-shadow: 0 0 15px 0 #d9d9d9;
  -o-box-shadow: 0 0 15px 0 #d9d9d9;
  -ms-box-shadow: 0 0 15px 0 #d9d9d9;
  box-shadow: 0 0 15px 0 #d9d9d9;
  text-align: center;
}

.products-grids .img-holder img {
  display: inline-block;
}

.products-grids .img-holder-info-list {
  position: relative;
}

.products-grids .info-list {
  width: 152px;
  position: absolute;
  left: 50%;
  top: 60%;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  -ms-transition: all 0.5s;
  transition: all 0.5s;
}

@media (max-width: 767px) {
  .products-grids .info-list {
    width: 122px;
  }
}

.products-grids .info-list>div {
  width: 50px;
  float: left;
  margin-right: 1px;
}

@media (max-width: 767px) {
  .products-grids .info-list>div {
    width: 40px;
  }
}

.products-grids .info-list>div:last-child {
  margin-right: 0;
}

.products-grids .info-list>div a {
  background-color: #272443;
  height: 45px;
  display: block;
  text-align: center;
  padding: 10px 0;
}

@media (max-width: 767px) {
  .products-grids .info-list>div a {
    height: 40px;
    line-height: 40px;
    padding: 0;
  }
}

.products-grids .info-list>div a:hover {
  background-color: #020b12;
}

.products-grids .info-list>div img {
  display: inline-block;
}

@media (max-width: 767px) {
  .products-grids .info-list>div img {
    max-width: 17px;
  }
}

.products-grids .product-info {
  padding: 30px 15px;
  text-align: center;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

@media (max-width: 767px) {
  .products-grids .product-info {
    padding: 20px 15px;
  }
}

.products-grids .product-info h3 {
  font-size: 20px;
  font-size: 1.33333rem;
  margin: 0 0 0.4em;
}

@media (max-width: 767px) {
  .products-grids .product-info h3 {
    font-size: 18px;
    font-size: 1.2rem;
    margin: 0 0 0.4em;
  }
}

.products-grids .product-info h3 a {
  color: #000;
}

.products-grids .product-info .rating i {
  font-size: 18px;
  font-size: 1.2rem;
  color: #df1741;
}

@media (max-width: 1199px) {
  .products-grids .product-info .rating i {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

@media (max-width: 767px) {
  .products-grids .product-info .rating i {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.products-grids .product-info .price {
  font-size: 18px;
  font-size: 1.2rem;
  font-weight: 600;
  color: #999999;
  display: block;
  margin-top: 15px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

@media (max-width: 767px) {
  .products-grids .product-info .price {
    margin-top: 10px;
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.products-grids .grid:hover {
  -webkit-box-shadow: 0px 11px 35px -6px rgba(5, 24, 41, 0.5);
  -moz-box-shadow: 0px 11px 35px -6px rgba(5, 24, 41, 0.5);
  box-shadow: 0px 11px 35px -6px rgba(5, 24, 41, 0.5);
}

.products-grids .grid:hover .product-info {
  background-color: #272443;
}

.products-grids .grid:hover .product-info h3 a,
.products-grids .grid:hover .price {
  color: #fff;
}

.products-grids .grid:hover .info-list {
  opacity: 1;
  visibility: visible;
}

.shop .pagination-wrapper {
  padding-top: 50px;
  clear: both;
}

@media (max-width: 991px) {
  .shop .pagination-wrapper {
    padding-top: 30px;
  }
}

/*** shop sidebar ***/
.shop-sidebar {
  /*** range filtering ***/
}

@media (max-width: 1199px) {
  .shop-sidebar {
    margin-top: 80px;
  }
}

@media (max-width: 767px) {
  .shop-sidebar {
    margin-top: 70px;
  }
}

.shop-sidebar ul {
  list-style: none;
}

.shop-sidebar .widget {
  margin-bottom: 65px;
}

.shop-sidebar .widget:last-child {
  margin-bottom: 0;
}

.shop-sidebar .widget h3 {
  font-size: 20px;
  font-size: 1.33333rem;
  margin: 0 0 1.7em;
  padding-bottom: 0.6em;
  text-transform: uppercase;
  position: relative;
}

.shop-sidebar .widget h3:before {
  content: "";
  background-color: #272443;
  width: 30px;
  height: 2px;
  position: absolute;
  left: 0;
  bottom: 0;
}

@media (max-width: 991px) {
  .shop-sidebar .widget h3 {
    font-size: 18px;
  }
}

.shop-sidebar .widget>ul li {
  font-size: 14px;
  font-size: 0.93333rem;
}

.shop-sidebar .widget>ul li:first-child a {
  padding-top: 0;
}

.shop-sidebar .widget>ul li:last-child a {
  padding-bottom: 0;
  border-bottom: 0;
}

.shop-sidebar .widget>ul li a {
  display: block;
  font-weight: bold;
  color: #333333;
  padding: 9px 0;
  border-bottom: 1px solid #e6e6e6;
  position: relative;
}

.shop-sidebar .widget>ul li a:hover,
.shop-sidebar .widget>ul li a:hover .badge {
  color: #272443;
}

.shop-sidebar .widget>ul li a i {
  position: absolute;
  right: 18px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.shop-sidebar .widget>ul li a .badge {
  color: #333333;
  background: transparent;
  position: absolute;
  right: 7px;
}

.shop-sidebar .widget>ul li a .badge:before {
  content: "(";
  position: absolute;
  left: 0;
}

.shop-sidebar .widget>ul li a .badge:after {
  content: ")";
  position: absolute;
  right: 0;
}

.shop-sidebar .filter-price-widget .slider.slider-horizontal {
  width: 100%;
}

.shop-sidebar .filter-price-widget .slider.slider-horizontal .slider-track {
  background: #d9d9d9 !important;
  height: 2px;
  margin: 0;
}

.shop-sidebar .filter-price-widget .slider.slider-horizontal .slider-track .slider-selection {
  background: #404040 !important;
}

.shop-sidebar .filter-price-widget .slider.slider-horizontal .slider-handle {
  background: #272443;
  width: 14px;
  height: 14px;
  top: 3px;
}

.shop-sidebar .filter-price-widget .value {
  overflow: hidden;
  margin-top: 17px;
}

.shop-sidebar .filter-price-widget .value>div {
  display: inline-block;
  float: left;
}

.shop-sidebar .filter-price-widget .price {
  font-size: 14px;
  font-size: 0.93333rem;
  font-weight: bold;
  color: #999999;
  line-height: 30px;
  float: right !important;
}

.shop-sidebar .filter-price-widget .price #min-value,
.shop-sidebar .filter-price-widget .price #max-value {
  color: #000;
}

.shop-sidebar .filter-price-widget .price #max-value {
  display: inline-block;
  position: relative;
  padding-left: 15px;
}

.shop-sidebar .filter-price-widget .price #max-value:before {
  content: "";
  border-bottom: 1px solid #000;
  width: 10px;
  height: 1px;
  position: absolute;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.shop-sidebar .filter-price-widget .theme-btn,
.shop-sidebar .filter-price-widget .theme-btn-s2,
.shop-sidebar .filter-price-widget .theme-btn-s3,
.shop-sidebar .filter-price-widget .theme-btn-s4,
.shop-sidebar .filter-price-widget .theme-btn-s5 {
  height: 30px;
  line-height: 30px;
  font-size: 13px;
  font-size: 0.86667rem;
  font-weight: bold;
  padding: 0 17px;
  text-transform: uppercase;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  -o-border-radius: 15px;
  -ms-border-radius: 15px;
  border-radius: 15px;
}

.shop-sidebar .filter-price-widget .theme-btn:before,
.shop-sidebar .filter-price-widget .theme-btn-s2:before,
.shop-sidebar .filter-price-widget .theme-btn-s3:before,
.shop-sidebar .filter-price-widget .theme-btn-s4:before,
.shop-sidebar .filter-price-widget .theme-btn-s5:before {
  display: none;
}

.style-switcher-box {
  background-color: #fff;
  width: 252px;
  padding: 50px 25px;
  position: fixed;
  left: -252px;
  top: 15%;
  z-index: 999;
  border: 1px solid #d9d9d9;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

.style-switcher-box ul {
  list-style: none;
}

/* .style-switcher-box button {
  background-color: #272443;
  width: 45px;
  height: 45px;
  line-height: 40px;
  text-align: center;
  color: #000;
  font-size: 20px;
  border: 0;
  outline: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
  position: absolute;
  right: -45px;
  top: 50px;
} */

/* .style-switcher-box button i {
  color: #fff;
  -webkit-animation: rotating 2s linear infinite;
  animation: rotating 2s linear infinite;
} */

.style-switcher-box h5 {
  font-size: 18px;
  color: #000;
  text-align: center;
  margin: 0 0 2em;
  text-transform: uppercase;
}

.style-switcher-box .main-list>.list {
  margin-bottom: 30px;
}

.style-switcher-box .main-list>.list:last-child {
  margin-bottom: 0;
}

.style-switcher-box .list-title {
  display: block;
  font-size: 12px;
  border-bottom: 1px solid #cccccc;
  margin-bottom: 10px;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.style-switcher-box .list>.sublist {
  margin-bottom: 10px;
}

.style-switcher-box .list>.sublist:last-child {
  margin-bottom: 0;
}

.style-switcher-box .sublist span {
  display: block;
  font-size: 12px;
  margin-bottom: 5px;
}

.style-switcher-box .sublist ul {
  overflow: hidden;
}

.style-switcher-box .sublist ul li {
  float: left;
  min-width: 36px;
  min-height: 36px;
  margin: 0 5px 5px 0;
  cursor: pointer;
}

.style-switcher-box .sublist ul li:nth-child(5n+5) {
  margin-right: 0;
}

.style-switcher-box .layout ul li {
  background-color: #272443;
  min-height: 20px;
  color: #fff;
  padding: 5px 10px;
  font-size: 12px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
}

.style-switcher-box p {
  font-size: 11px;
  margin: 15px 0 0;
}

.style-switcher-box p span {
  color: #ff6666;
}

.toggle-switcherbox {
  left: 0;
}

/*** rotating ***/
@-webkit-keyframes rotating {
  form {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }

  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes rotating {
  form {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }

  to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
#0.3	header
--------------------------------------------------------------*/
.site-header {
  /* navigation open and close btn hide for width screen */
  /* style for navigation less than 992px */
  /*navbar collaps less then 992px*/
}

.site-header .navigation {
  background-color: #fff;
  margin-bottom: 0;
  border: 0;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  -o-border-radius: 0;
  -ms-border-radius: 0;
  border-radius: 0;
}

.site-header .navigation>.container {
  position: relative;
}

.site-header .navigation ul {
  list-style-type: none;
}

@media (max-width: 991px) {
  .site-header .navigation {
    min-height: 65px;
  }
}

.site-header #navbar {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  -ms-transition: all 0.5s;
  transition: all 0.5s;
  /*** mega-menu style ***/
}

.site-header #navbar>ul li a:hover,
.site-header #navbar>ul li a:focus {
  text-decoration: none;
  color: #272443;
}

@media screen and (min-width: 992px) {
  .site-header #navbar {
    /*** hover effect ***/
  }

  .site-header #navbar li {
    position: relative;
  }

  .site-header #navbar>ul>li>a {
    font-size: 15px;
    font-size: 1rem;
    color: #222;
  }

  .site-header #navbar>ul .sub-menu {
    background-color: #272443;
    width: 220px;
    position: absolute;
    left: 0;
    top: 130%;
    z-index: 10;
    visibility: hidden;
    opacity: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
    -ms-transition: all 0.3s;
    transition: all 0.3s;
  }

  .site-header #navbar>ul>li .sub-menu li {
    border-bottom: 1px solid #072037;
  }

  .site-header #navbar>ul>li .sub-menu>li:last-child {
    border-bottom: 0;
  }

  .site-header #navbar>ul>li .sub-menu a {
    font-size: 13px;
    font-size: 0.86667rem;
    color: #c3bfbf;
    display: block;
    padding: 11px 15px;
  }

  .site-header #navbar>ul>li .sub-menu a:hover {
    background-color: #df1741;
    color: #fff;
  }

  .site-header #navbar>ul>li>.sub-menu .sub-menu {
    left: 110%;
    top: 0;
  }

  .site-header #navbar>ul>li>.sub-menu>.menu-item-has-children>a {
    position: relative;
  }

  .site-header #navbar>ul>li>.sub-menu>.menu-item-has-children>a:before {
    font-family: "FontAwesome";
    content: "\f105";
    font-size: 15px;
    font-size: 1rem;
    position: absolute;
    right: 15px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  .site-header #navbar>ul>li:hover>.sub-menu {
    top: 100%;
    visibility: visible;
    opacity: 1;
  }

  .site-header #navbar .sub-menu>li:hover>.sub-menu {
    left: 100%;
    visibility: visible;
    opacity: 1;
  }
}

@media (max-width: 991px) {
  .site-header #navbar>ul>li a {
    display: block;
    font-size: 14px;
    font-size: 0.93333rem;
  }

  .site-header #navbar>ul>li .sub-menu li {
    border-bottom: 1px solid #e6e6e6;
  }

  .site-header #navbar>ul .sub-menu>li:last-child {
    border-bottom: 0;
  }

  .site-header #navbar>ul>li>.sub-menu a {
    padding: 8px 15px 8px 45px;
  }

  .site-header #navbar>ul>li>.sub-menu .sub-menu a {
    padding: 8px 15px 8px 65px;
  }

  .site-header #navbar>ul .menu-item-has-children>a {
    position: relative;
  }

  .site-header #navbar>ul .menu-item-has-children>a:before {
    font-family: "FontAwesome";
    content: "\f107";
    font-size: 15px;
    font-size: 1rem;
    position: absolute;
    right: 15px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }
}

@media screen and (min-width: 992px) {
  .site-header #navbar {
    /*** hover effect ***/
  }

  .site-header #navbar .has-mega-menu {
    position: static;
  }

  .site-header #navbar .mega-menu,
  .site-header #navbar .half-mega-menu {
    background-color: #fff;
    padding: 20px;
    border-top: 2px solid #272443;
    position: absolute;
    right: 0;
    top: 120%;
    z-index: 10;
    visibility: hidden;
    opacity: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
    -ms-transition: all 0.3s;
    transition: all 0.3s;
  }

  .site-header #navbar .mega-menu {
    width: 1140px;
    right: 15px;
  }

  .site-header #navbar .half-mega-menu {
    width: 585px;
  }

  .site-header #navbar .mega-menu-box-title {
    font-size: 14px;
    font-size: 0.93333rem;
    text-transform: uppercase;
    font-weight: bold;
    display: block;
    padding-bottom: 7px;
    margin-bottom: 7px;
    border-bottom: 1px solid #e6e6e6;
  }

  .site-header #navbar .mega-menu-list-holder li a {
    font-size: 14px;
    font-size: 0.93333rem;
    display: block;
    padding: 7px 8px;
    margin-left: -8px;
  }

  .site-header #navbar .has-mega-menu:hover>ul {
    top: 100%;
    visibility: visible;
    opacity: 1;
  }
}

@media (max-width: 1199px) {
  .site-header #navbar>ul .mega-menu {
    width: 950px;
    right: 15px;
  }

  .site-header #navbar>ul .half-mega-menu {
    width: 485px;
  }
}

@media (max-width: 991px) {

  .site-header #navbar>ul .mega-menu,
  .site-header #navbar>ul .half-mega-menu {
    width: auto;
  }

  .site-header #navbar>ul .mega-menu .row,
  .site-header #navbar>ul .half-mega-menu .row {
    margin: 0;
  }

  .site-header #navbar .mega-menu-content>.row>.col {
    margin-bottom: 25px;
  }
}

@media (max-width: 991px) {
  .site-header #navbar .mega-menu .mega-menu-list-holder a {
    padding: 5px 15px 5px 40px;
  }

  .site-header #navbar .mega-menu .mega-menu-box-title {
    font-size: 14px;
    font-size: 0.93333rem;
    text-transform: uppercase;
    display: block;
    border-bottom: 1px dotted #b3b3b3;
    padding: 0 0 4px 5px;
    margin: 0 25px 8px 25px;
  }
}

@media screen and (min-width: 992px) {
  .site-header .navbar-header .open-btn {
    display: none;
  }

  .site-header #navbar .close-navbar {
    display: none;
  }
}

@media (max-width: 991px) {
  .site-header {
    /* class for show hide navigation */
  }

  .site-header .container {
    width: 100%;
  }

  .site-header .navbar-header button {
    background-color: #272443;
    width: 40px;
    height: 35px;
    border: 0;
    padding: 5px 10px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    outline: 0;
    position: absolute;
    right: 15px;
    top: 15px;
    z-index: 20;
  }

  .site-header .navbar-header button span {
    background-color: #fff;
    display: block;
    height: 2px;
    margin-bottom: 5px;
  }

  .site-header .navbar-header button span:last-child {
    margin: 0;
  }

  .site-header #navbar {
    background: #fff;
    display: block !important;
    width: 280px;
    height: 100% !important;
    margin: 0;
    padding: 0;
    border-left: 1px solid #cccccc;
    border-right: 1px solid #cccccc;
    position: fixed;
    right: -300px;
    top: 0;
    z-index: 100;
  }

  .site-header #navbar ul a {
    color: #000;
  }

  .site-header #navbar ul a:hover,
  .site-header #navbar ul li.current a {
    color: #272443;
  }

  .site-header #navbar .navbar-nav {
    height: 100%;
    overflow: auto;
  }

  .site-header #navbar .close-navbar {
    background-color: #272443;
    width: 35px;
    height: 35px;
    color: #fff;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    outline: none;
    position: absolute;
    left: -18px;
    top: 10px;
    z-index: 20;
  }

  .site-header #navbar>ul>li {
    border-bottom: 1px solid #cccccc;
  }

  .site-header #navbar>ul>li>a {
    padding: 10px 15px 10px 35px;
  }

  .site-header .slideInn {
    right: 0 !important;
  }
}

@media (max-width: 767px) {
  .site-header .navbar-header .navbar-brand {
    font-size: 24px;
  }

  .site-header #navbar .navbar-nav {
    margin: 0;
  }
}

@media (max-width: 991px) {
  .site-header .navbar-collapse.collapse {
    display: none;
  }

  .site-header .navbar-collapse.collapse.in {
    display: block;
  }

  .site-header .navbar-header .collapse,
  .site-header .navbar-toggle {
    display: block;
  }

  .site-header .navbar-header {
    float: none;
  }

  .site-header .navbar-right {
    float: none;
  }

  .site-header .navbar-nav {
    float: none;
  }

  .site-header .navbar-nav>li {
    float: none;
  }
}

/**************************************************
	#header style 1
******************************************************/
.topbar-style-1,
.topbar-style-2 {
  background-color: #272443;
  padding: 15px 0;
}

@media (max-width: 767px) {

  .topbar-style-1 .site-logo,
  .topbar-style-2 .site-logo {
    text-align: center;
    border-bottom: 1px solid #082540;
    padding-bottom: 15px;
    margin-bottom: 15px;
  }

  .topbar-style-1 .topbar-contact-info-wrapper,
  .topbar-style-2 .topbar-contact-info-wrapper {
    text-align: center;
  }
}

.topbar-style-1 .topbar-contact-info,
.topbar-style-2 .topbar-contact-info {
  display: inline-block;
  float: right;
  margin-top: 5px;
}

@media (max-width: 767px) {

  .topbar-style-1 .topbar-contact-info,
  .topbar-style-2 .topbar-contact-info {
    float: none;
  }
}

.topbar-style-1 .topbar-contact-info>div,
.topbar-style-2 .topbar-contact-info>div {
  display: inline-block;
  float: left;
  padding-left: 30px;
  position: relative;
}

@media (max-width: 767px) {

  .topbar-style-1 .topbar-contact-info>div,
  .topbar-style-2 .topbar-contact-info>div {
    float: none;
    display: block;
    text-align: left;
  }
}

@media screen and (min-width: 992px) {

  .topbar-style-1 .topbar-contact-info>div+div,
  .topbar-style-2 .topbar-contact-info>div+div {
    margin-left: 35px;
    /* margin-top: 5px; */
  }
}

@media (max-width: 767px) {

  .topbar-style-1 .topbar-contact-info>div+div,
  .topbar-style-2 .topbar-contact-info>div+div {
    margin-top: 15px;
  }
}

.topbar-style-1 .topbar-contact-info>div>i,
.topbar-style-2 .topbar-contact-info>div>i {
  font-size: 18px;
  font-size: 1.2rem;
  color: #df1741;
  position: absolute;
  left: 0;
}

.topbar-style-1 .topbar-contact-info p,
.topbar-style-2 .topbar-contact-info p {
  font-size: 13px;
  color: #fff;
  line-height: 100%;
  margin: 0 0 0.2em;
}

.topbar-style-1 .details>span,
.topbar-style-2 .details>span {
  font-size: 12px;
  font-size: 0.8rem;
  color: #9a9a9a;
}

@media screen and (min-width: 992px) {

  .header-style-1 .navigation-holder,
  .header-style-2 .navigation-holder,
  .header-style-3 .navigation-holder,
  .header-style-4 .navigation-holder,
  .header-style-5 .navigation-holder,
  .header-style-6 .navigation-holder {
    padding: 0;
  }
}

@media screen and (min-width: 992px) {

  .header-style-1 #navbar>ul>li>a,
  .header-style-2 #navbar>ul>li>a,
  .header-style-3 #navbar>ul>li>a,
  .header-style-4 #navbar>ul>li>a,
  .header-style-5 #navbar>ul>li>a,
  .header-style-6 #navbar>ul>li>a {
    font-size: 15px;
    font-size: 1rem;
    font-weight: 600;
    padding: 30px 15px;
    position: relative;
  }

  .header-style-1 #navbar>ul>li>a:before,
  .header-style-2 #navbar>ul>li>a:before,
  .header-style-3 #navbar>ul>li>a:before,
  .header-style-4 #navbar>ul>li>a:before,
  .header-style-5 #navbar>ul>li>a:before,
  .header-style-6 #navbar>ul>li>a:before {
    content: "";
    background-color: #df1741;
    width: 0;
    height: 3px;
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    bottom: 20px;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
    -ms-transition: all 0.3s;
    transition: all 0.3s;
  }
}

.header-style-1 #navbar>ul>li>a:hover:before,
.header-style-2 #navbar>ul>li>a:hover:before,
.header-style-3 #navbar>ul>li>a:hover:before,
.header-style-4 #navbar>ul>li>a:hover:before,
.header-style-5 #navbar>ul>li>a:hover:before,
.header-style-6 #navbar>ul>li>a:hover:before {
  width: 12px;
}

/*** cart and quote ***/
.cart-contact {
  position: absolute;
  right: 0;
  top: 30px;
}

@media (max-width: 991px) {
  .cart-contact {
    top: 18px;
    left: 15px;
  }
}

.cart-contact .mini-cart {
  float: left;
  position: relative;
}

@media screen and (min-width: 992px) {
  .cart-contact .mini-cart {
    margin-top: -4px;
  }
}

.cart-contact .mini-cart>button {
  font-size: 15px;
  font-size: 1rem;
  color: #0d1d36;
  display: inline-block;
  border: 0;
  outline: 0;
  background: transparent;
  font-weight: 600;
  margin-right: 30px;
}

@media (max-width: 767px) {
  .cart-contact .mini-cart>button {
    font-size: 13px;
    font-size: 0.86667rem;
    margin-right: 15px;
  }
}

.cart-contact .mini-cart>button i:before {
  font-size: 18px;
  font-size: 1.2rem;
  color: #0d1d36;
  display: inline-block;
  padding-right: 5px;
}

@media (max-width: 767px) {
  .cart-contact .mini-cart>button i:before {
    font-size: 15px;
    font-size: 1rem;
  }
}

.cart-contact .top-cart-content {
  background: #fff;
  width: 292px;
  border-top: 2px solid #df1741;
  position: absolute;
  top: 45px;
  opacity: 0;
  visibility: hidden;
  z-index: 10;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

@media (max-width: 991px) {
  .cart-contact .top-cart-content {
    top: 40px;
    left: -14px;
  }
}

.cart-contact .top-cart-content .top-cart-title {
  padding: 12px 15px;
  border-bottom: 1px solid #e4e2e2;
}

.cart-contact .top-cart-content p {
  font-size: 14px;
  font-size: 0.93333rem;
  font-weight: 600;
  color: #272443;
  margin: 0;
  text-transform: uppercase;
}

.cart-contact .top-cart-content .top-cart-items {
  padding: 15px;
}

.cart-contact .top-cart-content .top-cart-item {
  padding-top: 15px;
  margin-top: 15px;
  border-top: 1px solid #e4e2e2;
}

.cart-contact .top-cart-content .top-cart-item:first-child {
  padding-top: 0;
  margin-top: 0;
  border-top: 0;
}

.cart-contact .top-cart-content .top-cart-item-image {
  width: 48px;
  height: 48px;
  border: 2px solid #eee;
  float: left;
  margin-right: 15px;
  -webkit-transition: all .2s linear;
  -o-transition: all .2s linear;
  transition: all .2s linear;
}

.cart-contact .top-cart-content .top-cart-item-image a,
.cart-contact .top-cart-content .top-cart-item-image img {
  display: block;
  width: 44px;
  height: 44px;
}

.cart-contact .top-cart-content .top-cart-item-image:hover {
  border-color: #df1741;
}

.cart-contact .top-cart-content .top-cart-item-des {
  position: relative;
  overflow: hidden;
}

.cart-contact .top-cart-content .top-cart-item-des a {
  width: auto;
  height: auto;
  font-size: 13px;
  font-weight: 600;
  text-align: left;
  color: #333;
}

.cart-contact .top-cart-content .top-cart-item-des a:hover {
  color: #df1741;
}

.cart-contact .top-cart-content .top-cart-item-des .top-cart-item-price {
  font-size: 12px;
  color: #999;
  line-height: 20px;
  display: block;
}

.cart-contact .top-cart-content .top-cart-item-des .top-cart-item-quantity {
  font-size: 12px;
  color: #555;
  display: block;
  position: absolute;
  right: 0;
  top: 2px;
}

.cart-contact .top-cart-content .top-cart-action {
  padding: 25px 15px 25px;
  border-top: 1px solid #e4e2e2;
}

.cart-contact .top-cart-content .top-cart-action .top-checkout-price {
  font-size: 15px;
  font-size: 1rem;
  font-weight: 600;
  color: #272443;
}

.cart-contact .top-cart-content .top-cart-action .theme-btn,
.cart-contact .top-cart-content .top-cart-action .theme-btn-s2,
.cart-contact .top-cart-content .top-cart-action .theme-btn-s3,
.cart-contact .top-cart-content .top-cart-action .theme-btn-s4,
.cart-contact .top-cart-content .top-cart-action .theme-btn-s5 {
  font-size: 14px;
  font-size: 0.93333rem;
  padding: 3px 15px;
  float: right;
}

.cart-contact .top-cart-content-toggle {
  top: 54px;
  opacity: 1;
  visibility: visible;
}

@media (max-width: 991px) {
  .cart-contact .top-cart-content-toggle {
    top: 47px;
  }
}

.cart-contact .get-quote {
  float: right;
}

@media (max-width: 991px) {
  .cart-contact .get-quote {
    float: left;
    margin: 4px 0 0;
  }
}

@media (max-width: 991px) {

  .cart-contact .get-quote .theme-btn,
  .cart-contact .get-quote .theme-btn-s2,
  .cart-contact .get-quote .theme-btn-s3,
  .cart-contact .get-quote .theme-btn-s4,
  .cart-contact .get-quote .theme-btn-s5 {
    padding: 3px 15px;
  }
}

/**************************************
	#header style 2
****************************************/
.header-style-2 .site-logo,
.header-style-3 .site-logo,
.header-style-4 .site-logo,
.header-style-5 .site-logo,
.header-style-6 .site-logo {
  margin-top: 15px;
}

@media (max-width: 991px) {

  .header-style-2 .site-logo,
  .header-style-3 .site-logo,
  .header-style-4 .site-logo,
  .header-style-5 .site-logo,
  .header-style-6 .site-logo {
    margin-top: 8px;
    position: relative;
    max-width: 200px;
    z-index: 10;
  }
}

@media (max-width: 767px) {

  .header-style-2 .site-logo,
  .header-style-3 .site-logo,
  .header-style-4 .site-logo,
  .header-style-5 .site-logo,
  .header-style-6 .site-logo {
    margin: 12px 0 0 10px;
    max-width: 160px;
  }
}

.header-style-2 .navigation-holder,
.header-style-3 .navigation-holder,
.header-style-4 .navigation-holder,
.header-style-5 .navigation-holder,
.header-style-6 .navigation-holder {
  margin-right: 160px;
}

@media (max-width: 991px) {

  .header-style-2 .cart-contact .mini-cart,
  .header-style-3 .cart-contact .mini-cart,
  .header-style-4 .cart-contact .mini-cart,
  .header-style-5 .cart-contact .mini-cart,
  .header-style-6 .cart-contact .mini-cart {
    float: right;
    margin-right: 65px;
  }
}

.header-style-2 .cart-contact .mini-cart>button,
.header-style-3 .cart-contact .mini-cart>button,
.header-style-4 .cart-contact .mini-cart>button,
.header-style-5 .cart-contact .mini-cart>button,
.header-style-6 .cart-contact .mini-cart>button {
  margin-right: 0;
}

.header-style-2 .cart-contact .top-cart-content,
.header-style-3 .cart-contact .top-cart-content,
.header-style-4 .cart-contact .top-cart-content,
.header-style-5 .cart-contact .top-cart-content,
.header-style-6 .cart-contact .top-cart-content {
  right: 0;
}

@media (max-width: 991px) {

  .header-style-2 .cart-contact .top-cart-content,
  .header-style-3 .cart-contact .top-cart-content,
  .header-style-4 .cart-contact .top-cart-content,
  .header-style-5 .cart-contact .top-cart-content,
  .header-style-6 .cart-contact .top-cart-content {
    right: auto;
    left: -140px;
  }
}

.topbar-style-2 .topbar-contact-info {
  float: none;
}

.topbar-style-2 .get-quote {
  float: right;
  margin-top: 12px;
}

@media screen and (min-width: 992px) {
  .topbar-style-2 .get-quote {
    position: relative;
    right: -10px;
  }
}

@media (max-width: 767px) {
  .topbar-style-2 .get-quote {
    float: none;
    text-align: center;
    margin-top: 15px;
    margin: 25px 0 15px;
  }
}

@media (max-width: 991px) {
  .topbar-style-2 .topbar-contact-info>div+div {
    margin-left: 35px;
  }
}

@media (max-width: 767px) {
  .topbar-style-2 .topbar-contact-info>div+div {
    margin-left: 0;
  }
}

/**************************************
	#header style 3
****************************************/
@media screen and (min-width: 992px) {
  .header-style-3 {
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    z-index: 10;
  }

  .header-style-3 .navigation,
  .header-style-3 .topbar-style-2 {
    background: transparent;
  }

  .header-style-3 .topbar-contact-info p {
    color: #df1741;
  }

  .header-style-3 .topbar-style-2 .details>span {
    color: #9a9a9a;
  }

  .header-style-3 .topbar-style-2 .get-quote {
    position: relative;
    right: -10px;
  }

  .header-style-3 #navbar>ul>li>a {
    color: #fff;
  }

  .header-style-3 #navbar>ul>li>a:hover {
    color: #df1741;
  }

  .header-style-3 .cart-contact .mini-cart>button i:before,
  .header-style-3 .cart-contact .mini-cart>button {
    color: #df1741;
  }
}

@media (max-width: 991px) {
  .header-style-3 .navigation {
    background: #020b12;
  }

  .header-style-3 .cart-contact .mini-cart>button i:before,
  .header-style-3 .cart-contact .mini-cart>button {
    color: #fff;
  }
}

/**************************************
	#header style 4
****************************************/
@media screen and (min-width: 992px) {

  .header-style-4,
  .header-style-5 {
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    z-index: 10;
  }
}

@media screen and (min-width: 992px) {

  .header-style-4 .topbar-style-2,
  .header-style-5 .topbar-style-2 {
    background: transparent;
  }

  .header-style-4 .topbar-style-2 .topbar-contact-info p,
  .header-style-5 .topbar-style-2 .topbar-contact-info p {
    /* color: #df1741; */
    color: white;
  }

  .header-style-4 .topbar-style-2 .details>span,
  .header-style-5 .topbar-style-2 .details>span {
    color: #9a9a9a;
  }

  .header-style-4 .navigation,
  .header-style-5 .navigation {
    background-color: transparent;
  }

  .header-style-4 .navigation .container,
  .header-style-5 .navigation .container {
    background-color: #fff;
    border-radius: 5px;
  }

  .header-style-4 .cart-contact,
  .header-style-5 .cart-contact {
    right: 15px;
  }
}

.header-style-4 .social,
.header-style-5 .social {
  display: inline-block;
}

@media (max-width: 991px) {

  .header-style-4 .social,
  .header-style-5 .social {
    display: none;
  }
}

.header-style-4 .social>span,
.header-style-5 .social>span {
  font-size: 14px;
  font-size: 0.93333rem;
  color: #df1741;
  position: relative;
  top: 9px;
}

.header-style-4 .social-links,
.header-style-5 .social-links {
  display: inline-block;
  position: relative;
  top: 15px;
  left: 8px;
}

.header-style-4 .social-links>li+li,
.header-style-5 .social-links>li+li {
  margin-left: 15px;
}

.header-style-4 .social-links li a,
.header-style-5 .social-links li a {
  font-size: 14px;
  font-size: 0.93333rem;
  color: #fff;
}

/**************************************
	#header style 5
****************************************/
.header-style-5 {
  position: static;
  /*** lower topbar ***/
}

.header-style-5 .social {
  float: right;
}

@media (max-width: 991px) {
  .header-style-5 .social {
    display: block;
  }
}

@media (max-width: 767px) {
  .header-style-5 .social {
    float: none;
    text-align: center;
    margin-top: 15px;
  }
}

.header-style-5 .topbar {
  background-color: #272443;
}

.header-style-5 .social-links {
  top: 5px;
}

.header-style-5 .social>span {
  top: 0;
}

.header-style-5 .lower-topbar {
  padding: 12px 0;
}

@media (max-width: 991px) {
  .header-style-5 .lower-topbar {
    border-bottom: 1px solid #d4d2d2;
  }
}

.header-style-5 .lower-topbar .site-logo {
  margin: 0;
}

@media (max-width: 767px) {
  .header-style-5 .lower-topbar .site-logo {
    margin: 0 auto;
  }
}

.header-style-5 .lower-topbar .awards {
  float: right;
  overflow: hidden;
  position: relative;
  top: 5px;
}

@media (max-width: 767px) {
  .header-style-5 .lower-topbar .awards {
    float: none;
    border-top: 1px solid #d4d2d2;
    padding-top: 17px;
    margin: 10px -15px 0;
  }
}

.header-style-5 .lower-topbar .awards>div {
  min-height: 43px;
  padding-left: 58px;
  position: relative;
  float: left;
}

@media (max-width: 767px) {
  .header-style-5 .lower-topbar .awards>div {
    width: 210px;
    float: none;
    margin: 0 auto 10px;
  }
}

@media (max-width: 991px) {
  .header-style-5 .lower-topbar .awards>div {
    padding-left: 40px;
  }
}

.header-style-5 .lower-topbar .awards>div:first-child {
  margin-right: 40px;
}

@media (max-width: 767px) {
  .header-style-5 .lower-topbar .awards>div:first-child {
    margin-right: auto;
  }
}

.header-style-5 .lower-topbar .awards .icon {
  position: absolute;
  left: 0;
  top: -8px;
}

.header-style-5 .lower-topbar .awards .icon .fi:before {
  font-size: 44px;
  font-size: 2.93333rem;
  color: #df1741;
}

@media (max-width: 991px) {
  .header-style-5 .lower-topbar .awards .icon .fi:before {
    font-size: 35px;
    font-size: 2.33333rem;
  }
}

.header-style-5 .lower-topbar .awards h4 {
  font-size: 16px;
  font-size: 1.06667rem;
  margin: 0;
}

@media (max-width: 991px) {
  .header-style-5 .lower-topbar .awards h4 {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.header-style-5 .lower-topbar .awards p {
  font-size: 12px;
  font-size: 0.8rem;
  margin: 0;
}

@media screen and (min-width: 992px) {

  .header-style-5 .navigation,
  .header-style-5 .navigation .container {
    background-color: #df1741;
  }

  .header-style-5 #navbar>ul>li>a {
    padding: 15px;
  }

  .header-style-5 #navbar>ul>li>a:before {
    display: none;
  }

  .header-style-5 #navbar>ul>li>a:hover {
    color: #fff;
  }
}

@media screen and (min-width: 992px) {
  .header-style-5 .cart-contact {
    right: 195px;
    top: 15px;
  }

  .header-style-5 .cart-contact .top-cart-content-toggle {
    top: 39px;
  }
}

.header-style-5 .request-quote {
  width: 140px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  border: 0;
  border-radius: 0;
  padding: 0;
  position: absolute;
  right: 0;
  top: 0;
}

@media (max-width: 991px) {
  .header-style-5 .request-quote {
    right: auto;
    width: 130px;
    height: 40px;
    line-height: 40px;
    top: 12px;
  }
}

.header-style-5 .request-quote:hover {
  background-color: black;
  color: #fff;
}

/**************************************
	#header style 6
****************************************/
@media screen and (min-width: 992px) {
  .header-style-6 .topbar-style-2 {
    background-color: #fff;
    border-bottom: 1px solid #e5e5e5;
  }

  .header-style-6 .topbar-style-2 .topbar-contact-info p {
    color: #111;
    font-weight: 600;
  }
}

.header-style-6 .topbar-style-2 .theme-btn,
.header-style-6 .topbar-style-2 .theme-btn-s2,
.header-style-6 .topbar-style-2 .theme-btn-s3,
.header-style-6 .topbar-style-2 .theme-btn-s4,
.header-style-6 .topbar-style-2 .theme-btn-s5 {
  color: #fff;
}

/*--------------------------------------------------------------
#0.4	hero slider
--------------------------------------------------------------*/
.hero {
  position: relative;
  height: 680px;
  overflow: hidden;
  /** slider controls **/
  /*** hero slider animation ***/
}

@media (max-width: 991px) {
  .hero {
    height: 450px;
  }
}

@media (max-width: 767px) {
  .hero {
    min-height: 420px;
  }
}

.hero .slide {
  height: 680px;
  position: relative;
  background-repeat: no-repeat;
  position: relative;
}

@media (max-width: 991px) {
  .hero .slide {
    height: 450px;
  }
}

@media (max-width: 767px) {
  .hero .slide {
    min-height: 420px;
  }
}

.hero .slide .slider-bg {
  display: none;
}

.miss-on h4 {
  color: white;
}

.miss-on {
  background: background: #020b12ba;
  background: #020b12ba;
  padding: 3%;
}

.miss-on h4 {
  color: white;
  /* text-align: center; */
  font-size: 29px;
}

section#mos-bac {
  background-image: url(https://primeliftingtools.com/primetools/assets/images/DSC00024-scaled.jpg);

  /* background: red; */
  padding: 7%;
}

.miss-on ul {


  color: white;
}

.miss-on ul li {
  line-height: 31px;
}

.hero .slide:before {
  content: "";
  /*background-color: rgba(0, 0, 0, 0.4);*/
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.hero .slide:focus {
  outline: none;
}

.hero .slide .container {
  height: 100%;
  display: table;
  padding: 0;
}

.hero .slide .row {
  display: table-cell;
  vertical-align: middle;
}

.hero .slick-prev,
.hero .slick-next {
  background-color: #df1741;
  width: 45px;
  height: 45px;
  z-index: 9;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -o-border-radius: 4px;
  -ms-border-radius: 4px;
  border-radius: 4px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

.hero .slick-prev:hover,
.hero .slick-next:hover {
  background-color: #020b12;
}

@media (max-width: 991px) {

  .hero .slick-prev,
  .hero .slick-next {
    display: none !important;
  }
}

.hero .slick-prev {
  left: 5px;
}

@media screen and (min-width: 1600px) {
  .hero .slick-prev {
    left: 50px;
  }
}

.hero .slick-prev:before {
  font-family: "FontAwesome";
  content: "\f104";
  opacity: 1;
}

.hero .slick-next {
  right: 5px;
}

@media screen and (min-width: 1600px) {
  .hero .slick-next {
    right: 50px;
  }
}

.hero .slick-next:before {
  font-family: "FontAwesome";
  content: "\f105";
  opacity: 1;
}

.hero .slick-dots {
  bottom: 30px;
  display: none !important;
}

@media (max-width: 991px) {
  .hero .slick-dots {
    display: block !important;
  }
}

.hero .slick-dots li,
.hero .slick-dots li button {
  width: 15px;
  height: 15px;
}

@media (max-width: 767px) {

  .hero .slick-dots li,
  .hero .slick-dots li button {
    width: 14px;
    height: 14px;
  }
}

.hero .slick-dots li button {
  background-color: #df1741;
  border: 2px solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  -ms-border-radius: 50%;
  border-radius: 50%;
}

.hero .slick-dots li button:before {
  display: none;
}

.hero .slick-dots li {
  opacity: 0.5;
}

.hero .slick-dots .slick-active {
  opacity: 1;
}

.hero .hero-slider .slide-caption>h2,
.hero .hero-slider .slide-caption>p,
.hero .hero-slider .slide-caption>.btns {
  color: #fff;
  opacity: 0;
}

.hero .hero-slider .slick-list .slick-current .slide-caption>h2 {
  -webkit-animation: fadeInLeftSlow 1.5s 0.8s forwards;
  -moz-animation: fadeInLeftSlow 1.5s 0.8s forwards;
  -o-animation: fadeInLeftSlow 1.5s 0.8s forwards;
  -ms-animation: fadeInLeftSlow 1.5s 0.8s forwards;
  animation: fadeInLeftSlow 1.5s 0.8s forwards;
}

.hero .hero-slider .slick-list .slick-current .slide-caption>p {
  -webkit-animation: fadeInLeftSlow 1.5s 1.4s forwards;
  -moz-animation: fadeInLeftSlow 1.5s 1.4s forwards;
  -o-animation: fadeInLeftSlow 1.5s 1.4s forwards;
  -ms-animation: fadeInLeftSlow 1.5s 1.4s forwards;
  animation: fadeInLeftSlow 1.5s 1.4s forwards;
}

.hero .hero-slider .slick-list .slick-current .slide-caption>.btns {
  -webkit-animation: fadeInLeftSlow 1.5s 1.8s forwards;
  -moz-animation: fadeInLeftSlow 1.5s 1.8s forwards;
  -o-animation: fadeInLeftSlow 1.5s 1.8s forwards;
  -ms-animation: fadeInLeftSlow 1.5s 1.8s forwards;
  animation: fadeInLeftSlow 1.5s 1.8s forwards;
}

.hero .hero-slider .slide-caption>h2 {
  font-size: 45px;
  font-size: 3rem;
  line-height: 1.3em;
  color: #fff;
  margin: 0 0 0.27em;
}

@media (max-width: 1199px) {
  .hero .hero-slider .slide-caption>h2 {
    font-size: 35px;
    font-size: 2.33333rem;
  }
}

@media (max-width: 767px) {
  .hero .hero-slider .slide-caption>h2 {
    font-size: 28px;
    font-size: 1.86667rem;
  }
}

.hero .hero-slider .slide-caption>h2 span {
  color: #df1741;
}

.hero .hero-slider .slick-list .slick-current .slide-caption>p {
  font-size: 24px;
  font-size: 1.6rem;
  line-height: 1.5em;
  color: #fff;
  margin: 0 0 1.58em;
}

@media (max-width: 1199px) {
  .hero .hero-slider .slick-list .slick-current .slide-caption>p {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

@media (max-width: 767px) {
  .hero .hero-slider .slick-list .slick-current .slide-caption>p {
    font-size: 17px;
    font-size: 1.13333rem;
  }
}

@media screen and (min-width: 992px) {
  .hero .hero-slider .slick-list .slick-current .slide-caption>p {
    padding-right: 110px;
  }
}

.hero .hero-slider .slide-caption>.btns>a:first-child {
  margin-right: 5px;
}

/**********************************
	= slider style 2
**********************************/
.hero-slider-style-2 {
  text-align: center;
  height: 100vh;
  min-height: 600px;
}

.hero-slider-style-2 .hero-slider .slick-list .slick-current .slide-caption>p {
  padding-right: 0;
}

@media (max-width: 991px) {
  .hero-slider-style-2 {
    height: 450px;
  }
}

@media (max-width: 767px) {
  .hero-slider-style-2 {
    min-height: 420px;
  }
}

.hero-slider-style-2 .slide {
  height: 100vh;
  min-height: 600px;
}

@media screen and (min-width: 992px) {
  .hero-slider-style-2 .slide {
    padding-top: 100px;
  }
}

@media (max-width: 991px) {
  .hero-slider-style-2 .slide {
    height: 450px;
  }
}

@media (max-width: 767px) {
  .hero-slider-style-2 .slide {
    min-height: 420px;
  }
}

.hero-slider-style-2 .slide:before {
  content: "";
  background-color: rgba(0, 0, 0, 0.65);
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

/*--------------------------------------------------------------
#0.5	footer
--------------------------------------------------------------*/
.site-footer {
  /*** about widget ***/
  /*** service-links-widget ***/
  /*** quick-links-widget ***/
  /*** twitter-feed-widget ***/
  /*** copyright-info ***/
}

.site-footer .upper-footer {
  background-color: #272443;
  padding: 100px 0;
}

@media (max-width: 991px) {
  .site-footer .upper-footer {
    padding: 80px 0 35px;
  }
}

@media (max-width: 767px) {
  .site-footer .upper-footer {
    padding: 70px 0 30px;
  }
}

.site-footer .upper-footer ul {
  list-style: none;
}

.site-footer .upper-footer ul,
.site-footer .upper-footer li,
.site-footer .upper-footer p,
.site-footer .upper-footer a {
  color: #fff;
}

.site-footer .upper-footer a:hover {
  color: #df1741;
}

@media (max-width: 991px) {
  .site-footer .upper-footer .row>.col {
    margin-bottom: 55px;
  }
}

@media (max-width: 767px) {
  .site-footer .upper-footer .row>.col {
    margin-bottom: 40px;
  }
}

.site-footer .widget>h3,
.site-footer .widget .footer-logo {
  font-size: 24px;
  font-size: cacl-rem-value(24);
  color: #fff;
  text-transform: uppercase;
  margin: 2em 0 2em;
  padding-bottom: 0.5em;
  position: relative;
}

@media (max-width: 991px) {

  .site-footer .widget>h3,
  .site-footer .widget .footer-logo {
    font-size: 20px;
    font-size: cacl-rem-value(20);
  }
}

@media (max-width: 767px) {

  .site-footer .widget>h3,
  .site-footer .widget .footer-logo {
    font-size: 16px;
    font-size: cacl-rem-value(16);
  }
}

.site-footer .widget>h3:before,
.site-footer .widget .footer-logo:before {
  content: "";
  background-color: #df1741;
  width: 28px;
  height: 3px;
  position: absolute;
  left: 0;
  bottom: 0;
  border-radius: 5px;
}

.site-footer .about-widget .contact-info {
  margin-top: -20px;
}

@media screen and (min-width: 1200px) {
  .site-footer .about-widget .contact-info {
    padding-right: 45px;
  }
}

@media (max-width: 767px) {
  .site-footer .about-widget .contact-info {
    margin-top: -10px;
  }
}

.site-footer .about-widget .footer-logo:before {
  display: none;
}

.site-footer .about-widget ul li {
  position: relative;
  padding-left: 38px;
  line-height: 1.78em;
}

.site-footer .about-widget ul li i {
  font-size: 24px;
  color: #df1741;
  position: absolute;
  left: 0;
  top: 3px;
}

.site-footer .about-widget ul>li+li {
  margin-top: 28px;
}

@media (max-width: 767px) {
  .site-footer .about-widget ul>li+li {
    margin-top: 10px;
  }
}

@media (max-width: 767px) {
  .site-footer .about-widget img {
    max-width: 160px;
  }
}

.site-footer .service-links-widget {
  overflow: hidden;
}

.site-footer .service-links-widget ul li {
  position: relative;
  padding-left: 20px;
}

.site-footer .service-links-widget ul li:before {
  font-family: "FontAwesome";
  content: "\f105";
  color: #df1741;
  position: absolute;
  left: 0;
  top: -3px;
}

.site-footer .service-links-widget ul li+li {
  margin-top: 25px;
}

@media (max-width: 767px) {
  .site-footer .service-links-widget ul li+li {
    margin-top: 10px;
  }
}

.site-footer .quick-links-widget {
  overflow: hidden;
}

@media screen and (min-width: 1200px) {
  .site-footer .quick-links-widget {
    padding-right: 45px;
  }
}

.site-footer .quick-links-widget ul li+li {
  margin-top: 15px;
}

@media (max-width: 767px) {
  .site-footer .quick-links-widget ul li+li {
    margin-top: 10px;
  }
}

.site-footer .quick-links-widget ul {
  width: 50%;
  float: left;
}

.site-footer .twitter-feed-widget ul li+li {
  padding-top: 14px;
  margin-top: 14px;
  border-top: 1px solid #494949;
}

.site-footer .twitter-feed-widget p {
  color: #ccc;
}

.site-footer .twitter-feed-widget i {
  color: #198cfa;
  display: inline-block;
  padding-right: 5px;
}

.site-footer .copyright-info {
  background-color: #000204;
  padding: 15px 0;
  text-align: center;
}

.site-footer .copyright-info p {
  color: #808790;
  margin: 0;
}

@media (max-width: 767px) {
  .site-footer .copyright-info p {
    font-size: 13px;
    font-size: cacl-rem-value(13);
  }
}

.site-footer .copyright-info a {
  color: #df1741;
}

.sticky-header {
  width: 100%;
  position: fixed;
  left: 0;
  top: -100%;
  z-index: 10000;
  opacity: 0;
  -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
  -webkit-transition: all 0.7s;
  -moz-transition: all 0.7s;
  -o-transition: all 0.7s;
  -ms-transition: all 0.7s;
  transition: all 0.7s;
}

.sticky-on {
  opacity: 1;
  top: 0;
}

.header-style-3 .sticky-header {
  background-color: #0b3356;
}

@media screen and (min-width: 992px) {
  .header-style-3 .sticky-header #navbar>ul>li>a:hover {
    color: #df1741;
  }
}

.header-style-4 .sticky-header,
.header-style-5 .sticky-header {
  background-color: #fff;
}

.header-style-5 .sticky-header {
  background-color: #df1741;
}

.header-style-5 .sticky-header .container {
  border-radius: 0;
}

/**** style for box layout ***/
@media screen and (min-width: 1200px) {
  .box-layout .sticky-header {
    width: 1250px !important;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
  }
}

/*--------------------------------------------------------------
#0.6	services
--------------------------------------------------------------*/
.all-service-link,
.all-news-link {
  text-align: right;
}

@media (max-width: 991px) {

  .all-service-link,
  .all-news-link {
    text-align: left;
    margin-top: 25px;
  }
}

.service-slider .owl-controls {
  margin-top: 50px;
}

@media (max-width: 991px) {
  .service-slider .owl-controls {
    margin-top: 35px;
  }
}

@media (max-width: 991px) {
  .service-slider {
    margin-top: 50px;
  }
}

.services-grid-section .all-services {
  text-align: center;
  padding-top: 30px;
}

.services-grid-view {
  overflow: hidden;
  margin: 0 -15px;
}

.services-grid-view .grid {
  width: 33.33%;
  float: left;
  padding: 0 15px 30px;
}

@media (max-width: 991px) {
  .services-grid-view .grid {
    width: 50%;
  }
}

@media (max-width: 650px) {
  .services-grid-view .grid {
    width: 100%;
    float: none;
  }
}

/*--------------------------------------------------------------
#0.7	testimonials
--------------------------------------------------------------*/
.testimonials {
  position: relative;
}

.testimonials:before {
  content: "";
  background-color: rgba(5, 24, 41, 0.9);
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.testimonials-slider {
  position: relative;
}

.testimonials-slider .inner {
  padding: 0 155px;
}

@media (max-width: 1199px) {
  .testimonials-slider .inner {
    padding: 0 120px;
  }
}

@media (max-width: 767px) {
  .testimonials-slider .inner {
    padding: 0;
  }
}

.testimonials-slider .slide-item:before {
  font-family: "Flaticon";
  content: "\f102";
  font-size: 60px;
  color: #df1741;
  position: absolute;
  left: 30px;
  top: -14px;
}

@media (max-width: 1199px) {
  .testimonials-slider .slide-item:before {
    font-size: 50px;
    font-size: 3.33333rem;
  }
}

@media (max-width: 991px) {
  .testimonials-slider .slide-item:before {
    font-size: 40px;
    font-size: 2.66667rem;
  }
}

@media (max-width: 767px) {
  .testimonials-slider .slide-item:before {
    font-size: 35px;
    font-size: 2.33333rem;
  }
}

@media (max-width: 767px) {
  .testimonials-slider .slide-item:before {
    display: none;
  }
}

.testimonials-slider .slide-item img {
  width: auto;
}

.testimonials-slider .slide-item p {
  font-size: 22px;
  font-size: 1.46667rem;
  color: #fff;
}

@media (max-width: 1199px) {
  .testimonials-slider .slide-item p {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

@media (max-width: 991px) {
  .testimonials-slider .slide-item p {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.testimonials-slider .client-quote {
  margin-bottom: 40px;
}

.testimonials-slider .client-details {
  position: relative;
  padding: 0 0 10px 85px;
}

.testimonials-slider .client-pic {
  position: absolute;
  left: 0;
  min-height: 58px;
}

.testimonials-slider .client-info {
  padding-top: 5px;
}

.testimonials-slider .client-info h4 {
  font-size: 20px;
  font-size: 1.33333rem;
  color: #df1741;
  margin: 0 0 0.3em;
}

@media (max-width: 1199px) {
  .testimonials-slider .client-info h4 {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.testimonials-slider .client-info>span {
  font-size: 14px;
  font-size: 0.93333rem;
  color: #dddddd;
}

.testimonials-slider .owl-controls {
  position: absolute;
  right: 0;
  bottom: -45px;
}

@media (max-width: 767px) {
  .testimonials-slider .owl-controls {
    position: static;
    text-align: left;
    margin: 15px 0 0 -5px;
  }
}

.testimonials-slider .owl-controls .owl-prev,
.testimonials-slider .owl-controls .owl-next {
  text-align: center;
}

/*--------------------------------------------------------------
#0.8    offer
--------------------------------------------------------------*/
@media screen and (min-width: 1200px) {
  .offer-text {
    padding-right: 30px;
  }
}

.offer-text>p:nth-child(2) {
  margin-bottom: 55px;
}

@media (max-width: 991px) {
  .offer-text>p:nth-child(2) {
    margin-bottom: 40px;
  }
}

.offer-grids {
  overflow: hidden;
  margin: 0 -15px;
}

@media (max-width: 991px) {
  .offer-grids {
    margin-top: 80px;
  }
}

@media (max-width: 767px) {
  .offer-grids {
    margin-top: 60px;
  }
}

.offer-grids .grid {
  width: 50%;
  float: left;
  padding: 0 15px;
}

@media (max-width: 600px) {
  .offer-grids .grid {
    width: 100%;
    float: left;
    margin-bottom: 30px;
  }
}

.offer-grids>.grid:nth-child(1),
.offer-grids>.grid:nth-child(2) {
  margin-bottom: 40px;
}

.offer-grids>.grid:last-child {
  margin-bottom: 0;
}

.offer-grids .details {
  padding-left: 75px;
  position: relative;
}

@media (max-width: 767px) {
  .offer-grids .details {
    padding-left: 55px;
  }
}

.offer-grids .details>h3 {
  font-size: 20px;
  font-size: 1.33333rem;
  margin: 0 0 1em;
}

@media (max-width: 1199px) {
  .offer-grids .details>h3 {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

@media (max-width: 767px) {
  .offer-grids .details>h3 {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.offer-grids .details .icon {
  position: absolute;
  left: 0;
  top: -10px;
}

@media (max-width: 1199px) {
  .offer-grids .details .icon {
    left: 8px;
  }
}

@media (max-width: 991px) {
  .offer-grids .details .icon {
    left: 0;
  }
}

.offer-grids .details .icon i:before {
  font-size: 45px;
}

@media (max-width: 1199px) {
  .offer-grids .details .icon i:before {
    font-size: 40px;
  }
}

@media (max-width: 767px) {
  .offer-grids .details .icon i:before {
    font-size: 30px;
  }
}

.offer-grids .details .offer-details {
  font-weight: 600;
  color: #df1741;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

.offer-grids .details .offer-details:hover {
  color: #e4b500;
}

.offer-section {
  padding-bottom: 145px;
}

@media (max-width: 991px) {
  .offer-section {
    padding-bottom: 80px;
  }
}

.offer-pic {
  padding: 40px 0 0 45px;
  position: relative;
}

@media (max-width: 991px) {
  .offer-pic {
    display: none;
  }
}

.offer-pic:after {
  content: "";
  width: 465px;
  height: 465px;
  border: 2px solid #df1741;
  position: absolute;
  left: 150px;
  top: -22px;
}

.offer-pic img {
  position: relative;
  z-index: 2;
}

/*--------------------------------------------------------------
#0.9    recent-projects
--------------------------------------------------------------*/
.recent-projects {
  background-color: #272443;
}

@media (max-width: 767px) {

  .recent-projects-grids,
  .projects-grid-view {
    overflow: hidden;
  }
}

.recent-projects-grids .grid,
.projects-grid-view .grid {
  position: relative;
  overflow: hidden;
  display: inline-block;
  float: left;
}

@media (max-width: 767px) {

  .recent-projects-grids .grid,
  .projects-grid-view .grid {
    width: 50%;
    float: left;
  }
}

@media (max-width: 550px) {

  .recent-projects-grids .grid,
  .projects-grid-view .grid {
    width: 100%;
    float: none;
  }
}

@media (max-width: 550px) {

  .recent-projects-grids .project-img img,
  .projects-grid-view .project-img img {
    width: 100%;
  }
}

.recent-projects-grids .project-info,
.projects-grid-view .project-info {
  background-color: rgba(5, 24, 41, 0.9);
  width: 95%;
  height: 92%;
  border: 2px solid #df1741;
  position: absolute;
  left: -10%;
  top: 4%;
  opacity: 0;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  -ms-transition: all 0.5s;
  transition: all 0.5s;
}

.recent-projects-grids .grid:hover .project-info,
.projects-grid-view .grid:hover .project-info {
  left: 2.5%;
  opacity: 1;
}

.recent-projects-grids .inner-info,
.projects-grid-view .inner-info {
  width: 100%;
  text-align: center;
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index: 10;
}

.recent-projects-grids .inner-info>a,
.projects-grid-view .inner-info>a {
  color: #fff;
}

.recent-projects-grids .inner-info h3,
.projects-grid-view .inner-info h3 {
  font-family: "Hind", sans-serif;
  font-size: 22px;
  font-size: 1.46667rem;
  color: #fff;
  margin: 0 0 0.2em;
  position: relative;
  top: -10px;
  opacity: 0;
  -webkit-transition: all 0.3s 0.5s;
  -o-transition: all 0.3s 0.5s;
  transition: all 0.3s 0.5s;
}

@media (max-width: 991px) {

  .recent-projects-grids .inner-info h3,
  .projects-grid-view .inner-info h3 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

@media (max-width: 767px) {

  .recent-projects-grids .inner-info h3,
  .projects-grid-view .inner-info h3 {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

.recent-projects-grids .inner-info .tags,
.projects-grid-view .inner-info .tags {
  color: #df1741;
  position: relative;
  top: 10px;
  opacity: 0;
  -webkit-transition: all 0.3s 0.5s;
  -o-transition: all 0.3s 0.5s;
  transition: all 0.3s 0.5s;
}

@media (max-width: 767px) {

  .recent-projects-grids .inner-info .tags,
  .projects-grid-view .inner-info .tags {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.recent-projects-grids .grid:hover .inner-info h3,
.recent-projects-grids .grid:hover .inner-info .tags,
.projects-grid-view .grid:hover .inner-info h3,
.projects-grid-view .grid:hover .inner-info .tags {
  top: 0;
  opacity: 1;
}

@media (max-width: 550px) {

  .recent-projects-grids .mCustomScrollBox,
  .projects-grid-view .mCustomScrollBox {
    position: static;
  }
}

.recent-projects-grids .mCSB_horizontal.mCSB_inside>.mCSB_container,
.projects-grid-view .mCSB_horizontal.mCSB_inside>.mCSB_container {
  margin-bottom: 80px;
}

.recent-projects-grids .mCSB_scrollTools.mCSB_scrollTools_horizontal,
.projects-grid-view .mCSB_scrollTools.mCSB_scrollTools_horizontal {
  max-width: 850px;
  margin: 0 auto;
}

@media (max-width: 991px) {

  .recent-projects-grids .mCSB_scrollTools.mCSB_scrollTools_horizontal,
  .projects-grid-view .mCSB_scrollTools.mCSB_scrollTools_horizontal {
    max-width: 700px;
  }
}

.recent-projects-grids .mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_draggerRail,
.recent-projects-grids .mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
.projects-grid-view .mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_draggerRail,
.projects-grid-view .mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar {
  height: 10px;
}

.recent-projects-grids .mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_draggerRail,
.projects-grid-view .mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_draggerRail {
  background-color: #3a444c;
}

.recent-projects-grids .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.projects-grid-view .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
  background-color: #df1741;
}

@media (max-width: 550px) {

  .recent-projects-grids .mCSB_inside>.mCSB_container,
  .projects-grid-view .mCSB_inside>.mCSB_container {
    margin-right: 0;
  }
}

.projects-grid-view-section .more-projects {
  margin-top: 30px;
  text-align: center;
}

.projects-grid-view {
  margin: 0 -15px;
}

.projects-grid-view .grid {
  width: calc(33.33% - 30px);
  margin: 0 15px 30px;
  float: left;
}

@media (max-width: 991px) {
  .projects-grid-view .grid {
    width: calc(50% - 30px);
  }
}

@media (max-width: 550px) {
  .projects-grid-view .grid {
    width: calc(100% - 30px);
    float: none;
  }
}

/*--------------------------------------------------------------
#1.0    about-us-faq
--------------------------------------------------------------*/
.about-us-faq {
  position: relative;
}

.about-us-faq .backhoe-loader {
  position: absolute;
  right: 0;
  top: 160px;
}

@media (max-width: 1800px) {
  .about-us-faq .backhoe-loader {
    display: none;
  }
}

.about-us-section .btns {
  margin: 50px 0 45px;
}

@media (max-width: 767px) {
  .about-us-section .btns {
    margin: 35px 0;
  }
}

.about-us-section .social>p {
  text-transform: uppercase;
}

.about-us-section .social-links a {
  font-size: 32px;
  font-size: 2.13333rem;
  color: #333;
}

@media (max-width: 991px) {
  .about-us-section .social-links a {
    font-size: 26px;
    font-size: 1.73333rem;
  }
}

@media (max-width: 767px) {
  .about-us-section .social-links a {
    font-size: 22px;
    font-size: 1.46667rem;
  }
}

.about-us-section .social-links a:hover {
  color: #df1741;
}

.about-us-section .social-links>li+li {
  margin-left: 15px;
}

@media (max-width: 991px) {
  .about-us-section .social-links>li+li {
    margin-left: 10px;
  }
}

.faq-section {
  position: relative;
  z-index: 1;
}

@media (max-width: 1199px) {
  .faq-section {
    margin-top: 50px;
  }
}

@media (max-width: 767px) {
  .faq-section {
    margin-top: 40px;
  }
}

.faq-section .faq-accordion {
  padding-top: 7px;
}

/*--------------------------------------------------------------
#1.1    partners
--------------------------------------------------------------*/
.partners {
  padding-top: 50px;
  padding-bottom: 50px;
}

.partners-bg {
  background-color: #f6f6f6;
  padding: 45px 0;
}

.partners-slider .grid {
  border: 2px solid #e9e9e9;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

.partners-slider .grid:hover {
  border-color: #df1741;
}

/*--------------------------------------------------------------
#1.2    partners
--------------------------------------------------------------*/
.contact-section {
  position: relative;
}

.contact-section:before {
  content: "";
  background-color: rgba(5, 24, 41, 0.9);
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

@media screen and (min-width: 992px) {

  .contact-section .section-title,
  .contact-section .section-title-white,
  .contact-section .section-title-s2,
  .contact-section .section-title-s5,
  .contact-section .section-title-s6,
  .contact-section .section-title-s7 {
    margin-bottom: 30px;
  }
}

.contact-section p {
  color: #aaa;
  line-height: 1.56em;
}

.contact-section-contact-box {
  padding: 38px 45px;
  border: 2px solid #df1741;
}

@media (max-width: 991px) {
  .contact-section-contact-box {
    margin-bottom: 60px;
  }
}

@media (max-width: 767px) {
  .contact-section-contact-box {
    margin-bottom: 45px;
  }
}

@media (max-width: 450px) {
  .contact-section-contact-box {
    padding: 38px 25px;
  }
}

.contact-section-contact-box .details ul {
  list-style-type: none;
  color: #fff;
}

.contact-section-contact-box .details ul li {
  position: relative;
  padding-left: 25px;
}

.contact-section-contact-box .details ul i {
  color: #df1741;
  position: absolute;
  left: 0;
  top: 3px;
}

.contact-section-contact-box .details ul>li+li {
  margin-top: 20px;
}

.contact-form-s1 label {
  font-size: 12px;
  font-size: 0.8rem;
  font-weight: normal;
  display: block;
  color: #df1741;
  text-transform: uppercase;
}

@media (max-width: 767px) {
  .contact-form-s1 label {
    font-size: 11px;
    font-size: 0.73333rem;
  }
}

.contact-form-s1 input,
.contact-form-s1 select {
  height: 38px;
  border: 0;
}

@media (max-width: 767px) {

  .contact-form-s1 input,
  .contact-form-s1 select {
    height: 34px;
  }
}

.contact-form-s1 form {
  overflow: hidden;
  margin: 0 -12px;
}

.contact-form-s1 form>div {
  width: 50%;
  float: left;
  padding: 0 12px;
  margin-top: 12px;
}

@media (max-width: 450px) {
  .contact-form-s1 form>div {
    width: 100%;
    float: none;
  }
}

.contact-form-s1 form .submit-btn-wrap {
  width: 100%;
  float: none;
  clear: both;
  padding-top: 35px;
}

.contact-form-s1 .wpcf7-submit {
  background-color: #df1741;
  color: #fff;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

.contact-form-s1 .wpcf7-submit:hover {
  background-color: #df1741;
}

.contact-women {
  position: absolute;
  left: 0;
  bottom: 0;
}

@media (max-width: 1550px) {
  .contact-women {
    display: none;
  }
}

/*--------------------------------------------------------------
#1.3    news-section
--------------------------------------------------------------*/
.news-grids {
  margin: 0 -15px;
  padding-top: 20px;
  overflow: hidden;
}

@media (max-width: 991px) {
  .news-grids {
    padding-top: 50px;
  }
}

.news-grids .grid {
  width: 33.33%;
  float: left;
  padding: 0 15px;
}

@media (max-width: 991px) {
  .news-grids .grid {
    width: 50%;
  }
}

@media (max-width: 580px) {
  .news-grids .grid {
    width: 100%;
    float: none;
    margin-bottom: 40px;
  }
}

@media (max-width: 991px) {
  .news-grids>.grid:last-child {
    margin-top: 40px;
  }
}

@media (max-width: 580px) {
  .news-grids>.grid:last-child {
    margin-bottom: 0;
  }
}

.news-grids .entry-details {
  padding: 20px 30px;
  border: 1px solid #e8e8e8;
}

@media (max-width: 1199px) {
  .news-grids .entry-details {
    padding: 20px 25px;
  }
}

@media (max-width: 767px) {
  .news-grids .entry-details {
    padding: 20px;
  }
}

.news-grids .entry-meta ul {
  list-style: none;
  overflow: hidden;
}

.news-grids .entry-meta ul li {
  font-size: 14px;
  font-size: 0.93333rem;
  color: #9a9a9a;
  float: left;
}

@media (max-width: 1199px) {
  .news-grids .entry-meta ul li {
    font-size: 13px;
    font-size: 0.86667rem;
  }
}

@media (max-width: 767px) {
  .news-grids .entry-meta ul li {
    font-size: 12px;
    font-size: 0.8rem;
  }
}

.news-grids .entry-meta ul li a {
  color: #9a9a9a;
}

.news-grids .entry-meta ul li i {
  display: inline-block;
  color: #df1741;
  padding-right: 4px;
}

.news-grids .entry-meta ul>li+li {
  margin-left: 15px;
}

.news-grids .entry-media img {
  border-radius: 5px;
}

.news-grids .entry-body h3 {
  font-family: "Hind", sans-serif;
  font-size: 18px;
  font-size: 1.2rem;
  line-height: 1.3em;
  font-weight: 600;
  margin: 0.72em 0 0.83em;
}

@media (max-width: 1199px) {
  .news-grids .entry-body h3 {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

@media (max-width: 767px) {
  .news-grids .entry-body h3 {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.news-grids .entry-body h3 a {
  color: #272443;
}

.news-grids .entry-body h3 a:hover {
  color: #df1741;
}

.news-grids .entry-body p {
  font-size: 14px;
  font-size: 0.93333rem;
  line-height: 1.57em;
}

/*--------------------------------------------------------------
#2.0    cta
--------------------------------------------------------------*/
.cta {
  position: relative;
  text-align: center;
}

.cta:before {
  content: "";
  background-color: rgba(5, 24, 41, 0.9);
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.cta .container {
  position: relative;
  z-index: 1;
}

.cta h2 {
  font-size: 30px;
  font-size: 2rem;
  line-height: 1.3em;
  color: #fff;
  margin-bottom: 1.33em;
}

@media (max-width: 1199px) {
  .cta h2 {
    font-size: 25px;
    font-size: 1.66667rem;
  }
}

@media (max-width: 991px) {
  .cta h2 {
    font-size: 22px;
    font-size: 1.46667rem;
  }
}

@media (max-width: 767px) {
  .cta h2 {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

.cta h2 span {
  color: #df1741;
}

/*--------------------------------------------------------------
#2.1    services s2
--------------------------------------------------------------*/
.service-s2-top {
  margin-top: 10px;
}

@media (max-width: 991px) {
  .service-s2-top {
    margin-top: 50px;
  }
}

.service-s2-tab {
  overflow: hidden;
  margin-bottom: 60px;
}

.service-s2-tab .tablinks {
  width: 17%;
  float: right;
  list-style: none;
}

@media (max-width: 991px) {
  .service-s2-tab .tablinks {
    width: 30%;
  }
}

@media (max-width: 767px) {
  .service-s2-tab .tablinks {
    width: 270px;
    float: none;
    margin-bottom: 25px;
  }
}

.service-s2-tab .tablinks li {
  border: 1px solid transparent;
  margin-bottom: 2px;
}

.service-s2-tab .tablinks li.active {
  border: 1px solid #df1741;
}

.service-s2-tab .tablinks li a {
  font-size: 18px;
  font-size: 1.2rem;
  font-weight: 600;
  color: #272443;
  display: block;
  padding: 5px 20px;
  text-align: right;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

@media (max-width: 1199px) {
  .service-s2-tab .tablinks li a {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.service-s2-tab .tablinks li.active a span {
  visibility: visible;
  opacity: 1;
  display: inline-block;
}

.service-s2-tab .tablinks li a span {
  padding-left: 8px;
  visibility: hidden;
  display: none;
  opacity: 0;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

.service-s2-tab .tab-content {
  width: 80%;
  float: left;
}

@media (max-width: 991px) {
  .service-s2-tab .tab-content {
    width: 65%;
  }
}

@media (max-width: 767px) {
  .service-s2-tab .tab-content {
    width: 100%;
    float: none;
  }
}

.service-s2-tab .tab-pane {
  overflow: hidden;
}

.service-s2-tab .tab-pane .img-holder {
  width: 45%;
  float: left;
  padding-bottom: 15px;
}

@media (max-width: 991px) {
  .service-s2-tab .tab-pane .img-holder {
    width: 100%;
    float: none;
  }
}

.service-s2-tab .tab-pane .img-holder img {
  -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.service-s2-tab .tab-pane .details {
  width: 55%;
  float: right;
  padding: 45px 100px 45px 45px;
}

@media (max-width: 1199px) {
  .service-s2-tab .tab-pane .details {
    padding: 25px 41px 25px 35px;
  }
}

@media (max-width: 991px) {
  .service-s2-tab .tab-pane .details {
    width: 100%;
    float: none;
    padding: 25px 0 0;
  }
}

@media (max-width: 767px) {
  .service-s2-tab .tab-pane .details {
    padding: 15px 0 0;
  }
}

.service-s2-tab .details h3 {
  font-size: 24px;
  font-size: 1.6rem;
  font-weight: 600;
  margin: 0 0 0.71em;
}

@media (max-width: 1199px) {
  .service-s2-tab .details h3 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

@media (max-width: 767px) {
  .service-s2-tab .details h3 {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

.service-s2-tab .details .more {
  font-weight: 600;
  color: #df1741;
  margin-top: 5px;
}

.service-s2-tab .details .more:hover {
  color: #d9ad00;
}

.service-s2-box-grids {
  margin: 0 -15px;
}

.service-s2-box-grids .grid {
  width: 33.33%;
  float: left;
  padding: 0 15px;
}

@media (max-width: 700px) {
  .service-s2-box-grids .grid {
    width: 100%;
    float: none;
    margin-bottom: 15px;
  }
}

.service-s2-box-grids .grid .inner {
  border: 2px solid #e6e6e6;
  padding: 65px 42px 60px 100px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

@media (max-width: 1199px) {
  .service-s2-box-grids .grid .inner {
    padding: 95px 42px 40px;
  }
}

@media (max-width: 991px) {
  .service-s2-box-grids .grid .inner {
    padding: 95px 35px 30px;
  }
}

@media (max-width: 767px) {
  .service-s2-box-grids .grid .inner {
    padding: 85px 35px 30px;
  }
}

.service-s2-box-grids .grid:hover .inner {
  border-color: #df1741;
}

.service-s2-box-grids .inner h3 {
  font-size: 20px;
  font-size: 1.33333rem;
  font-weight: 600;
  margin: 0 0 1em;
  position: relative;
}

@media (max-width: 991px) {
  .service-s2-box-grids .inner h3 {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

@media (max-width: 767px) {
  .service-s2-box-grids .inner h3 {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.service-s2-box-grids .inner h3 span {
  font-size: 48px;
  font-size: 3.2rem;
  font-weight: bold;
  position: absolute;
  left: -80px;
  top: -45px;
}

@media (max-width: 1199px) {
  .service-s2-box-grids .inner h3 span {
    font-size: 38px;
    font-size: 2.53333rem;
    left: 0;
    top: -60px;
  }
}

@media (max-width: 991px) {
  .service-s2-box-grids .inner h3 span {
    font-size: 34px;
    font-size: 2.26667rem;
  }
}

@media (max-width: 767px) {
  .service-s2-box-grids .inner h3 span {
    font-size: 30px;
    font-size: 2rem;
  }
}

.service-s2-box-grids .inner h3 span:before {
  content: "";
  background-color: #df1741;
  width: 2px;
  height: 140%;
  position: absolute;
  left: 60%;
  top: -10px;
  -webkit-transform: rotate(40deg);
  -ms-transform: rotate(40deg);
  transform: rotate(40deg);
}

.service-s2-box-grids .inner>p:last-child {
  margin-bottom: 0;
}

/*--------------------------------------------------------------
#2.2    our-team
--------------------------------------------------------------*/
.our-team-bg {
  background-color: #f6f6f6;
  padding-bottom: 170px;
  /* margin-bottom: 45px; */
}

@media (max-width: 1199px) {
  .our-team-bg {
    padding-bottom: 80px;
  }
}

@media (max-width: 991px) {
  .our-team-bg {
    padding-bottom: 60px;
  }
}

.our-team .team-slider {
  position: relative;
}

.our-team .owl-stage-outer {
  z-index: 10;
}

.our-team .team-slider:after {
  content: "";
  width: 120%;
  height: 300px;
  border: 2px solid #df1741;
  position: absolute;
  left: -10%;
  bottom: 0;
}

@media (max-width: 1199px) {
  .our-team .team-slider:after {
    display: none;
  }
}

/*--------------------------------------------------------------
#2.3    fun-fact
--------------------------------------------------------------*/
.fun-fact {
  text-align: center;
  padding: 55px 0 100px;
}

@media (max-width: 1199px) {
  .fun-fact {
    padding: 0 0 100px;
  }
}

@media (max-width: 991px) {
  .fun-fact {
    padding: 0 0 60px;
  }
}

@media (max-width: 767px) {
  .fun-fact {
    padding: 0 0 45px;
  }
}

.fun-fact .start-count>.col:last-child .grid:after {
  display: none;
}

.fun-fact .start-count>.col:last-child .grid {
  border-bottom: 0;
}

@media (max-width: 767px) {
  .fun-fact .start-count>.col+.col .grid {
    margin-top: 20px;
  }
}

.fun-fact .grid {
  padding: 0 40px;
  position: relative;
}

@media (max-width: 1199px) {
  .fun-fact .grid {
    padding: 0 25px;
  }
}

@media (max-width: 991px) {
  .fun-fact .grid {
    padding: 0 15px;
  }
}

@media (max-width: 767px) {
  .fun-fact .grid {
    border-bottom: 1px solid #d9d9d9;
  }
}

.fun-fact .grid:after {
  content: "";
  background: #d9d9d9;
  background: -webkit-linear-gradient(top, white 0%, #d9d9d9 15%, #d9d9d9 80%, white 98%);
  background: -webkit-gradient(linear, left top, left bottom, from(white), color-stop(15%, #d9d9d9), color-stop(80%, #d9d9d9), color-stop(98%, white));
  background: -o-linear-gradient(top, white 0%, #d9d9d9 15%, #d9d9d9 80%, white 98%);
  background: linear-gradient(top, white 0%, #d9d9d9 15%, #d9d9d9 80%, white 98%);
  width: 2px;
  height: 105px;
  position: absolute;
  right: -15px;
  bottom: -2%;
}

@media (max-width: 767px) {
  .fun-fact .grid:after {
    display: none;
  }
}

.fun-fact .grid h3 {
  font-size: 60px;
  font-size: 4rem;
  margin: 0 0 3px;
}

@media (max-width: 1199px) {
  .fun-fact .grid h3 {
    font-size: 50px;
    font-size: 3.33333rem;
  }
}

@media (max-width: 991px) {
  .fun-fact .grid h3 {
    font-size: 40px;
    font-size: 2.66667rem;
  }
}

@media (max-width: 767px) {
  .fun-fact .grid h3 {
    font-size: 30px;
    font-size: 2rem;
  }
}

.fun-fact .grid h3>span:last-child {
  color: #df1741;
}

.fun-fact .grid .fact-title {
  font-size: 18px;
  font-size: 1.2rem;
  font-weight: bold;
  color: #9a9a9a;
  margin: 0 0 1.38em;
  display: block;
}

/*--------------------------------------------------------------
#2.4    cta-newsletter
--------------------------------------------------------------*/
.cta-newsletter {
  padding: 100px 0;
  position: relative;
}

@media (max-width: 991px) {
  .cta-newsletter {
    padding: 80px 0;
    text-align: center;
  }
}

@media (max-width: 767px) {
  .cta-newsletter {
    padding: 60px 0;
  }
}

.cta-newsletter:before {
  content: "";
  background-color: rgba(5, 24, 41, 0.9);
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}

.cta-newsletter .cta-newsletter-inner h3 {
  font-size: 30px;
  font-size: 2rem;
  color: #fff;
  margin: 0 0 1.23em;
}

@media (max-width: 1199px) {
  .cta-newsletter .cta-newsletter-inner h3 {
    font-size: 25px;
    font-size: 1.66667rem;
  }
}

@media (max-width: 991px) {
  .cta-newsletter .cta-newsletter-inner h3 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

.cta-newsletter .cta-newsletter-inner h3 span {
  color: #df1741;
}

.cta-newsletter .subscrib-form {
  max-width: 725px;
  position: relative;
}

@media (max-width: 1199px) {
  .cta-newsletter .subscrib-form {
    max-width: 625px;
  }
}

@media (max-width: 991px) {
  .cta-newsletter .subscrib-form {
    max-width: 500px;
    margin: 0 auto;
  }
}

@media (max-width: 767px) {
  .cta-newsletter .subscrib-form {
    max-width: 95%;
    margin: 0 auto;
  }
}

.cta-newsletter .subscrib-form input {
  height: 45px;
  border: 0;
  padding-left: 25px;
  padding-right: 260px;
}

@media (max-width: 1199px) {
  .cta-newsletter .subscrib-form input {
    height: 40px;
    padding-right: 200px;
  }
}

@media (max-width: 991px) {
  .cta-newsletter .subscrib-form input {
    height: 38px;
    padding-left: 15px;
    padding-right: 140px;
  }
}

@media (max-width: 767px) {
  .cta-newsletter .subscrib-form input {
    padding-right: 120px;
  }
}

.cta-newsletter .subscrib-form button {
  background-color: #df1741;
  width: 240px;
  height: 45px;
  line-height: 45px;
  padding: 0;
  border: 0;
  outline: 0;
  font-size: 16px;
  font-size: 1.06667rem;
  font-weight: 600;
  color: #272443;
  position: absolute;
  right: 0;
  top: 0;
  border-radius: 5px;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

@media (max-width: 1199px) {
  .cta-newsletter .subscrib-form button {
    width: 180px;
    height: 40px;
    line-height: 40px;
  }
}

@media (max-width: 1199px) {
  .cta-newsletter .subscrib-form button {
    font-size: 14px;
    font-size: 0.93333rem;
    width: 120px;
    height: 38px;
    line-height: 38px;
  }
}

@media (max-width: 767px) {
  .cta-newsletter .subscrib-form button {
    width: 100px;
  }
}

.cta-newsletter .subscrib-form button:hover {
  background-color: #e4b500;
}

.cta-newsletter .newsletter-pic {
  position: absolute;
  right: 0;
  bottom: -100px;
}

@media (max-width: 991px) {
  .cta-newsletter .newsletter-pic {
    display: none;
  }
}

/*--------------------------------------------------------------
#2.5    testimoials-s2-slider
--------------------------------------------------------------*/
.testimoials-s2-slider .testimoials-s2-grid,
.testimoials-s2-grid-view .testimoials-s2-grid {
  border: 2px solid #df1741;
  padding: 65px 35px 35px;
  border-radius: 5px;
  position: relative;
}

@media (max-width: 767px) {

  .testimoials-s2-slider .testimoials-s2-grid,
  .testimoials-s2-grid-view .testimoials-s2-grid {
    padding: 45px 20px 20px;
  }
}

.testimoials-s2-slider .testimoials-s2-grid:after,
.testimoials-s2-grid-view .testimoials-s2-grid:after {
  background: #df1741 url("../images/testimonials/quote.png") no-repeat center center;
  content: "";
  width: 58px;
  height: 52px;
  position: absolute;
  right: 0;
  top: -2px;
  border-radius: 5px;
}

@media (max-width: 991px) {

  .testimoials-s2-slider .testimoials-s2-grid:after,
  .testimoials-s2-grid-view .testimoials-s2-grid:after {
    width: 50px;
    height: 48px;
    background-size: 20px;
  }
}

.testimoials-s2-slider .testimoials-s2-grid img,
.testimoials-s2-grid-view .testimoials-s2-grid img {
  width: auto;
  border-radius: 50%;
}

.testimoials-s2-slider .client-info,
.testimoials-s2-grid-view .client-info {
  margin-top: 10px;
  position: relative;
  overflow: hidden;
}

.testimoials-s2-slider .client-info .details,
.testimoials-s2-grid-view .client-info .details {
  height: 75px;
  display: inline-block;
  float: left;
  position: relative;
  padding-left: 90px;
}

@media (max-width: 991px) {

  .testimoials-s2-slider .client-info .details,
  .testimoials-s2-grid-view .client-info .details {
    float: none;
    display: block;
  }
}

.testimoials-s2-slider .client-info .details .pic,
.testimoials-s2-grid-view .client-info .details .pic {
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 50%;
}

.testimoials-s2-slider .client-info .info,
.testimoials-s2-grid-view .client-info .info {
  margin-top: 15px;
}

.testimoials-s2-slider .client-info h4,
.testimoials-s2-grid-view .client-info h4 {
  font-size: 18px;
  font-size: 1.2rem;
  margin: 0;
}

@media (max-width: 991px) {

  .testimoials-s2-slider .client-info h4,
  .testimoials-s2-grid-view .client-info h4 {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

@media (max-width: 767px) {

  .testimoials-s2-slider .client-info h4,
  .testimoials-s2-grid-view .client-info h4 {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.testimoials-s2-slider .client-info p,
.testimoials-s2-grid-view .client-info p {
  font-size: 14px;
  font-size: 0.93333rem;
  text-transform: uppercase;
}

@media (max-width: 767px) {

  .testimoials-s2-slider .client-info p,
  .testimoials-s2-grid-view .client-info p {
    font-size: 12px;
    font-size: 0.8rem;
  }
}

.testimoials-s2-slider .client-info .rating,
.testimoials-s2-grid-view .client-info .rating {
  display: inline-block;
  float: right;
  margin-top: 15px;
}

@media (max-width: 991px) {

  .testimoials-s2-slider .client-info .rating,
  .testimoials-s2-grid-view .client-info .rating {
    float: none;
    display: block;
    margin: -20px 0 0 88px;
  }
}

.testimoials-s2-slider .client-info .rating i,
.testimoials-s2-grid-view .client-info .rating i {
  color: #df1741;
}

@media screen and (min-width: 992px) {

  .testimoials-s2-slider .owl-controls .owl-nav,
  .testimoials-s2-grid-view .owl-controls .owl-nav {
    width: 100%;
    position: absolute;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
}

.testimoials-s2-slider .owl-controls .owl-nav .owl-prev,
.testimoials-s2-slider .owl-controls .owl-nav .owl-next,
.testimoials-s2-grid-view .owl-controls .owl-nav .owl-prev,
.testimoials-s2-grid-view .owl-controls .owl-nav .owl-next {
  background: transparent;
  font-size: 20px;
  font-size: 1.33333rem;
  color: #272443;
}

@media screen and (min-width: 992px) {

  .testimoials-s2-slider .owl-controls .owl-nav .owl-prev,
  .testimoials-s2-slider .owl-controls .owl-nav .owl-next,
  .testimoials-s2-grid-view .owl-controls .owl-nav .owl-prev,
  .testimoials-s2-grid-view .owl-controls .owl-nav .owl-next {
    font-size: 24px;
    font-size: 1.6rem;
    position: absolute;
    padding: 0;
    margin: 0;
  }
}

@media screen and (min-width: 992px) {

  .testimoials-s2-slider .owl-controls .owl-nav .owl-prev,
  .testimoials-s2-grid-view .owl-controls .owl-nav .owl-prev {
    left: -70px;
  }
}

@media screen and (min-width: 992px) {

  .testimoials-s2-slider .owl-controls .owl-nav .owl-next,
  .testimoials-s2-grid-view .owl-controls .owl-nav .owl-next {
    right: -70px;
  }
}

.testimoials-s2-slider .owl-controls .owl-nav .owl-prev:hover,
.testimoials-s2-slider .owl-controls .owl-nav .owl-next:hover,
.testimoials-s2-grid-view .owl-controls .owl-nav .owl-prev:hover,
.testimoials-s2-grid-view .owl-controls .owl-nav .owl-next:hover {
  background: transparent;
  color: #df1741;
}

.testimonials-s2-grid-view-section {
  padding-bottom: 70px;
}

@media (max-width: 991px) {
  .testimonials-s2-grid-view-section {
    padding-bottom: 50px;
  }
}

@media (max-width: 767px) {
  .testimonials-s2-grid-view-section {
    padding-bottom: 40px;
  }
}

.testimoials-s2-grid-view {
  overflow: hidden;
  margin: 0 -15px;
}

.testimoials-s2-grid-view .testimoials-s2-grid {
  width: calc(50% - 30px);
  float: left;
  margin: 0 15px 30px;
}

@media (max-width: 650px) {
  .testimoials-s2-grid-view .testimoials-s2-grid {
    width: calc(100% - 30px);
    float: none;
  }
}

/*--------------------------------------------------------------
#3.0    features
--------------------------------------------------------------*/
.features-title {
  border: 2px solid #df1741;
  padding: 45px 30px;
  border-radius: 5px;
}

@media (max-width: 991px) {
  .features-title {
    margin-bottom: 40px;
    padding: 35px 30px;
  }
}

@media (max-width: 991px) {
  .features-title {
    padding: 25px 20px;
  }
}

.features-title h2 {
  font-size: 30px;
  font-size: 2rem;
  margin: 0 0 0.9em;
}

@media (max-width: 1199px) {
  .features-title h2 {
    font-size: 25px;
    font-size: 1.66667rem;
  }
}

@media (max-width: 767px) {
  .features-title h2 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

.features-title p {
  margin: 0;
}

.feature-grid {
  text-align: center;
}

@media (max-width: 767px) {
  .feature-grid {
    margin-bottom: 35px;
    padding-bottom: 35px;
    border-bottom: 1px solid #e6e3e3;
  }
}

.feature-grid .icon {
  background-color: #df1741;
  width: 90px;
  height: 90px;
  line-height: 90px;
  text-align: center;
  margin: 0 auto 35px;
  border-radius: 50%;
}

@media (max-width: 1199px) {
  .feature-grid .icon {
    width: 75px;
    height: 75px;
    line-height: 75px;
  }
}

@media (max-width: 767px) {
  .feature-grid .icon {
    width: 60px;
    height: 60px;
    line-height: 60px;
    margin: 0 auto 25px;
  }
}

.feature-grid .icon .fi:before {
  font-size: 50px;
  color: #000;
}

@media (max-width: 1199px) {
  .feature-grid .icon .fi:before {
    font-size: 40px;
  }
}

@media (max-width: 767px) {
  .feature-grid .icon .fi:before {
    font-size: 30px;
  }
}

.feature-grid h3 {
  font-size: 20px;
  font-size: 1.33333rem;
  margin: 0 0 0.5em;
}

@media (max-width: 1199px) {
  .feature-grid h3 {
    font-size: 17px;
    font-size: 1.13333rem;
  }
}

.feature-grid p {
  margin-bottom: 1.7em;
}

@media (max-width: 767px) {
  .feature-grid p {
    margin-bottom: 1.4em;
  }
}

.feature-grid .more {
  color: #df1741;
  font-weight: 600;
}

.features .row>.col:last-child .feature-grid {
  border: 0;
  padding: 0;
  margin: 0;
}

/*--------------------------------------------------------------
#3.1    services-s3
--------------------------------------------------------------*/
.services-s3 {
  background-color: #e8f0f7;
  padding-bottom: 70px;
}

@media (max-width: 991px) {
  .services-s3 {
    padding-bottom: 50px;
  }
}

@media (max-width: 767px) {
  .services-s3 {
    padding-bottom: 40px;
  }
}

.services-s3-grids {
  overflow: hidden;
  margin: 0 -15px;
}

.services-s3-grids .grid {
  width: 33.33%;
  float: left;
  padding: 0 15px 30px;
  position: relative;
}

@media (max-width: 991px) {
  .services-s3-grids .grid {
    width: 50%;
  }
}

@media (max-width: 600px) {
  .services-s3-grids .grid {
    width: 100%;
    float: none;
  }
}

.services-s3-grids .grid:hover .details {
  background-color: #e4b500;
}

.services-s3-grids .grid:hover h3 a {
  color: #fff;
}

.services-s3-grids .grid .inner {
  position: relative;
  overflow: hidden;
}

.services-s3-grids .grid .details {
  background-color: #df1741;
  width: 100%;
  position: absolute;
  left: 0;
  bottom: 0;
  border-radius: 5px;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

.services-s3-grids .grid img {
  border-radius: 5px;
}

.services-s3-grids .grid h3 {
  font-size: 18px;
  font-size: 1.2rem;
  font-weight: normal;
  margin: 0;
}

@media (max-width: 1199px) {
  .services-s3-grids .grid h3 {
    font-size: 15px;
    font-size: 1rem;
  }
}

.services-s3-grids .grid h3 a {
  display: block;
  color: #272443;
  padding: 12px 18px;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -ms-transition: all 0.3s;
  transition: all 0.3s;
}

/*--------------------------------------------------------------
#3.2    pricing
--------------------------------------------------------------*/
.pricing {
  text-align: center;
}

.pricing .pricing-tab {
  list-style-type: none;
  overflow: hidden;
  display: inline-block;
  margin-bottom: 50px;
  border-radius: 5px;
}

.pricing .pricing-tab li {
  float: left;
}

.pricing .pricing-tab li a {
  display: block;
  font-size: 16px;
  font-size: 1.06667rem;
  font-weight: bold;
  color: #df1741;
  border: 2px solid #df1741;
  padding: 15px 80px;
}

@media (max-width: 1199px) {
  .pricing .pricing-tab li a {
    font-size: 14px;
    font-size: 0.93333rem;
    border: 2px solid #df1741;
    padding: 10px 50px;
  }
}

@media (max-width: 767px) {
  .pricing .pricing-tab li a {
    padding: 5px 30px;
  }
}

.pricing .pricing-tab li.active a {
  background-color: #df1741;
  color: #272443;
}

.pricing .pricing-grids {
  overflow: hidden;
  margin: 0 -15px;
}

.pricing .pricing-grids .pricing-grid {
  width: 33.33%;
  float: left;
  text-align: center;
  padding: 0 15px 15px;
}

@media (max-width: 991px) {
  .pricing .pricing-grids .pricing-grid {
    width: 50%;
  }
}

@media (max-width: 767px) {
  .pricing .pricing-grids .pricing-grid {
    width: 100%;
    float: none;
  }
}

.pricing .pricing-grids .pricing-details {
  -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
  border-radius: 0 0 5px 5px;
}

.pricing .pricing-grids .pricing-header {
  background-color: #272443;
  padding: 40px 0;
  border-radius: 5px 5px 0 0;
  position: relative;
  overflow: hidden;
}

@media (max-width: 1199px) {
  .pricing .pricing-grids .pricing-header {
    padding: 30px 0;
  }
}

.pricing .pricing-grids .pricing-header h3 {
  font-size: 24px;
  font-size: 1.6rem;
  color: #df1741;
  margin: 0;
}

@media (max-width: 1199px) {
  .pricing .pricing-grids .pricing-header h3 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

@media (max-width: 991px) {
  .pricing .pricing-grids .pricing-header h3 {
    font-size: 17px;
    font-size: 1.13333rem;
  }
}

.pricing .pricing-grids .pricing-header .price {
  font-family: "Montserrat", sans-serif;
  font-size: 48px;
  font-size: 3.2rem;
  font-weight: bold;
  color: #fff;
  position: relative;
}

@media (max-width: 1199px) {
  .pricing .pricing-grids .pricing-header .price {
    font-size: 40px;
    font-size: 2.66667rem;
  }
}

@media (max-width: 991px) {
  .pricing .pricing-grids .pricing-header .price {
    font-size: 35px;
    font-size: 2.33333rem;
  }
}

.pricing .pricing-grids .pricing-header .price span {
  font-size: 28px;
  font-size: 1.86667rem;
  position: relative;
  top: -13px;
}

@media (max-width: 991px) {
  .pricing .pricing-grids .pricing-header .price span {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

.pricing .pricing-grids .pricing-header .sing-up {
  background-color: #df1741;
  width: 165px;
  height: 40px;
  line-height: 40px;
  font-size: 16px;
  font-size: 1.06667rem;
  font-weight: 600;
  color: #272443;
  display: inline-block;
  border-radius: 5px;
}

@media (max-width: 1199px) {
  .pricing .pricing-grids .pricing-header .sing-up {
    width: 125px;
    height: 38px;
    line-height: 38px;
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

@media (max-width: 991px) {
  .pricing .pricing-grids .pricing-header .sing-up {
    width: 110px;
    height: 35px;
    line-height: 35px;
  }
}

.pricing .pricing-grids .pricing-header .off {
  background-color: #fd3e03;
  color: #fff;
  display: block;
  padding: 0 25px;
  position: absolute;
  right: -32px;
  top: -24px;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  -webkit-transform-origin: left bottom;
  -ms-transform-origin: left bottom;
  transform-origin: left bottom;
}

.pricing .pricing-grids .pricing-body {
  padding: 40px 15px;
}

.pricing .pricing-grids .pricing-body ul {
  list-style-type: none;
}

.pricing .pricing-grids .pricing-body ul li {
  color: #6a6a6a;
}

.pricing .pricing-grids .pricing-body ul li i {
  color: #df1741;
}

.pricing .pricing-grids .pricing-body ul>li+li {
  margin-top: 17px;
}

@media (max-width: 991px) {
  .pricing .pricing-grids .pricing-body ul>li+li {
    margin-top: 14px;
  }
}

.pricing .pricing-grids .pricing-footer {
  border-top: 1px solid #d9d9d9;
  padding: 19px 0;
}

@media (max-width: 1199px) {
  .pricing .pricing-grids .pricing-footer {
    padding: 14px 0;
  }
}

.pricing .pricing-grids .pricing-footer a {
  font-size: 15px;
  font-size: 1rem;
  color: #272443;
}

.pricing .pricing-grids .pricing-footer a span {
  font-size: 18px;
  font-size: 1.2rem;
  font-weight: 600;
}

.pricing .pricing-grids .pricing-footer a:hover {
  color: #df1741;
}

/*--------------------------------------------------------------
#4.0	faq-pg-section
--------------------------------------------------------------*/
.faq-pg-section .section-title-s4 p span {
  display: block;
  font-weight: 600;
}

@media screen and (min-width: 992px) {
  .faq-pg-section .faq-section {
    border: 1px solid #dee0e1;
    padding: 70px;
    border-radius: 5px;
  }
}

/*--------------------------------------------------------------
#5.0	service-single-section
--------------------------------------------------------------*/
.service-single-content .title {
  position: relative;
  margin-top: 52px;
}

@media screen and (min-width: 1200px) {
  .service-single-content .title {
    padding-right: 340px;
  }
}

@media (max-width: 767px) {
  .service-single-content .title {
    margin-top: 40px;
  }
}

.service-single-content .title h3 {
  font-size: 25px;
  font-size: 1.66667rem;
  margin: 0 0 2em;
}

@media (max-width: 991px) {
  .service-single-content .title h3 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

@media (max-width: 767px) {
  .service-single-content .title h3 {
    font-size: 17px;
    font-size: 1.13333rem;
  }
}

.service-single-content .download {
  position: absolute;
  right: 0;
  top: 0;
}

@media (max-width: 1199px) {
  .service-single-content .download {
    position: static;
    margin-bottom: 40px;
  }
}

.service-single-content .download a {
  padding: 10px 20px 10px 40px;
  border: 2px solid #df1741;
  color: #6a6a6a;
  font-weight: 600;
  position: relative;
}

@media (max-width: 1199px) {
  .service-single-content .download a {
    padding: 7px 15px 7px 30px;
  }
}

@media (max-width: 991px) {
  .service-single-content .download a {
    font-size: 14px;
    font-size: 0.93333rem;
    padding: 5px 15px 5px 30px;
  }
}

.service-single-content .download a i {
  position: absolute;
  left: 20px;
}

@media (max-width: 1199px) {
  .service-single-content .download a i {
    left: 10px;
  }
}

.service-single-content .details ul {
  list-style-type: none;
  padding: 2em 0 3em;
}

.service-single-content .details ul li {
  position: relative;
  padding-left: 75px;
  font-weight: 600;
}

@media (max-width: 1199px) {
  .service-single-content .details ul li {
    padding-left: 45px;
  }
}

.service-single-content .details ul>li+li {
  margin-top: 45px;
}

@media (max-width: 1199px) {
  .service-single-content .details ul>li+li {
    margin-top: 20px;
  }
}

.service-single-content .details ul li i {
  background-color: #df1741;
  width: 45px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  position: absolute;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

@media (max-width: 1199px) {
  .service-single-content .details ul li i {
    width: 30px;
    height: 30px;
    line-height: 30px;
    font-size: 12px;
  }
}

.service-single-content .details p {
  margin-bottom: 2em;
}

@media (max-width: 991px) {
  .service-single-content .details h4 {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

/*--------------------------------------------------------------
#6.0	service-single-section
--------------------------------------------------------------*/
.project-single-section .project-single-details {
  border: 2px solid #df1741;
  padding: 60px 50px;
  border-radius: 5px;
}

@media (max-width: 1199px) {
  .project-single-section .project-single-details {
    padding: 40px 30px;
  }
}

@media (max-width: 991px) {
  .project-single-section .project-single-details {
    margin-top: 50px;
  }
}

@media (max-width: 767px) {
  .project-single-section .project-single-details {
    padding: 30px 25px;
  }
}

.project-single-section .project-single-details h3 {
  font-size: 25px;
  font-size: 1.66667rem;
  margin: 0 0 0.75em;
}

@media (max-width: 991px) {
  .project-single-section .project-single-details h3 {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

.project-single-section .project-info {
  list-style-type: none;
  padding-top: 40px;
}

@media (max-width: 991px) {
  .project-single-section .project-info {
    padding-top: 20px;
  }
}

.project-single-section .project-info li {
  font-size: 15px;
  font-size: 1rem;
}

@media (max-width: 767px) {
  .project-single-section .project-info li {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.project-single-section .project-info li span {
  color: #272443;
  font-weight: 600;
}

.project-single-section .project-info>li+li {
  margin-top: 13px;
}

.project-single-section .project-info i {
  color: #df1741;
  display: inline-block;
  padding-right: 5px;
}

/*--------------------------------------------------------------
#6.0	contact-pg-section
--------------------------------------------------------------*/
.contact-pg-section {
  /*** contact form ***/
}

.contact-pg-section .contact-info ul li {
  padding-left: 45px;
  position: relative;
  list-style-type: none;
}

.contact-pg-section .contact-info ul>li+li {
  margin-top: 10px;
}

@media (max-width: 991px) {
  .contact-pg-section .contact-info ul>li+li {
    margin-top: 25px;
  }
}

.contact-pg-section .contact-info .icon {
  background-color: #df1741;
  width: 35px;
  height: 35px;
  line-height: 38px;
  font-size: 18px;
  font-size: 1.2rem;
  color: #fff;
  text-align: center;
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 50%;
}

.contact-pg-section .contact-info p {
  font-size: 17px;
  font-size: 1.13333rem;
  font-weight: bold;
  line-height: 1.4em;
  color: #272443;
  margin: 0;
}

@media (max-width: 1199px) {
  .contact-pg-section .contact-info p {
    font-size: 15px;
    font-size: 1rem;
  }
}

.contact-pg-section .contact-info p span {
  display: block;
  color: #969fab;
}

.contact-pg-section .location-map {
  background-color: red;
  height: 357px;
  border-radius: 10px;
}

@media (max-width: 991px) {
  .contact-pg-section .location-map {
    margin-top: 40px;
  }
}

.contact-pg-section .contact-form {
  margin-top: 70px;
}

.contact-pg-section .contact-form>div {
  margin-bottom: 40px;
}

@media (max-width: 991px) {
  .contact-pg-section .contact-form>div {
    margin-bottom: 20px;
  }
}

.contact-pg-section .contact-form label {
  font-size: 22px;
  font-size: 1.46667rem;
  color: #272443;
  font-weight: 600;
}

@media (max-width: 1199px) {
  .contact-pg-section .contact-form label {
    font-size: 15px;
    font-size: 1rem;
  }
}

.contact-pg-section .contact-form input,
.contact-pg-section .contact-form textarea {
  height: 45px;
  border: 2px solid #d1d7e0;
  border-radius: 10px;
}

@media (max-width: 991px) {

  .contact-pg-section .contact-form input,
  .contact-pg-section .contact-form textarea {
    height: 35px;
    border: 1px solid #d1d7e0;
    border-radius: 5px;
  }
}

.contact-pg-section .contact-form textarea {
  height: 230px;
}

@media (max-width: 991px) {
  .contact-pg-section .contact-form textarea {
    height: 150px;
  }
}

.contact-pg-section .contact-form .submit-btn {
  margin-bottom: 0;
}

.contact-pg-section .contact-form .submit-btn button {
  width: 100%;
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  font-size: 1.2rem;
  padding: 0;
  font-weight: 600;
}

@media (max-width: 1199px) {
  .contact-pg-section .contact-form .submit-btn button {
    height: 45px;
    line-height: 45px;
    font-size: 15px;
    font-size: 1rem;
  }
}

@media (max-width: 991px) {
  .contact-pg-section .contact-form .submit-btn button {
    height: 40px;
    line-height: 40px;
  }
}

.contact-pg-section #contact-form-s2 #loader i {
  color: #272443;
}

/*--------------------------------------------------------------
#7.0	blog-grid section
--------------------------------------------------------------*/
.blog-grid-section .news-grids {
  overflow: hidden;
  padding-top: 0;
}

.blog-grid-section .news-grids .grid {
  margin-bottom: 30px;
}

.blog-grid-section .news-grids>.grid:last-child {
  margin-top: 0;
}

.blog-grid-section .pagination-wrapper {
  margin-top: 50px;
}

@media (max-width: 991px) {
  .blog-grid-section .pagination-wrapper {
    margin-top: 30px;
  }
}

@media (max-width: 767px) {
  .blog-grid-section .pagination-wrapper {
    margin-top: 20px;
  }
}

/*--------------------------------------------------------------
# blog with sidebar page
--------------------------------------------------------------*/
/*--------------------------------------------------------------
#8.0	blog-with-sidebar
--------------------------------------------------------------*/
.blog-with-sidebar .news-grids {
  padding-top: 0;
}

.blog-with-sidebar .news-grids .grid {
  width: 50%;
  margin-bottom: 30px;
}

@media (max-width: 580px) {
  .blog-with-sidebar .news-grids .grid {
    width: 100%;
  }
}

.blog-with-sidebar .news-grids>.grid:last-child {
  margin-top: 0;
}

.blog-with-sidebar .pagination-wrapper {
  margin-top: 50px;
}

@media (max-width: 991px) {
  .blog-with-sidebar .pagination-wrapper {
    margin-top: 30px;
  }
}

@media (max-width: 767px) {
  .blog-with-sidebar .pagination-wrapper {
    margin-top: 20px;
  }
}

/*--------------------------------------------------------------
	blog details page
--------------------------------------------------------------*/
/*--------------------------------------------------------------
#9.0	blog-single-content
--------------------------------------------------------------*/
.blog-single {
  background-color: #f2f2f2;
}

.blog-single-content {
  /*** post ***/
  /*** tags ***/
  /*** comments ***/
}

.blog-single-content ul {
  list-style: none;
}

@media screen and (min-width: 992px) {
  .blog-single-content {
    margin-bottom: 80px;
  }
}

@media (max-width: 991px) {
  .blog-single-content {
    margin-bottom: 100px;
  }
}

.blog-single-content .post-title-meta .btn {
  background-color: #272443;
  font-size: 12px;
  font-size: 0.8rem;
  color: #fff;
  text-transform: uppercase;
  padding: 6px 13px;
  border: 0;
  border-radius: 0;
  cursor: auto;
}

.blog-single-content .post-title-meta h2 {
  font-size: 30px;
  font-size: 2rem;
  font-weight: blod;
  margin: 0.57em 0 0.53em;
  line-height: 1.3em;
  color: #1a1a1a;
}

@media screen and (min-width: 1200px) {
  .blog-single-content .post-title-meta h2 {
    padding-right: 200px;
  }
}

@media (max-width: 767px) {
  .blog-single-content .post-title-meta h2 {
    font-size: 22px;
    font-size: 1.46667rem;
  }
}

.blog-single-content .post-title-meta ul {
  overflow: hidden;
  margin-bottom: 24px;
}

.blog-single-content .post-title-meta ul li {
  font-size: 14px;
  font-size: 0.93333rem;
  float: left;
  text-transform: uppercase;
  margin-right: 8px;
  padding-right: 8px;
  position: relative;
}

.blog-single-content .post-title-meta ul li:after {
  content: "/";
  color: #999999;
  position: absolute;
  right: 0;
}

.blog-single-content .post-title-meta ul li:last-child:after {
  display: none;
}

.blog-single-content .post-title-meta ul li a {
  color: #999999;
}

.blog-single-content .post-title-meta ul li a:hover {
  color: #272443;
}

.blog-single-content h3 {
  font-size: 21px;
  font-size: 1.4rem;
  color: #1a1a1a;
  margin: 0;
}

@media (max-width: 767px) {
  .blog-single-content h3 {
    font-size: 18px;
  }
}

.blog-single-content p {
  font-size: 16px;
  font-size: 1.06667rem;
  margin-bottom: 15px;
}

@media (max-width: 767px) {
  .blog-single-content p {
    font-size: 14px;
  }
}

.blog-single-content .post,
.blog-single-content .comments {
  background-color: #fff;
}

.blog-single-content .post {
  padding: 0 45px 70px 45px;
}

@media (max-width: 991px) {
  .blog-single-content .post {
    padding: 0 45px 45px;
  }
}

@media (max-width: 767px) {
  .blog-single-content .post {
    padding: 0 20px 45px 20px;
  }
}

.blog-single-content .post h3 {
  margin: 1.9em 0 0.9em;
}

.blog-single-content .post .media {
  margin: 0 -45px 48px;
}

@media (max-width: 767px) {
  .blog-single-content .post .media {
    margin: 0 -20px 40px;
  }
}

.blog-single-content .gallery-post {
  margin: 35px 0 0;
}

.blog-single-content .gallery-post .gallery {
  overflow: hidden;
}

.blog-single-content .gallery-post .gallery>div:first-child {
  width: 60%;
  float: left;
}

.blog-single-content .gallery-post .gallery>div:last-child {
  width: 38%;
  float: right;
}

.blog-single-content .tag-share {
  overflow: hidden;
  margin: 25px 0 15px;
  /*** share ***/
}

@media (max-width: 767px) {
  .blog-single-content .tag-share {
    margin: 25px 0;
  }
}

.blog-single-content .tag-share>div {
  display: inline-block;
  float: left;
}

@media (max-width: 767px) {
  .blog-single-content .tag-share>div {
    display: block;
    float: none !important;
  }
}

.blog-single-content .tag-share>div:last-child {
  float: right;
}

.blog-single-content .tag-share>div:first-child {
  padding-left: 20px;
}

.blog-single-content .tag-share>div:first-child span {
  font-size: 15px;
  font-size: 1rem;
  font-weight: bold;
  color: #000;
  margin-right: 25px;
  position: relative;
  top: -11px;
}

@media (max-width: 991px) {
  .blog-single-content .tag-share>div:first-child {
    padding-left: 0;
  }

  .blog-single-content .tag-share>div:first-child span {
    font-size: 14px;
    font-size: 0.93333rem;
    margin-right: 15px;
    top: -20px;
  }
}

@media (max-width: 767px) {
  .blog-single-content .tag-share>div:first-child {
    padding-left: 0;
  }

  .blog-single-content .tag-share>div:first-child span {
    font-size: 14px;
    font-size: 0.93333rem;
    margin-right: 15px;
    top: 0;
    display: block;
    margin-bottom: 5px;
  }
}

.blog-single-content .tag-share ul {
  display: inline-block;
  overflow: hidden;
}

.blog-single-content .tag-share ul li {
  float: left;
  margin-right: 12px;
}

.blog-single-content .tag-share ul li:last-child {
  margin-right: 0;
}

.blog-single-content .tag-share .tag a {
  background-color: #fff;
  font-size: 14px;
  font-size: 0.93333rem;
  color: #333333;
  display: inline-block;
  text-align: center;
  padding: 7px 15px;
  text-transform: lowercase;
}

@media (max-width: 991px) {
  .blog-single-content .tag-share .tag a {
    padding: 5px 10px;
    margin-bottom: 10px;
  }
}

.blog-single-content .tag-share .tag a:hover {
  background-color: #df1741;
  color: #fff;
}

.blog-single-content .tag-share .share {
  padding-bottom: 0;
}

.blog-single-content .tag-share .share li {
  opacity: 0.9;
}

.blog-single-content .tag-share .share li:hover {
  opacity: 1;
}

.blog-single-content .tag-share .share li:first-child {
  background-color: #106ed2;
}

.blog-single-content .tag-share .share li:nth-child(2) {
  background-color: #3ad0fb;
}

.blog-single-content .tag-share .share li:last-child {
  background-color: #1379bb;
}

.blog-single-content .tag-share .share a {
  font-size: 16px;
  font-size: 1.06667rem;
  color: #fff;
  display: inline-block;
  padding: 6px 15px;
}

@media (max-width: 991px) {
  .blog-single-content .tag-share .share a {
    font-size: 14px;
    font-size: 0.93333rem;
    padding: 5px 10px;
  }
}

.blog-single-content .tag-share .share a i {
  display: inline-block;
  padding-right: 4px;
}

.blog-single-content .comments {
  padding: 55px 45px 0;
  /*** .article ***/
}

@media (max-width: 1199px) {
  .blog-single-content .comments {
    padding: 45px 25px 0;
  }
}

@media (max-width: 767px) {
  .blog-single-content .comments {
    padding: 40px 25px 0;
  }
}

.blog-single-content .comments .title {
  margin-bottom: 65px;
}

.blog-single-content .comments h3 {
  font-size: 22px;
  font-size: 1.46667rem;
  text-align: center;
  font-weight: bold;
}

.blog-single-content .comments>ol {
  padding-left: 0;
}

.blog-single-content .comments ol {
  list-style: none;
}

.blog-single-content .comments ol>li {
  margin-bottom: 35px;
}

.blog-single-content .comments ol>li:last-child {
  margin-bottom: 0;
}

.blog-single-content .comments ol>li>ol {
  margin-left: 28px;
  margin-top: 35px;
  padding: 0;
}

@media (max-width: 767px) {
  .blog-single-content .comments ol>li>ol {
    margin: 30px 0 0 0;
  }
}

.blog-single-content .comments ol>li>ol>li {
  background-color: #fafafa;
  padding: 30px;
  margin-bottom: 35px !important;
}

@media (max-width: 767px) {
  .blog-single-content .comments ol>li>ol>li {
    padding: 20px;
  }
}

.blog-single-content .comments ol>li>ol>li:last-child {
  margin-bottom: 0 !important;
}

.blog-single-content .comments .article {
  overflow: hidden;
}

.blog-single-content .comments .article h4 {
  font-size: 16px;
  font-size: 1.06667rem;
  margin: 0;
  text-transform: capitalize;
}

@media (max-width: 767px) {
  .blog-single-content .comments .article h4 {
    font-size: 14px;
  }
}

.blog-single-content .comments .article p {
  font-size: 15px;
  font-size: 1rem;
  margin-bottom: 5px;
}

@media (max-width: 767px) {
  .blog-single-content .comments .article p {
    font-size: 14px;
  }
}

.blog-single-content .comments .article .replay button {
  background-color: transparent;
  font-size: 16px;
  font-size: 1.06667rem;
  font-weight: bold;
  color: #272443;
  padding: 0;
  border: 0;
  outline: 0;
}

@media (max-width: 767px) {
  .blog-single-content .comments .article .replay button {
    font-size: 14px;
  }
}

.blog-single-content .comments .article .author-meta {
  overflow: hidden;
  margin-bottom: 5px;
}

.blog-single-content .comments .article .author-meta>div {
  display: inline-block;
}

.blog-single-content .comments .article .author-meta>div:last-child {
  font-size: 13px;
  font-size: 0.86667rem;
  color: gray;
  padding-left: 5px;
}

.blog-single-content .comments .article .author-pic {
  width: 10%;
  float: left;
}

@media (max-width: 767px) {
  .blog-single-content .comments .article .author-pic {
    width: 100%;
    float: none;
    margin-bottom: 10px;
  }
}

.blog-single-content .comments .article .details {
  width: 90%;
  float: left;
}

@media (max-width: 767px) {
  .blog-single-content .comments .article .details {
    width: 100%;
    float: none;
  }
}

.blog-single-content .comment-respond {
  margin-top: 75px;
}

.blog-single-content .comment-respond h3 {
  margin: 0 0 2em;
}

.blog-single-content .comment-respond form {
  margin: 0 -15px;
  position: relative;
}

.blog-single-content .comment-respond form input,
.blog-single-content .comment-respond form textarea {
  border-radius: 0;
  border: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-bottom: 1px solid #cccccc;
}

.blog-single-content .comment-respond form textarea {
  height: 110px;
}

.blog-single-content .comment-respond form>div {
  margin-bottom: 50px;
}

.blog-single-content .comment-respond form .theme-btn-s2 {
  text-transform: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  position: absolute;
  left: 50%;
  bottom: -100px;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  transform: translateX(-50%);
}

@media (max-width: 991px) {
  .blog-single-content .comment-respond form .theme-btn-s2 {
    position: relative;
    bottom: 0;
  }
}

/*--------------------------------------------------------------
	shop grid page
--------------------------------------------------------------*/
/*--------------------------------------------------------------
#10.0	products-section
--------------------------------------------------------------*/
.shop .products-grids>.col {
  margin-bottom: 30px;
}

@media (max-width: 500px) {
  .shop .products-grids>.col {
    width: 100%;
  }
}

/*--------------------------------------------------------------
	shop with sidebar page
--------------------------------------------------------------*/
/*--------------------------------------------------------------
#11.0	shop-main-content
--------------------------------------------------------------*/
.shop-with-sidebar .products-grids {
  overflow: hidden;
}

.shop-with-sidebar .products-grids .grid-wrapper {
  width: 33.33%;
  float: left;
  padding: 0 7.5px;
  margin-bottom: 20px;
}

@media (max-width: 1199px) {
  .shop-with-sidebar .products-grids .grid-wrapper {
    width: 50%;
  }
}

@media (max-width: 500px) {
  .shop-with-sidebar .products-grids .grid-wrapper {
    width: 100%;
  }
}

.shop-with-sidebar .products-grids .grid {
  -webkit-box-shadow: none;
  box-shadow: none;
  margin: 3px 0;
}

/*--------------------------------------------------------------
	Shop details page
--------------------------------------------------------------*/
/*--------------------------------------------------------------
#12.0	products-section
--------------------------------------------------------------*/
.shop-details-main-content {
  /*** product slider ***/
  /*** product info ***/
  /*** upsell product **/
}

.shop-details-main-content .shop-single-slider-wrapper .slider-for {
  text-align: center;
}

.shop-details-main-content .shop-single-slider-wrapper .slider-for img {
  display: inline-block;
}

.shop-details-main-content .shop-single-slider-wrapper .slider-nav {
  padding: 0 25px;
  margin-top: 35px;
}

.shop-details-main-content .shop-single-slider-wrapper .slider-nav>i {
  position: absolute;
  top: 50%;
  left: 0;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index: 100;
}

.shop-details-main-content .shop-single-slider-wrapper .slider-nav>i:hover {
  cursor: pointer;
}

.shop-details-main-content .shop-single-slider-wrapper .slider-nav .nav-btn-rt {
  left: auto;
  right: 0;
}

.shop-details-main-content .shop-single-slider-wrapper .slider-nav .slick-slide {
  text-align: center;
}

.shop-details-main-content .shop-single-slider-wrapper .slider-nav .slick-slide img {
  display: inline-block;
}

.shop-details-main-content .product-details {
  padding: 30px 30px 93px;
  /*** product option ***/
}

@media (max-width: 1199px) {
  .shop-details-main-content .product-details {
    padding: 40px 30px 85px;
  }
}

@media (max-width: 991px) {
  .shop-details-main-content .product-details {
    margin-top: 45px;
    padding: 40px 30px;
  }
}

@media (max-width: 767px) {
  .shop-details-main-content .product-details {
    padding: 0;
  }
}

.shop-details-main-content .product-details h2 {
  font-size: 27px;
  font-size: 1.8rem;
  line-height: 1.3em;
  margin: 0 0 0.33em;
  text-transform: capitalize;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-details h2 {
    font-size: 22px;
    font-size: 1.46667rem;
  }
}

.shop-details-main-content .product-details .rating i {
  font-size: 16px;
  font-size: 1.06667rem;
  color: #df1741;
}

.shop-details-main-content .product-details .price {
  font-size: 36px;
  font-size: 2.4rem;
  color: #272443;
  margin: 7px 0 14px;
}

@media (max-width: 991px) {
  .shop-details-main-content .product-details .price {
    font-size: 30px;
    font-size: 2rem;
  }
}

@media (max-width: 767px) {
  .shop-details-main-content .product-details .price {
    font-size: 25px;
    font-size: 1.66667rem;
  }
}

.shop-details-main-content .product-details .price .old {
  font-size: 24px;
  font-size: 1.6rem;
  font-weight: normal;
  color: #9d9d9d;
  text-decoration: line-through;
  display: inline-block;
  margin-left: 5px;
}

@media (max-width: 991px) {
  .shop-details-main-content .product-details .price .old {
    font-size: 20px;
    font-size: 1.33333rem;
  }
}

@media (max-width: 767px) {
  .shop-details-main-content .product-details .price .old {
    font-size: 18px;
    font-size: 1.2rem;
  }
}

.shop-details-main-content .product-details p {
  margin: 0;
}

.shop-details-main-content .product-details .product-option {
  margin-top: 45px;
}

.shop-details-main-content .product-details .product-option .p-row {
  overflow: hidden;
}

.shop-details-main-content .product-details .product-option .p-row>div {
  height: 35px;
  display: inline-block;
  float: left;
  margin-right: 15px;
}

.shop-details-main-content .product-details .product-option .p-row>div:first-child {
  width: 85px;
}

.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn:hover,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s2:hover,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s3:hover,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s4:hover,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s5:hover {
  background: #272443;
  border-color: #272443;
  color: #fff;
}

.shop-details-main-content .product-details .product-option .theme-btn,
.shop-details-main-content .product-details .product-option .theme-btn-s2,
.shop-details-main-content .product-details .product-option .theme-btn-s3,
.shop-details-main-content .product-details .product-option .theme-btn-s4,
.shop-details-main-content .product-details .product-option .theme-btn-s5 {
  font-size: 16px;
  font-size: 1.06667rem;
  padding: 0 10px;
  height: 35px;
  line-height: 35px;
}

@media (max-width: 767px) {

  .shop-details-main-content .product-details .product-option .theme-btn,
  .shop-details-main-content .product-details .product-option .theme-btn-s2,
  .shop-details-main-content .product-details .product-option .theme-btn-s3,
  .shop-details-main-content .product-details .product-option .theme-btn-s4,
  .shop-details-main-content .product-details .product-option .theme-btn-s5 {
    font-size: 14px;
    font-size: 0.93333rem;
  }
}

.shop-details-main-content .product-details .product-option .theme-btn:before,
.shop-details-main-content .product-details .product-option .theme-btn-s2:before,
.shop-details-main-content .product-details .product-option .theme-btn-s3:before,
.shop-details-main-content .product-details .product-option .theme-btn-s4:before,
.shop-details-main-content .product-details .product-option .theme-btn-s5:before {
  display: none;
}

.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s2,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s3,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s4,
.shop-details-main-content .product-details .product-option .p-row>div:last-child .theme-btn-s5 {
  background-color: #fff;
  color: #272443;
  border: 1px solid #e6e6e6;
}

.shop-details-main-content .product-details #count-product {
  border-radius: 0;
  border: 1px solid #e6e6e6;
}

.shop-details-main-content .product-details #count-product:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
  outline: none;
}

.shop-details-main-content .product-details .bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-up,
.shop-details-main-content .product-details .bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-down {
  border-radius: 0;
  border-color: #e6e6e6;
}

.shop-details-main-content .product-details .bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-up:hover,
.shop-details-main-content .product-details .bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-down:hover {
  background-color: #272443;
  color: #fff;
}

.shop-details-main-content .product-info {
  margin-top: 75px;
  /*** tabs ***/
  /*** client review ***/
  /*** review form ***/
}

.shop-details-main-content .product-info h4 {
  font-size: 15px;
  text-transform: uppercase;
  margin: 0;
  line-height: 1.7em;
}

.shop-details-main-content .product-info p {
  font-size: 14px;
}

.shop-details-main-content .product-info .tab-pane p:last-child {
  margin-bottom: 0;
}

.shop-details-main-content .product-info .nav-tabs {
  border: 0;
  margin-bottom: 30px;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .nav-tabs {
    margin-bottom: 20px;
  }
}

.shop-details-main-content .product-info .nav-tabs li {
  margin-right: 45px;
  border: 0;
}

.shop-details-main-content .product-info .nav-tabs li:last-child {
  margin-right: 0;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .nav-tabs li {
    margin-right: 15px;
  }
}

.shop-details-main-content .product-info .nav-tabs li.active a {
  border: 0;
  outline: 0;
}

.shop-details-main-content .product-info .nav-tabs a {
  font-size: 18px;
  color: #b3b3b3;
  border: 0;
  margin: 0;
  padding: 0;
  text-transform: uppercase;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .nav-tabs a {
    font-size: 16px;
    font-size: 1.06667rem;
  }
}

.shop-details-main-content .product-info .nav-tabs a:hover,
.shop-details-main-content .product-info .nav-tabs .active a {
  background: transparent;
  color: #272443;
}

.shop-details-main-content .product-info .client-review {
  overflow: hidden;
  margin-bottom: 30px;
}

.shop-details-main-content .product-info .client-review:last-child {
  margin-bottom: 0;
}

.shop-details-main-content .product-info .client-review .client-pic {
  width: 14%;
  float: left;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .client-review .client-pic {
    width: 100%;
    float: none;
    margin-bottom: 10px;
  }
}

.shop-details-main-content .product-info .client-review .details {
  width: 86%;
  float: right;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .client-review .details {
    width: 100%;
    float: none;
  }
}

.shop-details-main-content .product-info .client-review .name-rating-time {
  border-bottom: 1px solid #e6e6e6;
  margin-top: -5px;
}

@media (max-width: 991px) {
  .shop-details-main-content .product-info .client-review .name-rating-time {
    margin-top: 0;
  }
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .client-review .name-rating-time {
    padding-bottom: 3px;
  }
}

.shop-details-main-content .product-info .client-review .name-rating-time>div,
.shop-details-main-content .product-info .client-review .name-rating>div {
  display: inline-block;
  font-size: 14px;
}

@media (max-width: 767px) {

  .shop-details-main-content .product-info .client-review .name-rating-time>div,
  .shop-details-main-content .product-info .client-review .name-rating>div {
    font-size: 12px;
    display: block;
  }

  .shop-details-main-content .product-info .client-review .name-rating-time>div h4,
  .shop-details-main-content .product-info .client-review .name-rating>div h4 {
    font-size: 12px;
  }
}

.shop-details-main-content .product-info .client-review .rating {
  font-size: 14px;
  padding-left: 10px;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .client-review .rating {
    padding-left: 0;
    margin: 2px 0 7px;
  }
}

.shop-details-main-content .product-info .client-review .name-rating-time .time {
  float: right;
  color: #b3b3b3;
  text-transform: uppercase;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .client-review .name-rating-time .time {
    float: none;
  }
}

.shop-details-main-content .product-info .client-review .review-body {
  padding-top: 8px;
}

.shop-details-main-content .product-info .client-review .review-body p {
  font-size: 14px;
}

@media screen and (min-width: 1200px) {
  .shop-details-main-content .product-info .review-form-wrapper {
    padding-left: 45px;
  }
}

@media (max-width: 991px) {
  .shop-details-main-content .product-info .review-form {
    margin-top: 45px;
  }
}

.shop-details-main-content .product-info .review-form h4 {
  margin-bottom: 1.73em;
}

.shop-details-main-content .product-info .review-form form input,
.shop-details-main-content .product-info .review-form form textarea {
  border-radius: 0;
}

.shop-details-main-content .product-info .review-form form input:focus,
.shop-details-main-content .product-info .review-form form textarea:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
  outline: none;
}

.shop-details-main-content .product-info .review-form form textarea {
  height: 130px;
}

.shop-details-main-content .product-info .review-form form>div {
  margin-bottom: 27px;
}

.shop-details-main-content .product-info .review-form form>div:last-child {
  margin-bottom: 0;
}

.shop-details-main-content .product-info .review-form form .rating-post>div {
  display: inline-block;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .review-form form .rating-post>div {
    display: block;
    float: none !important;
  }
}

.shop-details-main-content .product-info .review-form form .rating-post>div:last-child {
  float: right;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .review-form form .rating-post>div:last-child {
    margin-top: 20px;
  }
}

.shop-details-main-content .product-info .review-form form .rating a {
  font-size: 14px;
  color: #cccccc;
  display: inline-block;
  margin-right: 10px;
}

@media (max-width: 767px) {
  .shop-details-main-content .product-info .review-form form .rating a {
    font-size: 12px;
    margin-right: 5px;
  }
}

.shop-details-main-content .product-info .review-form form .rating a:last-child {
  margin: 0;
}

.shop-details-main-content .product-info .review-form form .rating a:hover {
  color: #272443;
}

.shop-details-main-content .product-info .review-form form .theme-btn,
.shop-details-main-content .product-info .review-form form .theme-btn-s2,
.shop-details-main-content .product-info .review-form form .theme-btn-s3,
.shop-details-main-content .product-info .review-form form .theme-btn-s4,
.shop-details-main-content .product-info .review-form form .theme-btn-s5 {
  border-radius: 0;
  -webkit-box-shadow: none;
  box-shadow: none;
}

@media screen and (min-width: 767px) {

  .shop-details-main-content .product-info .review-form form .theme-btn,
  .shop-details-main-content .product-info .review-form form .theme-btn-s2,
  .shop-details-main-content .product-info .review-form form .theme-btn-s3,
  .shop-details-main-content .product-info .review-form form .theme-btn-s4,
  .shop-details-main-content .product-info .review-form form .theme-btn-s5 {
    font-size: 15px;
    font-size: 1rem;
    padding: 0 25px;
  }
}

.shop-details-main-content .upsell-product {
  padding-top: 140px;
}

@media (max-width: 991px) {
  .shop-details-main-content .upsell-product {
    padding-top: 90px;
  }
}

@media (max-width: 767px) {
  .shop-details-main-content .upsell-product {
    padding-top: 80px;
  }
}

.shop-details-main-content .upsell-product .title {
  margin-bottom: 50px;
}

@media (max-width: 767px) {
  .shop-details-main-content .upsell-product .title {
    margin-bottom: 20px;
  }
}

.shop-details-main-content .upsell-product .title h2 {
  font-size: 36px;
  margin: 0;
  text-transform: capitalize;
  text-align: center;
}

@media (max-width: 767px) {
  .shop-details-main-content .upsell-product .title h2 {
    font-size: 25px;
  }
}

.shop-details-main-content .upsell-product .title h2 span {
  color: #272443;
}

.shop-details-main-content .upsell-product-slider .grid {
  width: auto !important;
}

.shop-details-main-content .upsell-product-slider .owl-controls {
  margin: 0;
}

.shop-details-main-content .upsell-product-slider .owl-dots span {
  background-color: #fff;
  width: 12px;
  height: 12px;
  border: 2px solid #000;
  margin: 0 5px 0 0;
}

.shop-details-main-content .upsell-product-slider .owl-dots .active span {
  background-color: #272443;
  width: 14px;
  height: 14px;
  border-color: #272443;
}

/*# sourceMappingURL=style.css.map */




/* GET A QUOTE BUTTON */

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text],
.form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus,
.form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #d86c79;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom: 10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: #d01c28;
}

/* Add some hover effects to buttons */
.form-container .btn:hover,
.open-button:hover {
  opacity: 1;
}




/* PRODUCT PAGE BOOTSTRAP ELEMENT */

.container-filter {
  margin-top: 0;
  margin-right: 0;
  margin-left: 0;
  margin-bottom: 30px;
  padding: 0;
  text-align: center;
}

.container-filter li {
  list-style: none;
  display: inline-block;
}

.container-filter a {
  display: block;
  font-size: 14px;
  margin: 10px 20px;
  text-transform: uppercase;
  cursor: pointer;
  font-weight: 400;
  line-height: 30px;
  -webkit-transition: all 0.6s;
  border-bottom: 1px solid transparent;
  color: white !important;
}

.container-filter a:hover {
  color: white !important;
}

.container-filter a.active {
  color: white !important;
  /* border-bottom: 1px solid #222222; */
}

.item-box {
  position: relative;
  overflow: hidden;
  display: block;
}

.item-box a {
  display: inline-block;
}

.item-box .item-mask {
  background: #df1741;
  position: absolute;
  transition: all 0.5s ease-in-out 0s;
  -moz-transition: all 0.5s ease-in-out 0s;
  -webkit-transition: all 0.5s ease-in-out 0s;
  -o-transition: all 0.5s ease-in-out 0s;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  opacity: 0;
  visibility: hidden;
  overflow: hidden;
  text-align: center;
}

.item-box .item-mask .item-caption {
  position: absolute;
  width: 100%;
  bottom: 10px;
  opacity: 0;
}

.item-box:hover .item-mask {
  opacity: 1;
  visibility: visible;
  cursor: pointer !important;
}

.item-box:hover .item-caption {
  opacity: 1;
}

.item-box:hover .item-container {
  width: 100%;
}

.services-box {
  padding: 45px 25px 45px 25px;
}


/* PRODUCT PAGE TEMPLATE ELEMENT */

.categories ul {
  list-style: none;
  padding: 0;
  margin: 0;
  margin-bottom: 20px;
  text-align: center;

}

.categories ul li {
  display: inline-block;
  padding: 0;
  line-height: 24px;
  background: transparent;
  margin: 0;
  margin-left: 5px;
  margin-bottom: 10px;
}

.categories ul li a {
  display: block;
  font-size: 18px;
  font-weight: 500;
  padding: 10px 20px;
  border-radius: 5px;
  border: 2px solid transparent;
  -webkit-transition: all .2s ease-out;
  transition: all .2s ease-out;
}

.categories ul li a,
.categories ul li a:active,
.categories ul li a:hover {
  line-height: 24px;
  background: #fff;
  color: #4E5961;
  text-decoration: none;
}

.categories ul li a:hover,
.categories ul li.active a {
  color: #fff;
  background: #5cc9df;
}

.projects-container .row {
  -webkit-transition: height .5s ease-out;
  transition: height .5s ease-out;
}

.portfolio-item {
  position: relative;
  margin-bottom: 30px;
  -webkit-transform: scale(1);
  transform: scale(1);
  opacity: 1;
  -webkit-transition: all .4s ease-out;
  transition: all .4s ease-out;
}

.portfolio-item.filtered {
  -webkit-transform: scale(0.5);
  transform: scale(0.5);
  opacity: 0.2;
  cursor: default;
}

.no-opacity .portfolio-item.filtered {
  display: none;
}

.portfolio-item.filtered a {
  cursor: default;
}

.portfolio-item.filtered .enlarge,
.portfolio-item.filtered .link,
.portfolio-item.filtered .overlay-mask,
.portfolio-item.filtered .project-title {
  display: none;
}

.portfolio-thumb {
  display: block;
  position: relative;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
  overflow: hidden;
}

.scrollimation .portfolio-thumb {
  -webkit-transform: translateY(100px);
  transform: translateY(100px);
  opacity: 0;
  -webkit-transition: opacity .4s ease-out, -webkit-transform .4s ease-out;
  transition: opacity .4s ease-out, transform .4s ease-out;
}

.touch .scrollimation .portfolio-thumb,
.scrollimation .portfolio-thumb.in {
  -webkit-transform: translateY(0px);
  transform: translateY(0px);
  opacity: 1;
}

.portfolio-thumb .overlay-mask {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #5CC9DF;
  opacity: 0;
  filter: alpha(opacity=0);
  z-index: 1;
  -webkit-transition: opacity .3s ease-out;
  transition: opacity .3s ease-out;
}


.portfolio-thumb:hover .overlay-mask {
  opacity: 0.8;
  filter: alpha(opacity=80);
}

.portfolio-thumb .enlarge,
.portfolio-thumb .link {
  display: inline-block;
  margin: 0;
  margin-top: -25px;
  font-size: 50px;
  line-height: 50px;
  color: #fff;
  opacity: 0;
  filter: alpha(opacity=0);
  position: absolute;
  height: 50px;
  width: 64px;
  top: 40%;
  left: 50%;
  text-align: center;
  z-index: 3;

}

.portfolio-thumb .enlarge {
  margin-left: -84px;
  -webkit-transform: translateX(-200px);
  transform: translateX(-200px);
  -webkit-transition: all .3s ease-out;
  transition: all .3s ease-out;
}

.portfolio-thumb:hover .enlarge {
  -webkit-transform: translateX(0);
  transform: translateX(0);
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transition: all .3s ease-out .3s;
  transition: all .3s ease-out .3s;
}

.portfolio-thumb .link {
  margin-left: 20px;
  -webkit-transform: translateX(200px);
  transform: translateX(200px);
  -webkit-transition: all .3s ease-out;
  transition: all .3s ease-out;
}

.portfolio-thumb:hover .link {
  -webkit-transform: translate(0);
  transform: translate(0);
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transition: all .3s ease-out .6s;
  transition: all .3s ease-out .6s;
}

.portfolio-thumb .enlarge.centered,
.portfolio-thumb .link.centered {
  margin-left: -32px;
  -webkit-transform: translateY(-200px);
  transform: translateY(-200px);
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}

.portfolio-thumb:hover .enlarge.centered,
.portfolio-thumb:hover .link.centered {
  -webkit-transform: translateY(0);
  transform: translateY(0);
  -webkit-transition-delay: 0.3s;
  transition-delay: 0.3s;
}

.portfolio-thumb .project-title {
  display: block;
  width: 100%;
  position: absolute;
  bottom: -100px;
  background: #fff;
  margin: 0;
  padding: 20px 0;
  font-size: 21px;
  font-weight: 300;
  color: #777;
  text-align: center;
  z-index: 2;
  -webkit-transition: bottom .4s ease-out, color .2s ease-out;
  transition: bottom .4s ease-out, color .2s ease-out;
}

.portfolio-thumb:hover .project-title {
  bottom: 0;
  -webkit-transition: bottom .3s ease-out .1s, color .2s ease-out 0s;
  transition: bottom .3s ease-out .1s, color .2s ease-out 0s;
}

.portfolio-thumb .project-title:hover {
  color: #5CC9DF;
}


.mySlides {
  display: none;
}

img {
  vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  /* background-color: black; */
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {
    opacity: .4
  }

  to {
    opacity: 1
  }
}

@keyframes fade {
  from {
    opacity: .4
  }

  to {
    opacity: 1
  }
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {
    font-size: 11px
  }
}


/* added when creating Services */
.listItem {
  font-family: Montserrat, sans-serif;
  font-weight: bold;
  color: #272443;
  font-size: 15px;
}

.imgcontainer {
  padding: 10px 30px;
  width: 100%;
  margin: 0 auto;
  max-width: 500px;
}

.image-stack {
  position: relative;
  width: 100%;
}

.image-stack__item--bottom {
  position: absolute;
  right: 0;
  top: 0;
  width: 60%;
  z-index: -1;
}

.image-stack__item--top {
  padding-top: 20px;
  padding-right: 20%;
  width: 70%;
}

.imgcontainer img {
  width: 100%;
  border: #d01c28 2px solid;

}

.myCar .carousel-indicators {
  transform: translateY(60px);
}

.myCar .carousel-indicators li.active {
  background-color: #d01c28;
}

.myCar .carousel-indicators li {
  border: #df1741 1px solid;
  background-color: #dddddd;
}

.servicesCard {
  margin-top: 25px;
  text-align: center;
  border-radius: 10px;
  background-color: #df1741;
  padding: 25px;
}

.servicesCard h5 {
  padding-top: 20px;
  font-size: 20px;
  font-family: "Montserrat", sans-serif;
  color: white;
}

.servicesCard p {
  color: white;
}

.servicesCard .myBtn {
  padding: 10px 20px 10px 20px;
  width: 241px;
  height: 58px;
  border-radius: 7px;
  filter: drop-shadow(0px 3px 3.5px rgba(0, 0, 0, 0.16));
  background-image: linear-gradient(180deg, #282343 0%, #08070d 100%);
  color: white;
  font-weight: 600;
}

@media only screen and (max-width: 300px) {
.slider1 img {
    content: url("../images/slider/Slide-1.png");
}
.slide-caption{
    display : none!important;
}
}

.header-style-5 .topbar{
    background-color: #EB3A3A !important;
}

.topbar-imagecont{
    display: flex !important ;
    align-items: center !important;
    gap: 5px !important;
}

.topbar-style-1, .topbar-style-2{
    padding: 6px 0px !important;
}


.header-style-4 .social>span, .header-style-5 .social>span{
color: #FFF5F6 !important;
font-family: Montserrat !important;
font-size: 16px !important;
font-weight: 600 !important;
line-height: 19.5px !important;

}

.header-style-5 .lower-topbar{
    background-color: #141414 !important;
}


.addrowheader{
    display: flex !important;
    justify-content: space-between !important;
    gap: 20px !important;
    align-items: center !important;
}

.awardwrapcont{
    display: flex !important;
    gap: 8px  !important;
align-items: center !important;
}

.award-info h4{
    font-family: Montserrat !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    line-height: 21.94px !important;
    text-align: left !important;
color: #FFF5F6 !important;    
}
.awardwrapcont img{
max-width: 34px !important;
max-height: 34px !important;
width: 100% !important;
height: 100% !important; 
}

.award-info p{
    font-family: Montserrat !important;
    font-size: 16px !important;
    font-weight: 500 !important;
    line-height: 19.5px !important;
    text-align: left !important;
color: #FFF5F6 !important; 
margin: 0px !important;    
}

.headercontw{
width: 100% !important;
}

.header-style-5 .navigation, .header-style-5 .navigation .container{
background: #141414 !important;
 
}

.site-header #navbar>ul>li>a{
color: #FFF5F6 !important;
}

.header-style-5 .navigation{
border-top: 2px solid #434343 !important; 
}

.site-header #navbar{
display: flex !important;
   width: 100% !important;
   justify-content: space-between !important;
   align-items: center !important;
margin: 0 auto;
}

.site-logo{
    max-width: 112px !important;
    width: 100% !important;
}

.container::before {
    content: none !important;
}

.slide{
position:relative !important;

}



.hero .slide:before{
background-color: rgba(0, 0, 0, 0.5) !important;
}

.site-header #navbar>ul>li>a{
text-transform: uppercase !important;
    
}
.topbar-img{
max-width: 16px !important;
}

.secpadcol1{
display: flex !important;
flex-direction: column !important;
  max-width: 707px !important;
width: 100% !important;

}
.secpadrow1{
 display:flex !important;
 justify-content: space-between !important;


}

.section-title h2:before{
 display: none !important;
}

.section-title{
 margin:0px !important;
}

.theme-btn{
border-radius: 40px !important;
text-transform: uppercase !important;
width:216px !important;
height: 54px !important;
background: #EB3A3A !important;
border: 1px solid #F57C00 !important;
padding: 10px 20px !important;
}

.hero .hero-slider .slide-caption>.btns>a:first-child{
width: 190px !important;
height: 54px !important;
border-radius: 27px !important;
background: #EB3A3A !important;

}




@media (max-width:992px) {
    .site-header #navbar{
        display:none !important;
    }
    .addrowheader{
        display: none !important;
    }
  .addrowheader2{
        display: flex !important;
flex-direction: column !important;
 align-items: center !important;
gap: 20px !important;
    }

}


@media (min-width:992px) {
     .addrowheader2{
        display: none !important;
    }
}

@media (max-width:500px){
.award-info h4{
 font-size: 11px !important;
line-height: 16px !important;
}
.award-info p{
 font-size: 10px !important;
line-height: 16px !important;
}

}


@media (max-width: 991px) {

 .site-header .navbar-header button {
    position: relative !important;
}

.navbar{
min-height: 0px !important;
height:0px !important;
}
.makeitnone{
display: none !important;
}


}


  
  /* THIS IS SECTION 2 OUR PRODUCT  CSS */
  
  
  
  .primesec2wrap2{
    width: 100%;
    position: relative;
    background-color: #F2F2F2;
  }
  
  .primesec2cont3{
    max-width: 1240px;
    margin: 0 auto;
    padding: 60px 20px;
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    gap: 40px;

  }

  .prims2item3{
    max-width: 380px;
    width: 100%;
    background-color: #FFFFFF;
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    padding: 40px 30px;
    height: 428px;
    transition: all 0.4s;

      }
    
      .prims2item3:hover{
        border-left: 4px solid #EB3A3A;
        border-bottom: 4px solid #EB3A3A;
        border-top: 4px solid #EB3A3A;
      }
    
      .prims2item3 img{
        max-width: 220px;
    width: 220px;
    height: 220px;
      }
    


      .priitembotton3{
        display: flex;
        flex-direction:column;
        gap: 5px;
        align-items: center;
      }
    
      .priitembotton3 h3{
        font-family: Montserrat;
        font-size: 20px;
        font-weight: 600;
        line-height: 30px;
        color: #101010;
        text-align: center;
        
      }
    
    
    
      .priitembotton3 p:nth-child(2){
        font-family: Montserrat;
        font-size: 16px;
        font-weight: 500;
        line-height: 26px;   
    color: #EB3A3A;    
    text-decoration: underline;
      }
    
  
      @media (max-width:992px) {
        .primesec2cont3{
          display: flex;
          flex-wrap: wrap;
          justify-content: center;
        }
      }
  
  @media (max-width:550px) {
    .priitembotton3 h3{
      font-size: 18px;
      line-height: 26px;
      text-align: center;
    }
    .priitembotton3 p:nth-child(2){
      font-size: 14px;
      line-height: 24px;
    }
  }


  /* section2 start css */
  .hydrasec2{
position: relative;
  }


  .hydraimgbg{
    position: absolute;
    top: 0;
    left: 0;
    bottom:0;
    right: 0;
    width: 100%;
    height: 100%;
  }
  .hydrasec2cont{
    max-width: 1240px;
    padding: 60px 20px;
    margin: 0 auto;
    width: 100%;
    display: flex;
   flex-direction: column;
   gap: 40px; 
   align-items: center;
   justify-content: center;



  }

  .hydra_head{
    display: flex;
    flex-direction: column;
    gap: 14px;
    align-items: center;
  }

  .hydra_head h3{
    font-family: Montserrat;
font-size: 32px;
font-weight: 600;
line-height: 40px;
text-align: center;
color: #000000;
  }

  .hdyrline{
    width: 191px;
height: 4px;
background-color: #EB3A3A;
  }

  .hydraboxes{
    display: flex;
    align-items: center;
    gap: 20px;
    justify-content: space-between;
  }



  .singhybox{
    max-width: 273px;
height: 245px;
border: 1px solid #EB3A3A;
border-radius: 10px;
padding: 40px 20px 0px 20px;
display: flex;
flex-direction: column;
gap: 16px;
  }

  .singhybox h3{
    font-family: Montserrat;
font-size: 20px;
font-weight: 600;
line-height: 24px;
text-align: left;
color: #222222;
  }
  .singhybox p{
    font-family: Montserrat;
    font-size: 18px;
    font-weight: 400;
    line-height: 24px;
  text-align: left;
color: #222222;    
  }

  .singhybox img{
    max-width: 44px;
    max-height: 44px;
  }

  @media (max-width:1170px) {
    .hydraboxes{
      display: grid;
      grid-template-columns: repeat(2 , 1fr);
      gap: 30px 30px;
    }
  }
  @media (max-width:650px) {
    .hydraboxes{
      display: grid;
      grid-template-columns: repeat(1 , 1fr);
      gap: 30px 30px;
    }
  }

  /* this is section 3 */
  .hysec3{
position: relative;
width: 100%;
  }

  .hydrasec3cont{
    max-width: 1240px;
    width: 100%;
    margin: 0 auto;
    padding: 60px 20px;
    display: flex;
    flex-direction: column;
    gap: 40px;
  }

  .hysec3_head{
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
  }
  .hysec3_head h3 span{
    font-family: Montserrat;
    font-size: 24px;
    font-weight: 600;
    line-height: 34px;
    text-align: center;
color: #000000;
    
  }
  .hysec3_head h3{
    font-family: Montserrat;
    font-size: 24px;
    font-weight: 500;
    line-height: 34px;
    text-align: center;
max-width: 363px;
    
  }
  .hysec3_head p{
    width: 262px;
    height: 4px;
    background: #EB3A3A;
    
  }

  .hydrasc_boxes{
    display: flex;
    align-items: center;
    gap: 20px;
    justify-content: space-between;
    /* flex-wrap: wrap; */
    /* justify-content: center; */
  }

  .dr3box{
    display: flex;
    flex-direction: column;
    gap: 16px;
    max-width: 250px;
    width: 100%;
  }

  .dr3box h4{
    font-family: Montserrat;
    font-size: 18px;
    font-weight: 600;
    line-height: 21.94px;
    text-align: left;

  }

  .dr3box p{
    font-family: Montserrat;
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
    text-align: left;
    
  }

  @media (max-width:992px) {
    .hydrasc_boxes{
      display: grid;
      gap: 40px 20px;
      grid-template-columns: repeat(2 , 1fr);
    }
    .dr3box{
      margin: 0 auto;
    }
  }
  @media (max-width:550px) {
    .hydrasc_boxes{
      grid-template-columns: repeat(1 , 1fr);
    }
    .dr3box h4{
      text-align: center !important;
    }
    .dr3box p{
      text-align: center !important;
    }
   
  }



/* section 1 */
.blogwrap1{
width: 100%;
position: relative;
max-height: 500px;
}

.blog_bg{
  width: 100%;
  height: 100%;
}


.blog_filterbg{
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}

.blogcont1{
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.blogcont1 h2{
  font-family: Montserrat;
font-size: 34px;
font-weight: 700;
line-height: 51px;
text-align: center;
color: #FFFFFF;
}

@media (max-width:600px) {
  .blogcont1 h2{
    font-family: Montserrat;
  font-size: 22px;
  line-height: 32px;

  }
  .blogwrap1{
    height: 200px;
  }

}


/* section2  */


.blogwrap2{
  width: 100%;
  position: relative;
  background: #F6F6F6;

}

.blogsec2cont{
max-width: 1240px;
width: 100%;
margin: 0 auto;
display: flex;
align-items: center;
justify-content: center;
gap: 30px;
padding: 60px 20px;
flex-wrap: wrap;
}

.singblogs{
  max-width: 360px;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 10px;
  height: 400px;
  background-color: white;
}

.blog_content{
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 20px 10px;
}

.blog_date{
  display: flex;
  align-items: center;
  gap: 5px;
}

.blog_date span{
  font-family: Montserrat;
font-size: 10px;
font-weight: 500;
line-height: 22px;
text-align: left;
color: #FF751C;
}

.blog_content h3{
  font-family: Montserrat;
font-size: 18px;
font-weight: 600;
line-height: 26px;
text-align: left;


}

.remorepara{
  display: flex;
  align-items: center;
  gap: 10px;
  cursor: pointer;
}

.remorepara span{
  font-family: Montserrat;
  font-size: 12px;
  font-weight: 500;
  line-height: 15px;
  text-align: left;
  color: #FF751C;

  
}


@media (max-width:500px) {
  .blog_content h3{
    font-size: 16px;
    line-height: 22px;
  }
}

.priitembotton3 p{
  font-family: "Montserrat", sans-serif !important;
    color: #EB3A3A !important;
    line-height: 1.8em !important;
    margin: 0px !important;
        text-decoration: underline !important;

}










    .blogwrap1{
    width: 100%;
    position: relative;
    max-height: 500px;
    overflow:hidden;
    margin-top:5rem;
    }
    
    .blog_bg{
      width: 100%;
      height: 100%;
    }
    
    
    .blog_filterbg{
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
    }
    
    .blogcont1{
      position: absolute;
      left: -55%;
      right: 0;
      bottom: 0;
      top: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .blogcont1 h2{
      font-family: Montserrat;
    font-size: 34px;
    font-weight: 700;
    line-height: 51px;
    text-align: center;
    color: #FFFFFF;
    }
    
    @media (max-width:600px) {
      .blogcont1 h2{
        font-family: Montserrat;
      font-size: 22px;
      line-height: 32px;
    
      }
      .blogwrap1{
        height: 200px;
      }
    
    }
    
    

    .blog_dtailwrap{
        background: #F6F3F3;
 position: relative;
    }

    .blogdetacontainer{
max-width: 1340px;
padding: 60px 20px;
margin: 0 auto;
display: flex;
gap: 20px;
justify-content: space-between;
    }

 .blog_deteailcont{
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .all_blogsright h2{
        font-family: Montserrat !important;
        font-size: 20px;
font-weight: 600;
line-height: 32px;
text-align: left;
color: #080D17;
    }

    .all_blogsright{
        max-width: 424px;
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 10px 10px;
        height: fit-content;
        background: #FFFFFF;

    }

.blog_img1{
    max-height: 490px;
    width: 100%;
}

.headine_blog{
    width: 100%;
    background: #0F3D5F;;
height: fit-content;
display: flex;
align-items: center;
padding: 10px 10px;
}

.headine_blog h3{
    font-family: Montserrat !important;
    font-size: 16px;
    font-weight: 600;
    line-height: 26px;
    text-align: left;
    color: #FFFFFF;
}

.recensingblog{
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 368px;
    width: 100%;
}
.recensingblog img{
    max-width: 368px;
    width: 100%;
height: 161px;
    
}

.recensingblog h3{
    font-family: Montserrat !important;
font-size: 16px;
font-weight: 400;
line-height: 22px;
text-align: left;
color: #080D17;
}

.recensingblog a{
    text-decoration: none  !important;
}

.recensingblog p{
    color: #0F3D5F !important;
    font-family: Montserrat !important;
    font-size: 14px;
    font-weight: 400;
    line-height: 28px;
    text-align: left;
    color: #080D17;
}

.blog_deteailcont p{
    font-family: Montserrat !important;
font-size: 16px;
font-weight: 400;
line-height: 26px;
text-align: left;
color: #06163A;
}

.blog_deteailcont h3{
    font-family: Montserrat !important;
font-size: 18px;
font-weight: 600;
line-height: 27px;
text-align: left;
color:#ed2e22!important;
}
.blog_deteailcont h4{
    font-family: Montserrat !important;
font-size: 16px;
font-weight: 600;
line-height: 27px;
text-align: left;
color: #06163A;
}


.blog_deteailcont span{
    font-family: Montserrat !important;
font-size: 16px;
font-weight: 600;
line-height: 26px;
text-align: left;
color: #06163A;
}
.blog_deteailcont ul{
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding-left: 14px;
}

.blog_deteailcont ul li{
    font-family: Montserrat !important;
    font-size: 16px;
    font-weight: 400;
    line-height: 26px;
    text-align: left;
    color: #06163A;
}

.allreceblogs{
    display: flex;
    flex-direction: column;
    gap: 20px;
}

@media (max-width:1200px) {
    .blogdetacontainer{
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .all_blogsright{
        max-width: 100%;
        
    }
    .allreceblogs{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;

    }
}

.blog_deteailcont p{
margin: 0px !important;
}
.blog_deteailcont h3{
margin: 0px !important;
}



.container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}


.container1 {
    font-family: Montserrat;
    font-size: 1.3rem;
    font-weight: 300;
    line-height: 1.6;
    margin: 10px auto;
    max-width: 820px;
    color: #000000;
    text-align: center;
    margin-top: 20px;

}

.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    margin-top: 40px;
}

.card {
    flex: 1 1 calc(33.333% - 20px);
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 20px;
    padding: 20px;
    border: 1px solid #EB3A3A;
    text-align: left;
    max-width: 280px;
    height: 38vh;
    box-shadow: 0 4px 6px rgba(254, 253, 253, 0.684);
    transition: transform 0.2s ease-in-out;

}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgb(243, 242, 242);
}


.card img {
    width: 44px;
    height: 45px;
    margin-bottom: 10px;
    margin-top: 15px;
}

.card h2 {
    font-size: 1.25rem;
    color: #222;
    font-family: Montserrat;
    margin-bottom: 10px;
    font-weight: 500;
}

.card p {
    color: #222222;
    line-height: 1.5;
    margin-top: 5px;
    font-family: Montserrat;
    font-size: 18px;
    font-weight: 300;
    line-height: 24px;
    text-align: left;
    text-underline-position: from-font;
    text-decoration-skip-ink: none;

}



@media (max-width: 480px) {
 

    .hrtag {
        width: 10%;
        margin-top: 10px;


    }

    .container1 {
        font-size: 0.85rem;
        padding: 0 10px;
        text-align: center;
    }

    .cards {
        flex-direction: column;
        gap: 10px;

    }

    .card {
        flex: 1 1 100%;
        max-width: 100%;
        height: auto;

    }

    .card img {
        width: 40px;

    }

    .card h2 {
        font-size: 1rem;

    }

    .card p {
        font-size: 0.85rem;

    }
}


@media (min-width: 481px) and (max-width: 1200px) {


    .hrtag {
        width: 20%;

    }

    .container1 {
        font-size: 1rem;
        padding: 0 15px;
    }

    .cards {
        gap: 20px;
    }

    .card {
        flex: 1 1 calc(50% - 20px);
        max-width: calc(50% - 20px);
        height: auto;
    }

    .card img {
        width: 40px;
    }

    .card h2 {
        font-size: 1.1rem;
    }

    .card p {
        font-size: 0.9rem;
    }
}

@media (min-width: 1201px) {
  
    .hrtag {
        width: 27%;
        width: 100%;

    }


    .container1 {
        font-size: 1.2rem;
        padding: 0 20px;
    }

    .cards {
        gap: 30px;
    }

    .card {
        flex: 1 1 calc(25% - 20px);
        max-width: calc(25% - 20px);
        height: auto;

    }

    .card img {
        width: 45px;
    }

    .card h2 {
        font-size: 1.25rem;
    }

    .card p {
        font-size: 1.1rem;
    }
}

.products-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 3fr));
    gap: 20px;
    /* Set consistent gap between cards */
    width: 80%;
    margin: 0 auto;
    padding-top: 80px;


}

.product {
    text-align: center;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    width: 88%;
    height: 55vh;
    box-shadow: 0 4px 6px rgba(254, 253, 253, 0.684);
    transition: transform 0.2s ease-in-out;


}
.product:hover{
    border-top: 5px solid red;
    border-left: 5px solid red;
    border-bottom: 5px solid red;
}

.product img {
    max-width: 60%;
    height: 30vh;
    border-radius: 5px;
    margin-bottom: 15px;
    padding-top: 30px;
}

.product h3 {
    text-align: center;
    font-family: Montserrat;
    font-weight: 500;
    font-size: 20px;
    color: #101010;
    margin-bottom: 10px;
}

.see-more {
    display: inline-block;
    font-size: 16px;
   
    color: #EB3A3A;
    border-bottom: 1px solid #EB3A3A;
    text-decoration: none;
    font-weight: bold;
    font-family: Montserrat;
    font-weight: 500;
    margin-top: 10px;
}



.product:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgb(243, 242, 242);
}



/*  */

@media (max-width: 768px) {
    .products-section {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
        gap: 15px;
        height: 100%;
    

    .product {
        padding: 15px;
    }

    .product h3 {
        font-size: 16px; 
    }

    .see-more {
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .products-section {
        grid-template-columns: 1fr; 
    }

    .product {
        padding: 10px;
        height: 50vh;
    }

    .product img {
        max-width: 90%; 
    }

    .product h3 {
        font-size: 14px;
    }

    .see-more {
        font-size: 12px;
    }
}

/* Media Queries */
@media (max-width: 1200px) {
    .products-section {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
}

@media (max-width: 768px) {
    .products-section {
        grid-template-columns: 1fr; 
        gap: 15px;
    }

    .product {
        padding: 15px;
    }

    .product h3 {
        font-size: 16px;
    }

    .see-more {
        font-size: 13px;
    }
}

@media (max-width: 480px) {
    .product {
        padding: 10px;
    }

    .product h3 {
        font-size: 14px;
    }

    .see-more {
        font-size: 12px;
    }
}
}

.see-more:hover{
      color: #EB3A3A !important; 
}



.howworkdwrap{
    background-color: white;
    position: relative;
}

.howworkcont{
    max-width: 1240px;
    margin: 0 auto;
    padding: 60px 20px;
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.how_head{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 14px;
}

.how_head h2{
    font-family: Montserrat;
font-size: 32px;
font-weight: 600;
line-height: 40px;
text-align: center;
color: #000000;
}

.how_head p{
    max-width: 191px;
    width: 100%;
    height: 4px;
    background: #EB3A3A;

}

.allmaincont{
    display: flex;
    flex-direction: column;
    gap: 40px;
    align-items: center;
}

.allwordkfirst{
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    max-width: 754px ;
    width: 100%;
    position: relative;
}

.singleworkd{
    display: flex;
    flex-direction: column;
    gap: 14px;
    align-items: center;
}
.singleworkd .worknumpara{
    width: 32px;
    height: 32px;
 border-radius: 50%;
 display: flex;
 align-items: center;
 justify-content: center;
 background: #EB3A3A;
color: white;
font-family: Montserrat;
font-size: 16px;
font-weight: 500;
line-height: 44px;
text-align: center;
    
}

.singleworkd h3{
    font-family: Montserrat;
font-size: 20px;
font-weight: 600;
line-height: 24.38px;
text-align: center;
color: #000000;
}

.workpras{
    font-family: Montserrat;
font-size: 18px;
font-weight: 500;
line-height: 26px;
text-align: center;
color: #000000;
max-width: 200px;

}
.workpras4{
    font-family: Montserrat;
font-size: 18px;
font-weight: 500;
line-height: 26px;
text-align: center;
color: #000000;
max-width: 254px;

}


.doteddlinworkd{
    border: 1px dashed #EB3A3A;
    height: 1px;
    position: absolute;
    max-width:250px;
    width: 100%;
    top: 0px;
    left: 15%;
    transform: translateY(10px);
}
.doteddlinworkd2{
    border: 1px dashed #EB3A3A;
    height: 1px;
    position: absolute;
    max-width:250px;
    width: 100%;
    top: 0px;
    right: 15%;
    transform: translateY(10px);
}

.allwordkfirst2{
    display: flex;
    align-items: flex-start;
    justify-content: center;
    max-width: 754px ;
    width: 100%;
    gap: 50px;
    position: relative;
}

.doteddlinworkd3{
    border: 1px dashed #EB3A3A;
    height: 1px;
    position: absolute;
    max-width:280px;
    width: 100%;
    top: 0px;
    left: 31%;
    transform: translateY(10px);
}


@media (max-width:780px) {
    .doteddlinworkd3 , .doteddlinworkd , .doteddlinworkd2{
        display: none;
    }
    .allwordkfirst{
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
    }
    .allwordkfirst2{
        flex-wrap: wrap;
        gap: 20px;
    }
}


@media (max-width:580px) {
    .allwordkfirst{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .allwordkfirst2{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

}







/* secon */
.FAQwrap {
    position: relative;
    background-color: rgb(254, 245, 245);
}

.faqwracont {
    max-width: 1240px;
    width: 100%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 50px;
    padding: 60px 20px;
}

.faqwracont h2 {
    font-family: Montserrat;
    font-size: 34px;
    font-weight: 600;
    line-height: 44px;
    text-align: center;
    color: #444444;
}

.alquestfaq {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.singlefaq {
    width: 100%;
    background-color: white;
    height: fit-content;
    padding: 20px 20px 10px 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.questiondiv {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
}

.questiondiv p {
    font-family: Montserrat;
    font-size: 18px;
    font-weight: 500;
    line-height: 28px;
    padding: 0px 10px;
    text-align: left;
    color: #000000;
}



.pluxicon {
    background: #EB3A3A;
    min-width: 50px;
    min-height: 50px;
    border-radius: 50%;
    box-shadow: 0px 16px 40px 0px #DDDDDD26;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: Poppins;
    font-size: 20px;
    font-weight: 400;
    line-height: 44px;
    text-align: center;
    color: #FFFFFF;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.pluxicon.active {
    transform: rotate(45deg);
    background: #4caf50;
}

.answerdiv {
    font-family: Montserrat;
    font-size: 16px;
    font-weight: 500;
    line-height: 26px;
    text-align: left;
    margin-top: 14px;
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    transition: max-height 0.3s ease, opacity 0.3s ease;
}

.answerdiv.active {
    max-height: 300px; 
    opacity: 1;
}


@media (max-width:500px) {
    .questiondiv p {
      font-size: 16px;
      line-height: 26px;
    }
    .answerdiv{
        font-size: 14px;
        line-height: 24px;
    }
    
}

.questiondiv p{
margin:0px !important;
}

.service-single-content .details ul li{
padding-left: 55px !important;
text-align: left !important;
}



section.how-it-works {
    background: #fff6f2;
    padding: 40px 20px;
    text-align: center;
}

.how-it-works .container {
    max-width: 1200px;
    margin: auto;

}

.section-title {
    font-size: 33px;
    font-weight: 480;
    font-family: Montserrat;
    color: #000000;
    position: relative;
}

.section-title::after {
    content: '';
    display: block;
    width: 180px;
    height: 4px;
    background-color: #EB3A3A;
    margin: 5px auto 0;
    border-radius: 2px;
}

.steps {
    display: flex;
    gap: 30px;
    text-align: left;
    flex-wrap: wrap;
    margin-top: 20px;
    justify-content: center;
}

.step {
    background: #fff;
    border: 2px solid #EB3A3A;
    border-radius: 18px;
    padding: 20px;
height: 266px !important;
    margin-top: 30px;
    max-width: 280px;
    flex: 1 1 calc(10% - 20px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.step:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

.step .icon {
    margin-bottom: 16px;
}

.step .icon img {
    width: 50px;
    height: 50px;
}

.step h3 {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    font-family: Montserrat;
    font-size: 20px;
    font-weight: 600;
    line-height: 24px;
    text-align: left;
    text-underline-position: from-font;
    text-decoration-skip-ink: none;

}

.step p {
    font-family: Montserrat;
    color: #222222;
    line-height: 1.5;
    font-size: 16px;
    margin-top: 15px;
    font-weight: 300;
    line-height: 24px;
    text-align: left;
    text-underline-position: from-font;
    text-decoration-skip-ink: none;

}

/* Responsive Styles */
@media (max-width: 1200px) {
    .steps {
        flex-direction: row;
        gap: 20px;
    }

}

@media (max-width:1024px) {
    .steps{
        display: grid;
        grid-template-columns: repeat(2 , 1fr);
    }
    .step{
        margin: 0px auto;
    }
}


@media (max-width: 830px) {
    .steps {
        flex-direction: row;
        gap: 20px;
    }

}
@media (max-width: 768px) {
    .steps {
        flex-direction: column;
        gap: 20px;
    }

  
}

@media (max-width:650px) {
    .steps{
        display: grid;
        grid-template-columns: repeat(1 , 1fr);
    }
}

.service-single-content .details p{
text-align: left !important;
}

.service-single-content .title h3{
text-align: left !important;
}

@media(max-width:500px){
.blog_deteailcont h3{
 font-size: 18px;
line-height:24px;
}

.headine_blog{
padding: 6px; 
}

.blog_deteailcont p{
 font-size: 14px;
line-height: 24px;
}

.blog_deteailcont ul li{
 font-size: 14px;
line-height: 24px;
}

.blog_deteailcont span{
 font-size: 14px;
line-height: 24px;

}
}

.blog_deteailcont h4{
margin: 0px !important;
}
 
@media (max-width:550px){
.product{
width: 100% !important;

}

}

</style>



<x-front-header-component />
@endif

<section id="what_we_do" class="ahte_are">
    <section class="blogwrap1">

<img class="blog_bg" src="https://res.cloudinary.com/dgif730br/image/upload/v1733829610/kushel_digi_knowledge_base-01_jghemz.jpg" alt="">
<img class="blog_filterbg" src="https://res.cloudinary.com/dd9tagtiw/image/upload/v1732881778/Rectangle_394_sxi0wh.png" alt="">

<div class="blogcont1">
   <h2>{{$blog->name}}</h2>
</div>


</section>
<section class="blog_dtailwrap">

<div class="blogdetacontainer">


<!-- left -->
 <div class="blog_deteailcont">
 <img src="{{ url('/').'/'.$blog->image }}" alt="">
 {!! $blog->description !!}

 </div>

 <!-- right -->
  <div class="all_blogsright">

    <h2>Recent knowdledge base</h2>

    <div class="allreceblogs">

@foreach($recents as $blog)
<div class="recensingblog">
    <img src="{{ url('/').'/'.$blog->image }}" alt="">
   <a href="{{ url('/').'/knowledge-base-detail/'.$blog->id }}"> <h3>{{$blog->name}}</h3></a>
    <a href="{{ url('/').'/knowledge-base-detail/'.$blog->id }}"><p>View Section</p></a>
</div>
@endforeach




</div>
  </div>

</div>



</section>
</section>

@endsection
