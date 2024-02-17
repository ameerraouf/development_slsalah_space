<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Compat;
use App\Models\Compator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compator::truncate();
        Compator::create(['companyname' => "اسم شركه العميل", 'price' => '1', 'quality' => '1', 'tech' => '1']);
        Compator::create(['companyname' => "اسم الشركه المنافسه الاولى", 'price' => '0', 'quality' => '0', 'tech' => '0']);
        Compator::create(['companyname' => "اسم الشركه المنافسه الثانيه", 'price' => '1', 'quality' => '0', 'tech' => '0']);
    }
}
