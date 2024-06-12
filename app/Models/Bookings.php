<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'slug',
        'customer_phone',
        'address',
        'employee_id',
        'time',
    ];
}
