<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BlogCategory::orderBy('id','DESC')->get();
        return view('admin.blogcategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (BlogCategory::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        BlogCategory::create([
            'category_name'=>$request->name,
            'slug'=>$uniqueSlug,
        ]);
        return redirect()->route('admin.blogcategory.index')->with('success','Blog Category created successfully.');
    }

    public function edit($category)
    {
        $data = BlogCategory::where('id',decrypt($category))->first();
        return view('admin.blogcategory.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        
        while (BlogCategory::where('slug', $uniqueSlug)->where('id', '!=', $request->id)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }

        BlogCategory::where('id', $request->id)->update([
            'category_name' => $request->name,
            'slug' => $uniqueSlug,
        ]);
        return redirect()->route('admin.blogcategory.index')->with('info','Category updated successfully.');   
    }

    public function destroy($id)
    {
        BlogCategory::where('id',decrypt($id))->delete();
        return redirect()->route('admin.blogcategory.index')->with('error','Category deleted successfully.');   
    }
}
