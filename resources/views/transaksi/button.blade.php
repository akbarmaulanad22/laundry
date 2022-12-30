<div class="flex">
    @role('Admin')
        @if ($model->status != 'Dibayar')
            <form action="{{ route('transaksi.update', $model->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-amber-50 focus:ring-amber-800">
                    <div class="py-2 px-8 bg-amber-100 text-amber-700 rounded-full">
                        <p>Bayar</p>
                    </div>
                </button>
            </form>
        @else
            <div class="rounded-full focus:outline-none focus:ring-2  focus:bg-green-50 focus:ring-green-800">
                <div class="py-2 px-8 bg-green-100 text-green-700 rounded-full">
                    <p>{{ $model->status }}</p>
                </div>
            </div>
        @endif
    @endrole
    <form action="{{ route('transaksi.show', $model->id) }}" method="post">
        @csrf
        <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-teal-50 focus:ring-bg-teal-800">
            <div class="py-2 px-8 bg-teal-100 text-bg-teal-700 rounded-full">
                <p>Detail</p>
            </div>
        </button>
    </form>
</div>