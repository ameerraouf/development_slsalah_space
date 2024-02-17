<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Investor extends Authenticatable
{
    use HasFactory, Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    public static function getTotalInvestment($workspace_id){

        $fixedSum = DB::table('fixed_invested_capitals')
            ->select('investing_price')
            ->where(['workspace_id' => $workspace_id])->sum('investing_price');
        $workingSum = DB::table('working_invested_capitals')
            ->select('investing_annual_cost')
            ->where(['workspace_id' => $workspace_id])->sum('investing_annual_cost');
        return $fixedSum + $workingSum;
    }

    public function favoriteRounds()
    {
         return $this->belongsToMany(FoundRound::class, 'favorite_rounds');
    }
    
}
