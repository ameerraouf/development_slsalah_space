<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdminChat extends Model
{
    use HasFactory;

    protected $table = 'user_admin_chat';

    protected $guarded = [];
}
