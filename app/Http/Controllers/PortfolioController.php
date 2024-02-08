<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function add_view(){
        $categories = Category::latest()->paginate(10);
        return view('admin.portfolios.add', compact('categories'));
    }

    public function add(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $portfolio_image = $request->file('image');
            $img_uinique = hexdec(uniqid());
            $img_ext = strtolower($portfolio_image->getClientOriginalExtension());
            $img_name = time() . $img_uinique.'.'. $img_ext;

            $img = Image::make($request->file('image'));
            $img->save(base_path('public/uploads/portfolios/' . $img_name), 90);

            Portfolio::create([
                'title'=> $request->title,
                'description'=> $request->description,
                'category_id'=> $request->category_id,
                'status'=> $request->status,
                'image'=> $img_name,
                'created_at' => now(),
            ]);
            return redirect()->route('portfolios.index')->with('success','New portfolio added successfull!');
    }

    public function status($id){
        $portfolio = Portfolio::find($id);

        if($portfolio->status == 'Published'){
            $portfolio->update([
                'status' => 'Draft',
                'updated_at' => now(),
            ]);
        } else {
            $portfolio->update([
                'status' => 'Published',
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Portfolio status changed successfully!');
    }

    public function edit_view($id){

        $portfolio = Portfolio::find($id);
        $categories = Category::get();
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    public function edit(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $portfolio = Portfolio::find($id);
        if($request->hasFile('image')){
            $portfolio_image = $request->file('image');
            $img_uinique = hexdec(uniqid());
            $img_ext = strtolower($portfolio_image->getClientOriginalExtension());
            $img_name = time() . $img_uinique.'.'. $img_ext;

            $img = Image::make($request->file('image'));
            $img->save(base_path('public/uploads/portfolios/' . $img_name), 90);

            if ($portfolio->image) {
                $oldImagePath = base_path('public/uploads/portfolios/' . $portfolio->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $portfolio->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'category_id'=> $request->category_id,
                'status'=> $request->status,
                'image'=> $img_name,
                'updated_at' => now(),
            ]);
        }else{
            $portfolio->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'category_id'=> $request->category_id,
                'status'=> $request->status,
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('portfolios.index')->with('success','Portfolio updated successfull!');

    }


    public function delete($id){
        $portfolio = Portfolio::find($id);
        if ($portfolio->image) {
            $oldImagePath = base_path('public/uploads/portfolios/' . $portfolio->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $portfolio->delete();
        return back()->with('success', 'Portfolio deleted successfully!');
    }

}
