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
            ['title' => 'The Future World', 'author_id' => 1, 'price' => 120000]
        ]);
        Book::create([
            ['title' => 'Historic Times', 'author_id' => 2, 'price' => 95000]
        ]);
        Book::create([
            ['title' => 'Philosophy of Life', 'author_id' => 3, 'price' => 110000]
        ]);
        Book::create([
            ['title' => 'The Power of Positivity', 'author_id' => 4, 'price' => 85000]
        ]);
        Book::create([
            ['title' => 'Magic Tales', 'author_id' => 5, 'price' => 99000]
        ]);
    }
}
