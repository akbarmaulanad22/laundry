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
                    <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST" id="kotak">
                        @csrf
                        @method('PUT')
                        <div class="w-full px-4 lg:w-2/3 mx-auto">
                            <div class="w-full px-4 mb-8 pt-4 flex relative">
                                <input type="text" placeholder="Nama pelanggan"  name="nama_pelanggan" id="nama_pelanggan"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('nama_pelanggan') ?? $pelanggan->nama }}">
                                <label for="nama_pelanggan" class="opacity-0 scale-0 font-bold absolute translate-y-3 translate-x-3 peer-focus:-translate-y-7 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-200  text-red-400 after:content-['*'] after:ml-0.5 after:text-red-700">Nama pelanggan</label>
                                @error('nama_pelanggan')
                                    <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="w-full px-4 mb-8 pt-4 flex relative">
                                <input type="text" placeholder="Alamat"  name="alamat" id="alamat"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('alamat') ?? $pelanggan->alamat }}">
                                <label for="alamat" class="opacity-0 scale-0 font-bold absolute translate-y-3 translate-x-3 peer-focus:-translate-y-7 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-200  text-red-400 after:content-['*'] after:ml-0.5 after:text-red-700">Alamat</label>
                                @error('alamat')
                                    <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="w-full px-4 mb-8 pt-4 flex relative">
                                <input type="text" placeholder="Telepon"  name="telepon" id="telepon"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('telepon') ?? $pelanggan->telepon }}">
                                <label for="telepon" class="opacity-0 scale-0 font-bold absolute translate-y-3 translate-x-3 peer-focus:-translate-y-7 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-200  text-red-400 after:content-['*'] after:ml-0.5 after:text-red-700">Telepon</label>
                                @error('telepon')
                                    <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="w-full px-4 mb-8 pt-4 flex justify-end">
                                <button type="button" class="w-1/4 bg-slate-300 rounded-md p-2 text-center" id="tambahcucian">Tambah cucian</button>
                            </div>

                            @foreach ($produks as $produk)
                            <div id="data-cucian">
                                <div class="w-full px-4 mb-8 pt-4 flex relative">
                                    <input type="text" placeholder="Nama produk"  name="nama_produk[]" id="nama_produk" class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('nama_produk') ?? $produk->nama_produk }}">
                                    @error('nama_produk')
                                        <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="w-full px-4 mb-8 pt-4 flex relative">
                                    <input type="text" placeholder="Harga"  name="harga[]" id="harga"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('harga') ?? $produk->harga }}">
                                    @error('harga')
                                        <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="w-full px-4 mb-8 pt-4 flex relative text-red-400">
                                    <select class="w-full bg-slate-200 peer p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" name="jenis[]">
                                        <option selected value="{{ $produk->jenis }}" class="text-dark font-semibold">{{ $produk->jenis }}</option>
                                        <option value="Kiloan">Kiloan</option>
                                        <option value="Selimut">Selimut</option>
                                        <option value="Bed cover">Bed cover</option>
                                        <option value="Kaos">Kaos</option><option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('jenis')
                                    <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                        {{ $message }}
                                    </p>@enderror
                                </div>
                                {{-- <div class="w-full px-4 pt-4 mb-8 flex justify-end">
                                    <button id="remove" class="bg-red-200 p-2 rounded-md">Hapus cucian</button>
                                </div> --}}
                            </div>
                            @endforeach
                            
                            <div class="w-full px-4 mb-8 pt-4" id="cucian">
                                
                            </div>
                            
                            <div class="w-full px-4 mb-8 lg:mx-auto">
                                <button type="submit" class="w-full bg-red-300 py-2 text-slate-50  px-5 rounded-full">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>