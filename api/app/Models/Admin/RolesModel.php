<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use database\seeders\DatabaseSeeder;

class RolesModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'id_roles';
    protected $table = 'tbl_roles';

    public function admin(){
        return $this->belongsToMany('App\Models\Admin\AdminModel');
    }
}
