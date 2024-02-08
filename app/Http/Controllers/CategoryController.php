<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index',compact("categories"));
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories|string|max:50',
        ], [
            'name.required' => 'Please insert category name.',
        ]);

        $slug = $request->input('slug');

        if (empty($slug)) {
            // If slug is empty, create a slug from the category name
            $slug = $request->input('name');
        }

        Category::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($slug),
            'created_at' => \Carbon\Carbon::now(),
        ]);

        return back()->with('success', 'New Category added successfully!');
    }

    public function edit_view($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function edit(Request $request, $id){
        $request->validate([
            'name' => 'required|string|min:4',
        ]);

        $slug = $request->input('slug');
        if (empty($slug)) {
            // If slug is empty, create a slug from the category name
            $slug = $request->input('name');
        }

        Category::find($id)->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($slug),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('category.all')->with('success', 'Category updated successfully!');
    }

    public function delete($id){
        Category::find($id)->delete();
        return back()->with('success', 'Category deleted successfully!');
    }

}
