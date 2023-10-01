<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

     //One to Many Relationship chainment, look at Invoice.php
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
