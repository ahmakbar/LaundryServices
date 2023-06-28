@extends('layouts.layoutMasterCustomer')

@section('title', 'Home')

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
    @if (Session::has('success'))
        <p class="alert alert-info" style="background-color: green">{{ Session::get('success') }}</p>
    @endif
    <section class="sect1 flex justify-center align-center column">
        <p class="mx10" style="font-size: 40px; font-weight: bold;" id="cuci">Pemesanan Laundry</p>
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
            <button type="submit">Submit</button>
        </form>
    </section>
@endsection
