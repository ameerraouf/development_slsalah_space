<?php

namespace Database\Seeders;

use App\Models\DevelopPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevelopPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DevelopPlan::truncate();
        DevelopPlan::create(['name' => "شركات استراتيجيه"]);
        DevelopPlan::create(['name' => "زيادة للحصة السوفيه"]);
        DevelopPlan::create(['name' => "التوسع لمناطق اخري"]);
        DevelopPlan::create(['name' => "اضافه خدمات اخري"]);
        DevelopPlan::create(['name' => "توسع اقليمي"]);
        DevelopPlan::create(['name' => "توسع عالمي"]);
        DevelopPlan::create(['name' => "الاكتتاب"]);
    }
}
