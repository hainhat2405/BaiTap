<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    use HasFactory;
    protected $table = 'hoadonban';
    protected $primaryKey = 'idHoaDonBan';
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)
    protected $fillable = [
        'idHoaDonBan',
        'idKhachHang',
        'ngayBan',
        'tongTien',
        'ghiChu',
        'Status'
    ];
}
