@extends('layouts.app')

@section('content')
    <h1>Kurti užsakymą</h1>

    @if(Auth::check() && Auth::user()->isAdmin())
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Vartotojas</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="" selected>Pasirinkite vartotoją</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="hotel_id" class="form-label">Viešbutis</label>
                <select class="form-select" id="hotel_id" name="hotel_id" required>
                    <option value="" selected>Pasirinkite viešbutį</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Išsaugoti</button>
        </form>
    @else
        <div class="alert alert-danger" role="alert">
            Neturite teisės kurti užsakymų.
        </div>
    @endif
@endsection
