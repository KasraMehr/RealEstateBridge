<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = [
      'access'
    ];

    public function user(): HasOne
    {
        return $this->hasone(User::class);
    }
}
