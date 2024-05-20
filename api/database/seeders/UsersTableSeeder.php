<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\AdminModel;
use App\Models\Admin\RolesModel;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminModel::truncate();

        $adminRoles = RolesModel::where('name','admin')->firstOrFail();
        $authorRoles = RolesModel::where('name','author')->firstOrFail();
        $userRoles = RolesModel::where('name','user')->firstOrFail();

        $admin = AdminModel::create([
            'name' => 'nhatadmin',
            'email' => 'nhatadmin@gmail.com',
            'password' => md5('123'),
            'phone' => '123',
        ]);
        $author = AdminModel::create([
            'name' => 'nhatadmin',
            'email' => 'nhatauthor@gmail.com',
            'password' => md5('123'),
            'phone' => '123',
        ]);
        $user = AdminModel::create([
            'name' => 'nhatadmin',
            'email' => 'nhatuser@gmail.com',
            'password' => md5('123'),
            'phone' => '123',
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

    }
}
