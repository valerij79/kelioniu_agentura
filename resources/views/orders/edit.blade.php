@extends('layouts.app')

@section('content')
    <h1>Redaguoti užsakymą</h1>

    @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->id == $order->user_id))
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">Vartotojas</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $order->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="hotel_id" class="form-label">Viešbutis</label>
                <select class="form-select" id="hotel_id" name="hotel_id" required>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}" {{ $hotel->id == $order->hotel_id ? 'selected' : '' }}>
                            {{ $hotel->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atnaujinti</button>
        </form>
    @else
        <div class="alert alert-danger" role="alert">
            Neturite teisės redaguoti šio užsakymo.
        </div>
    @endif
@endsection
