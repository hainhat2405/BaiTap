<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_detail';
    protected $primaryKey = 'order_detail_id';
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)
    protected $fillable = [
        'order_detail_id',
        'order_id',
        'idSanPham',
        'tenSanPham',
        'giaBan',
        'product_sales_quantity'
    ];

    public function customer()
    {
        return $this->belongsTo(KhachHangModel::class, 'idKhachHang', 'idKhachHang');
    }
}
