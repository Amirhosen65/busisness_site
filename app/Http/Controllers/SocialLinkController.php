<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function social_link(){
        return view('admin.settings.social_link');
    }
}
