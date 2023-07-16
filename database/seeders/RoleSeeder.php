<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $worker = Role::create(['name' => 'worker']);
        $admin = Role::create(['name' => 'admin']);
        $client = Role::create(['name' => 'client']);

        Permission::create(['name' => 'work.index'])->assignRole($worker);

        Permission::create(['name' => 'work.show'])->syncRoles([$worker, $client]);

        Permission::create(['name' => 'work.create'])->assignRole($client);
        Permission::create(['name' => 'work.edit'])->assignRole($client);
        Permission::create(['name' => 'work.myworks'])->assignRole($client);

        Permission::create(['name' => 'user.index'])->assignRole($admin);
        Permission::create(['name' => 'user.create'])->assignRole($admin);
        Permission::create(['name' => 'user.edit'])->assignRole($admin);
        Permission::create(['name' => 'user.delete'])->assignRole($admin);
    }
}
