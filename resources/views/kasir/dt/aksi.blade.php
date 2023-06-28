<form action="{{ route('orders.destroy', $model->order_id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Hapus</button>
    {{-- <button class="btn btn-danger" type="button">Edit</button> --}}
    <a class="btn btn-danger" href="{{ route('orders.done', $model->order_id) }}">Selesai</a>
    <a class="btn btn-danger" href="{{ route('orders.proses', $model->order_id) }}">Diproses</a>
</form>
