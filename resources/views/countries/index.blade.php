@extends('layouts.app')

@section('content')
    <h1>Šalių sąrašas</h1>

    <!-- Rodyti mygtuką "Pridėti šalį" tik admin vartotojui -->
    @if(Auth::check() && Auth::user()->isAdmin())
        <a href="{{ route('countries.create') }}" class="btn btn-success mb-3">Pridėti šalį</a>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>Sezono laikas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->season }}</td>
                    <td>
                        <!-- Rodyti admin funkcionalumą, pvz., redagavimo mygtuką -->
                        @if(Auth::check() && Auth::user()->isAdmin())
                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Redaguoti</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
