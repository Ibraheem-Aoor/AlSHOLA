<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'jobs management' ,
            'users management' ,
            'contact management' ,
            'roles management',
        ];

        foreach($permissions as $p)
        {
            Permission::create(['name' => $p]);
        }
    }
}
