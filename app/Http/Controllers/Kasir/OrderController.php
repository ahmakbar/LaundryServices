<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
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
        $orders = Order::join('users', 'users.user_id', '=', 'orders.user_id')
            ->join('paket_laundries', 'paket_laundries.paket_laundry_id', '=', 'orders.paket_laundry_id')
            // ->where('orders.status', '!=', '1')
            // ->where('orders.status', '!=', 1)
            ->get();

        return DataTables::of($orders)
            ->addColumn('status', function ($order) {
                $statusLabel = ['Diterima', 'Selesai', 'Diproses'];
                return $statusLabel[$order->status];
            })
            ->addColumn('nama_lengkap', function ($row) {
                $nama_lengkap = User::where('user_id', $row->user_id)->first()->name;
                return $nama_lengkap;
            })
            ->addColumn('nomor_hp', function ($row) {
                $nomor_hp = User::where('user_id', $row->user_id)->first()->nomor_hp;
                return $nomor_hp;
            })
            ->addColumn('paket_laundry', function ($row) {
                $paket_laundry = PaketLaundry::where('paket_laundry_id', $row->paket_laundry_id)->first()->nama_paket;
                return $paket_laundry;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    return 'Selesai';
                } elseif ($row->status == 2) {
                    return 'Diproses';
                } else {
                    return 'Diterima';
                }
            })
            ->addColumn('aksi', 'kasir.dt.aksi')
            ->rawColumns(['nama_lengkap', 'nomor_hp', 'paket_laundry', 'status', 'aksi'])
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

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function edit(string $id)
    {
        dd($id);
        // $users = User::all();
        // $paketLaundries = PaketLaundry::all();

        // return view('orders.edit', compact('order', 'users', 'paketLaundries'));
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

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(string $id)
    {
        $order = Order::where('order_id', $id)
            ->first()
            ->delete();

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Order berhasil dihapus');
    }

    public function done($id)
    {
        $order = Order::where('order_id', $id)->first();

        $order->update([
            'status' => 1,
        ]);

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Order berhasil dinyatakan selesai');
    }

    public function proses($id)
    {
        $order = Order::where('order_id', $id)->first();

        $order->update([
            'status' => 2,
        ]);

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Order dalam proses pengerjaan');
    }
}
