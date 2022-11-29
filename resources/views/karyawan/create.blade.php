@extends('layouts.main')
@section('content')
<div class="md:px-16 md:pt-20  bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
      <div>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
              <p class="font-medium text-lg">Data karyawan</p>
              <p>Harap masukkan data dengan benar.</p>
            </div>
  
            <div class="lg:col-span-2">
                <form action="{{ route('karyawan.store') }}" method="post">
                    @csrf
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        
                        <div class="md:col-span-5">
                          <label for="name">Nama lengkap</label>
                          <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name') ?? '' }}" />
                          @error('name')
                              <p class="text-red-400">{{ $message }}</p>
                          @enderror
                        </div>
        
                        <div class="md:col-span-5">
                          <label for="telephone">Nomor telepon</label>
                          <input type="number" name="telephone" id="telephone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('telephone') ?? '' }}" />
                          @error('telephone')
                              <p class="text-red-400">{{ $message }}</p>
                          @enderror
                        </div>
          
                        <div class="md:col-span-5">
                          <label for="email">Email Address</label>
                          <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('email') ?? '' }}" placeholder="email@exam.com" />
                          @error('email')
                              <p class="text-red-400">{{ $message }}</p>
                          @enderror
                        </div>
        
                        <div class="md:col-span-5">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('password') ?? '' }}"/>
                          @error('password')
                              <p class="text-red-400">{{ $message }}</p>
                          @enderror
                        </div>
        
                        <div class="md:col-span-5">
                          <label for="password_confirmation">Konfirmasi password</label>
                          <input type="password" name="password_confirmation" id="password_confirmation" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('password_confirmation') ?? '' }}"/>
                        </div>
        
                        {{-- <div class="md:col-span-5">
                          <label for="email">Alamat</label>
                          <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('address') ?? '' }}" placeholder="email@exam.com" />
                        </div> --}}
          
                        {{-- <div class="md:col-span-3">
                          <label for="address">Alamat</label>
                          <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('address') ?? '' }}" placeholder="" />
                        </div>
          
                        <div class="md:col-span-2">
                          <label for="city">City</label>
                          <input type="text" name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                        </div> --}}
          
                        <div class="md:col-span-5 text-right pt-4">
                          <div class="inline-flex items-end">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
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