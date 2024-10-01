<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Garage extends Model
{
use SoftDeletes;

protected $fillable = [
'user_id',
'total',
'is_paid',
];

public function user(): BelongsTo
{
return $this->belongsTo(User::class);
}

public function serviceProducts()
{
return $this
->belongsToMany(ServiceProduct::class, 'garage_serviceproduct') // Make sure ServiceProduct class name is correct
->withPivot([
'quantity',
'total'
]);
}
}
