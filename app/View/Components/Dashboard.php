<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
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
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard');
    }
}
