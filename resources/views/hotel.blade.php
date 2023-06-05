@extends('layouts.app')

@section('content')
    <h1>{{ $hotel->name }}</h1>
    <p>Kaina: {{ $hotel->price }}</p>
    <p>Nuotrauka: <img src="{{ $hotel->photo }}" alt="{{ $hotel->name }}"></p>
    <p>Kelionės trukmė: {{ $hotel->duration }}</p>

    @if (Auth::check() && Auth::user()->isAdmin())
        <!-- Rodyti admin funkcionalumą, pvz., redagavimo mygtuką -->
        <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary">Redaguoti viešbutį</a>
        <!-- Rodyti admin funkcionalumą, pvz., šalinimo mygtuką -->
        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ištrinti viešbutį</button>
        </form>
    @endif
@endsection
