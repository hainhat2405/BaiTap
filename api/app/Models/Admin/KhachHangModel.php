<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHangModel extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $primaryKey = 'idKhachHang';
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)
    protected $fillable = [
        'idKhachHang',
        'tenKhachHang',
        'soDienThoai',
        'diaChi',
        'email',
        'ngaySinh',
        'Status',
        'Customer_id',
        'payment_id',
    ];

    public function saleinvoice()
    {
        return $this->hasOne(SalesInvoice::class, 'idKhachHang', 'idKhachHang');
    }
    public function order()
    {
        return $this->hasOne(OrderModel::class, 'idKhachHang', 'idKhachHang');
    }
}
