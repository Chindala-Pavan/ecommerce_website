<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps=false;
    protected $fillable=['id','product_name','description','price','category_id','image'];
    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
