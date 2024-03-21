<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportChat extends Model
{

    protected $table = 'support_chat';

    protected $guarded = ['id'];

    use HasFactory;

    public function investor() {
        return $this->belongsTo(Investor::class,'sender_id');
    }


    public function investorsChats() {

        $data = $this->select('*')->with('investor')->where('reciver_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        return $data->unique('sender_id');

    }
}
