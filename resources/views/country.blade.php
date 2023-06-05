@extends('layouts.app')

@section('content')
    <h1>{{ $country->name }}</h1>
    <p>Sezono laikas: {{ $country->season }}</p>

    @if (Auth::check() && Auth::user()->isAdmin())
        <!-- Rodyti admin funkcionalumą, pvz., redagavimo mygtuką -->
        <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Redaguoti šalį</a>
        <!-- Rodyti admin funkcionalumą, pvz., šalinimo mygtuką -->
        <form action="{{ route('countries.destroy', $country->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ištrinti šalį</button>
        </form>
    @endif
@endsection
