<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaketLaundry;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function indexTable()
    {
        $orders = Order::with('user', 'paketLaundry')->get();
        
        return DataTables::of($orders)
            ->addColumn('status', function ($order) {
                $statusLabel = ['Diterima', 'Selesai', 'Diproses'];
                return $statusLabel[$order->status];
            })
            ->addColumn('action', function ($order) {
                $editUrl = route('orders.edit', $order->id);
                $deleteUrl = route('orders.destroy', $order->id);
                return '<a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>
                        <form action="'.$deleteUrl.'" method="POST" style="display: inline-block;">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
            })
            ->make(true);
    }

    public function create()
    {
        $users = User::all();
        $paketLaundries = PaketLaundry::all();

        return view('orders.create', compact('users', 'paketLaundries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|unique:orders',
            'jenis' => 'required',
            'berat' => 'nullable|integer',
            'harga_total' => 'nullable|integer',
            'catatan' => 'nullable',
            'status' => 'required|in:0,1,2',
            'user_id' => 'required|exists:users,user_id',
            'paket_laundry_id' => 'required|exists:paket_laundries,paket_laundry_id',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function edit(Order $order)
    {
        $users = User::all();
        $paketLaundries = PaketLaundry::all();

        return view('orders.edit', compact('order', 'users', 'paketLaundries'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_id' => 'required|unique:orders,order_id,' . $order->id,
            'jenis' => 'required',
            'berat' => 'nullable|integer',
            'harga_total' => 'nullable|integer',
            'catatan' => 'nullable',
            'status' => 'required|in:0,1,2',
            'user_id' => 'required|exists:users,user_id',
            'paket_laundry_id' => 'required|exists:paket_laundries,paket_laundry_id',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}