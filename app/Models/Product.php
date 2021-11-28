<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getPrice() 
    {
        $price = $this->price / 100;
        return number_format($price, '2', ',',' '). ' €';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
