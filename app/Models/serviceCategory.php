<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class serviceCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'sort_order',
        'status',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(serviceCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(serviceCategory::class, 'parent_id');
    }
}
