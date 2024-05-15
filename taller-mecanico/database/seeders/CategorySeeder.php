<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'Filtros de Aire y Aceite']);
        Category::create(['name'=>'Frenos y Sistema de Frenado']);
        Category::create(['name'=>'Suspension y Direccion']);
        Category::create(['name'=>'Sistema de Escape']);
        Category::create(['name'=>'Sistema de Transmision']);
    }
}
