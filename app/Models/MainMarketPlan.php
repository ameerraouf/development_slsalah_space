<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMarketPlan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sub_market_plan()
    {
        return $this->hasMany(SubMarketPlan::class,'main_market_plan_id')->select('name','id');
    }
}
