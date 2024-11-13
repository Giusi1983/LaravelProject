<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'phone', 
        'address', 
        'created_at', 
        'updated_at'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
