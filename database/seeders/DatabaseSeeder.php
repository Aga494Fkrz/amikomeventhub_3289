<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama (Email & Nama dibedakan)
        User::create([
            'name' => 'Administrator Event',
            'email' => 'superadmin@amikom.ac.id',
            'password' => Hash::make('rahasia123'), // menggunakan Hash agar lebih rapi
            'role' => 'admin',
        ]);

        // 2. Insert Kategori Event (Dibuat 3 Kategori Sesuai Syarat Tugas)
        $kategoriSeminar = Category::firstOrCreate([
            'name' => 'Seminar & Workshop',
            'slug' => 'seminar-workshop',
        ]);

        $kategoriKonser = Category::firstOrCreate([
            'name' => 'Konser Musik',
            'slug' => 'konser-musik',
        ]);

        $kategoriKompetisi = Category::firstOrCreate([
            'name' => 'Kompetisi IT',
            'slug' => 'kompetisi-it',
        ]);

        // 3. Insert Sampel Events (Dibuat 6 Event Sesuai Syarat Tugas)
        
        // --- Event Kategori Konser ---
        Event::create([
            'category_id' => $kategoriKonser->id,
            'title' => 'Amikom Fest: Malam Puncak 2026',
            'description' => 'Meriahkan malam puncak Dies Natalis dengan bintang tamu spesial dari ibukota.',
            'date' => '2026-10-15 18:30:00',
            'location' => 'Lapangan Utama Amikom',
            'price' => 75000,
            'stock' => 500,
            'poster_path' => 'posters/konser-1.png',
        ]);

        Event::create([
            'category_id' => $kategoriKonser->id,
            'title' => 'Indie Music Night',
            'description' => 'Menikmati malam santai bersama band-band indie lokal Yogyakarta.',
            'date' => '2026-11-20 19:00:00',
            'location' => 'Basement Amikom',
            'price' => 35000,
            'stock' => 150,
            'poster_path' => 'posters/konser-2.png',
        ]);

        // --- Event Kategori Kompetisi ---
        Event::create([
            'category_id' => $kategoriKompetisi->id,
            'title' => 'Amikom Web Development Contest',
            'description' => 'Tunjukkan kemampuan codingmu dalam membuat website inovatif dalam waktu 24 jam.',
            'date' => '2026-06-10 08:00:00',
            'location' => 'Lab Komputer Unit 4',
            'price' => 100000,
            'stock' => 50,
            'poster_path' => 'posters/lomba-1.png',
        ]);

        Event::create([
            'category_id' => $kategoriKompetisi->id,
            'title' => 'E-Sport Mobile Legends Tournament',
            'description' => 'Ajang unjuk gigi bagi para gamers Amikom. Buktikan timmu adalah yang terbaik!',
            'date' => '2026-07-05 09:00:00',
            'location' => 'Ruang Citra 1',
            'price' => 150000,
            'stock' => 32, // 32 slot tim
            'poster_path' => 'posters/lomba-2.png',
        ]);

        // --- Event Kategori Seminar ---
        Event::create([
            'category_id' => $kategoriSeminar->id,
            'title' => 'Mastering UI/UX for Beginners',
            'description' => 'Pelajari dasar-dasar merancang antarmuka aplikasi yang user-friendly bersama desainer profesional.',
            'date' => '2026-08-12 10:00:00',
            'location' => 'Ruang Kelas 5.4',
            'price' => 45000,
            'stock' => 80,
            'poster_path' => 'posters/seminar-1.png',
        ]);

        Event::create([
            'category_id' => $kategoriSeminar->id,
            'title' => 'Cybersecurity Awareness: Lindungi Data Pribadimu',
            'description' => 'Seminar tentang pentingnya keamanan siber di era digital dan cara mencegah kebocoran data.',
            'date' => '2026-09-25 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 120,
            'poster_path' => 'posters/seminar-2.png',
        ]);
    }
}