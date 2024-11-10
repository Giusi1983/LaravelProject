<?php

namespace App\Models;

use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address'];

    public function invoices()

    {
        return $this->hasMany(Invoice::class);
    }
}
