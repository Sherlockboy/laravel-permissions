<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'full_text',
        'category_id',
        'user_id',
        'published_at',
    ];

    protected static function booted()
    {
        if (auth()->check() && !auth()->user()->IsAdmin()) {
            static::addGlobalScope(new UserScope);
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
