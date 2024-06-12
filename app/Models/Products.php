<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'products';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status'];

}
