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
            ['name' => 'John Doe', 'bio' => 'Penulis fiksi ilmiah.']
            ]);
        Author::create([
            ['name' => 'Jane Smith', 'bio' => 'Penulis novel sejarah.']
            ]);
        Author::create([
            ['name' => 'Alice Johnson', 'bio' => 'Ahli filsafat dan penulis.']
            ]);
        Author::create([
            ['name' => 'Bob Williams', 'bio' => 'Penulis motivasi.']
            ]);
        Author::create([
            ['name' => 'Charlie Brown', 'bio' => 'Pengarang cerita anak.']
            ]);
        
    }
}
