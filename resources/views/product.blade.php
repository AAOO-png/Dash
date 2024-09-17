@extends('layout.main')


@section('container')
    <div class="hidden mx-auto md:block max-w-9xl py-6  mb-3">
        <section class=" bg-white md:pt-16 dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl pb-10 gap-8 flex flex-col px-4 mx-auto 2xl:px-0">
                <div class="flex flex-row flex-wrap">
                    <div class="shrink-0 items-center flex max-w-md lg:max-w-lg mx-auto">
                        <img class=" w-80 dark:hidden rounded-xl"
                            src="https://jpbooks.co.id/files/upload/a98bd3c4cb09ae2b35b0153fa515133eb25dce9c9c7ea96cd2.jpeg"
                            alt="" />
                    </div>

                    <div class="mt-6 max-w-4xl sm:mt-8 lg:mt-0">
                        <a href="/katalog?kategori={{ $product->slug }}">

                            <h1 class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                                {{ $product->name_product }}
                            </h1>
                        </a>
                        <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                            <p class="text-xl  font-semibold text-gray-900 sm:text-2xldark:text-white">
                                @foreach ($product->kategori_product as $kategori)
                                    <a href="/kategories/{{ $kategori->name_kategori }}">
                                        <li class="flex hover:underline">{{ $kategori->name_kategori }}</li>
                                    </a>
                                @endforeach
                            </p>
                        </div>

                        <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                            <a href="#" title=""
                                class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                role="button">
                                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                </svg>
                                Shopee
                            </a>
                        </div>

                        <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                        <p class="mb-6 text-gray-500 dark:text-gray-400">
                            {{ $product->description }}
                        </p>

                        <p class="text-gray-500 dark:text-gray-400">
                            Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                            Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                            Magic Keyboard or Magic Keyboard with Touch ID.
                        </p>
                    </div>
                </div>
                <div class="px-8 flex flex-col font-semibold text-xl gap-4 ">
                    <p>Pilihan Lain</p>
                    <div class="px-4 flex flex-row gap-4 flex-wrap mx-auto">

                        @foreach ($products->take(5) as $product)
                            <a href="/product/{{ $product->slug }}"
                                class="group rounded-xl max-w-xs border-2 w-56 object-contain block overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1599481238640-4c1288750d7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2664&q=80"
                                    alt=""
                                    class="h-60 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-64" />

                                <div class="relative border border-gray-100 bg-white flex py-2 justify-center">

                                    <h3 class="text-lg font-medium text-gray-900"> {{ $product->name_product }} </h3>

                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <section id="kontak" class="flex flex-wrap flex-row py-20 justify-evenly gap-4 text-white bg-indigo-700 text-left">
                <div class="px-2 max-w-1/4 gap-3 items-center flex flex-col">
                    <img src="https://dinamikaindomedia.co.id/tests/wUeRvwqCPJpADXYoiPBsJ3u0cCzuUvE1f2TbYZbF.png"
                        class="w-36 p-1 rounded-xl" alt="">
                    <p class="max-w-xs">PT. DINAMIKA INDO MEDIA
                        berdiri pada hari Kamis tanggal 10 Februari 2011 di Kabupaten Bekasi,
                        saat ini kami bergerak dibidang pengadaan barang untuk pemenuhan kebutuhan instansi,
                        Lembaga, dan satuan kerja pemerintahan yang bertempat di Kota Surabaya</p>
                </div>
                <div class=" px-2 max-w-1/4  flex flex-col items-center gap-3">
                    <h1 class="text-4xl ">Office</h1>
                    <p class="max-w-xs">JL. Karah Agung Surabaya,Jawa Timur</p>
                    <img src="https://dinamikaindomedia.co.id/images/PT.DIM.png" class="w-64 rounded-lg" alt="">
                </div>
                <div class=" px-2 max-w-xs w-full items-center gap-5  sm:text-center  flex flex-col">
                    <h1 class="text-4xl">links</h1>
                    <div class=" w-40 xl:text-left flex flex-col">
                        <a class="text-xs hover:underline" href="https://siplah.temprina.co.id/">SIPLah Temprina</a>
                        <a class="text-xs hover:underline" href="https://www.jpbooks.id/">JPBooks Store</a>
                        <a class="text-xs hover:underline" href="https://cahayaquran.com/">Cahaya Quran</a>
                        <a class="text-xs hover:underline" href="https://temprina.com/main/index#">TemaTrade</a>
                        <a class="text-xs hover:underline" href="https://www.temapack.co.id/">TemaPack</a>
                        <a class="text-xs hover:underline" href="https://temprina.com/main/index#">Bela Pengadaan</a>
                    </div>
                </div>
        
                <div class=" px-2 max-w-1/4">
                    <h1 class="text-4xl">Contact</h1>
                    <p class="max-w-xs"> info.dinamikaindomedia@gmail.com</p>
                    <form action="#" class="max-w-sm mx-auto">
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium dark:text-white">Your
                                email</label>
                            <input type="email" id="email" autocomplete="n"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="numberPhone" class="block mb-2 text-sm font-medium dark:text-white">Number
                                Phone</label>
                            <input type="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <label for="message" class="block mb-2 text-sm font-medium  dark:text-white">Your
                            message</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Leave a comment..."></textarea>
                        <button type="submit"
                            class="text-white bg-blue-800 mt-5 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
        
                </div>
            </section>
        </section>
    </div>
@endsection
