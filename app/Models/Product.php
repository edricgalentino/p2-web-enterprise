<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'description', 'price', 'image'];

	public function tags()
	{
		return $this->belongsToMany(Tag::class, 'tags_products');
	}

	public function images()
	{
		return $this->belongsToMany(Image::class);
	}
}