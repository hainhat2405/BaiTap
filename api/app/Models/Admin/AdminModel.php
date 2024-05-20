<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use database\seeders\DatabaseSeeder;
class AdminModel extends Authenticatable
{
    use HasFactory,Notifiable;
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'name',
        'phone'
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_admin';

    public function roles(){
        return $this->belongsToMany('App\Models\Admin\RolesModel');
    }
    public function getAuthPassword(){
        return $this->password;
    }
    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }
    public function hasRole($roles){
        return null !== $this->roles()->where('name',$roles)->first();
    }
}
