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
        Book::insert([
            ['title' => 'The Future World', 'author_id' => 1, 'price' => 120000]
        ]);
        Book::insert([
            ['title' => 'Historic Times', 'author_id' => 2, 'price' => 95000]
        ]);
        Book::insert([
            ['title' => 'Philosophy of Life', 'author_id' => 3, 'price' => 110000]
        ]);
        Book::insert([
            ['title' => 'The Power of Positivity', 'author_id' => 4, 'price' => 85000]
        ]);
        Book::insert([
            ['title' => 'Magic Tales', 'author_id' => 5, 'price' => 99000]
        ]);
    }
}
