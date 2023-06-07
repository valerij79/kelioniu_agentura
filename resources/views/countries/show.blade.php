@extends('layouts.app')

@section('content')
    <h1>Šalies informacija</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $country->name }}</h5>
            <p class="card-text">Sezono laikas: {{ $country->season }}</p>

            <!-- Rodyti admin funkcionalumą, pvz., redagavimo mygtuką -->
            @if(Auth::check() && Auth::user()->isAdmin())
                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Redaguoti</a>
            @endif
        </div>
    </div>
@endsection
