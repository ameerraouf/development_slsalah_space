<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Compat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compat::truncate();
        Compat::create(['title' => 'السعر', 'description' => 'eeeeeeeeeeeeeeee']);
        Compat::create(['title' => 'الحجم', 'description' => 'rrrrrrrrrrrrrrr']);
        Compat::create(['title' => 'الاداء', 'description' => 'ggggggggggggggg']);
        Compat::create(['title' => 'المهاره', 'description' => 'bbbbbbbbbbbbbbbbbbbbbbbbbb']);
        Compat::create(['title' => 'المكان', 'description' => 'zzzzzzzzzzzzzzzzzzzzzz']);
        Compat::create(['title' => 'الجوده', 'description' => 'testtttttttttttttttttttt']);
    }
}
