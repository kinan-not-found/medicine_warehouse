<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'date',
        'time_limit',
        'pharmacist_id',
        'status'
    ];
    public function pharmacist(): BelongsTo
    {
        return $this->belongsTo(Pharmacist::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function medicines(): BelongsToMany
    {
        return $this->belongsToMany(Medicine::class, 'orders_medicines')->withTimestamps();
    }
}
