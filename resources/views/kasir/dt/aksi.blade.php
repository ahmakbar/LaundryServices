<form action="{{ route('orders.destroy', $model->order_id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" style="font-size: 12px;" type="submit">Hapus</button>
    {{-- <button class="btn btn-danger" type="button">Edit</button> --}}
    <a class="btn btn-success" style="font-size: 12px;" href="{{ route('orders.done', $model->order_id) }}">Selesai</a>
    <a class="btn btn-warning" style="font-size: 12px;" href="{{ route('orders.proses', $model->order_id) }}">Diproses</a>
</form>
