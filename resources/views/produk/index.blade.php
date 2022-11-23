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
                            <button type="submit">Tambah cucian</button>
                        </form>
                    </div>
                    <div class="w-full overflow-x-scroll lg:overflow-x-hidden mx-auto px-4">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="w-full bg-slate-500 text-white">
                                    <th class="bg-slate-500 p-3 rounded-tl-xl">Nama pelanggan</th>
                                    <th class="bg-slate-500 p-3">Nomor telepon</th>
                                    <th class="bg-slate-500 p-3">Alamat</th>
                                    <th class="bg-slate-500 p-3">Nama produk</th>
                                    <th class="bg-slate-500 p-3">Total harga</th>
                                    <th class="bg-slate-500 p-3 rounded-tr-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="border">
                                @foreach ($p as $pelanggan)
                                    <tr>
                                        <td class="p-4 text-center">{{ $pelanggan->nama }}</td>
                                        <td class="p-4 text-center">{{ $pelanggan->telepon }}</td>
                                        <td class="p-4 text-center">{{ $pelanggan->alamat }}</td>
                                        
                                            <td class="p-4 text-center">
                                                @foreach ($pelanggan->produks as $produk)
                                                    @if ($loop->last)
                                                        {{ $produk->nama_produk }}
                                                    @else
                                                        {{ $produk->nama_produk }}, 
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="p-4 text-center">
                                                {{ $pelanggan->produks->sum('harga') }}
                                            </td>
                                        <td class="p-4 text-center lg:flex items-center lg:justify-center">
                                            <div class="my-2">
                                                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="my-1 py-[0.58rem] px-[1.40rem] bg-yellow-400 rounded-full text-white lg:mx-1 ">Edit</a>
                                            </div>
                                            {{-- <div class="my-2">
                                                <form action="{{ route('produk.destroy', $pelanggan->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="my-1 py-2 px-3 bg-red-500 rounded-full text-white lg:mx-1 ">Delete</button>
                                                </form>
                                            </div> --}}
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
