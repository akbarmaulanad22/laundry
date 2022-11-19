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
                    <form action="{{ route('outlet.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="w-full px-4 lg:w-2/3 mx-auto">
                            <div class="w-full px-4 mb-8 pt-4 flex relative">
                                <input type="text" placeholder="Nama"  name="nama" id="nama"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('nama') ?? '' }}">
                                <label for="nama" class="opacity-0 scale-0 font-bold absolute translate-y-3 translate-x-3 peer-focus:-translate-y-7 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-200  text-red-400 after:content-['*'] after:ml-0.5 after:text-red-700">Nama</label>
                                @error('nama')
                                    <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="w-full px-4 mb-8 pt-4 flex relative">
                                <input type="text" placeholder="Alamat"  name="alamat" id="alamat"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('alamat') ?? '' }}">
                                <label for="name" class="opacity-0 scale-0 font-bold absolute translate-y-3 translate-x-3 peer-focus:-translate-y-7 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-200  text-red-400 after:content-['*'] after:ml-0.5 after:text-red-700">Alamat</label>
                                @error('alamat')
                                    <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="w-full px-4 mb-8 pt-4 flex relative">
                                <input type="text" placeholder="telepon"  name="telepon" id="telepon"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('telepon') ?? '' }}">
                                <label for="name" class="opacity-0 scale-0 font-bold absolute translate-y-3 translate-x-3 peer-focus:-translate-y-7 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-200  text-red-400 after:content-['*'] after:ml-0.5 after:text-red-700">Telepon</label>
                                @error('telepon')
                                    <p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">
                                        {{ $message }}
                                    </p>
                                @enderror
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
