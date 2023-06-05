@extends('layouts.app')

@section('content')
    <h1>Šalių sąrašas</h1>

    <ul>
        @foreach ($countries as $country)
            <li>{{ $country->name }}</li>
        @endforeach
    </ul>

    @if (Auth::check() && Auth::user()->isAdmin())
        <!-- Rodyti admin funkcionalumą, pvz., pridėjimo mygtuką -->
        <a href="{{ route('countries.create') }}" class="btn btn-primary">Pridėti šalį</a>
    @endif
@endsection
