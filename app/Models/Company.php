<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['business_pioneer_id', 'company_name', 'company_description', 'business_department', 'company_logo', 'company_brief'];
}
