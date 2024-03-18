<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MainMarketPlan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function sub_market_plan()
    {
        return $this->hasMany(SubMarketPlan::class,'main_market_plan_id')->select('name','id');
    }
    public function sub_market_planuser()
    {
        $user = Auth::user();
        return $this->hasMany(SubMarketPlan::class,'main_market_plan_id')
        ->where('user_id',$user->id)->take(3);
    }
}
