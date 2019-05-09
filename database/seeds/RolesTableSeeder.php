<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \Spatie\Permission\Models\Role::create(['guard_name' => 'web', 'name' => 'super-admin']);
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());
        \App\User::find(1)->assignRole('super-admin');
        $role = \Spatie\Permission\Models\Role::create(['guard_name' => 'web', 'name' => 'user']);
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());
        \App\User::find(1)->assignRole('user');

    }
}
