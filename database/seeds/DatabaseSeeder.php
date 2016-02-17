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
        if (true) {
            $this->call('UsersTableSeeder');
            $this->call('UserPageTableSeeder');
            $this->call('RealSeeder');
            $this->call('FacebookPostTableSeeder');
            $this->call('CategoryTableSeeder');
            $this->call('FacebookCustomerTableSeeder');
            $this->call('FacebookChatTableSeeder');
//            $this->call('FacebookChatCloseTableSeeder');
            $this->call('TagsTableSeeder');
            $this->call('SessionTableSeeder');
            $this->call('SessionTagTableSeeder');
        } else {
            $this->call('UsersTableSeeder');
            $this->call('UserPageTableSeeder');
            $this->call('RealSeeder');
        }
    }
}
