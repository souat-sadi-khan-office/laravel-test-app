<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'name',
        'email',
        'rating',
        'comment',
        'status',
        'viewed',
    ];

    // Define relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation with answer
    public function answer()
    {
        return $this->belongsTo(ReviewAnswer::class);
    }

}
