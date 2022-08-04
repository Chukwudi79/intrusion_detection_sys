<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loginmonitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'log_attempt',
        'log_type',
        'type',
        'ip_address',
        'company_id',
        'device_type',
        'browser_type',
        'state',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
