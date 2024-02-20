<?php

namespace Database\Seeders;

use App\Models\MainMarketPlan;
use App\Models\SubMarketPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainMarketPlan::truncate();
        SubMarketPlan::truncate();
        $category = [
            'main_category' => [
                "التسويق الدائم" => ['ت1','ت2','ت3'],
                "المحتوى وتسويق المؤثرين" => ['م1','م2','م3'],
                "الشراكات الاستراتيجيه" => ['ش1','ش2','ش3'],
                "اخرى" => ['ا1','ا2','ا3'],
            ]
        ];

        foreach ($category['main_category'] as $key => $value) {
            $main_id = MainMarketPlan::insertGetId([
                'name' => $key,
            ]);
            foreach ($value as $key2 => $value2) {
                $category_id = SubMarketPlan::insertGetId([
                    'name' => $value2,
                    'main_market_plan_id' => $main_id,
                ]);
            }
        }
        // MainMarketPlan::create([
        //     'name'=>'',
        // ]);
        // SubMarketPlan::create([
        //     'name'=>'',
        //     'main_market_plan_id'=>'',
        // ]);
    }
}
