<?php

namespace Database\Seeders\fakedata;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataTopic = [
            [
                'user_id' => 1,
                'title' => 'Kenapa laravel?',
                'body' => 'Saya bertanya2 kenapa banyak orang menggunakan laravel? kenapa tidak menggunakan framework lain?',
                'categorie_id' => 1,
            ],
            [
                'user_id' => 2,
                'title' => 'Tips Membuat Kode PHP yang Efisien',
                'body' => 'Bagaimana cara menulis kode PHP yang efisien dan mudah dipelihara? Mohon berbagi pengalaman.',
                'categorie_id' => 1,
            ],
            [
                'user_id' => 3,
                'title' => 'Rekomendasi Framework JavaScript Terbaik',
                'body' => 'Apa framework JavaScript yang paling cocok untuk pengembangan aplikasi web modern?',
                'categorie_id' => 1,
            ],
            [
                'user_id' => 4,
                'title' => 'Resep Nasi Goreng Spesial',
                'body' => 'Bagaimana cara membuat nasi goreng yang enak dan spesial? Mohon berbagi resep.',
                'categorie_id' => 2,
            ],
            [
                'user_id' => 5,
                'title' => 'Tren Makanan Sehat 2023',
                'body' => 'Apa saja tren makanan sehat yang populer tahun ini? Bagaimana pengaruhnya terhadap gaya hidup?',
                'categorie_id' => 2,
            ],
            [
                'user_id' => 6,
                'title' => 'Cara Membuat Smoothie Buah Segar',
                'body' => 'Bagaimana cara membuat smoothie buah yang segar dan sehat? Mohon berbagi resep favorit.',
                'categorie_id' => 3,
            ],
            [
                'user_id' => 7,
                'title' => 'Rekomendasi Merek Laptop untuk Programmer',
                'body' => 'Apa merek laptop yang cocok untuk programmer? Mohon saran spesifikasi yang ideal.',
                'categorie_id' => 4,
            ],
            [
                'user_id' => 8,
                'title' => 'Tren Fashion Pria 2023',
                'body' => 'Apa saja tren fashion pria yang sedang populer tahun ini? Bagaimana cara mengaplikasikannya?',
                'categorie_id' => 5,
            ],
            [
                'user_id' => 9,
                'title' => 'Tips Memilih Sofa yang Nyaman',
                'body' => 'Bagaimana cara memilih sofa yang nyaman dan tahan lama? Mohon saran pemilihan bahan dan desain.',
                'categorie_id' => 6,
            ],
            [
                'user_id' => 10,
                'title' => 'Olahraga yang Efektif untuk Menurunkan Berat Badan',
                'body' => 'Apa jenis olahraga yang paling efektif untuk menurunkan berat badan? Mohon berbagi pengalaman.',
                'categorie_id' => 7,
            ],
            [
                'user_id' => 1,
                'title' => 'Manfaat Yoga untuk Kesehatan Mental',
                'body' => 'Bagaimana yoga dapat membantu meningkatkan kesehatan mental? Apa saja manfaatnya?',
                'categorie_id' => 8,
            ],
            [
                'user_id' => 2,
                'title' => 'Rekomendasi Skincare untuk Kulit Berminyak',
                'body' => 'Produk skincare apa yang cocok untuk kulit berminyak? Mohon saran rutinitas perawatan kulit.',
                'categorie_id' => 9,
            ],
            [
                'user_id' => 3,
                'title' => 'Tips Merawat Mobil agar Tetap Awet',
                'body' => 'Bagaimana cara merawat mobil agar tetap awet dan performa tetap optimal? Mohon berbagi tips.',
                'categorie_id' => 10,
            ],
            [
                'user_id' => 4,
                'title' => 'Rekomendasi Buku Self-Improvement',
                'body' => 'Apa saja buku self-improvement yang wajib dibaca? Mohon berbagi rekomendasi dan alasannya.',
                'categorie_id' => 11,
            ],
            [
                'user_id' => 5,
                'title' => 'Perbandingan Framework PHP: Laravel vs CodeIgniter',
                'body' => 'Apa kelebihan dan kekurangan Laravel dibandingkan dengan CodeIgniter? Mana yang lebih cocok untuk proyek besar?',
                'categorie_id' => 1,
            ],
            [
                'user_id' => 6,
                'title' => 'Resep Sushi Homemade',
                'body' => 'Bagaimana cara membuat sushi yang enak di rumah? Mohon berbagi resep dan tips pembuatannya.',
                'categorie_id' => 2,
            ],
            [
                'user_id' => 7,
                'title' => 'Minuman Detox untuk Kesehatan',
                'body' => 'Apa saja resep minuman detox yang baik untuk kesehatan? Bagaimana cara membuatnya?',
                'categorie_id' => 3,
            ],
            [
                'user_id' => 8,
                'title' => 'Rekomendasi Smartphone untuk Mobile Gaming',
                'body' => 'Apa merek dan model smartphone yang cocok untuk mobile gaming? Mohon saran spesifikasi yang ideal.',
                'categorie_id' => 4,
            ],
            [
                'user_id' => 9,
                'title' => 'Tren Fashion Wanita 2023',
                'body' => 'Apa saja tren fashion wanita yang sedang populer tahun ini? Bagaimana cara mengaplikasikannya?',
                'categorie_id' => 5,
            ],
            [
                'user_id' => 10,
                'title' => 'Tips Menata Ruang Tamu Minimalis',
                'body' => 'Bagaimana cara menata ruang tamu yang minimalis namun tetap nyaman dan fungsional?',
                'categorie_id' => 6,
            ],
            [
                'user_id' => 1,
                'title' => 'Manfaat Lari Pagi untuk Kesehatan',
                'body' => 'Apa saja manfaat lari pagi untuk kesehatan? Bagaimana cara memulai rutinitas lari pagi?',
                'categorie_id' => 7,
            ],
            [
                'user_id' => 2,
                'title' => 'Tips Menjaga Kesehatan Mata di Era Digital',
                'body' => 'Bagaimana cara menjaga kesehatan mata saat banyak menggunakan gadget? Mohon berbagi tips.',
                'categorie_id' => 8,
            ],
            [
                'user_id' => 3,
                'title' => 'Rekomendasi Produk Makeup Natural',
                'body' => 'Apa saja produk makeup yang cocok untuk tampilan natural sehari-hari? Mohon saran merek dan jenisnya.',
                'categorie_id' => 9,
            ],
            [
                'user_id' => 4,
                'title' => 'Tips Memilih Ban Mobil yang Tepat',
                'body' => 'Bagaimana cara memilih ban mobil yang tepat sesuai dengan jenis kendaraan dan penggunaannya?',
                'categorie_id' => 10,
            ],
            [
                'user_id' => 5,
                'title' => 'Rekomendasi Novel Fiksi Terbaik',
                'body' => 'Apa saja novel fiksi terbaik yang wajib dibaca? Mohon berbagi rekomendasi dan sinopsis singkatnya.',
                'categorie_id' => 11,
            ],
            [
                'user_id' => 6,
                'title' => 'Cara Optimasi SEO untuk Website',
                'body' => 'Bagaimana cara mengoptimasi SEO untuk meningkatkan peringkat website di mesin pencari?',
                'categorie_id' => 1,
            ],
            [
                'user_id' => 7,
                'title' => 'Resep Kue Kering Lebaran',
                'body' => 'Bagaimana cara membuat kue kering yang enak untuk Lebaran? Mohon berbagi resep favorit.',
                'categorie_id' => 2,
            ],
            [
                'user_id' => 8,
                'title' => 'Rekomendasi Kopi Lokal Terbaik',
                'body' => 'Apa saja merek kopi lokal terbaik di Indonesia? Mohon berbagi pengalaman dan rekomendasi.',
                'categorie_id' => 3,
            ],
            [
                'user_id' => 9,
                'title' => 'Tips Memilih Smart TV',
                'body' => 'Bagaimana cara memilih Smart TV yang berkualitas? Apa saja fitur yang perlu diperhatikan?',
                'categorie_id' => 4,
            ],
            [
                'user_id' => 10,
                'title' => 'Tren Sepatu Sneakers 2023',
                'body' => 'Apa saja model sepatu sneakers yang sedang tren tahun ini? Bagaimana cara memadankannya?',
                'categorie_id' => 5,
            ],
            [
                'user_id' => 1,
                'title' => 'Desain Interior Kamar Tidur Minimalis',
                'body' => 'Bagaimana cara mendesain kamar tidur minimalis yang nyaman dan fungsional?',
                'categorie_id' => 6,
            ],
            [
                'user_id' => 2,
                'title' => 'Manfaat Yoga untuk Fleksibilitas Tubuh',
                'body' => 'Apa saja manfaat yoga untuk meningkatkan fleksibilitas tubuh? Gerakan apa yang paling efektif?',
                'categorie_id' => 7,
            ],
            [
                'user_id' => 3,
                'title' => 'Tips Menjaga Kesehatan Jantung',
                'body' => 'Bagaimana cara menjaga kesehatan jantung melalui pola makan dan gaya hidup?',
                'categorie_id' => 8,
            ],
            [
                'user_id' => 4,
                'title' => 'Rekomendasi Produk Skincare untuk Kulit Sensitif',
                'body' => 'Apa saja produk skincare yang aman dan efektif untuk kulit sensitif? Mohon saran merek dan jenisnya.',
                'categorie_id' => 9,
            ],
            [
                'user_id' => 5,
                'title' => 'Tips Merawat Mesin Mobil agar Tetap Prima',
                'body' => 'Bagaimana cara merawat mesin mobil agar tetap prima dan awet? Mohon berbagi tips perawatan rutin.',
                'categorie_id' => 10,
            ],
            [
                'user_id' => 6,
                'title' => 'Rekomendasi Buku Non-Fiksi Terbaik',
                'body' => 'Apa saja buku non-fiksi terbaik yang wajib dibaca? Mohon berbagi rekomendasi dan topik yang dibahas.',
                'categorie_id' => 11,
            ],
            [
                'user_id' => 7,
                'title' => 'Cara Membuat API dengan Laravel',
                'body' => 'Bagaimana cara membuat API yang aman dan efisien menggunakan Laravel? Mohon berbagi best practices.',
                'categorie_id' => 1,
            ],
            [
                'user_id' => 8,
                'title' => 'Resep Masakan Tradisional Indonesia',
                'body' => 'Apa saja resep masakan tradisional Indonesia yang mudah dibuat di rumah? Mohon berbagi resep dan tips memasaknya.',
                'categorie_id' => 2,
            ],
            [
                'user_id' => 9,
                'title' => 'Manfaat Infused Water untuk Kesehatan',
                'body' => 'Apa saja manfaat infused water untuk kesehatan? Bagaimana cara membuatnya yang benar?',
                'categorie_id' => 3,
            ],
            [
                'user_id' => 10,
                'title' => 'Rekomendasi Headphone untuk Mixing Audio',
                'body' => 'Apa merek dan model headphone yang cocok untuk mixing audio? Mohon saran spesifikasi yang ideal.',
                'categorie_id' => 4,
            ],
            [
                'user_id' => 1,
                'title' => 'Tips Merawat Pakaian agar Awet',
                'body' => 'Bagaimana cara merawat pakaian agar tetap awet dan tidak cepat rusak? Mohon berbagi tips mencuci dan menyimpan pakaian.',
                'categorie_id' => 5,
            ],
            [
                'user_id' => 2,
                'title' => 'Desain Ruang Kerja yang Produktif',
                'body' => 'Bagaimana cara mendesain ruang kerja yang nyaman dan meningkatkan produktivitas?',
                'categorie_id' => 6,
            ],
            [
                'user_id' => 3,
                'title' => 'Manfaat Berenang untuk Kesehatan',
                'body' => 'Apa saja manfaat berenang untuk kesehatan fisik dan mental? Berapa kali sebaiknya berenang dalam seminggu?',
                'categorie_id' => 7,
            ],
            [
                'user_id' => 4,
                'title' => 'Tips Mengatasi Insomnia',
                'body' => 'Bagaimana cara mengatasi insomnia secara alami? Mohon berbagi tips untuk meningkatkan kualitas tidur.',
                'categorie_id' => 8,
            ]
        ];

        foreach ($dataTopic as $topic) {
            Topic::create($topic);
        }
    }
}
