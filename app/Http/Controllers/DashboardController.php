<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaketLaundry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDO;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->roles->pluck('name')[0] == 'kasir') {
            $pendapatanBulanan = Order::whereMonth('created_at', Carbon::now()->month)
                ->where('status', 1)
                ->sum('harga_total');

            return view('kasir.index', [
                'pendapatanBulanan' => $pendapatanBulanan,
            ]);
        } elseif (Auth::user()->roles->pluck('name')[0] == 'admin') {
            $pendapatanBulanan = Order::whereMonth('created_at', Carbon::now()->month)
                ->where('status', 1)
                ->sum('harga_total');
            $pendapatanKeseluruhan = Order::where('status', 1)->sum('harga_total');

            return view('admin.index', [
                'pendapatanBulanan' => $pendapatanBulanan,
                'pendapatanKeseluruhan' => $pendapatanKeseluruhan,
            ]);
        } else {
            return view('customer.home');
        }
    }

    public function indexTableAdmin()
    {
        $orders = Order::join('users', 'users.user_id', '=', 'orders.user_id')
            ->join('paket_laundries', 'paket_laundries.paket_laundry_id', '=', 'orders.paket_laundry_id')
            ->where('status', 1)
            ->get();

        return DataTables::of($orders)
            ->addIndexColumn()
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
            ->rawColumns(['nama_lengkap', 'nomor_hp', 'paket_laundry', 'status'])
            ->make(true);
    }
}
