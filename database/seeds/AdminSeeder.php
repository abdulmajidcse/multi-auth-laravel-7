<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Admin::create([
            'name'     => 'Admin Name',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
