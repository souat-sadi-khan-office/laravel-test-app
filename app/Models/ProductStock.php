<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $table = 'product_stocks';

    protected $fillable = [
        'product_id',
        'zone_id',
        'country_id',
        'city_id',
        'in_stock',
        'low_stock_quantity',
        'number_of_sale',
        'stock',
    ];

    // Relationships
    public function purchase()
    {
        return $this->belongsTo(StockPurchase::class , 'stock_purchase_id');
    }

    // Product relationship
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // Zone relationship
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    // Country relationship
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // City relationship
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Admin relation
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

}
