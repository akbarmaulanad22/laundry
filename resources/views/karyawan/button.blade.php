<div class="flex">
    <form action="{{ route('karyawan.destroy', $model->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit"  class="px-2 rounded-full focus:outline-none focus:ring-2  focus:bg-rose-50 focus:ring-rose-800">
            <div class="py-1 px-3 bg-rose-100 text-rose-700 rounded-full">
                <p>Hapus</p>
            </div>
        </button>
    </form>
    <form action="{{ route('karyawan.update', $model->id) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit"  class="px-2 rounded-full focus:outline-none focus:ring-2  focus:bg-lime-50 focus:ring-lime-800">
            <div class="py-1 px-3 bg-lime-100 text-lime-700 rounded-full">
                <p>Promote</p>
            </div>
        </button>
    </form>
</div>