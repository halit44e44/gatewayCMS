<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teqpay extends Model
{
    use HasFactory;
    protected $table = 'teqpays';
    protected $fillable = [
        'customer_id', 
        'conversationId', 
        'resultCode',
        'resultMessage', 
        'merchant', 
        'orderId',
        'totalAmount',
        'transactionDateTime',
        'paymentDetail',
        'productDetail',
     ];
     public function customers(){
        return $this->belongsTo(Customers::class,'customer_id','id');
    }
    
}
