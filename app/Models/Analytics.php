<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Analytics extends Model
{
    use HasFactory;

    protected $fillable = ['offer', 'geo', 'source', 'vertical', 'income', 'expenses', 'user_id', 'roi'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
