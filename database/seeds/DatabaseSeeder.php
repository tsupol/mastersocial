<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        if(true) {
            $this->call('UsersTableSeeder');
            $this->call('UserPageTableSeeder');
            $this->call('RealSeeder');
        } else {
            $this->call('UsersTableSeeder');
            $this->call('UserPageTableSeeder');
            $this->call('RealSeeder');
        }
    }
}
