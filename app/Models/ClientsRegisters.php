<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsRegisters extends Model
{
    use HasFactory;

    protected $table = 'clients_registers';

    protected $fillable = [ 'name', 'email', 'status', 'phone', 'genre', 'date_birth' ];
    
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = !empty($value) ? \App\Suport\Utils::removePhoneMask($value) : null;
    }
}
