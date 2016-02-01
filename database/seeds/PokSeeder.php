<?php
/**
 * Created by PhpStorm.
 * User: tonsu
 * Date: 11/4/2015
 * Time: 3:18 PM
 */

use Illuminate\Database\Seeder;
use App\ViewGenerator\ViewGeneratorManager as ViewGenerator;

class PokSeeder extends Seeder {

    public function run()
    {


        \DB::table('group_auth')->delete();
        \DB::table('group_auth')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'auth_id' => 1,
                    'group_id' => 3 ,
                ),
            1 =>
                array (
                    'id' => 2,
                    'auth_id' => 2,
                    'group_id' => 7,
                ),
            2 =>
                array (
                    'id' => 3,
                    'auth_id' => 2,
                    'group_id' => 8,
                ),

        ));


    }
}