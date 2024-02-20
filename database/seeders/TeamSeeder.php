<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Compat;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        Team::truncate();
        Team::create(['name' => 'المدير التنفيذى', 'image' => 'teams/1.jpg']);
        Team::create(['name' => 'المدير المالى', 'image' => 'teams/2.jpg']);
        Team::create(['name' => 'المدير التشغيلى', 'image' => 'teams/3.jpg']);
        Team::create(['name' => 'المدير التقنى', 'image' => 'teams/4.jpg']);
    }
}
