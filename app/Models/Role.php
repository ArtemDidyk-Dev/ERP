<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    public const STATUS_ADMIN_ID = 1;

    public const STATUS_TEAMLEADER_ID = 2;

    public const STATUS_BUYER_ID = 3;

    protected $fillable = ['id', 'name', 'slug'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
