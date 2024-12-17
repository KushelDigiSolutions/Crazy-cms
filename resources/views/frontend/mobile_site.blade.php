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

<x-front-header-component />

@endif

<section id="what_we_do">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <h2>Mobile Site</h2>
      <!-- <img src="{{asset('admin/img/what.svg')}}" alt=""> -->
    </div>
  </div>
  <div class="row row2 justify-content-md-center">
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
  </div>
</div>
</section>

@endsection
