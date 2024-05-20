<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCapModel extends Model
{
    protected $table = 'nhacungcap'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'idNhaCungCap'; // Tên cột của khóa chính
    public $timestamps = true; // Nếu bảng chứa cột created_at và updated_at(TRUE) và không (FALSE)

    protected $fillable = [
        'idNhaCungCap',
        'tenNhaCungCap',
        'diaChi',
        'soDienThoai',
        'email',
        'Status'
    ];
}
