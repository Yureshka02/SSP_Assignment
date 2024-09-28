<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class serviceProduct extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'service_category_id',
        'sort_order',
        'status',
    ];

    public function serviceCategory(): BelongsTo
    {
        return $this->belongsTo(serviceCategory::class);
    }
}
