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
    h1,h2,h3,h4{
        overflow: hidden !important;
    }
    .ahte_are{
        margin-top:5rem !important;
    }
</style>

<x-front-header-component />

@endif

<section id="what_we_do" class="ahte_are">
<div class=" com1">
  <div class="row row1 justify-content-md-center">
    <div class="col-lg-9 text-center">
      <h2>Terms and Conditions for MyCrazySimpleCMS</h2>
      <!-- <img src="{{asset('admin/img/what.svg')}}" alt=""> -->
    </div>
  </div>
  <div class="row row2 justify-content-md-center">
    <div class="col-lg-9 col-md-12 col-sm-12  -center">
      <p><strong>Effective Date: October 1, 2024</strong></p>
      <h3>Identification of the Business </h3>
      <p>MyCrazySimpleCMS (referred to as “we,” “our,” or “Service”) provides an online platform for users to edit static HTML websites without requiring coding expertise. This document governs the relationship between MyCrazySimpleCMS and users of the Service, setting forth legally binding terms.</p>
      <h3>Description of Service </h3>
      <p>MyCrazySimpleCMS is a user-friendly platform designed for editing HTML websites. It offers tools for editing content, images, and basic SEO elements. Each website managed with MyCrazySimpleCMS requires a separate subscription plan, which is locked to the specified site and non-transferable.</p>
      <h3>Acceptance and Conditions of Use </h3>
      <p>By accessing or using MyCrazySimpleCMS, users agree to abide by these Terms. The Service is intended for individuals who are the owners or designated managers of the websites they are editing. Users must be over 18 years old or under the supervision of a legal guardian. Any misuse of the Service, including unauthorized access, modification, or use for illegal activities, may result in account termination.</p>
      <h3>User Responsibilities and Proper Use</h3>
      <ul>
          <li>
              <p><strong>Content and FTP Access: </strong>Users are responsible for the content published using MyCrazySimpleCMS and must provide accurate FTP credentials. These credentials enable MyCrazySimpleCMS to access the hosting account for publishing changes.</p>
          </li>
          <li>
              <p><strong>Compatibility: </strong>MyCrazySimpleCMS is a user-friendly platform designed for editing HTML websites. It offers tools for editing content, images, and basic SEO elements. Each website managed with MyCrazySimpleCMS requires a separate subscription plan, which is locked to the specified site and non-transferable.</p>
          </li>
          <li>
              <p><strong>Liability: </strong>Users agree to use the Service at their own risk. MyCrazySimpleCMS disclaims liability for any issues, including potential data loss, website downtime, or errors resulting from the use of the Service</p>
          </li>
      </ul>
      <h3>Payment and Subscription Policy </h3>
      <p>Each website requires an annual, non-refundable subscription. The subscription is linked exclusively to the website specified at the time of purchase and cannot be transferred. By subscribing, users agree to provide accurate payment information, and MyCrazySimpleCMS reserves the right to update pricing with prior notice.</p>
      <h3>Refund, Exchange, and Cancellation Policy </h3>
      <p>All subscriptions are non-transferable and non-refundable once activated. Users may cancel their subscription at any time to avoid automatic renewal, but refunds will not be issued for remaining time. Contact info@mycrazysimplecms.com for payment-related questions.</p>
      <h3>Intellectual Property and Copyright </h3>
      <p>All content, trademarks, and designs on MyCrazySimpleCMS, including software features and branding, are owned by MyCrazySimpleCMS and protected by copyright laws. Users may not copy, distribute, or use platform content without written permission.</p>
      <h3>Data Security and Privacy </h3>
      <p>MyCrazySimpleCMS prioritizes data security and uses secure methods for storing FTP credentials. We do not share or sell user data. However, we are not liable for unauthorized access resulting from insecure user passwords or third-party breaches.</p>
      <h3>Warranty and Disclaim</h3>
      <p>MyCrazySimpleCMS is provided “as-is.” While we strive to provide uninterrupted service, we do not guarantee uptime and are not liable for interruptions, delays, or losses. Users accept full responsibility for using the Service, and any claims related to service issues are waived.</p>
      <h3>Safety Information </h3>
      <p>MyCrazySimpleCMS is designed to be used with HTML websites, not platform websites. For best results, users should understand the basic structure of HTML and recognize that any modifications outside of the Service may require a developer.</p>
      <h3>Delivery of Service </h3>
      <p>Upon successful subscription, users gain access to MyCrazySimpleCMS features, including HTML editing, FTP publishing, and basic SEO tools. Service delivery is contingent upon accurate FTP information provided by users.</p>
      <h3>Governing Law </h3>
      <p>These Terms and Conditions are governed by the laws of New York. Any disputes arising from the use of the Service shall be resolved in the courts of Erie County New York.</p>
      <h3>Modifications to Terms and Conditio</h3>
      <p>MyCrazySimpleCMS reserves the right to modify these Terms and Conditions at any time. Major updates will be communicated to users, and continued use of the Service indicates acceptance of revised Terms</p>
      <h3>Contact Information </h3>
      <p>For inquiries related to these Terms and Conditions, please contact us at info@mycrazysimplecms.com.</p>




    </div>
  </div>
</div>
</section>

@endsection
