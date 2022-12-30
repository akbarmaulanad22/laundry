@extends('layouts.main')
@section('content')

<div class="sm:px-6 w-full">
                <div class="px-4 md:px-10 py-4 md:py-5 md:pb-8">
                    <div class="flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Data Transaksi</p>
                    </div>
                </div>
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="sm:flex items-center justify-between">
                        <div class="flex items-center">
                            <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href="#">
                                <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                                    <p>Semua</p>
                                </div>
                            </a>
                            <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="#">
                                <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Dibayar</p>
                                </div>
                            </a>
                            <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="#">
                                <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Belum dibayar</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mt-7 overflow-x-auto">
                        {{-- {{ $dataTable->table() }} --}}
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
                        <table id="example" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Kode</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">Status</th>
                                    <th width="20%">Cucian</th>
                                    <th width="10%">Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('transaksi.json') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'kode', name: 'kode'},
                    {data: 'nama', name: 'nama'},
                    {data: 'status', name: 'status'},
                    {data: 'cucian', name: 'cucian'},
                    {data: 'total', name: 'total'},
                    {data: 'action', name: 'action', orderable: false , searchable: false},
                ],
                lengthChange: false,
                searchDelay: 200,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                ]
            });
        } );
    </script>
@endpush