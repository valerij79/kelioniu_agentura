<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelsController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        return view('hotels.index', compact('hotels'));
    }

    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }

    public function create()
    {
        if (Auth::user()->isAdmin()) {
            return view('hotels.create');
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function store(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'country_id' => 'required',
                'name' => 'required',
                'price' => 'required|numeric',
                'duration' => 'required|numeric',
            ]);
    
            Hotel::create($request->all());
    
            return redirect()->route('hotels.index')
                ->with('success', 'Hotel created successfully');
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function edit(Hotel $hotel)
    {
        if (Auth::user()->isAdmin()) {
            return view('hotels.edit', compact('hotel'));
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function update(Request $request, Hotel $hotel)
    {
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'country_id' => 'required',
                'name' => 'required',
                'price' => 'required|numeric',
                'duration' => 'required|numeric',
            ]);
    
            $hotel->update($request->all());
    
            return redirect()->route('hotels.index')
                ->with('success', 'Hotel updated successfully');
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function destroy(Hotel $hotel)
    {
        if (Auth::user()->isAdmin()) {
            $hotel->delete();
            return redirect()->route('hotels.index')
                ->with('success', 'Hotel deleted successfully');
        }
        
        abort(403, 'Unauthorized action.');
    }
}
