<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactInfo;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function home_page(){
        $sliders = Slider::get();
        $about = About::get()->first();
        $brands = Brand::get();
        $services = Services::get();
        $portfolios = Portfolio::get();
        $categories = Category::get();
        return view('frontEnd.home', compact('sliders', 'about', 'brands', 'services', 'portfolios', 'categories'));
    }

    public function portfolio_details($id){
        $portfolio = Portfolio::find($id);
        return view('frontEnd.portfolio.details', compact('portfolio'));
    }

    public function about(){
        $about = About::get()->first();
        $brands = Brand::get();
        return view('frontEnd.pages.about', compact('about', 'brands'));
    }

    public function services(){
        $services = Services::get();
        return view('frontEnd.pages.serviceas', compact('services'));
    }

    public function portfolios(){
        $portfolios = Portfolio::get();
        $categories = Category::get();
        return view('frontEnd.pages.portfolios', compact('portfolios', 'categories'));
    }

    public function contact(){
        $contact_info = ContactInfo::get()->first();
        return view('frontEnd.pages.contact', compact('contact_info'));
    }

    public function contact_create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),
        ]);
        return redirect()->route('frontend.contact')->with('success', 'Your message has been sent. Thank you!');
    }

    public function blogs(){
        return view('frontEnd.pages.blogs');
    }

}
