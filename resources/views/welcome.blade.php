{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

		<title>Welcome</title>

        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        
	</head>
	<body class="font-sans font-thin">

		<div class="w-full h-screen relative text-white">
			<img src="{{ asset('images/laundry.jpg') }}" class="absolute top-0 left-0 w-full h-full object-cover" />

            <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-5 ">
                <div
                  class="container px-4 mx-auto flex flex-wrap items-center justify-between"
                >
                  <div
                    class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
                  >
                    <a
                      class="text-gray-800 text-2xl font-bold uppercase px-4 py-2 rounded outline-none focus:outline-none lg:mr-1 lg:ml-3"
                      href="/"
                      >Laundry</a
                    ><button
                      class="text-black cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                      type="button"
                      onclick="toggleNavbar('example-collapse-navbar')"
                    >
                      <i class="text-black fas fa-bars"></i>
                    </button>
                  </div>
                  <div
                    class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                    id="example-collapse-navbar"
                  >
                    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                      @if (Route::has('login'))
                        @auth
                          <li class="flex items-center">
                            <a href="{{ route('dashboard') }}"
                              class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                              style="transition: all 0.15s ease 0s;"
                            >
                              Dashboard
                            </a>
                          </li>
                          <li class="flex items-center">
                            <form action="{{ route('logout') }}" method="post">
                              @csrf
                              <button type="submit"
                                class="lg:text-blue lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                >
                                Logout
                              </button>
                            </form>
                        </li>
                          @else
                            <li class="flex items-center">
                              <a href="{{ route('login') }}"
                                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                type="button"
                                style="transition: all 0.15s ease 0s;"
                              >
                                Login
                              </a>
                            </li>
                            @if (Route::has('register'))
                            <li class="flex items-center">
                                <a
                                  class="lg:text-blue lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                  href="{{ route('register') }}"
                                  >
                                  Register</a
                                >
                            </li>
                            @endif
                          @endauth
                        @endif
                    </ul>
                  </div>
                </div>
              </nav>            
            
			<div class="absolute top-0 left-0 w-full h-full flex justify-center items-center text-center px-12">
				<div class="text-black shadow-2xl p-11 bg-blue-300 rounded-2xl">
					<h1 class="text-3xl md:text-6xl leading-tight">
                        Welcome to Laundry App
                    </h1>
				</div>
			</div>

		</div>
	</body>

    <script>
        function toggleNavbar(collapseID) {
          document.getElementById(collapseID).classList.toggle("hidden");
          document.getElementById(collapseID).classList.toggle("block");
        }
      </script>
    
</html>