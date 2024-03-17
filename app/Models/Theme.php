<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Theme extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function themeuser()
    {
        return $this->hasOne(ThemeUser::class);
    }
    // public function firstMedia(): MorphOne
    // {
    //     return $this->morphOne(Media::class, 'mediable')->orderBy('file_sort', 'asc');
    // }
    // public function media(): MorphMany
    // {
    //     return $this->MorphMany(Media::class, 'mediable');
    // }
}
