<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $attributes = [
        'content' => 'Lorem ipsum default',
    ];

    protected $fillable = ['title', 'content'];

    public function rubric():BelongsTo
    {
        return $this->belongsTo(Rubric::class);
    }

}
