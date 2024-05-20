<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPhamModel extends Model
{
    use HasFactory;
    protected $table = 'loaisanpham';
    protected $primaryKey = 'idLoaiSP';
    protected $fillable = [
        'idLoaiSP',
        'tenLoaiSP',
        'mota',
        'Status'
    ];
}
