<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\EventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventRequestController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'name'       => 'required|string|max:255',
        'email'      => 'required|email|max:255',
        'event_type' => 'required|string|max:255',
        'guests'     => 'nullable|integer',
        'date'       => 'required|string',
        'message'    => 'nullable|string',
    ]);

    // Tarixi MySQL formatına çeviririk
    if (!empty($validated['date'])) {
        try {
            $validated['date'] = Carbon::parse($validated['date'])->format('Y-m-d');
        } catch (\Exception $e) {
            $validated['date'] = null;
        }
    }

    EventRequest::create($validated);

    return back()->with('success', 'Sorğunuz uğurla göndərildi!');
}
}
