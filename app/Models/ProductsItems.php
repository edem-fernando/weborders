<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsItems extends Model
{
    use HasFactory;
    
    protected $table = 'products_items';
    
    protected $fillable = [
        'name',
        'alias',
        'active',
        'price_sale',
        'price_cost',
        'description',
        'thumb',
    ];
    
    public function populateLookup()
    {
        $this->object_category = ProductsCategories::where('id', $this->category)->get()->first();
    }
}
