<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'url']; // Allow mass assignment for these attributes

    // Define the relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}