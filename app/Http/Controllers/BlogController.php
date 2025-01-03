<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // $data = Blog::orderBy('id', 'DESC')->get()->map(function ($item) {
        //     $item->description = strlen($item->description) > 40 ? substr($item->description, 0, 40) . '..' : $item->description;
        //     $item->title = strlen($item->title) > 20 ? substr($item->title, 0, 20) . '..' : $item->title;
        //     return $item;
        // });
        
        $data = Blog::orderBy('id', 'DESC')
    ->get()
    ->map(function ($item) {
        $item->description = strlen($item->description) > 40 
            ? substr($item->description, 0, 40) . '..' 
            : $item->description;

        $item->title = strlen($item->title) > 20 
            ? substr($item->title, 0, 20) . '..' 
            : $item->title;

        return $item;
    });
            return view('admin.blog.index', compact('data'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('id', 'DESC')->get();
        return view('admin.blog.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:blog_categories,id'],
            'tags' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_meta_tags' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'image' => ['required', 'file', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $imageName = time() . '.' . $request->image->extension();
        // dd(public_path('uploads/blog'));
         $request->image->move(public_path('uploads/blog'), $imageName);

        $blog = Blog::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'seo_title' => $request->seo_title,
            'seo_meta_tags' => $request->seo_meta_tags,
            'seo_description' => $request->seo_description,
            'image' => 'uploads/blog/' . $imageName
        ]);
        

        return redirect()->route('admin.blog.index')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $categories = BlogCategory::orderBy('id', 'DESC')->get();
        $blog = Blog::where('id',decrypt($id))->first();

        return view('admin.blog.edit',compact('blog','categories'));
    }
    
// Author Dileep 12-10-24 

    
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:blog_categories,id'],
            'tags' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_meta_tags' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        // Find the blog post to update
        $blog = Blog::findOrFail($id);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/blog'), $imageName);

            // Set the new image path
            $blog->image = 'uploads/blog/' . $imageName;
        }

        // Update the blog post details
        $blog->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'seo_title' => $request->seo_title,
            'seo_meta_tags' => $request->seo_meta_tags,
            'seo_description' => $request->seo_description,
        ]);

        // Save the updated image path if changed
        if ($request->hasFile('image')) {
            $blog->save();
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
    }
    public function destroy($id)
    {
        Blog::where('id',decrypt($id))->delete();
        return redirect()->back()->with('success','Email deleted successfully.');
    }
}
