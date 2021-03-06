<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Admin',
    		'email' => 'admin@admin.com',
    		'email_verified_at' => now(),
    		'password' => bcrypt('12345678'),
    		'admin' => 1,
    		'approved_at' => now(),
    	]);
    }
}
