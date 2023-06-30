<form class="form-aksi flex column justify-center" action="{{ route('orders.destroy', $model->order_id) }}" method="POST">
    @csrf
    @method('DELETE')
    {{-- <button class="btn btn-danger" type="button">Edit</button> --}}
    <a class="button-aksi diproses" style="" href="{{ route('orders.proses', $model->order_id) }}">Diproses</a>
    <a class="button-aksi selesai" style="" href="{{ route('orders.done', $model->order_id) }}">Selesai</a>
    <button class="button-aksi hapus" style="" type="submit">Hapus</button>
</form>
