<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Ali Jassem',
            'email' => 'admin@admin',
            'status'=> 'active',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
            'natoinality_id' => null,
            'type' => 'admin',
        ]);

        $adminRole = Role::create(['name' => 'Owner']);
        $permissions = Permission::pluck('id')->all();
        $adminRole->syncPermissions($permissions);
        $user->assignRole($adminRole);

    }
}
