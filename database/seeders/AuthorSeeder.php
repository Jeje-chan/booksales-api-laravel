<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'J.K. Rowling',
            'bio' => 'Penulis terkenal dari seri Harry Potter.',
        ]);

        Author::create([
            'name' => 'Tere Liye',
            'bio' => 'Penulis populer dengan berbagai novel fiksi dan fantasi.',
        ]);

        Author::create([
            'name' => 'Jostein Gaarder',
            'bio' => 'Penulis Dunia Sophie, buku pengantar filsafat.',
        ]);

        Author::create([
            'name' => 'Yuval Noah Harari',
            'bio' => 'Sejarawan dan penulis buku Sapiens.',
        ]);

        Author::create([
            'name' => 'J.R.R. Tolkien',
            'bio' => 'Penulis legendaris dari The Hobbit dan The Lord of the Rings.',
        ]);
    }
}
