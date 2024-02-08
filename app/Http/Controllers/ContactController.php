<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $messages = Contact::latest()->paginate(10);
        return view('admin.contactBox.index', compact('messages'));
    }

    public function view($id){
        $message = Contact::find($id)->first();
        return view('admin.contactBox.view', compact('message'));
    }

    public function delete($id){
        Contact::find($id)->delete();
        return redirect()->route('contact.messages')->with('success', 'Message deleted successfully!');;
    }

    public function contact_info(){
        $contact_info = ContactInfo::get()->first();
        return view('admin.contactInfo.index', compact('contact_info'));
    }

    public function edit($id){
        $contact_info = ContactInfo::find($id)->get()->first();
        return view('admin.contactInfo.edit', compact('contact_info'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'phone' => 'required|string',
            'email' => 'required',
            'address' => 'required|string',
        ]);
        ContactInfo::find($id)->update([
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('contact.info.view')->with('success', 'Contact info updated successfully!');

    }

    public function map_link(Request $request, $id){
        $request->validate([
            'map_link' => 'required',
        ]);
        ContactInfo::find($id)->update([
            'map_link' => $request->input('map_link'),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return back()->with('success', 'Google Map Link updated successfully!');

    }
}
