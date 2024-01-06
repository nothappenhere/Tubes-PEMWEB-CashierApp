<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'username',
        'total_price',
        'address',
        'phone',
        'status',
        // Tambahkan atribut yang lain sesuai kebutuhan
    ];
}
