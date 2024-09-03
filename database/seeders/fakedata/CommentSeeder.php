<?php

namespace Database\Seeders\fakedata;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataComment = [
            [
                'topic_id' => 1,
                'user_id' => 2,
                'body' => 'Laravel memiliki ekosistem yang kuat dan dokumentasi yang lengkap, itulah mengapa banyak orang menggunakannya.',
            ],
            [
                'topic_id' => 1,
                'user_id' => 3,
                'body' => 'Setiap framework memiliki kelebihan dan kekurangannya masing-masing, tergantung kebutuhan proyek.',
            ],
            [
                'topic_id' => 2,
                'user_id' => 4,
                'body' => 'Gunakan autoloading dan caching untuk meningkatkan efisiensi kode PHP Anda.',
            ],
            [
                'topic_id' => 2,
                'user_id' => 5,
                'body' => 'Jangan lupa untuk selalu mengoptimalkan query database Anda untuk performa yang lebih baik.',
            ],
            [
                'topic_id' => 3,
                'user_id' => 6,
                'body' => 'React.js adalah pilihan yang bagus untuk pengembangan aplikasi web modern.',
            ],
            [
                'topic_id' => 3,
                'user_id' => 7,
                'body' => 'Vue.js lebih mudah dipelajari untuk pemula dibandingkan framework lainnya.',
            ],
            [
                'topic_id' => 4,
                'user_id' => 8,
                'body' => 'Tambahkan telur dan sosis untuk membuat nasi goreng yang lebih lezat.',
            ],
            [
                'topic_id' => 4,
                'user_id' => 9,
                'body' => 'Jangan lupa menggunakan kecap manis untuk rasa yang lebih autentik.',
            ],
            [
                'topic_id' => 5,
                'user_id' => 10,
                'body' => 'Makanan berbasis tumbuhan semakin populer tahun ini.',
            ],
            [
                'topic_id' => 5,
                'user_id' => 1,
                'body' => 'Jangan terlalu mengikuti tren, yang terpenting adalah keseimbangan nutrisi.',
            ],
            [
                'topic_id' => 6,
                'user_id' => 2,
                'body' => 'Gunakan buah beku untuk tekstur yang lebih kental pada smoothie Anda.',
            ],
            [
                'topic_id' => 6,
                'user_id' => 3,
                'body' => 'Tambahkan bayam atau kale untuk meningkatkan nutrisi smoothie Anda.',
            ],
            [
                'topic_id' => 7,
                'user_id' => 4,
                'body' => 'ThinkPad dari Lenovo adalah pilihan yang bagus untuk programmer.',
            ],
            [
                'topic_id' => 7,
                'user_id' => 5,
                'body' => 'Pastikan laptop Anda memiliki RAM yang cukup dan SSD untuk kinerja yang optimal.',
            ],
            [
                'topic_id' => 8,
                'user_id' => 6,
                'body' => 'Oversized suits sedang tren untuk fashion pria tahun ini.',
            ],
            [
                'topic_id' => 8,
                'user_id' => 7,
                'body' => 'Jangan lupa, kenyamanan tetap yang utama dalam berpakaian.',
            ],
            [
                'topic_id' => 9,
                'user_id' => 8,
                'body' => 'Pilih bahan kulit asli atau kulit sintetis berkualitas tinggi untuk sofa yang tahan lama.',
            ],
            [
                'topic_id' => 9,
                'user_id' => 9,
                'body' => 'Pertimbangkan ukuran ruangan Anda sebelum memilih sofa.',
            ],
            [
                'topic_id' => 10,
                'user_id' => 10,
                'body' => 'High-Intensity Interval Training (HIIT) sangat efektif untuk menurunkan berat badan.',
            ],
            [
                'topic_id' => 10,
                'user_id' => 1,
                'body' => 'Jangan lupa, diet yang seimbang juga penting dalam penurunan berat badan.',
            ],
            [
                'topic_id' => 11,
                'user_id' => 2,
                'body' => 'Yoga dapat membantu mengurangi stres dan meningkatkan fokus.',
            ],
            [
                'topic_id' => 11,
                'user_id' => 3,
                'body' => 'Praktik yoga secara teratur dapat meningkatkan kualitas tidur.',
            ],
            [
                'topic_id' => 12,
                'user_id' => 4,
                'body' => 'Gunakan produk berbahan dasar air untuk kulit berminyak.',
            ],
            [
                'topic_id' => 12,
                'user_id' => 5,
                'body' => 'Jangan lupa untuk tetap melembabkan kulit meskipun berminyak.',
            ],
            [
                'topic_id' => 13,
                'user_id' => 6,
                'body' => 'Rutin ganti oli dan cek tekanan ban untuk menjaga performa mobil.',
            ],
            [
                'topic_id' => 13,
                'user_id' => 7,
                'body' => 'Jangan lupa untuk mencuci mobil secara teratur untuk menjaga cat tetap awet.',
            ],
            [
                'topic_id' => 14,
                'user_id' => 8,
                'body' => '"Atomic Habits" oleh James Clear adalah buku self-improvement yang sangat direkomendasikan.',
            ],
            [
                'topic_id' => 14,
                'user_id' => 9,
                'body' => '"The 7 Habits of Highly Effective People" oleh Stephen Covey juga klasik yang wajib dibaca.',
            ],
            [
                'topic_id' => 15,
                'user_id' => 10,
                'body' => 'Laravel lebih cocok untuk proyek besar karena memiliki fitur yang lebih lengkap.',
            ],
            [
                'topic_id' => 15,
                'user_id' => 1,
                'body' => 'CodeIgniter lebih ringan dan cocok untuk proyek kecil hingga menengah.',
            ],
            [
                'topic_id' => 16,
                'user_id' => 2,
                'body' => 'Gunakan nori berkualitas tinggi untuk hasil sushi yang lebih enak.',
            ],
            [
                'topic_id' => 16,
                'user_id' => 3,
                'body' => 'Jangan lupa untuk memasak nasi sushi dengan benar agar tidak terlalu lengket.',
            ],
            [
                'topic_id' => 17,
                'user_id' => 4,
                'body' => 'Infused water dengan lemon dan mentimun sangat menyegarkan dan baik untuk detox.',
            ],
            [
                'topic_id' => 17,
                'user_id' => 5,
                'body' => 'Jangan lupa untuk mengganti air infused setiap hari untuk kebersihan.',
            ],
            [
                'topic_id' => 18,
                'user_id' => 6,
                'body' => 'ROG Phone dari ASUS adalah pilihan bagus untuk mobile gaming.',
            ],
            [
                'topic_id' => 18,
                'user_id' => 7,
                'body' => 'Pastikan smartphone memiliki sistem pendingin yang baik untuk gaming jangka panjang.',
            ],
            [
                'topic_id' => 19,
                'user_id' => 8,
                'body' => 'Gaun midi dengan motif floral sedang tren untuk fashion wanita tahun ini.',
            ],
            [
                'topic_id' => 19,
                'user_id' => 9,
                'body' => 'Jangan lupa, pilih pakaian yang sesuai dengan bentuk tubuh Anda.',
            ],
            [
                'topic_id' => 20,
                'user_id' => 10,
                'body' => 'Gunakan furnitur multifungsi untuk mengoptimalkan ruang tamu minimalis.',
            ],
            [
                'topic_id' => 20,
                'user_id' => 1,
                'body' => 'Pilih warna-warna netral untuk memberikan kesan luas pada ruang tamu minimalis.',
            ],
            [
                'topic_id' => 21,
                'user_id' => 2,
                'body' => 'Lari pagi dapat meningkatkan metabolisme tubuh sepanjang hari.',
            ],
            [
                'topic_id' => 21,
                'user_id' => 3,
                'body' => 'Jangan lupa untuk pemanasan sebelum lari pagi untuk menghindari cedera.',
            ],
            [
                'topic_id' => 22,
                'user_id' => 4,
                'body' => 'Gunakan aturan 20-20-20: setiap 20 menit, lihat objek 20 kaki jauhnya selama 20 detik.',
            ],
            [
                'topic_id' => 22,
                'user_id' => 5,
                'body' => 'Pastikan pencahayaan ruangan cukup saat menggunakan gadget untuk mengurangi ketegangan mata.',
            ],
            [
                'topic_id' => 23,
                'user_id' => 6,
                'body' => 'BB cream adalah pilihan bagus untuk tampilan natural sehari-hari.',
            ],
            [
                'topic_id' => 23,
                'user_id' => 7,
                'body' => 'Jangan lupa untuk selalu membersihkan wajah sebelum tidur, meskipun hanya menggunakan makeup natural.',
            ],
            [
                'topic_id' => 24,
                'user_id' => 8,
                'body' => 'Perhatikan ukuran dan jenis ban yang direkomendasikan oleh pabrikan mobil Anda.',
            ],
            [
                'topic_id' => 24,
                'user_id' => 9,
                'body' => 'Rotasi ban secara teratur dapat membantu memperpanjang umur ban mobil.',
            ],
            [
                'topic_id' => 25,
                'user_id' => 10,
                'body' => '"To Kill a Mockingbird" oleh Harper Lee adalah novel klasik yang wajib dibaca.',
            ],
            [
                'topic_id' => 25,
                'user_id' => 1,
                'body' => '"1984" oleh George Orwell juga merupakan novel fiksi yang sangat berpengaruh.',
            ],
            [
                'topic_id' => 26,
                'user_id' => 2,
                'body' => 'Gunakan kata kunci yang relevan dan berkualitas dalam konten website Anda.',
            ],
            [
                'topic_id' => 26,
                'user_id' => 3,
                'body' => 'Jangan lupa untuk mengoptimalkan kecepatan loading website Anda untuk SEO yang lebih baik.',
            ],
            [
                'topic_id' => 27,
                'user_id' => 4,
                'body' => 'Nastar adalah kue kering klasik yang selalu populer saat Lebaran.',
            ],
            [
                'topic_id' => 27,
                'user_id' => 5,
                'body' => 'Jangan lupa untuk menyimpan kue kering dalam wadah kedap udara agar tetap renyah.',
            ],
            [
                'topic_id' => 28,
                'user_id' => 6,
                'body' => 'Kopi Gayo dari Aceh terkenal dengan cita rasa yang khas dan berkualitas tinggi.',
            ],
            [
                'topic_id' => 28,
                'user_id' => 7,
                'body' => 'Kopi Toraja juga merupakan salah satu kopi lokal terbaik dengan rasa yang unik.',
            ]
        ];

        foreach ($dataComment as $comment) {
            Comment::create($comment);
        }
    }
}
