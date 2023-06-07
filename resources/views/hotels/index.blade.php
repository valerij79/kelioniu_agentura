@extends('layouts.app')

@section('content')
    <h1>Viešbučių sąrašas</h1>

    @auth
    @if(Auth::user()->isAdmin())
        <div class="mb-3">
            <a href="{{ route('hotels.create') }}" class="btn btn-primary">Sukurti naują viešbutį</a>
        </div>
    @endif
@endauth

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pavadinimas</th>
            <th scope="col">Šalis</th>
            <th scope="col">Kaina</th>
            <th scope="col">Kelionės trukmė</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hotels as $hotel)
            <tr>
                <th scope="row">{{ $hotel->id }}</th>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->country->name }}</td>
                <td>{{ $hotel->price }}</td>
                <td>{{ $hotel->duration }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
