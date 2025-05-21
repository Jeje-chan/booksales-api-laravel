<?php

namespace Database\Seeders;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Harry Potter dan Batu Bertuah',
            'description' => 'Petualangan seorang anak yatim yang menemukan dirinya sebagai penyihir.',
            'price' => 175000,
            'stock' => 18,
            'cover_photo' => 'harry_potter.jpg',
            'genre_id' => 1, // Fantasi
            'author_id' => 2
        ]);

        Book::create([
            'title' => 'Bumi',
            'description' => 'Sebuah kisah fantasi dan petualangan dari dunia lain karya Tere Liye.',
            'price' => 120000,
            'stock' => 20,
            'cover_photo' => 'bumi.jpg',
            'genre_id' => 2, // Fiksi Ilmiah
            'author_id' => 3
        ]);

        Book::create([
            'title' => 'Dunia Sophie',
            'description' => 'Buku pengantar filsafat melalui perjalanan seorang gadis bernama Sophie.',
            'price' => 135000,
            'stock' => 15,
            'cover_photo' => 'sophie.jpg',
            'genre_id' => 3, // Filosofi
            'author_id' => 4
        ]);

        Book::create([
            'title' => 'Sapiens: Sejarah Singkat Umat Manusia',
            'description' => 'Eksplorasi sejarah dan evolusi manusia dari masa ke masa.',
            'price' => 180000,
            'stock' => 12,
            'cover_photo' => 'sapiens.jpg',
            'genre_id' => 4, // Sejarah
            'author_id' => 6
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'description' => 'Perjalanan epik Bilbo Baggins di dunia Middle-earth.',
            'price' => 160000,
            'stock' => 22,
            'cover_photo' => 'hobbit.jpg',
            'genre_id' => 1, // Fantasi
            'author_id' => 5
        ]);
    }
}
