<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
//use Database\Seeders\DB;
use Illuminate\Support\Facades\DB;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $managerRole = Role::where('name','manager')->first();
        $staffRole = Role::where('name','staff')->first();

        $admin = User::create([

            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'phone' => '0909909090',
            'address' => 'badagry',
            'position' => 'C.E.O',
            'department' => 'ADMIN',
            'password' => Hash::make('admin1234'),
            

        ]);
        $manager = User::create([

            'name' => '',
            'email' => 'manager@gmail.com',
            'phone' => '0909909009009',
            'address' => 'badagry',
            'position' => 'Manager',
            'department' => 'ADMIN',
            'password' => Hash::make('manager1234'),
            

        ]);
        $staff = User::create([

            'name' => 'Staff User',
            'email' => 'staff@gmail.com',
            'phone' => '0901234599',
            'address' => 'badagry',
            'position' => 'developer',
            'department' => 'IT',
            'password' => Hash::make('staff1234 '),
            

        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $staff->roles()->attach($staffRole);
    }
}
