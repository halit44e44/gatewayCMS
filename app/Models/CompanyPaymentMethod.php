<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPaymentMethod extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='company_payment_methods';

    protected $fillable = [
        'bank_id', 
        'percent', 
        'maxValue',
        'minValue',
        'controlValue',
        'status'
     ];
     public function banks(){
        return $this->hasOne(Banks::class,'id','bank_id');
     }
}
