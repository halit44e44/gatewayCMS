<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyTransfer extends Model
{
    use HasFactory;
    protected $table = 'money_transfers';
    protected $fillable = [
        'company_id', 
        'bank_id', 
        'transferId',
        'fullName', 
        'iban', 
        'price',
        'result',
        'status',
     
     ];

}
