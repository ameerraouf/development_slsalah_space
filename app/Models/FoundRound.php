<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundRound extends Model
{
    use HasFactory;

    protected $fillable = ['round_amount', 'share_round', 'share_plan', 'share_profile', 'business_pioneer_id'];



    public function pioneer()
    {
        return $this->belongsTo(User::class, 'business_pioneer_id');
    }
}
