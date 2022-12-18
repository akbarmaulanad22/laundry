@extends('layouts.main')
@section('content')

<div class="sm:px-6 w-full">
                <div class="px-4 md:px-10 py-4 md:py-5 md:pb-8">
                    <div class="flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Data Transaksi</p>
                    </div>
                </div>
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="mt-7 overflow-x-auto">
                        {{ $dataTable->table() }}
                        {{-- <table class="w-full whitespace-nowrap">
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
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Kode</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Nama</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Cucian</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Status</p>
                                        </div>
                                    </th>
                                    <th class="pb-5">
                                        <div class="flex justify-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">Total Harga</p>
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
                                @foreach ($t as $transaksi)
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
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $transaksi->kode_transaksi }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $transaksi->pelanggan->nama }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="pl-5 text-center">
                                                @foreach ($transaksi->cucians as $cucian)
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2 pt-4">{{ $cucian->nama }}</p>
                                                <br>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $transaksi->status }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6 lg:px-8">
                                            <div class="flex justify-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $transaksi->cucians->sum('harga') }}</p>
                                            </div>
                                        </td>
                                        <td class="py-6">
                                            <div class="flex justify-around pl-5">
                                                @role('Admin')
                                                    @if ($transaksi->status != 'Dibayar')
                                                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-amber-50 focus:ring-amber-800">
                                                                <div class="py-2 px-8 bg-amber-100 text-amber-700 rounded-full">
                                                                    <p>Bayar</p>
                                                                </div>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <div class="rounded-full focus:outline-none focus:ring-2  focus:bg-green-50 focus:ring-green-800">
                                                            <div class="py-2 px-8 bg-green-100 text-green-700 rounded-full">
                                                                <p>{{ $transaksi->status }}</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endrole
                                                <form action="{{ route('transaksi.show', $transaksi->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit"  class="rounded-full focus:outline-none focus:ring-2  focus:bg-teal-50 focus:ring-bg-teal-800">
                                                        <div class="py-2 px-8 bg-teal-100 text-bg-teal-700 rounded-full">
                                                            <p>Detail</p>
                                                        </div>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="h-3"></tr>
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>

@endsection
@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
@endpush