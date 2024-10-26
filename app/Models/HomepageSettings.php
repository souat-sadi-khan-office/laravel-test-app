<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSettings extends Model
{
    use HasFactory;

    protected $fillable=[
        'bannerSection',
        'sliderSection',
        'midBanner',
        'dealOfTheDay',
        'trending',
        'brands',
        'popularANDfeatured',
        'newslatter',
        'last_updated_by',
    ];

     // Relation with Admin
     public function admin()
     {
         return $this->belongsTo(Admin::class,'last_updated_by');
     }
}
