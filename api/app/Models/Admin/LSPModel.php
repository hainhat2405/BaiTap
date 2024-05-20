<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LSPModel extends Model
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
