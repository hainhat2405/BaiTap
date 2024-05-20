<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\RolesModel;
use App\Models\Admin\AdminModel;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolesModel::truncate();

        RolesModel::create(['name'=>'admin']);
        RolesModel::create(['name'=>'author']);
        RolesModel::create(['name'=>'user']);
        
    }
}
