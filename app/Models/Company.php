<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'description',
        'created_by',
    ];


    public function staffs()
    {
        return $this->hasMany(Payrol::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
