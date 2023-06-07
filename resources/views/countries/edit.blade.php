@extends('layouts.app')

@section('content')
    <h1>Redaguoti šalį</h1>

    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Pavadinimas</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $country->name }}" required>
        </div>

        <div class="mb-3">
            <label for="season" class="form-label">Sezono laikas</label>
            <input type="text" class="form-control" id="season" name="season" value="{{ $country->season }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>
@endsection
