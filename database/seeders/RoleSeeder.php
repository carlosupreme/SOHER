<?php

namespace Database\Seeders;

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

        // As a Worker i can view a list of works assigned, view each work, and rate my clients i worked with
        Permission::create(['name' => 'work.assigned'])->assignRole($worker);
        Permission::create(['name' => 'client.rate'])->assignRole($worker);


        //As a Client i can create, edit and show a work, view a list of my created works and rate my workers
        Permission::create(['name' => 'work.create'])->assignRole($client);
        Permission::create(['name' => 'work.edit'])->assignRole($client);
        Permission::create(['name' => 'work.myworks'])->assignRole($client);
        Permission::create(['name' => 'worker.rate'])->assignRole($client);
        Permission::create(['name' => 'work.archive'])->assignRole($client);

        Permission::create(['name' => 'work.show'])->syncRoles([$client, $admin]);
        // As an Admin i can CRUD Users, View a list of all works, assign a worker to a work
        Permission::create(['name' => 'work.index'])->assignRole($admin);
        Permission::create(['name' => 'work.assign'])->assignRole($admin);
        Permission::create(['name' => 'user.index'])->assignRole($admin);
        Permission::create(['name' => 'user.create'])->assignRole($admin);
        Permission::create(['name' => 'user.edit'])->assignRole($admin);
        Permission::create(['name' => 'user.delete'])->assignRole($admin);
    }
}
