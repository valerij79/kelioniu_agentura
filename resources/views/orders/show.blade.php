@extends('layouts.app')

@section('content')
    <h1>Užsakymo informacija</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Užsakymo ID: {{ $order->id }}</h5>
            <p class="card-text">Vartotojas: {{ $order->user->name }}</p>
            <p class="card-text">Viešbutis: {{ $order->hotel->name }}</p>
            <p class="card-text">Patvirtinta: {{ $order->is_approved ? 'Taip' : 'Ne' }}</p>

            @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->id == $order->user_id))
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Redaguoti</a>

                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ištrinti</button>
                </form>
            @endif
        </div>
    </div>
@endsection
