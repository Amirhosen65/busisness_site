<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = About::get()->first();
        return view('admin.aboutSection.index', compact('about'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'description' => 'required',
        ]);

        About::find($id)->update([
            'title' => $request->input('title'),
            'sub_title' => $request->input('sub_title'),
            'description' => $request->input('description'),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        return back()->with('success', 'About Updated successfully!');
    }
}
