<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {


        $services = Services::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function service_add_view(){
        return view('admin.services.add');
    }

    public function service_add(Request $request){
        $request->validate([
            '*' => 'required|string',
        ]);

        Services::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'icon' => $request->input('icon'),
            'created_at' => now(),
        ]);
        return back()->with('success', 'New service added successfully!');
    }

    public function service_edit_view($id){
        $service = Services::find($id);
        return view('admin.services.edit', compact('service'));
    }

    public function service_update(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        Services::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'icon' => $request->input('icon'),
            'updated_at' => now(),
        ]);
        return redirect()->route('services.index')->with('success', 'NService updated successfully!');
    }

}
