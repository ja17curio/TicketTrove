<?php

namespace Database\Seeders;

use App\Models\StatusCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'is_paid_in_full',
            'has_outstanding_bill',
            'payment_rejected',
            'order_cancelled',
            'order_processing',
            'order_processed',
            'order_sent',
        ];

        foreach($statuses as $status){
            StatusCode::create([
                'status_description' => $status
            ]);
        }
    }
}
