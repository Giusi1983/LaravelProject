<?php

namespace App\Models;

// use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    // use HasFactory;
    protected $fillable = [
        'client_id', 
        'invoice_number', 
        'invoice_date', 
        'total_amount',
        'created_at', 
        'updated_at'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
