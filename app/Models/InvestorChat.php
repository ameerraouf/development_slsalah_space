<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvestorChat extends Model
{
    use HasFactory;

    protected $table = 'investor_chats';

    protected $fillable = [
        'chat_id',
        'user_id', 
        'investor_id',
        'message', 
        'file', 
        'audio',
        'user_read_at',
        'investor_read_at',
        'is_open'
    ];


    public function user(): BelongsTo 
    {

        return $this->belongsTo(User::class, 'user_id');

    }


    public function investor(): BelongsTo
    {

        return $this->belongsTo(Investor::class, 'investor_id');

    }

    public function usersChats() {

        $data = $this->select('*')->with('user')->where('investor_id', auth('investor')->user()->id)->orderBy('id', 'DESC')->get();

        return $data->unique('user_id');

    }
}
