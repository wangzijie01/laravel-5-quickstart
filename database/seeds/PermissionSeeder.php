<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //添加角色
        $role = \Spatie\Permission\Models\Role::create(['name' => 'administrator']);
        //添加权限
        \Spatie\Permission\Models\Permission::create(['name' => 'manage-user']);
        //给角色授权
        $role->givePermissionTo('manage-user');
        //将用户设置为管理员
        $user = \App\Models\User::find(1);
        $user->assignRole('administrator');
    }
}
