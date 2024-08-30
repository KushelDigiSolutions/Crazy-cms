<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class PageController extends Controller
{
    public function feature()
    {
        return view('frontend/features');
    }

    public function pricing()
    {
         $subscriptions = Subscription::orderBy('id','ASC')->get();
        return view('frontend/pricing',compact('subscriptions'));
    }

    public function privacyPolicy()
    {
        return view('frontend/privacy_policy');
    }

    public function terms()
    {
        return view('frontend/terms_services');
    }

    public function siteMap()
    {
        return view('frontend/site');
    }
    
    public function mobileSite()
    {
        return view('frontend/mobile_site');
    }

}
