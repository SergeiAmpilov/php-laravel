<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rubric extends Model
{
    use HasFactory;

    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }
}
