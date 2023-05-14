<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsAddress extends Model
{
    use HasFactory;
    
    protected $table = 'clients_address';
    
    protected $fillable = ['client', 'zip_code', 'city', 'district', 'street', 'number', 'description'];
    
    public function setZipCodeAttribute($value)
    {
        $this->attributes['zip_code'] = !empty($value) ? \App\Suport\Utils::removeZipcodeMask($value) : null;
    }
}
