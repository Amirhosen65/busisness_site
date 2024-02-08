<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sliders(){
        $sliders = Slider::latest()->paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }


    public function slider_add(){
        return view('admin.slider.add_slider');
    }

    public function slider_add_save(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        ]);
        $slider_image = $request->file('image');
            $img_uinique = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $request->brand_name . time() . $img_uinique.'.'. $img_ext;

            $img = Image::make($request->file('image'));
            $img->save(base_path('public/uploads/slider/' . $img_name), 90);

            Slider::create([
                'title'=> $request->title,
                'description'=> $request->description,
                'image'=> $img_name,
                'created_at' => now(),
            ]);
            return back()->with('success','Slider added successfull!');
    }

    public function slider_delete($id){

        Slider::find($id)->delete([
            'updated_at' => now(),
        ]);
        return back()->with('success','Slider Deleted Successful.');
    }
    public function slider_edit_view($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function slider_update(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $slider = Slider::find($id);
        if ($request->hasFile('image')) {
            $brand_image = $request->file('image');
            $img_uinique = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $request->brand_name . time() . $img_uinique.'.'. $img_ext;
            $img = Image::make($brand_image);
            $img->save(base_path('public/uploads/slider/' . $img_name), 90);

            // Unlink the old image file
            if ($slider->image) {
                $oldImagePath = base_path('public/uploads/slider/' . $slider->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            Slider::find($id)->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'image'=> $img_name,
                'updated_at' => now(),
            ]);
        }else{
            Slider::find($id)->update([
                'title'=> $request->title,
                'description'=> $request->description,
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('slider.index')->with('success','Slider updated Successful.');
    }
}
