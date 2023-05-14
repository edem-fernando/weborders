<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersItems extends Model
{
    use HasFactory;
    
    protected $primaryKey = ['order', 'product'];
    
    public $incrementing = false; 
    
    public $timestamps = false;
    
    protected $table = 'orders_items';
    
    protected $fillable = ['order', 'product', 'quant', 'price_sale', 'price_cost'];
    
    public function populateLookup()
    {
        $this->object_product = ProductsItems::where('id', $this->product)->get()->first();
        $this->object_product->populateLookup();
    }
}
