<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'companies';
    protected $fillable = [
        //'company_payment_id',
        'balance_id', 
        'name', 
        'image',
        'hostname',
        'ipn',
        'institutionType',
        'institutionCode',
        'apiKey',
        'secretKey',
        'status'
     ];

     public function balances(){
        return $this->belongsTo(Balance::class,'balance_id','id');
     }
   //   public function paymentMethods(){
   //      return $this->belongsTo(CompanyPaymentMethod::class,'company_payment_id','id');
   //   }

}
