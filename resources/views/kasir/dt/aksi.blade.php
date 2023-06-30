<form class="flex column justify-center" action="{{ route('orders.destroy', $model->order_id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button-aksi hapus" style="font-size: 12px;" type="submit">Hapus</button>
    {{-- <button class="btn btn-danger" type="button">Edit</button> --}}
    <a class="button-aksi selesai" style="font-size: 12px;" href="{{ route('orders.done', $model->order_id) }}">Selesai</a>
    <a class="button-aksi diproses" style="font-size: 12px;" href="{{ route('orders.proses', $model->order_id) }}">Diproses</a>
</form>
