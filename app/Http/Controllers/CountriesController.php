<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('countries.index', compact('countries'));
    }

    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    public function create()
    {
        if (Auth::user()->isAdmin()) {
            return view('countries.create');
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function store(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'name' => 'required',
                'season' => 'required',
            ]);
    
            Country::create($request->all());
    
            return redirect()->route('countries.index')
                ->with('success', 'Country created successfully');
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function edit(Country $country)
    {
        if (Auth::user()->isAdmin()) {
            return view('countries.edit', compact('country'));
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function update(Request $request, Country $country)
    {
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'name' => 'required',
                'season' => 'required',
            ]);
    
            $country->update($request->all());
    
            return redirect()->route('countries.index')
                ->with('success', 'Country updated successfully');
        }
        
        abort(403, 'Unauthorized action.');
    }

    public function destroy(Country $country)
    {
        if (Auth::user()->isAdmin()) {
            $country->delete();
            return redirect()->route('countries.index')
                ->with('success', 'Country deleted successfully');
        }
        
        abort(403, 'Unauthorized action.');
    }
}
