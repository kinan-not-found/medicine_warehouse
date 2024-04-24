<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'scientific_name',
        'commercial_name',
        'category_id',
        'available_amount',
        'expiration_date',
        'price',
        'company_id',
        'provider_id'
    ];
    public function provider() : BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'orders_medicines')->withTimestamps();
    }
}
