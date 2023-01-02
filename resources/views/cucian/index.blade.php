@extends('layouts.main')
@section('content')

<div class="sm:px-6 w-full">
                <div class="px-4 md:px-10 py-4 md:py-5 md:pb-8">
                    <div class="flex items-center justify-between">
                        <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Data Cucian</p>
                    </div>
                </div>
                
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="flex justify-between">
                            {{-- <button type="button" class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" value="">
                                <div class="py-1 px-3 bg-indigo-100 text-indigo-700 rounded-full">
                                    <p>Semua</p>
                                </div>
                            </button> --}}
                            
                        <div class="flex justify-start scale-75 md:scale-100 ">
                            <label for="jenis" class="my-auto text-base font-medium text-gray-700">Jenis</label>
                            <select id="jenis" name="jenis" class="mx-4 block w-full py-2 pr-8 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Semua</option>
                                @foreach ($jenisCucian as $j)
                                    <option value="{{ $j->jenis }}">{{ $j->jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                            
                            {{-- <button type="button" class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 sm:ml-8" value="">
                                <div class="py-1 px-3 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Baru</p>
                                </div>
                            </button>
                            <button type="button" class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 sm:ml-8" value="">
                                <div class="py-1 px-3 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Dicuci</p>
                                </div>
                            </button>
                            <button type="button" class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 sm:ml-8" value="">
                                <div class="py-1 px-3 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    <p>Selesai</p>
                                </div>
                            </button> --}}
                        @role(['Admin', 'Kasir'])
                        <div class="flex justify-start scale-90 md:scale-100  my-auto">
                            <a  href="{{ route('cucian.create') }}"  class="mx-4 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 px-5 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                                <p class="text-sm text-center  font-medium leading-none text-white md:hidden">Tambah</p>
                                <p class="hidden text-sm text-center  font-medium leading-none text-white md:block">Tambah cucian</p>
                            </a>
                        </div>
                        @endrole
                    </div>
                    <div class="mt-7 overflow-x-auto">
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
                        </table> --}}
                        <table id="example" class="display responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Nama</th>
                                    <th width="20%">Jenis</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Harga</th>
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

            $('#jenis').on('change', function (){
                
                let jenis = $('#jenis').val(); 
                
                table.on('preXhr.dt', function ( e, settings, data ) {
                    data.jenis = jenis;
                } )

                table.DataTable().ajax.reload()
            });
            
            table.DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('cucian.json') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama', name: 'nama'},
                    {data: 'jenis', name: 'jenis'},
                    {data: 'status', name: 'status'},
                    {data: 'harga', name: 'harga'},
                    {data: 'action', name: 'action', orderable: false , searchable: false, exportable: false},
                ],
                lengthChange: false,
                searchDelay: 200,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                ]
            });
        } );
    </script>
    
@endpush