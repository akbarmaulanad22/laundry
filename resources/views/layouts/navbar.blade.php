<nav id="header" class="bg-white fixed w-full z-10 top-0 shadow px-4">


    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

        <div class="w-1/2 pl-2 md:pl-0">
            <a class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
                <i class="fas fa-sun text-pink-600 pr-3"></i> Laundry
            </a>
        </div>
        <div class="w-1/2 pr-0">
            <div class="flex relative float-right">

                <div class="relative text-sm">
                    <button id="userButton" class="flex items-center focus:outline-none mr-3">
                        <img class="w-8 h-8 rounded-full mr-4" src="https://images7.alphacoders.com/117/1179584.jpg" alt="Avatar of User"> <span class="hidden md:inline-block">Hi, {{ auth()->user()->name }}</span>
                        <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                            <g>
                                <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                            </g>
                        </svg>
                    </button>
                    <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                        <ul class="list-reset">
                            <li><a href="{{ route('profile.edit') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Profile</a></li>
                            <li><a href="{{ route('outlet.edit') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Outlet</a></li>
                            <li>
                                <hr class="border-t mx-2 border-gray-400">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="w-full px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">
                                    @csrf
                                    <button type="submit" class="w-full text-start">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>


        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('dashboard') }}" class="block py-1 md:py-3 px-2 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                        <i class="fas fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('karyawan.index') }}" class="block py-1 md:py-3 px-2 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-amber-500">
                        <i class="fas fa-user-tie fa-fw mr-3"></i>
                        <span class="pb-1 md:pb-0 text-sm">Karyawan</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('pelanggan.index') }}" class="block py-1 md:py-3 px-2 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                        <i class="fas fa-users fa-fw mr-3"></i>
                        <span class="pb-1 md:pb-0 text-sm">Pelanggan</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('cucian.index') }}" class="block py-1 md:py-3 px-2 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                        <i class="fas fa-tshirt fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Cucian</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{ route('transaksi.index') }}" class="block py-1 md:py-3 px-2 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                        <i class="fas fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Transaksi</span>
                    </a>
                </li>
                {{-- <li class="mr-6 my-2 md:my-0">
                    <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                        <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Payments</span>
                    </a>
                </li> --}}
            </ul>

            {{-- <div class="relative pull-right pl-4 pr-4 md:pr-0">
                <input type="search" placeholder="Search" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
                <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
                    <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                    </svg>
                </div>
            </div> --}}

        </div>

    </div>
</nav>