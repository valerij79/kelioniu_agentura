@extends('layouts.app')

@section('content')
    <h1>Užsakymo informacija</h1>
    <p>Užsakymo ID: {{ $order->id }}</p>
    <p>Užsakymo vartotojas: {{ $order->user->name }}</p>
    <p>Užsakymo viešbutis: {{ $order->hotel->name }}</p>
    <p>Užsakymo statusas: {{ $order->status }}</p>
    <p>Užsakymo suma: {{ $order->amount }}</p>

    @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->id === $order->user_id))
        <!-- Rodyti admin arba vartotojo funkcionalumą -->
        @if (Auth::user()->isAdmin())
            <!-- Rodyti admin funkcionalumą, pvz., užsakymo patvirtinimo mygtuką -->
            <form action="{{ route('orders.approve', $order->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Patvirtinti užsakymą</button>
            </form>
        @endif

        <!-- Bendras funkcionalumas -->
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Grįžti į užsakymų sąrašą</a>
    @endif
@endsection
