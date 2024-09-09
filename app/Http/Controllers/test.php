<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class test extends Controller
{
    public function index()
    {
        // Hapus data di tabel pivot
        \DB::table('kategori_produk')->delete();

        // Hapus data dari tabel kategori dan produk
        Kategori::query()->delete();
        Product::query()->delete();

        // Buat 20 kategori
        $kategoriNames = [
            'Elektronik', 'Pakaian', 'Perabotan', 'Makanan', 'Kesehatan',
            'Olahraga', 'Buku', 'Hobi', 'Kecantikan', 'Kamera',
            'Mainan', 'Alat Musik', 'Alat Tulis', 'Aksesori', 'Peralatan Dapur',
            'Perawatan Pribadi', 'Bayi dan Anak', 'Perlengkapan Kantor', 'Otomotif', 'Software'
        ];

        foreach ($kategoriNames as $name) {
            Kategori::create(['name_kategori' => $name]);
        }

        // Buat 30 produk dengan slug unik dan deskripsi
        $products = [
            ['Laptop', 'laptop-gaming', 'Laptop gaming dengan spesifikasi tinggi yang cocok untuk bermain game berat, dilengkapi dengan prosesor terbaru dan kartu grafis yang kuat.'],
            ['Kaos', 'kaos-katun', 'Kaos katun berkualitas tinggi yang nyaman dipakai sehari-hari, tersedia dalam berbagai ukuran dan warna.'],
            ['Meja', 'meja-kayu', 'Meja kayu jati yang kokoh dan tahan lama, ideal untuk ruang kerja atau ruang makan.'],
            ['Roti', 'roti-tawar', 'Roti tawar segar yang lembut dan enak, cocok untuk sarapan atau camilan di sore hari.'],
            ['Headphone', 'headphone-bluetooth', 'Headphone Bluetooth dengan suara jernih dan bass yang kuat, cocok untuk menikmati musik di perjalanan.'],
            ['Smartphone', 'smartphone-android', 'Smartphone Android terbaru dengan layar besar dan baterai tahan lama, dilengkapi dengan kamera berkualitas tinggi.'],
            ['Kursi', 'kursi-kantor', 'Kursi kantor ergonomis yang nyaman digunakan dalam jangka waktu lama, dilengkapi dengan penopang punggung dan roda.'],
            ['Jaket', 'jaket-winter', 'Jaket musim dingin yang hangat dan stylish, dilengkapi dengan bahan anti air dan penutup kepala.'],
            ['Jam', 'jam-tangan', 'Jam tangan elegan dengan desain klasik, tersedia dalam berbagai warna dan bahan strap.'],
            ['Sepatu', 'sepatu-olahraga', 'Sepatu olahraga yang ringan dan fleksibel, ideal untuk berbagai jenis olahraga seperti lari dan fitness.'],
            ['Sofa', 'sofa-ruang-tamu', 'Sofa ruang tamu yang nyaman dan elegan, tersedia dalam berbagai warna dan bahan untuk melengkapi dekorasi rumah Anda.'],
            ['Kulkas', 'kulkas-dua-pintu', 'Kulkas dua pintu dengan kapasitas besar, dilengkapi dengan teknologi pendinginan yang efisien dan hemat energi.'],
            ['Buku', 'buku-fiksi', 'Buku fiksi yang menghibur dengan cerita menarik dan karakter yang mendalam, cocok untuk pembaca segala usia.'],
            ['Pel', 'pel-kelembapan', 'Pel kelembapan yang efektif dalam menyerap air, ideal untuk membersihkan lantai yang basah atau tumpahan air.'],
            ['Tabung', 'tabung-gas', 'Tabung gas yang aman dan tahan lama, cocok untuk keperluan memasak di dapur Anda.'],
            ['Tenda', 'tenda-kemping', 'Tenda kemping yang ringan dan mudah dipasang, ideal untuk petualangan outdoor bersama keluarga atau teman.'],
            ['Tepung', 'tepung-terigu', 'Tepung terigu berkualitas tinggi yang cocok untuk berbagai jenis adonan dan masakan, dari roti hingga kue.'],
            ['Sikat', 'sikat-gigi', 'Sikat gigi dengan bulu halus yang lembut di gigi dan gusi, ideal untuk menjaga kebersihan mulut setiap hari.'],
            ['Panci', 'panci-teflon', 'Panci teflon anti lengket yang tahan lama, cocok untuk memasak berbagai jenis masakan dengan mudah.'],
            ['Ranjang', 'ranjang-kasur', 'Ranjang kasur yang nyaman dan kokoh, tersedia dalam berbagai ukuran dan desain untuk kamar tidur Anda.'],
            ['Gitar', 'gitar-akustik', 'Gitar akustik dengan suara yang jernih dan resonansi yang baik, ideal untuk pemain musik pemula dan profesional.'],
            ['Bola', 'bola-futsal', 'Bola futsal yang tahan lama dan dirancang khusus untuk permainan di dalam ruangan, memberikan kontrol dan kecepatan yang optimal.'],
            ['Tas', 'tas-punggung', 'Tas punggung yang stylish dan fungsional, cocok untuk perjalanan atau aktivitas sehari-hari dengan banyak ruang penyimpanan.'],
            ['Kamera', 'kamera-dslr', 'Kamera DSLR dengan kualitas gambar tinggi dan fitur canggih, ideal untuk fotografer pemula hingga profesional.'],
            ['Mainan', 'mainan-lego', 'Mainan LEGO yang edukatif dan kreatif, dirancang untuk mengembangkan imajinasi anak-anak.'],
            ['Laptop', 'laptop-ultrabook', 'Laptop ultrabook yang tipis dan ringan, dilengkapi dengan baterai tahan lama, ideal untuk bekerja dan bepergian.'],
            ['Piring', 'piring-keramik', 'Piring keramik yang elegan dan tahan lama, cocok untuk melengkapi meja makan Anda.'],
            ['Kipas Angin', 'kipas-angin', 'Kipas angin dengan teknologi terbaru yang hemat energi dan menghasilkan angin sejuk serta nyaman.'],
            ['Mouse', 'mouse-wireless', 'Mouse wireless yang ergonomis dan responsif, cocok untuk digunakan dengan laptop atau PC.'],
            ['Printer', 'printer-laser', 'Printer laser dengan kecepatan cetak tinggi dan kualitas hasil cetakan yang tajam, ideal untuk kebutuhan kantor.'],
            ['Tablet', 'tablet-android', 'Tablet Android dengan layar besar dan performa cepat, cocok untuk hiburan dan produktivitas.']
        ];

        foreach ($products as $product) {
            Product::create([
                'name_product' => $product[0],
                'slug' => $product[1],
                'description' => $product[2]
            ]);
        }

        // Ambil semua kategori dan produk
        $kategoris = Kategori::all();
        $products = Product::all();

        // Hubungkan setiap produk ke 2 hingga 4 kategori secara acak
        $products->each(function ($product) use ($kategoris) {
            $randomKategoris = $kategoris->random(rand(2, 4)); // Ambil antara 2 hingga 4 kategori acak
            $product->kategori_produk()->syncWithoutDetaching($randomKategoris->pluck('id')->toArray());
        });

        // Periksa hasilnya
        $hasil1 = $products->first()->kategoris; // Lihat kategori dari produk pertama
        $hasil2 = $kategoris->first()->products; // Lihat produk dari kategori pertama

        // Tampilkan hasilnya
        // dd($hasil1, $hasil2);
    }
}
