<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamModel extends Model
{
    protected $table = 'sanpham'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'idSanPham'; // Tên cột của khóa chính
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)

    protected $fillable = [
        'idSanPham',
        'tenSanPham',
        'moTa',
        'giaBan',
        'soLuong',
        'hinhAnh',
        'idLoaiSP',
        'Status',
        'MoreImage'
    ];

    public function getImg(){
        return explode(',',$this->attributes['MoreImage']);
    }
}
