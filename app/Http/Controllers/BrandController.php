<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $brands = Brand::latest()->paginate(10);
        return view('admin.brand.index',compact('brands'));
    }

    public function brand_add(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        ],[
            'brand_name.required'=> 'Please insert brand name.',
        ]);

        if($request->hasFile('image')){
            $brand_image = $request->file('image');
            $img_uinique = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $request->brand_name . time() . $img_uinique.'.'. $img_ext;

            $img = Image::make($request->file('image'));
            $img->save(base_path('public/uploads/brands/' . $img_name), 90);

            Brand::create([
                'brand_name'=> $request->brand_name,
                'image'=> $img_name,
                'created_at' => now(),
            ]);
            return back()->with('success','Brand added successfull!');

        }

    }

    public function brand_delete($id){
        $brand = Brand::find($id);
        if ($brand->image) {
            $oldImagePath = base_path('public/uploads/brands/' . $brand->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $brand->delete();
        return back()->with('success','Brand Deleted Successful.');
    }

    public function edit_view($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function edit(Request $request, $id){
        $request->validate([
            'brand_name' => 'required|string|min:4',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ],[
            'brand_name.required'=> 'Please insert brand name.',
        ]);

        $brand = Brand::find($id);

        if ($request->hasFile('image')) {
            // If an image is present in the request
            $brand_image = $request->file('image');
            $img_uinique = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $request->brand_name . time() . $img_uinique.'.'. $img_ext;
            $img = Image::make($brand_image);
            $img->save(base_path('public/uploads/brands/' . $img_name), 90);

            // Unlink the old image file
            if ($brand->image) {
                $oldImagePath = base_path('public/uploads/brands/' . $brand->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update both brand_name and brand_image
            $brand->update([
                'brand_name'=> $request->brand_name,
                'image'=> $img_name,
                'updated_at' => now(),
            ]);
        } else {
            // If no image is present in the request, update only brand_name
            $brand->update([
                'brand_name'=> $request->brand_name,
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('brands.all')->with('success','Brand updated Successfully.');
    }



}





