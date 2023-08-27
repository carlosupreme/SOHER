<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Review;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        User::factory(10)->create()->each->syncRoles(Role::pluck('id')->toArray());
        Work::factory(5)->create();
        Review::factory(100)->create();
    }
}
