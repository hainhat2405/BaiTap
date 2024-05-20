<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manageOrderModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)
    protected $fillable = [
        'order_id',
        'Customer_id',
        'idKhachHang',
        'peyment_id',
        'order_total',
        'order_status'
    ];
}
