@extends('layouts.main')
@section('content')
<section class="py-4 md:py-5">
    <div class="max-w-5xl mx-auto py-12 bg-white">
     <article class="overflow-hidden">
      <div class="bg-[white] rounded-b-md">
       <div class="px-9 py-4">
        <div class="space-y-6 text-slate-700">
         {{-- <img class="object-cover w-full h-32" src="https://images7.alphacoders.com/117/1179584.jpg" /> --}}
         <p class="text-xl font-extrabold tracking-tight uppercase font-body">
           Laundry
         </p>
        </div>
      </div>
      <div class="px-9">
        <div class="flex w-full">
          <div class="grid grid-cols-4 gap-4 md:gap-12">
            <div class="text-sm font-light text-slate-500">
              <p class="text-sm font-normal text-slate-700">Kode Transaksi</p>
              <p class="pt-11" >{{ $transaksi->kode }}</p>
            </div>
            <div class="text-sm font-light text-slate-500">
              <p class="text-sm font-normal text-slate-700">Outlet</p>
              <p>{{ $transaksi->outlet->nama }}</p>

              <p class="mt-8 md:mt-3 text-sm font-normal text-slate-700">Kasir</p>
              <p>{{ $transaksi->user->name }}</p>
            </div>
            <div class="text-sm font-light text-slate-500">
              <p class="text-sm font-normal text-slate-700">
                Nama
                </p>
              <p>{{ $transaksi->pelanggan->nama }}</p>
              <p class="mt-3 md:mt-3 text-sm font-normal text-slate-700">
                Alamat
                </p>
              <p>{{ $transaksi->pelanggan->alamat }}</p>
            </div>
            <div class="text-sm font-light text-slate-500">
              <p class="text-sm font-normal text-slate-700">Tanggal pembayaran</p>
              <p>
                {{ $transaksi->tanggal_pembayaran ?? "-" }}
              </p>
      
              <p class="mt-3 text-sm font-normal text-slate-700">Status</p>
              <p>{{ $transaksi->status }}</p>
            </div>
          </div>
        </div>
       </div>
   
       <div class="p-9">
        <div class="flex flex-col mx-0 mt-5">
         <table class="min-w-full divide-y divide-slate-500">
          <thead>
           <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
             Nama barang
            </th>
            <th scope="col" class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
             Jumlah
            </th>
            <th scope="col" class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
             Jenis
            </th>
            <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
             Harga
            </th>
           </tr>
          </thead>
          <tbody>
            @foreach ($transaksi->cucians as $cucian)
              <tr class="border-b border-slate-200">
                <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                <div class="font-medium text-slate-700">{{ $cucian->nama }}</div>
                <div class="mt-0.5 text-slate-500 sm:hidden">
                  {{ $cucian->jumlah }} unit
                </div>
                </td>
                <td class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                  {{ $cucian->jumlah }} 1
                </td>
                <td class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                  {{ $cucian->jenis }}
                </td>
                <td class="py-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                 Rp. {{ $cucian->harga }}
                </td>
              </tr>
            @endforeach
   
          </tbody>
          <tfoot>
           <tr>
            <th scope="row" colspan="3" class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
             Subtotal
            </th>
            <th scope="row" class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
             Subtotal
            </th>
            <td class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
              Rp. {{ $transaksi->cucians->sum('harga') }}
            </td>
           </tr>
           <tr>
            <th scope="row" colspan="3" class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
             Diskon
            </th>
            <th scope="row" class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
             Diskon
            </th>
            <td class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
             Rp. {{ $transaksi->cucians->sum('harga') * $transaksi->diskon }}
            </td>
           </tr>
           <tr>
            <th scope="row" colspan="3" class="hidden pt-4 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
             Pajak
            </th>
            <th scope="row" class="pt-4 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
             Pajak
            </th>
            <td class="pt-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
             Rp. {{ $transaksi->pajak }}
            </td>
           </tr>
           <tr>
            <th scope="row" colspan="3" class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
             Total
            </th>
            <th scope="row" class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
             Total
            </th>
            <td class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
             Rp. {{ intval($transaksi->cucians->sum('harga') - ($transaksi->cucians->sum('harga') * $transaksi->diskon)) - $transaksi->pajak }}
            </td>
           </tr>
          </tfoot>
         </table>
        </div>
       </div>
   
       <div class="mt-2 p-9">
        <div class="border-t pt-9 border-slate-200">
         <div class="text-sm font-light text-slate-700">
          <p class="text-red-400 pb-1">
            * batas waktu pembayaran anda {{ date('j F Y', strtotime($transaksi->batas_waktu)) }}
          </p>
          <p>
            Terima kasih telah menggunakan jasa pencucian kami
          </p>
         </div>
        </div>
       </div>
      </div>
     </article>
    </div>
</section>
@endsection