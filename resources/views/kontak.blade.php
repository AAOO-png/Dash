@extends('layout.main')

@section('container')
    <div class="hidden mx-auto w-full md:block text-white bg-gray-900">
        <div class="max-w-7xl px-4 py-6 sm:px-6 lg:px-8 mx-auto">
            <h1 class="ml-5 upercase h-10">Hubungi Kami</h1>
            <div class="flex flex-row mt-10 flex-wrap">
                <div class="flex w-full max-w-xs items-center "><img class="rounded-md w-11/12"
                        src="https://jpbooks.co.id/files/upload/kontak.webp" alt="kontak"></div>
                <div class="mt-10">
                    <div class="mb-3">Masukkan anda sangat Berarti</div>
                    <p class="mb-7">Tulis kritik, saran atau pesan Anda kepada kami dan dapatkan informasi seputar program
                        dan pelatihan.</p>
                    <div class="flex flex-row">
                        <div class="">
                            <p class="mb-5 mt-1 h-10 w-40">Nama Lengkap</p>
                            <p class="mb-5 mt-1 h-10">Instansi</p>
                            <p class="mb-5 mt-1 h-10">Jabatan</p>
                            <p class="mb-5 mt-1 h-10">Kota Tinggal</p>
                            <p class="mb-5 mt-1 h-10">No Whatsapp</p>
                            <p class="mb-5 mt-1 h-10">Pesan</p>
                        </div>
                        <div class="flex flex-col ml-10 w-full">
                            <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                            <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                            <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                            <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                            <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                            <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                            <div class=" flex justify-center">
                                <div class="group relative w-32 h-10 flex justify-center items-center overflow-hidden rounded-md">
                                    <input type="button" class="relative z-10 bg-transparent text-white cursor-pointer w-full h-full" value="Kirim Pesan">
                                    <div class="absolute inset-0 bg-blue-700 transition-all duration-500 ease-in-out group-hover:w-0"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen " class="md:hidden mx-auto  bg-gray-900  max-w-7xl text-white px-4 py-6 sm:px-6 lg:px-8"
        id="mobile-menu">
        <h1>Hubungi Kami</h1>
        <div class="flex flex-row mt-10 flex-wrap">
            <div class="flex mb-7 items-center justify-center "><img class="rounded-md w-10/12"
                    src="https://jpbooks.co.id/files/upload/kontak.webp" alt="kontak"></div>
            <div>
                <div class="mb-3">Masukkan anda sangat Berarti</div>
                <p class="mb-7">Tulis kritik, saran atau pesan Anda kepada kami dan dapatkan informasi seputar program dan
                    pelatihan.</p>
                <div class="flex flex-row">
                    <div>
                        <p class="mb-5 mt-1 h-10 w-40">Nama Lengkap</p>
                        <p class="mb-5 mt-1 h-10">Instansi</p>
                        <p class="mb-5 mt-1 h-10">Jabatan</p>
                        <p class="mb-5 mt-1 h-10">Kota Tinggal</p>
                        <p class="mb-5 mt-1 h-10">No Whatsapp</p>
                        <p class="mb-5 mt-1 h-10">Pesan</p>
                    </div>
                    <div class="flex flex-col w-full">
                        <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                        <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                        <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                        <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                        <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                        <input class="border-solid mb-5 h-10 w-full border-2 rounded-md" type="text">
                        <div class=" flex justify-center items-center "> <input type="button"
                                class=" text-white rounded-md w-32 h-10 " value="Kirim Pesan"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection