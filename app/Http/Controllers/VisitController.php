<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::latest()->get();
        return view('welcome', compact('visits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'purpose' => 'required|string'
        ]);

        Visit::create($validated);

        return redirect('/')->with('success', 'Visit recorded successfully!');
    }
} 