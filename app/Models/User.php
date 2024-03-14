<?php

namespace App\Models;

use App\Models\PioneerFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $available_languages = [
        'en' => 'English',
        'it' => 'Italian',
        'ro' => 'Romanian',
        'fr' => 'French',
        'zh_cn' => 'Chinese',
        'zh_tw' => 'Chinese(Taiwan)',
        'es' => 'Spanish',
        'sk' => 'Slovak',
        'pt_br' => 'Portuguese(Brazil)',
    ];

    public function subscribes()
    {
        return $this->hasMany(Subscribe::class);
    }


    public function foundRounds()
    {
        return $this->hasMany(FoundRound::class, 'business_pioneer_id')->orderBy('created_at', 'desc');
    }
    public function solves()
    {
        return $this->hasMany(Solve::class);
    }
    public function markets()
    {
        return $this->hasMany(Market::class);
    }
    public function compats()
    {
        return $this->hasMany(Compat::class);
    }
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'business_pioneer_id');
    }
    public function themeuser()
    {
        return $this->hasOne(ThemeUser::class);
    }
    public function investshow()
    {
        return $this->hasOne(Thankyou::class,'customer_id');
    }

}
