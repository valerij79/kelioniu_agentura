@extends('layouts.app')

@section('content')
    <h1>Užsakymų sąrašas</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Vartotojas</th>
                <th scope="col">Viešbutis</th>
                <th scope="col">Patvirtinta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->hotel->name }}</td>
                    <td>{{ $order->is_approved ? 'Taip' : 'Ne' }}</td>
                    @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->id == $order->user_id))
                        <td>
                            @if($order->is_approved)
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Redaguoti</a>
                            @endif
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Ištrinti</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
