@extends('layouts.layoutMasterCustomer')

@section('title', 'Home')

@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <section class="sect1 flex justify-center align-center justify-around" id="head">
        <div class="title flex justify-center column" style="">
            <p class="title-head" style="">QuickCare</p>
            <p class="headline-head" style="">Solusi Praktis dan Cepat untuk Semua Kebutuhan Laundry Anda!</p>
        </div>
        <div class="img-head flex justify-center column" style="">
            <img style="object-fit: contain;" src="assets/images/laundryhead.png" alt="">
        </div>
    </section>

    <section class="sect1-riwayat flex justify-center align-center justify-around column" id="riwayat">
        <p class="mx10" style="font-size: 40px; font-weight: bold;">Riwayat</p>
        <table class="" style="width: 100%"
            id="order_dt">
            <thead>
                <tr style="height: 60px;">
                    <th>Nomor</th>
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

    <section class="sect1 flex justify-center align-center column">
        @if (Session::has('success'))
            <p class="alert alert-info" style="background-color: green">{{ Session::get('success') }}</p>
        @endif
        <p class="mx10" style="font-size: 40px; font-weight: bold;" >Pemesanan Laundry</p>
        <form action="{{ route('customer-order.store') }}" method="POST" class="flex column align-center"
            style="width: 80%;">
            @csrf
            <div class="form-cuci flex" style="width: 100%;">
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                </div>
            </div>
            <div class="form-cuci flex" style="width: 100%;">
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" value="{{ Auth::user()->nomor_hp }}" readonly>
                </div>
                <div class="input-form-cuci input-select form-group mx20">
                    <label for="paket_laundry_id">Pilih Paket Laundry</label>
                    <select id="paket_laundry_id" name="paket_laundry_id" required>
                        <option value="" disabled selected>Pilih Paket</option>
                        @foreach (App\Models\PaketLaundry::get() as $pl)
                            <option value="{{ $pl->paket_laundry_id }}">{{ $pl->nama_paket }}</option>
                        @endforeach
                    </select>
                    @error('paket_laundry_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-cuci flex" style="width: 100%;">
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="jenis">Jenis Cucian</label>
                    <input type="text" id="jenis" name="jenis" value="{{ old('jenis') }}" required>
                    @error('jenis')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-form-cuci form-group mx20" style="">
                    <label for="berat">Berat Cucian (dalam kilogram)</label>
                    <input type="number" id="berat" style="width: 100%; padding: 10px;" name="berat" min="1"
                        required value="{{ old('berat') }}">
                    @error('berat')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-textarea flex align-center" style="">
                <div class="form-group" style="">
                    <label for="catatan">Catatan Tambahan</label>
                    <textarea id="catatan" name="catatan">{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" id="cuci">Submit</button>
        </form>
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
                ajax: "{{ route('cust-order-dt') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
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
