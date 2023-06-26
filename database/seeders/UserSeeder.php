<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::create(['name' => 'admin']);
        $kasir_role = Role::create(['name' => 'kasir']);
        $customer_role = Role::create(['name' => 'customer']);

        // Admin
        $admin = User::create([
            'user_id' => rand(),
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123),
        ]);
        $admin->assignRole($admin_role);

        // Kasir
        $kasir = User::create([
            'user_id' => rand(),
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make(123),
        ]);
        $kasir->assignRole($kasir_role);

        // Customer
        $customer = User::create([
            'user_id' => rand(),
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make(123),
        ]);
        $customer->assignRole($customer_role);
    }
}
