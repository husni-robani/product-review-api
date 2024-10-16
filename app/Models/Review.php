<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'product_id', 'review_text', 'rate'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
