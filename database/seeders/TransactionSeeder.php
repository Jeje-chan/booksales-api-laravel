<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'order_number' => 'ORD-0001',
            'customer_id' => 2, // Assuming user with ID 1 exists
            'book_id' => 1, // Assuming book with ID 1 exists
            'total_amount' => 175000.00, // Example total amount
        ]);
        Transaction::create([
            'order_number' => 'ORD-0002',
            'customer_id' => 2, // Assuming user with ID 2 exists
            'book_id' => 2, // Assuming book with ID 2 exists
            'total_amount' => 200000.00, // Example total amount
        ]);
    }
}
