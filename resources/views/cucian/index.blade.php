@extends('layouts.main')
@section('content')

<div class="sm:px-6 w-full">
                <div class="px-4 md:px-10 py-4 md:py-5 md:pb-8">
                    <div class="flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Data Cucian</p>
                    </div>
                </div>
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="sm:flex items-center justify-between">
                        <a  href="{{ route('cucian.create') }}"  class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded text-sm font-medium leading-none text-white">
                            <p class="text-sm font-medium leading-none text-white">Tambah Cucian</p>
                        </a>
                    </div>
                    <div class="mt-7 overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr>
                                    <th class="pb-5">
                                        <div class="ml-5">
                                            <div class="w-5 h-5 flex flex-shrink-0 justify-center relative">
                                                #
                                            </div>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Nama</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Jenis</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Status</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Harga</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">!</p>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c as $cucian)
                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                        <td class="py-6">
                                            <div class="ml-5">
                                                <div class="w-5 h-5 flex flex-shrink-0 justify-center relative">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $cucian->nama }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $cucian->jenis }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $cucian->status }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $cucian->harga }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 flex justify-center">
                                            <div class="pl-5">
                                                @if ($cucian->status != 'Diambil')
                                                    <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-amber-50 focus:ring-amber-800" href="{{ route('cucian.edit', $cucian->id) }}">
                                                        <div class="py-2 px-8 bg-amber-100 text-amber-700 rounded-full">
                                                            <p>Edit</p>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="pl-5">
                                                @if ($cucian->status == 'Baru')
                                                <form action="{{ route('cucian.status', $cucian->id ) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $cucian->id) }}">
                                                        <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                                                            <p>Cuci</p>
                                                        </div>
                                                    </button>
                                                </form>
                                                    
                                                @endif
                                                @if ($cucian->status == 'Sedang dicuci')
                                                <form action="{{ route('cucian.status', $cucian->id ) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $cucian->id) }}">
                                                        <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                                                            <p>Selesai</p>
                                                        </div>
                                                    </button>
                                                </form>
                                                @endif
                                                @if ($cucian->status == 'Selesai')
                                                <form action="{{ route('cucian.status', $cucian->id ) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $cucian->id) }}">
                                                        <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                                                            <p>Ambil</p>
                                                        </div>
                                                    </button>
                                                </form>
                                                @endif
                                                @if ($cucian->status == 'Diambil')
                                                    <div class="rounded-full focus:outline-none focus:ring-2  focus:bg-blue-50 focus:ring-blue-800" href="{{ route('cucian.edit', $cucian->id) }}">
                                                        <div class="py-2 px-8 bg-blue-100 text-blue-700 rounded-full">
                                                            <p>Telah diambil</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="h-3"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endsection