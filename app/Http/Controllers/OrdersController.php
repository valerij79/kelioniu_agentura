<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders;

        return view('orders.index', compact('orders'));
    }

    public function pay(Order $order)
    {
        $user = Auth::user();
        if ($order->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Apmokėjimo logika...

        $order->update(['paid' => true]);

        return redirect()->route('orders.index')
            ->with('success', 'Order successfully paid');
    }

    public function show(Order $order)
    {
        $user = Auth::user();
        if ($user->isAdmin() || $order->user_id === $user->id) {
            return view('orders.show', compact('order'));
        }

        abort(403, 'Unauthorized action.');
    }

    public function destroy(Order $order)
    {
        if (Auth::user()->isAdmin()) {
            $order->delete();
            return redirect()->route('orders.index')
                ->with('success', 'Order deleted successfully');
        }

        abort(403, 'Unauthorized action.');
    }

    public function adminIndex()
    {
        if (Auth::user()->isAdmin()) {
            $orders = Order::all();
            return view('orders.adminIndex', compact('orders'));
        }

        abort(403, 'Unauthorized action.');
    }

    public function adminShow(Order $order)
    {
        if (Auth::user()->isAdmin()) {
            return view('orders.adminShow', compact('order'));
        }

        abort(403, 'Unauthorized action.');
    }
}
