<?php
/**
 * Created by PhpStorm.
 * User: tonsu
 * Date: 11/4/2015
 * Time: 3:18 PM
 */

use Illuminate\Database\Seeder;
use App\ViewGenerator\ViewGeneratorManager as ViewGenerator;
use Carbon\Carbon;

class RealSeeder extends Seeder {

    public function run()
    {
        // settings
        DB::table('settings')->insert([
           [
               'key' => 'company_name',
               'value' => 'Masterpiece Clinic'
           ],
           [
               'key' => 'company_logo',
               'value' => 'mtpc_logo.png'
           ],
           [
               'key' => 'company_logo_light',
               'value' => 'mtpc_logo_light.png'
           ],
           [
               'key' => 'company_abbr',
               'value' => 'MTPC'
           ],
        ]);

    }
}