<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProductTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'invoice_number';
    public $incrementing = false;
    protected $keyType = 'string';
    
    public function product(){
        return $this->hasMany(ProductTransaction::class,'invoice_number','invoice_number');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
