<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    @include('layouts.navbar')

    <!--Container-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            @yield('content')

            <!--Divider-->
            {{-- <hr class="border-b-2 border-gray-400 my-8 mx-4"> --}}

            

            <!--/ Console Content-->

        </div>


    </div>
    <!--/container-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    @stack('scripts')
    
    <script>
        $(document).ready(function(){
            $('#add').click(function(event){
                var tambahinput = $('#data-cucian');
                event.preventDefault();	
                $('<div><div class="md:col-span-5"><label for="nama_cucian">Nama Cucian</label><input type="text" name="nama_cucian[]" id="nama_cucian" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('nama_cucian') ?? '' }}" required/>@error('nama_cucian')<p class="text-red-400">{{ $message }}</p>@enderror</div><div class="md:col-span-5"><label for="jenis">Jenis</label><select name="jenis[]" id="jenis" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" required><option value="{{ old('jenis') ?? '' }}">{{ old('jenis') ?? '' }}</option><option value="Kiloan">Kiloan</option><option value="Selimut">Selimut</option><option value="Bad Cover">Bad Cover</option><option value="Kaos">Kaos</option><option value="Lainnya">Lainnya</option></select>@error('jenis')<p class="text-red-400">{{ $message }}</p>@enderror</div><div class="md:col-span-5"><label for="harga">Harga</label><input type="number" name="harga[]" id="harga" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('harga') ?? '' }}" required/>@error('harga')<p class="text-red-400">{{ $message }}</p>@enderror</div><div class="md:col-span-5 text-right pt-4"><div class="inline-flex items-end"><button id="remove" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button></div></div></div>').appendTo(tambahinput);
            });
            
            $('body').on('click','#remove',function(){	
                $(this).parent().parent().parent('div').remove();	
            });		
        });
    </script>

    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var userMenuDiv = document.getElementById("userMenu");
        var userMenu = document.getElementById("userButton");

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //User Menu
            if (!checkParent(target, userMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, userMenu)) {
                    // click on the link
                    if (userMenuDiv.classList.contains("invisible")) {
                        userMenuDiv.classList.remove("invisible");
                    } else { userMenuDiv.classList.add("invisible"); }
                } else {
                    // click both outside link and outside menu, hide menu
                    userMenuDiv.classList.add("invisible");
                }
            }

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else { navMenuDiv.classList.add("hidden"); }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) { return true; }
                t = t.parentNode;
            }
            return false;
        }
    </script>



</body>

</html>
