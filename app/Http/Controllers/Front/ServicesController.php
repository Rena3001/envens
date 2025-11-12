<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->latest()->paginate(6);
        $firstService = $services->first();
        return view('client.pages.services', compact('services', 'firstService'));
    }
    
    public function details($locale, $id)
    {
        $locale = app()->getLocale();
        $service = Service::findOrFail($id);

        // Həmin kateqoriyaya aid digər xidmətlər (özünü çıxmaq şərtilə)
        $categoryField = 'category_' . $locale;
        $categoryValue = $service->$categoryField;

        $relatedServices = Service::where($categoryField, $categoryValue)
            ->where('id', '!=', $id)
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('client.pages.service-details', compact('service', 'relatedServices'));
    }


}