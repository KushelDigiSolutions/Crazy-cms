<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use App\Models\MySite;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $userId = Auth::id();
        $user = User::count();
        view()->share('user',$user);
        
        // $category = Category::count();
        // view()->share('category',$category);

        $userStandardPlan = User::where('user_type', 1)->count();
        view()->share('userStandardPlan',$userStandardPlan);

        $userProfessionPlan = User::where('user_type', 2)->count();
        view()->share('userProfessionPlan',$userProfessionPlan);

        $userPrimiumPlan = User::where('user_type', 3)->count();
        view()->share('userPrimiumPlan',$userPrimiumPlan);

        // $product = Product::count();
        // view()->share('product',$product);
        
        $userlatest = User::orderBy('id', 'DESC')->limit(5)->get();
        view()->share(['userlatest' => $userlatest]);
        
        $collection = Collection::count();
        view()->share('collection',$collection);

        $totalSites = $userId ? MySite::where('user_id', $userId)->count() : 0;
        view()->share('totalSites',$totalSites); 

        $firstSite = MySite::select('created_at')
        ->where('user_id', $userId)
        ->orderBy('created_at', 'ASC')
        ->first();
    
        $startDate = $firstSite ? $firstSite->created_at->format('Y-m-d') : null;
        view()->share('startDate',$startDate); 

        $lastSite = MySite::select('created_at')
        ->where('user_id', $userId)
        ->orderBy('created_at', 'DESC')
        ->first();

        $endDate = $lastSite ? $lastSite->created_at->format('Y-m-d') : null;
        $startDateMinus30Days = $lastSite ? $lastSite->created_at->subDays(30)->format('Y-m-d') : null;

        view()->share('endDate', $endDate);
        view()->share('startDateMinus30Days', $startDateMinus30Days);


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard');
    }
}
