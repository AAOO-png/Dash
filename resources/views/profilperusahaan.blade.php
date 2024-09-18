@extends('layout.main')

@section('container')
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 text-gray-900">
        <!-- Profil Perusahaan -->
        <div class="pb-20 border-b-2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Gambar Profil -->
                <div class="relative">
                    <img src="https://jpbooks.co.id/files/upload/img-profile.jpg" class="w-full h-auto rounded-lg shadow-lg"
                        alt="Profil Perusahaan">
                </div>
                <!-- Konten Profil -->
                <div class="flex flex-col justify-center space-y-6">
                    <h1 class="text-3xl font-bold">Profil Perusahaan</h1>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Di bawah naungan PT Temprina Media Grafika, JP BOOKS terus berkembang dan berinovasi mengikuti
                        perkembangan zaman. Sebagai penerbit yang beroperasi sejak tahun 2002, kami senantiasa berupaya dan
                        bertumbuh, untuk menyediakan buku-buku terbaik bagi masyarakat.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Didukung oleh para tenaga ahli, kami menyediakan banyak buku berkualitas yang sarat akan nilai-nilai
                        pendidikan. Kami memiliki tim yang bekerja keras, mulai dari proses kreatif, produksi, pengemasan,
                        hingga pemasaran. Kami berupaya agar buku yang sampai ke tangan Anda dalam kondisi terbaik.
                    </p>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="py-14 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Visi</h2>
                    <p class="mt-2 text-gray-600 text-lg">Ilmu Pengetahuan sebagai modal dasar mengembangkan mutu secara
                        berkesinambungan</p>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Misi</h2>
                    <ul class="list-disc ml-6 text-gray-600 text-lg space-y-2">
                        <li>Inovasi terus menerus dalam memperbaiki kualitas</li>
                        <li>Fokus pada kepuasan pelanggan</li>
                        <li>Setia, jujur, dan bertanggung jawab</li>
                    </ul>
                </div>
            </div>
            <!-- Gambar Visi -->
            <div class="relative">
                <img src="https://jpbooks.co.id/files/upload/img-visi.jpg" class="w-full h-auto rounded-lg shadow-lg"
                    alt="Visi dan Misi">
            </div>
        </div>

        <!-- Alamat dengan Google Maps -->
        <div class="py-16">
            <h2 class="text-2xl font-bold text-gray-900 text-center">Alamat Kami</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <!-- Google Maps Embed -->
                <div class="relative" style="padding-bottom: 56.25%; height: 0; overflow: hidden;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d822.972201787338!2d112.71728055060603!3d-7.314777633890883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7dc58c71c3%3A0xfc7efe1783ad19f3!2sJawa%20Pos%20Pt!5e0!3m2!1sid!2sid!4v1726642734530!5m2!1sid!2sid"
                        class="absolute top-0 left-0 w-full h-full border-0 rounded-lg shadow-lg"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Informasi Alamat -->
                <div class="flex flex-col space-y-4">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Alamat</h3>
                        <p class="text-gray-600 text-lg">Jl. Karah Agung I No.45, Karah, Kec. Jambangan, Surabaya, Jawa Timur 60232</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Jam Operasional</h3>
                        <p class="text-gray-600 text-lg">Buka jam 08.00 sampai 17.00, Sabtu dan Minggu tutup</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Kontak</h3>
                        <p class="text-gray-600 text-lg">Telepon: (031) 8283333</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
