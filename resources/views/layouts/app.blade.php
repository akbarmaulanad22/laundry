<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function(){
            $('#tambahcucian').click(function(event){
                var tambahkotak = $('#cucian');
                event.preventDefault();	
                $('<div id="data-cucian"><div class="w-full px-4 mb-8 pt-4 flex relative"><input type="text" placeholder="Nama produk"  name="nama_produk[]" id="nama_produk" class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('nama_produk') ?? '' }}">@error('nama_produk')<p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">{{ $message }}</p>@enderror</div><div class="w-full px-4 mb-8 pt-4 flex relative"><input type="text" placeholder="Harga"  name="harga[]" id="harga"  class="w-full bg-slate-200 peer placeholder:font-semibold placeholder:text-red-400  text-dark p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" value="{{ old('harga') ?? '' }}">@error('harga')<p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">{{ $message }}</p>@enderror</div><div class="w-full px-4 mb-8 pt-4 flex relative text-red-400"><select class="w-full bg-slate-200 peer p-3 rounded-md border-none focus:ring-0 focus:placeholder:opacity-0 transition-all duration-500" name="jenis[]"><option selected value="Lainnya" class="text-dark font-semibold">Jenis Produk</option><option value="Kiloan">Kiloan</option><option value="Selimut">Selimut</option><option value="Bed cover">Bed cover</option><option value="Kaos">Kaos</option><option value="Lainnya">Lainnya</option></select>@error('jenis')<p class="absolute text-red-500 pb-3 font-bold translate-y-12 translate-x-3">{{ $message }}</p>@enderror</div><div class="w-full px-4 pt-4 mb-8 flex justify-end"><button id="remove" class="bg-red-200 p-2 rounded-md">Hapus cucian</button></div></div>')
                .appendTo(tambahkotak);		
            });
            
            $('body').on('click','#remove',function(){	
                $(this).parent().parent('#data-cucian').remove();	
            });
        });
        </script>
    </body>
</html>
