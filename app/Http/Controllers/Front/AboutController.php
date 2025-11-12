<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::firstWhere('is_active', true);
        $testimonials = Testimonial::where('is_active', true)->get();
        $teams = Team::where('is_active', true)->get();
        return view('client.pages.about', compact('about', 'testimonials', 'teams'));
    }
}
