@extends('layouts.app')

@section('content')
    <h1>Redaguoti viešbutį</h1>

    @if(Auth::user()->isAdmin())
        <form action="{{ route('hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="country_id" class="form-label">Šalis</label>
                <select class="form-select" id="country_id" name="country_id" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $country->id == $hotel->country_id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Kaina</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $hotel->price }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Nuotrauka</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('storage/' . $hotel->image) }}" alt="Nuotrauka" width="100">
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Kelionės trukmė</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{ $hotel->duration }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atnaujinti</button>
        </form>
    @else
        <div class="alert alert-danger" role="alert">
            Neturite teisės redaguoti viešbučių.
        </div>
    @
