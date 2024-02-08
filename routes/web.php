<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialLinkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// })->name('root');


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\AdminController::class, 'admin'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'home_page'])->name('home.page');

// brand routes
Route::get('/dashboard/brands/all', [App\Http\Controllers\BrandController::class, 'index'])->name('brands.all');
Route::post('/dashboard/brands/add', [App\Http\Controllers\BrandController::class, 'brand_add'])->name('brand.add');
Route::get('/dashboard/brands/delete/{id}', [App\Http\Controllers\BrandController::class, 'brand_delete'])->name('brand.delete');
Route::get('/dashboard/brands/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit_view'])->name('brand.edit.view');
Route::post('/dashboard/brands/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');

// Category Routes
Route::get('/dashboard/category/all', [CategoryController::class, 'index'])->name('category.all');
Route::post('/dashboard/category/add', [CategoryController::class, 'add'])->name('category.add');
Route::get('/dashboard/category/edit/view/{id}', [CategoryController::class, 'edit_view'])->name('category.edit.view');
Route::post('/dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('/dashboard/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

// slider routes
Route::get('/dashboard/slider', [SliderController::class, 'sliders'])->name('slider.index');
Route::get('/dashboard/slider/add', [SliderController::class, 'slider_add'])->name('slider.add');
Route::post('/dashboard/slider/add', [SliderController::class, 'slider_add_save'])->name('slider.add.save');
Route::get('/dashboard/slider/delete/{id}', [SliderController::class, 'slider_delete'])->name('slider.delete');
Route::get('/dashboard/slider/edit/{id}', [SliderController::class, 'slider_edit_view'])->name('slider.edit.view');
Route::post('/dashboard/slider/edit/{id}', [SliderController::class, 'slider_update'])->name('slider.update');

// About Section
Route::get('/dashboard/about', [AboutController::class, 'index'])->name('about.index');
Route::post('/dashboard/about/update/{id}', [AboutController::class, 'update'])->name('about.update');

// Services section
Route::get('/dashboard/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/dashboard/services/add', [ServicesController::class, 'service_add_view'])->name('service.add.view');
Route::post('/dashboard/services/add', [ServicesController::class, 'service_add'])->name('service.add');
Route::get('/dashboard/services/edit/{id}', [ServicesController::class, 'service_edit_view'])->name('service.edit.view');
Route::post('/dashboard/services/update/{id}', [ServicesController::class, 'service_update'])->name('service.update');

// Portfolios Section
Route::get('/dashboard/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
Route::get('/dashboard/portfolio/add', [PortfolioController::class, 'add_view'])->name('portfolios.add.view');
Route::post('/dashboard/portfolio/add/save', [PortfolioController::class, 'add'])->name('portfolios.add');
Route::get('/dashboard/portfolio/status/{id}', [PortfolioController::class, 'status'])->name('portfolios.status');
Route::get('/dashboard/portfolio/delete/{id}', [PortfolioController::class, 'delete'])->name('portfolios.delete');
Route::get('/dashboard/portfolio/edit/{id}', [PortfolioController::class, 'edit_view'])->name('portfolio.edit.view');
Route::post('/dashboard/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolio.edit');

// Contact Messages
Route::get('/dashboard/contact/messages', [ContactController::class, 'index'])->name('contact.messages');
Route::post('/contact/messages/create', [HomeController::class, 'contact_create'])->name('contact.messages.create');
Route::get('/contact/messages/view/{id}', [ContactController::class, 'view'])->name('contact.messages.view');
Route::get('/contact/messages/delete/{id}', [ContactController::class, 'delete'])->name('contact.messages.delete');

Route::get('/contact/info/view', [ContactController::class, 'contact_info'])->name('contact.info.view');
Route::get('/contact/info/edit/{id}', [ContactController::class, 'edit'])->name('contact.info.edit');
Route::post('/contact/info/update/{id}', [ContactController::class, 'update'])->name('contact.info.update');
Route::post('/contact/info/map/{id}', [ContactController::class, 'map_link'])->name('map.link.update');

// Frontend
Route::get('/portfolio/details/{id}', [HomeController::class, 'portfolio_details'])->name('portfolio.details');
Route::get('/about', [HomeController::class, 'about'])->name('frontend.about');
Route::get('/services', [HomeController::class, 'services'])->name('frontend.services');
Route::get('/portfolios', [HomeController::class, 'portfolios'])->name('frontend.portfolios');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('frontend.blogs');
Route::get('/contact', [HomeController::class, 'contact'])->name('frontend.contact');

// Settings
Route::get('/dashboard/social/link', [SocialLinkController::class, 'social_link'])->name('dashboard.social.link');


