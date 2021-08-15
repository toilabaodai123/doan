<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	
	public function Models() {
		return $this->hasMany(ProductModel::class,'productID','id');
	}
}
