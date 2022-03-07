<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayTransaction extends Model
{
    use HasFactory;
    protected $table = 'pay_transactions';

    protected $fillable = [
       'token_id',
       'bank_id', 
       'company_id', 
       'currenicy_id',
       'customer_id',
       'product_id',
       'result_id',
       'conversationId',
       'price',
       'paymentUrl',
       'status'
    ];
    public function banks(){
        return $this->belongsTo(Banks::class,'bank_id','id');
    }
    public function companies(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
    public function customers(){
        return $this->belongsTo(Customers::class,'customer_id','id');
    }
    public function currencies(){
        return $this->belongsTo(Currencies::class,'currenicy_id','id');
    }
    public function products(){
        return $this->belongsTo(Products::class,'product_id','id');
    }
    public function results(){
        return $this->belongsTo(Result::class,'result_id','id');
    }
    
    
}
