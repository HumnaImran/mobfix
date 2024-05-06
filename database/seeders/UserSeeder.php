<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         // create roles and assign created permissions
         $role = Role::create(['name' => 'admin']);
        //  $role->givePermissionTo([Permission::all()]);

         $role = Role::create(['name' => 'user']);

         $role = Role::create(['name' => 'vendor']);
        //  $role->givePermissionTo(Permission::all());

         $user1 = new User;
         $user1->name = 'Admin';
         $user1->email = 'admin@gmail.com';
         $user1->email_verified_at = '2023-02-28 15:12:23';
         $user1->password = Hash::make('admin123');
         $user1->save();
         $user1->assignRole('admin');

         $user3 = new User;
         $user3->name = 'vendor';
         $user3->email = 'vendor@gmail.com';
         $user3->email_verified_at = '2023-02-28 15:12:23';
         $user3->password = Hash::make('vendor123');
         $user3->save();
         $user3->assignRole('vendor');

         $user2 = new User;
         $user2->name = 'user';
         $user2->email = 'user@gmail.com';
         $user2->email_verified_at = '2023-02-28 15:12:23';
         $user2->password = Hash::make('user123');
         $user2->save();
         $user2->assignRole('user');
    }
}
