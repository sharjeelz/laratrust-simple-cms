<?php

use Illuminate\Database\Seeder;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \App\Role::create([
            'name' => 'Owner',
            'display_name' => 'Owner',
            'description' => 'Owner of this System',
            'type'=>-1
        ]);

        $permission = \App\Permission::create([
            'name' => 'root',
            'display_name' => 'Root Access',
            'description' => 'Root',
            'type'=>-1

        ]);

        $user=DB::table('users')->insertGetId([
            'name' => 'Super Admin',
            'email' =>'admin@admin.com',
            'password' => bcrypt('123456'),
            'pic'=>'avatars/noimage.png',
            'created_at'=>'2018-12-23 16:29:15',
            'updated_at'=>'2018-12-23 16:29:15'

        ]);

        $user_=App\User::find($user);

        $user_->attachRole($role);
        $user_->attachPermission($permission);
    }
}
