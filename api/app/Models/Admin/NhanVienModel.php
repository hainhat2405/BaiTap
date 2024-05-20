<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $primaryKey = 'idNhanVien';
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)
    protected $fillable = [
        'idNhanVien',
        'tenNhanVien',
        'chucVu',
        'ngaySinh',
        'soDienThoai',
        'diaChi',
        'email',
        'hinhAnh',
        'Status'
    ];
}



