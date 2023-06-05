@extends('layouts.app')

@section('content')
    <h1>Viešbučių sąrašas</h1>

    <ul>
        @foreach ($hotels as $hotel)
            <li>{{ $hotel->name }}</li>
        @endforeach
    </ul>

    @if (Auth::check() && Auth::user()->isAdmin())
        <!-- Rodyti admin funkcionalumą, pvz., pridėjimo mygtuką -->
        <a href="{{ route('hotels.create') }}" class="btn btn-primary">Pridėti viešbutį</a>
    @endif
@endsection
