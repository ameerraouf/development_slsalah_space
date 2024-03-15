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
        "sended_by",
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

        $superAdminId = User::where('super_admin', 1)->first();

        $data = $this->select('*')->with('user')->where('investor_id', auth('investor')->user()->id)->where('user_id','!=', $superAdminId->id)->orderBy('id', 'DESC')->get();

        return $data->unique('user_id');

    }
    public function investorsChats() {

        $data = $this->select('*')->with('investor')->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        return $data->unique('investor_id');

    }

    public function pioneerUnreadMessages($id) {

        return $this->where('sended_by', 'investor')->where('investor_id', $id)->where('is_open', '0')->count();

    }
    public function investorUnreadMessages($id) {

        return $this->where('sended_by', 'user')->where('user_id', $id)->where('is_open', '0')->count();

    }
}
