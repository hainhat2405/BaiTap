<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceDetail extends Model
{
    use HasFactory;
    protected $table = 'cthoadonban';
    protected $primaryKey = 'idCTHoaDonBan';
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)
    protected $fillable = [
        'idCTHoaDonBan',
        'idHoaDonBan',
        'idSanPham',
        'tenSanPham',
        'soLuong',
        'giaBan',
        'thanhTien',
    ];
}
