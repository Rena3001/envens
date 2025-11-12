<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\ContactInfo;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Translation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       $banners = Banner::where('is_active', true)->latest()->get();
       $brands = Brand::where('is_active', true)->orderBy('order')->get();
       $settings = Setting::all()->pluck('value', 'key');
       $galleries = Gallery::where('is_active', true)
        ->latest()
        ->take(4) // yalnız son 4 şəkil
        ->get();
       $about= About::first();
       $services = Service::where('is_active', true)->latest()->take(6)->get();
       $firstService = $services->first();
       $contactInfo = ContactInfo::first();


        // Tərcümələr (bu lazım olsa lokal cache üçün)
       $translations = Translation::all();


        return view('client.home', compact('banners','brands','settings','translations', 'galleries', 'about', 'services', 'contactInfo', 'firstService'));
    }
}
