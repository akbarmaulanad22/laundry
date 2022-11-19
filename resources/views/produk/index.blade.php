<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between m-3 pb-5">
                        <form action="{{ route('produk.create', $outlet->id) }}" method="post" class="bg-slate-300 rounded-md p-2">
                            @csrf
                            <input type="hidden" name="id" value="{{ $outlet->id }}">
                            <button type="submit">Tambah Produk</button>
                        </form>
                        {{-- <form action="{{ route('produk.index') }}" method="GET">
                            <input type="text" placeholder="Cari" name="search" class="py-2 px-4 rounded-full focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('search') ?? '' }}">
                            <button type="submit" class="py-2 px-4 bg-teal-400 rounded-full text-white">Search</button>
                        </form> --}}
                    </div>
                    <div class="w-full overflow-x-scroll lg:overflow-x-hidden mx-auto px-4">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="w-full bg-slate-500 text-white">
                                    <th class="bg-slate-500 p-3 rounded-tl-xl">Nama</th>
                                    <th class="bg-slate-500 p-3">Jenis</th>
                                    <th class="bg-slate-500 p-3">Harga</th>
                                    <th class="bg-slate-500 p-3 rounded-tr-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="border">
                                @foreach ($p as $produk)
                                    <tr>
                                            <td class="p-4 text-center">{{ $produk->nama_produk }}</td>
                                            <td class="p-4 text-center">{{ $produk->jenis }}</td>
                                            <td class="p-4 text-center">{{ $produk->harga }}</td>
                                            <td class="p-4 text-center lg:flex items-center lg:justify-center">
                                                <div class="my-2">
                                                    <a href="{{ route('produk.edit', $produk->id) }}" class="my-1 py-[0.58rem] px-[1.40rem] bg-yellow-400 rounded-full text-white lg:mx-1 ">Edit</a>
                                                </div>
                                                <div class="my-2">
                                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="my-1 py-2 px-3 bg-red-500 rounded-full text-white lg:mx-1 ">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-between m-3 pb-5">
                        {{-- {{ $guests->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
