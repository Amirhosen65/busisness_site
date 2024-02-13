<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function social_link(){
        $links = SocialLink::latest()->paginate(10);
        return view('admin.settings.social_link', compact('links'));
    }

    public function social_insert(Request $request){
        $request->validate([
            '*' => 'required|string|max:100',
        ]);
        SocialLink::create([
            'account' => $request->account,
            'url' => $request->url,
            'created_at' => now(),
        ]);
        return back()->with('success','Social link added successfull!');
    }
}
