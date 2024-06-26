<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Role extends Model
{
    protected $fillable = [
      'title'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    use HasFactory;
}
