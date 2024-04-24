<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id'
    ];
    public function medicines() : HasMany
    {
        return $this->hasMany(Medicine::class);
    }
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    /**
     * build the structure of the tree
     */
}