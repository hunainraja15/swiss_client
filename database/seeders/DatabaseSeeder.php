<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $data['password'] = Hash::make('12345678');
 
         $user = new User();
         $user->fname = 'fadmin';
         $user->lname = 'ladmin';
         $user->company_name = 'admin company_name';
         $user->role = 'admin';
         $user->status = 'active';
         $user->email = 'admin@admin.com';
         $user->phone_number = '0000000';
         $user->postal_address = 'admin address';
         $user->password = $data['password'];
         $user->save();
    }
}
