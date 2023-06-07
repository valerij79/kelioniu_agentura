@extends('layouts.app')

@section('content')
    <h1>Kurti šalį</h1>

    <form action="{{ route('countries.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Pavadinimas</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="season" class="form-label">Sezono laikas</label>
            <input type="text" class="form-control" id="season" name="season" required>
        </div>

        <button type="submit" class="btn btn-primary">Išsaugoti</button>
    </form>
@endsection
