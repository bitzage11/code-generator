<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email'     => 'admin@redirect.com',
                'password'  => bcrypt('admin')
            ]
        ]);
    }
}
