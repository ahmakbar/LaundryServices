@extends('layouts.layoutMasterAdmin')

@section('title', 'Admin')

@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <section class="right pad2 flex align-center" id="style-2">
        <h1>Dashboard</h1>
        <div class="w100 h100 flex py20 relative" style="background-color: white;">
            <div class="box2 bwhite flex align-center py10">
                <p class="mx20">Logo </p>
                <p>Jumlah User</p>
            </div>
            <div class="box2 bwhite flex align-center py10">
                <p class="mx20">Logo </p>
                <p>Jumlah Konselor</p>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
            @csrf
        </form>
        <button type="submit" onclick="$('#logoutForm').submit()">Logout</button>

        <h1 class="pad2 pt10">Daftar Order</h1>
        <table style="" id="order_dt">
            <thead>
                <tr style="height: 60px;">
                    <th>Nama Lengkap</th>
                    <th>Nomor Telepon</th>
                    <th>Paket Laundry</th>
                    <th>Jenis Cucian</th>
                    <th>Berat Cucian</th>
                    <th>Catatan Tambahan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </section>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#order_dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-order-dt') }}",
                columns: [{
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'nomor_hp',
                        name: 'nomor_hp'
                    },
                    {
                        data: 'paket_laundry',
                        name: 'paket_laundry'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'berat',
                        name: 'berat'
                    },
                    {
                        data: 'catatan',
                        name: 'catatan'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                ]
            });

        });
    </script>
@endsection
