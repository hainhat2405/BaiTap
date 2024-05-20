<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)
    protected $fillable = [
        'order_id',
        'Customer_id',
        'idKhachHang',
        'payment_id',
        'order_total',
        'order_status'
    ];

    public function customer()
    {
        return $this->belongsTo(KhachHangModel::class, 'idKhachHang', 'idKhachHang');
    }
}
