<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdminChat extends Model
{
    use HasFactory;

    protected $table = 'user_admin_chat';

    protected $guarded = [];

    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function usersChats() {

        $data = $this->select('*')->with('user')->where('admin_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        return $data->unique('user_id');

    }
}
