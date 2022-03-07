<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'address_id', 
        'customerId', 
        'fullName',
        'tcNo', 
        'phone', 
        'eMail',
        'customerType',
        'ip',
        'language',
        'status',
     ];
}
