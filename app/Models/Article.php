<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'full_text',
        'category_id',
        'user_id',
    ];

    protected static function booted()
    {
        if (auth()->check()) {
            static::addGlobalScope(new UserScope);
        }
    }
}
