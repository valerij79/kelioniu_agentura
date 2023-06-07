@extends('layouts.app')

@section('content')
    <h1>Kurti viešbutį</h1>

    @if(Auth::user()->isAdmin())
        <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="country_id" class="form-label">Šalis</label>
                <select class="form-select" id="country_id" name="country_id" required>
                    <option value="" selected>Pasirinkite šalį</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Kaina</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Nuotrauka</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Kelionės trukmė</label>
                <input type="text" class="form-control" id="duration" name="duration" required>
            </div>

            <button type="submit" class="btn btn-primary">Išsaugoti</button>
        </form>
    @else
        <div class="alert alert-danger" role="alert">
            Neturite teisės kurti viešbučių.
        </div>
    @endif
@endsection
