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
                        <div class="flex items-center justify-between">
                            <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href="#">
                                <div class="py-1 px-3 bg-indigo-100 text-indigo-700 rounded-full">
                                    <p>Semua</p>
                                </div>
                            </a>
                            <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 sm:ml-8" href="#">
                                <div class="py-1 px-3 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Dibayar</p>
                                </div>
                            </a>
                            <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 sm:ml-8" href="#">
                                <div class="py-1 px-3 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Belum dibayar</p>
                                </div>
                            </a>
                        </div>
                        <div class="flex justify-end">
                            <div class="px-10">
                                <label for="min">From</label>
                                <input type="date" name="min" id="fromDate" class="dateRange">
                            </div>
                            <div class="">
                                <label for="min">To</label>
                                <input type="date" name="min" id="toDate" class="dateRange">
                            </div>
                        </div>
                    </div>
                    <div class="mt-7 overflow-x-auto">
                        <table id="example" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Kode</th>
                                    <th width="20%">Nama</th>
                                    <th width="20%">Cucian</th>
                                    <th width="15%">Status</th>
                                    <th width="20%">Tanggal</th>
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

            let table = $('#example');

            $('.dateRange').on('change', function (){
                
                let fromDate = $('#fromDate').val(); 
                let toDate = $('#toDate').val(); 
                
                table.on('preXhr.dt', function ( e, settings, data ) {
                    data.from = fromDate;
                    data.to = toDate;
                } )

                table.DataTable().ajax.reload()
            });
            
            table.DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('transaksi.json') }}',
                columns: [
                    {data: 'DT_RowIndex',   name: 'DT_RowIndex',      orderable: false, searchable: false},
                    {data: 'kode',          name: 'kode',             orderable: false},
                    {data: 'pelanggan',     name: 'pelanggan.nama',   orderable: false},
                    {data: 'cucians',       name: 'cucians.nama',     orderable: false},
                    {data: 'status',        name: 'status',           orderable: false , searchable: false},
                    {data: 'created_at',    name: 'created_at',       orderable: false , searchable: false},
                    {data: 'total',         name: 'total',            orderable: false , searchable: false},
                    {data: 'action',        name: 'action',           orderable: false , searchable: false},
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