<div class="flex justify-start">
    <div class="pl-5">
        @if ($model->status != 'Diambil')
            <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-amber-50 focus:ring-amber-800" href="{{ route('cucian.edit', $model->id) }}">
                <div class="py-2 px-8 bg-amber-100 text-amber-700 rounded-full">
                    <p>Edit</p>
                </div>
            </a>
        @endif
    </div>
    <div class="pl-5">
        @if ($model->status == 'Baru')
        <form action="{{ route('cucian.status', $model->id ) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $model->id) }}">
                <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                    <p>Cuci</p>
                </div>
            </button>
        </form>
            
        @endif
        @if ($model->status == 'Sedang dicuci')
        <form action="{{ route('cucian.status', $model->id ) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $model->id) }}">
                <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                    <p>Selesai</p>
                </div>
            </button>
        </form>
        @endif
        @if ($model->status == 'Selesai')
        <form action="{{ route('cucian.status', $model->id ) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $model->id) }}">
                <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                    <p>Ambil</p>
                </div>
            </button>
        </form>
        @endif
        @if ($model->status == 'Diambil')
            <div class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $model->id) }}">
                <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                    <p>Telah diambil</p>
                </div>
            </div>
        @endif
    </div>
</div>