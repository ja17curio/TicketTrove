<?php

namespace Database\Seeders;

use App\Models\OutstandingBill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutstandingBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OutstandingBill::factory(15)->create();
    }
}
