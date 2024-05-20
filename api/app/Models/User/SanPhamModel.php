<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamModel extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $primarykey = 'idSanPham';
    protected $fillable = [
        'idSanPham',
        'tenSanPham',
        'moTa',
        'giaBan',
        'soLuong',
        'hinhAnh',
        'idLoaiSP'
    ];
}
