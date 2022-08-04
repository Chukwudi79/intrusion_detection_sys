<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awareness extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'body',
        'media_url',
        'media_name',
        'media_ext',
        'created_by',
    ];
}
