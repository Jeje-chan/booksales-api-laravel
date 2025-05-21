<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::create([
            'name' => 'Fantasi',
            'description' => 'Genre yang mengeksplorasi imajinasi dan dunia tak nyata.'
        ]);

        Genre::create([
            'name' => 'Fiksi Ilmiah',
            'description' => 'Cerita yang berbasis spekulasi ilmiah dan teknologi masa depan.'
        ]);

        Genre::create([
            'name' => 'Horror',
            'description' => 'Genre yang menampilkan elemen ketakutan dan misteri.'
        ]);

        Genre::create([
            'name' => 'Sejarah',
            'description' => 'Buku yang membahas peristiwa sejarah dan tokoh-tokoh penting.'
        ]);

        Genre::create([
            'name' => 'Romansa',
            'description' => 'Kisah yang berfokus pada hubungan emosional dan cinta.'
        ]);
    }
}
