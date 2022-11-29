@extends('layouts.main')
@section('content')
<div class="md:px-16 md:pt-10  bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
      <div>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
              <p class="font-medium text-lg">Data Cucian</p>
              <p>Harap masukkan data dengan benar.</p>
            </div>
  
            <div class="lg:col-span-2">
                <form action="{{ route('cucian.update', $cucian->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        
                        <div class="md:col-span-5">
                          <label for="nama_cucian">Nama Cucian</label>
                          <input type="text" name="nama_cucian" id="nama_cucian" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('nama_cucian') ?? $cucian->nama }}" required/>
                          @error('nama_cucian')
                              <p class="text-red-400">{{ $message }}</p>
                          @enderror
                        </div>
                        
                        <div class="md:col-span-5">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required>
                                <option value="{{ old('jenis') ?? $cucian->jenis }}">{{ old('jenis') ?? $cucian->jenis }}</option>
                                <option value="Kiloan">Kiloan</option>
                                <option value="Selimut">Selimut</option>
                                <option value="Bad Cover">Bad Cover</option>
                                <option value="Kaos">Kaos</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @error('jenis')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-5">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('harga') ?? $cucian->harga }}" required/>
                            @error('harga')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-5 text-right pt-4">
                          <div class="inline-flex items-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                          </div>
                        </div>
          
                      </div>
                    </div>
                </form>
          </div>
        </div>
      </div>
  
    </div>
  </div>
@endsection