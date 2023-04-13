<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//    protected $table;
//    protected $primaryKey;


    protected $attributes = [
        'content' => 'Lorem ipsum default',
    ];

    protected $fillable = ['title', 'content'];

}
