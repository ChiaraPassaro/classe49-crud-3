<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    protected $fillable = [
        'title',
        'text',
        'url',
        'author',
        'email',
        'created_at',
        'updated_at',
    ];
}
