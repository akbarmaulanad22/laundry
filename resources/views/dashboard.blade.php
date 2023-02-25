@extends('layouts.main')
@section('content')
<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-green-600"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Pendapatan</h5>
                    <h3 class="font-bold text-3xl">Rp. {{ $total }}</h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-pink-600">
                        <i class="fas fa-user-tie fa-fw fa-2x fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Karyawan</h5>
                    <h3 class="font-bold text-3xl">
                        {{ $outlet->users->count() }}
                    </h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-yellow-600">
                        <i class="fas fa-users fa-fw fa-2x fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Pelanggan</h5>
                    <h3 class="font-bold text-3xl">
                        {{ $outlet->pelanggans->count() }}
                    </h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-blue-600">
                        <i class="fas fa-tshirt fa-2x fa-fw fa-inverse"></i>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Cucian</h5>
                    <h3 class="font-bold text-3xl">
                        {{ $outlet->cucians->count() }}
                    </h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Transaksi</h5>
                    <h3 class="font-bold text-3xl">
                        {{ $outlet->transaksis->count() }}
                    </h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Metric Card-->
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Pengeluaran</h5>
                    <h3 class="font-bold text-3xl">3</h3>
                </div>
            </div>
        </div>
        <!--/Metric Card-->
    </div>
</div>

<hr class="border-b-2 border-gray-400 my-8 mx-4">

<div class="text-left mx-4 my-5">
    <h5 class="font-bold uppercase text-gray-500">Data Terbaru</h5>
</div>

<div class="flex flex-row flex-wrap flex-grow mt-2">

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Template Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600">Pelanggan</h5>
            </div>
            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                  <thead>
                    <tr>
                      <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nama
                                  </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Alamat
                                  </th>
                    </tr>
                  </thead>
          
                  <tbody>
                    @foreach ($pelanggan as $p)
                        <tr>
                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                {{ $p->nama }}
                            </th>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                {{ $p->alamat }}
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
          
                </table>
            </div>
        </div>
        <!--/Template Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Graph Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600">Cucian</h5>
            </div>
            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                        <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nama
                                    </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Jenis
                                    </th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($cucian as $c)
                            <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                    {{ $c->nama }}
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $c->jenis }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <!--Graph Card-->
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600">Transaksi</h5>
            </div>
            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                        <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Kode
                                    </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Tanggal
                                    </th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @foreach ($transaksi as $t)
                            <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                    {{ $t->kode }}
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $t->created_at->format('j F Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/Graph Card-->
    </div>

    



</div>
@endsection