@extends('layouts.layoutMasterKasir')

@section('title', 'Kasir')

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

        <h1 class="pad2 pt10">Daftar Order</h1>
        <table style="max-width: 100%; margin: 0 auto; padding: 20px; border-radius: 20px;" id="order_dt">
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
                ajax: "",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
