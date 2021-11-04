<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Admin Admin',
            'lname' => 'edrlon',
            'email' => 'admin@admin.com',
            'role' => 'user',
            'number' => '+639560963490',
            'gender' => 'male',
            'city' => 'CDO',
            'street' => 'kauswagan',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
