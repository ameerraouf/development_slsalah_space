<?php

// in InvestmentPortfolio.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPortfolio extends Model
{
    use HasFactory;

    protected $fillable = ['found_round_id', 'investor_id'];

}
