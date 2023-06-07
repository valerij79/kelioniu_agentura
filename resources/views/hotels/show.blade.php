@extends('layouts.app')

@section('content')
    <h1>Viešbučio informacija</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $hotel->name }}</h5>
            <p class="card-text">Šalis: {{ $hotel->country->name }}</p>
            <p class="card-text">Kaina: {{ $hotel->price }}</p>
            <p class="card-text">Kelionės trukmė: {{ $hotel->duration }}</p>

            <!-- Rodyti admin funkcionalumą, pvz., redagavimo ir trynimo mygtukus -->
            @if(Auth::check() && Auth::user()->isAdmin())
                <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary">Redaguoti</a>

                <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ištrinti</button>
                </form>
            @endif
        </div>
    </div>
@endsection
