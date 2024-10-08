<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'garage_id',
        'email',
        'first_name',
        'last_name',
        'company',
        'address',
        'apartment',
        'city',
        'country',
        'region',
        'postal_code',
        'phone',
        'card_number',
        'name_on_card',
        'expiration_date',
        'cvc',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function garage(): BelongsTo
    {
        return $this->belongsTo(Garage::class);
    }
}
