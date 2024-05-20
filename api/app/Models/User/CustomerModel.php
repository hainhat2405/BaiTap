<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_customer';
    protected $primaryKey = 'Customer_id';
    protected $fillable = [
        'Customer_id',
        'Customer_name',
        'Customer_phone',
        'Customer_email',
        'Customer_password',
        'Status'
    ];
}
