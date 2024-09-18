<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tailwindcss --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- flowbite css --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    {{-- inter --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    {{-- app.css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    {{-- select2 js --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- trix editor js --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    {{-- alphine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.documentElement.classList.add('js')
    </script>
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <title>Jp Books | {{ $title }} </title>
</head>

<body class="h-full ">
    <div class="min-h-full ">
        <nav class="sticky bg-blue-800 top-0 z-50" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 ">
                            <a href="/">
                                <img class="w-24 bg-gray-50 px-2 hover:bg-gray-200 rounded-full"
                                    src="https://dinamikaindomedia.co.id/tests/wUeRvwqCPJpADXYoiPBsJ3u0cCzuUvE1f2TbYZbF.png"
                                    alt="Jp Books">
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <div class="ml-10 flex items-baseline text-white space-x-4 hover:border-b-2">

                                {{--  --}}
                                @if ($title == 'Home')
                                    <a href="/" id="nav-beranda"
                                        class="nav-link border-b-2 px-3 py-2 text-md hover:text-gray-500">
                                        <p
                                            class="font-medium transform scale-75 hover:scale-90 transition ease-in-out duration-300">
                                            Beranda
                                        </p>
                                    </a>
                                @else
                                    <a href="/" id="nav-beranda"
                                        class="nav-link px-3 py-2 text-md font-medium transform scale">
                                        <p
                                            class="-75 hover:scale-90 transition ease-in-out duration-300 hover:text-gray-500">
                                            Beranda
                                        </p>
                                    </a>
                                @endif
                                {{--  --}}

                                {{--  --}}
                                @if ($title == 'Profil')
                                    <a href="/profil" id="nav-profil"
                                        class="nav-link border-b-2 px-3 py-2 hover:text-gray-500 ">
                                        <p
                                            class="font-medium transform scale-75 hover:scale-90 transition ease-in-out duration-300">
                                            Profil
                                        </p>
                                    </a>
                                @else
                                    <a href="/profil" id="nav-profil" class="nav-link px-3 py-2 hover:text-gray-500 ">
                                        <p
                                            class="-75 hover:scale-90 transition ease-in-out duration-300 hover:text-gray-500">
                                            Profil
                                        </p>
                                    </a>
                                @endif
                                {{--  --}}

                                {{--  --}}
                                @if ($title == 'Products')
                                    <a href="/products" id="nav-produkKami"
                                        class="nav-link border-b-2 px-3 py-2 text-md hover:text-gray-500 ">
                                        <p
                                            class="font-medium transform scale-75 hover:scale-90 transition ease-in-out duration-300">
                                            Produk Kami
                                        </p>
                                    </a>
                                @else
                                    <a href="/products" id="nav-produkKami"
                                        class="nav-link px-3 py-2 text-md hover:text-gray-500 ">
                                        <p
                                            class="-75 hover:scale-90 transition ease-in-out duration-300 hover:text-gray-500">
                                            Produk Kami
                                        </p>
                                    </a>
                                @endif
                                {{--  --}}

                                {{--  --}}
                                @if ($title == 'Customer')
                                    <a href="/customers" id="nav-customer"
                                        class="nav-link border-b-2 px-3 py-2 text-md hover:text-gray-500 ">
                                        <p
                                            class="font-medium transform scale-75 hover:scale-90 transition ease-in-out duration-300">
                                            Customer
                                        </p>
                                    </a>
                                @else
                                    <a href="/customers" id="nav-customer"
                                        class="nav-link px-3 py-2 text-md hover:text-gray-500 ">
                                        <p
                                            class="-75 hover:scale-90 transition ease-in-out duration-300 hover:text-gray-500">
                                            Customer
                                        </p>
                                    </a>
                                @endif
                                {{--  --}}

                                {{--  --}}
                                @if ($title == 'Kontak')
                                    <a href="/kontak" id="nav-kontak"
                                        class="nav-link border-b-2 px-3 py-2 text-md hover:text-gray-500 ">
                                        <p
                                            class="font-medium transform scale-75 hover:scale-90 transition ease-in-out duration-300">
                                            Kontak
                                        </p>
                                    </a>
                                @else
                                    <a href="/kontak" id="nav-kontak"
                                        class="nav-link px-3 py-2 text-md hover:text-gray-500 ">
                                        <p
                                            class="-75 hover:scale-90 transition ease-in-out duration-300 hover:text-gray-500">
                                            Kontak
                                        </p>
                                    </a>
                                @endif
                                {{--  --}}

                            </div>

                        </div>
                    </div>

                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="isOpen = !isOpen" type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-50 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-50"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="md:hidden" id="mobile-menu">
                <div class="space-y-1 text-gray-50 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/"
                        class="block rounded-md px-3 py-2 text-base font-medium transform scale-75 hover:scale-90 transition  hover:text-gray-500">
                        Beranda</a>
                    <a href="/profil"
                        class="block rounded-md px-3 py-2 text-base font-medium transform scale-75 hover:scale-90 transition  hover:text-gray-500">
                        Profil</a>
                    <a href="/products"
                        class="block rounded-md px-3 py-2 text-base font-medium transform scale-75 hover:scale-90 transition  hover:text-gray-500">
                        Produk Kami</a>
                    <a href="/customers"
                        class="block rounded-md px-3 py-2 text-base font-medium transform scale-75 hover:scale-90 transition  hover:text-gray-500">
                        Customer</a>
                    <a href="/kontak"
                        class="block rounded-md px-3 py-2 text-base font-medium transform scale-75 hover:scale-90 transition  hover:text-gray-500">
                        kontak</a>
                </div>
            </div>
        </nav>

        <body class="">
            <div class="">
                @yield('container')
            </div>
            @include('layout.footer')
        </body>

    </div>
    <script></script>
</body>

</html>