<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::create(['id_product'=>1,'date_start'=>'2024-05-07','date_end'=>'2024-05-15','discount'=>30]);
        Discount::create(['id_product'=>4,'date_start'=>'2024-05-07','date_end'=>'2024-05-15','discount'=>50]);
        Discount::create(['id_product'=>9,'date_start'=>'2024-05-07','date_end'=>'2024-05-15','discount'=>10]);
    }
}
