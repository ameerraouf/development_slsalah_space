<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedInvestor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number_of_investment',
        'number_of_exits',
        'location',
        'monthly_visits',
        'investor_type',
        'investor_stage',
    ];
}
