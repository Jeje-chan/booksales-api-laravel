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
        Author::insert([
            ['name' => 'John Doe', 'bio' => 'Penulis fiksi ilmiah.']
            ]);
        Author::insert([
            ['name' => 'Jane Smith', 'bio' => 'Penulis novel sejarah.']
            ]);
        Author::insert([
            ['name' => 'Alice Johnson', 'bio' => 'Ahli filsafat dan penulis.']
            ]);
        Author::insert([
            ['name' => 'Bob Williams', 'bio' => 'Penulis motivasi.']
            ]);
        Author::insert([
            ['name' => 'Charlie Brown', 'bio' => 'Pengarang cerita anak.']
            ]);
        
    }
}
