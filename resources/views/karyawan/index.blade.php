@extends('layouts.main')
@section('content')

<div class="sm:px-6 w-full">
                <div class="px-4 md:px-10 py-4 md:py-5 md:pb-8">
                    <div class="flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Data Karyawan</p>
                    </div>
                </div>
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="sm:flex items-center justify-between pt-1 pb-6">
                        {{-- <div class="flex items-center">
                            <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href="#">
                                <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                                    <p>Semua</p>
                                </div>
                            </a>
                            <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="#">
                                <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Admin</p>
                                </div>
                            </a>
                            <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="#">
                                <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Kasir</p>
                                </div>
                            </a>
                        </div> --}}
                        @role('Owner')
                            <a  href="{{ route('karyawan.create') }}"  class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded text-sm font-medium leading-none text-white">
                                <p class="text-sm font-medium leading-none text-white">Tambah Karyawan</p>
                            </a>
                        @endrole

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
                                    <th class="pb-5 px-10">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Nama</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Alamat</p>
                                        </div>
                                    </th>
                                    {{-- <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Email</p>
                                        </div>
                                    </th> --}}
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Telepon</p>
                                        </div>
                                    </th>
                                    <th class="pb-5 px-6">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Role</p>
                                        </div>
                                    </th>
                                    @role('Owner')
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5 text-center">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">!</p>
                                        </div>
                                    </th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $k)
                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                        <td class="py-6">
                                            <div class="ml-5">
                                                <div class="w-5 h-5 flex flex-shrink-0 justify-center relative">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-6 px-10">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $k->name }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">Ciapus bogor selatan jawabarat indonesia bumi</p>
                                            </div>
                                        </td>
                                        {{-- <td class="py-6">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $k->email }}</p>
                                            </div>
                                        </td> --}}
                                        <td class="py-6">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $k->telephone }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="flex justify-center pl-5">
                                                @foreach ($k->getRoleNames() as $role)
                                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $role }}</p>
                                                @endforeach
                                            </div>
                                        </td>
                                        @role('Owner')
                                            <td class="py-6">
                                                <div class="flex justify-center pl-5">
                                                    <form action="{{ route('karyawan.destroy', $k->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="px-2  rounded-full focus:outline-none focus:ring-2  focus:bg-rose-50 focus:ring-rose-800">
                                                            <div class="py-2 px-8 bg-rose-100 text-rose-700 rounded-full">
                                                                <p>Hapus</p>
                                                            </div>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('karyawan.update', $k->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"  class="px-2  rounded-full focus:outline-none focus:ring-2  focus:bg-lime-50 focus:ring-lime-800">
                                                            <div class="py-2 px-8 bg-lime-100 text-lime-700 rounded-full">
                                                                <p>Promote</p>
                                                            </div>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endrole

                                    </tr>
                                @endforeach
                                <tr class="h-3"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endsection