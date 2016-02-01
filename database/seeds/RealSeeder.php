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

        \DB::table('groups')->delete();
        \DB::table('groups')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'ผู้ดูแลระบบ',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'ผู้บริหาร',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'แพทย์',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'ผู้ช่วยหัตถการ',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'พนักงานทั่วไป',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'ธุรการ',
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'พนักงานขาย',
                ),
        ));

        \DB::table('customer_levels')->delete();
        \DB::table('customer_levels')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'VIP',
                    'created_at' => '2015-10-27 13:21:24',
                    'updated_at' => '2015-10-27 13:21:24',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Marketing',
                    'created_at' => '2015-10-27 13:21:24',
                    'updated_at' => '2015-10-27 13:21:24',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Employee',
                    'created_at' => '2015-10-27 13:21:24',
                    'updated_at' => '2015-10-27 13:21:24',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Member',
                    'created_at' => '2015-10-27 13:21:24',
                    'updated_at' => '2015-10-27 13:21:24',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Normal',
                    'created_at' => '2015-10-27 13:21:24',
                    'updated_at' => '2015-10-27 13:21:24',
                ),
        ));

        \DB::table('know_reasons')->delete();
        \DB::table('know_reasons')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'reason' => 'Facebook',
                ),
            1 =>
                array (
                    'id' => 2,
                    'reason' => 'Website',
                ),
            2 =>
                array (
                    'id' => 3,
                    'reason' => 'Magazine',
                ),
            3 =>
                array (
                    'id' => 4,
                    'reason' => 'Instragram',
                ),
            4 =>
                array (
                    'id' => 5,
                    'reason' => 'เพื่อนแนะนำ',
                ),
            5 =>
                array (
                    'id' => 6,
                    'reason' => 'อื่นๆ',
                ),
        ));

        // -- customers

        $customers = [];
        $max_customer = 1000;
        $custBranch = [];
        for($i = 1; $i <= $max_customer; $i++){
            $customers[] = array(
                'id' => $i,
                'f_name' => 'เทส'.$i,
                'l_name' => 'เทส',
                'n_name' => 'เทส',
                'citizen_id' => '1-0000-00000-00-'.($i%10),
                'birth_date' => '1985-12-16 00:00:00',
                'address' => '1/'.$i,
                'address_2' => 'ซอยเทพสถิต'.$i,

//                'district_id' => 715,
//                'amphur_id' => 97,
//                'province_id' => 7,
//                'country_id' => 218,
//                'zipcode_id' => 15000,

                'district' => 'ลาดพร้าว',
                'amphur' => 'ลาดพร้าว',
                'province_id' => 1 ,
                'province' => 'กรุงเทพ',
                'country_id' => 218,
                'zipcode' => 10230,
                'phone' => '0877777777',
                'phone_2' => '022222222',
                'email' => "tester_{$i}@gmail.com",
                'gender' => 1,
                'marriage' => 1,
                'notes' => 'note from'.$i,
                'contact_name' => 'ต้น',
                'contact_tel' => '020000000',
                'customer_level_id' => rand(1,5),
                'congenital_disease' => 'N5N'.($i%10),
                'allergy' => 'ยาพิษสูตร'.$i,
                'medication' => 'เบตาดีน',
                'know_reason_id' => 2,
                'created_by' => 0,
                'updated_by' => 0,
                'created_at' => '2015-10-27 13:21:24',
                'updated_at' => '2015-10-27 13:53:38'
            );
            $custBranch[] = [
                'id' => $i,
                'customer_id' => $i,
                'branch_id' => 1,
                'hn' => 5500000+$i,
                'created_at' => '2015-10-27 13:21:24',
                'updated_at' => '2015-10-27 13:53:38'
            ];
        }


        // -- roles

        \DB::table('roles')->delete();
        \DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2015-10-21 10:15:35',
                'updated_at' => '2015-10-28 11:58:28',
            ],
            [
                'id' => 2,
                'name' => 'sale',
                'created_at' => '2015-10-21 10:57:23',
                'updated_at' => '2015-10-27 10:32:28',
            ],
            [
                'id' => 3,
                'name' => 'manager',
                'created_at' => '2015-10-27 10:32:16',
                'updated_at' => '2015-10-27 10:32:16',
            ],
            [
                'id' => 4,
                'name' => 'read_only',
                'created_at' => '2015-10-21 10:57:23',
                'updated_at' => '2015-10-27 10:32:28',
            ],
            [
                'id' => 5,
                'name' => 'create_read_only',
                'created_at' => '2015-10-21 10:57:23',
                'updated_at' => '2015-10-27 10:32:28',
            ],
        ]);

        // -- permissions

        $permissions = [];
        $i = 1;
        $reports = ['sales', 'services', 'customers', 'branches','datagatering'];
        foreach(ViewGenerator::$settings as $key=>$val) {
            if($key == 'default') $key = 'all';
            else if($key == 'reports'){
                foreach($reports as $r) {
                    $permissions[] = [
                        'id' => $i++,
                        'name' => $key.".{$r}",
                    ];
                }
                continue;
            }
            $permissions[] = [
                'id' => $i++,
                'name' => $key.".view",
            ];
            $permissions[] = [
                'id' => $i++,
                'name' => $key.".create",
            ];
            $permissions[] = [
                'id' => $i++,
                'name' => $key.".edit",
            ];
        }
        $permissions[] = [
            'id' => sizeof($permissions)+1 ,
            'name' => "products.add",
        ];
        $permissions[] = [
            'id' => sizeof($permissions)+1 ,
            'name' => "products.branch",
        ];
        $permissions[] = [
            'id' => sizeof($permissions)+1 ,
            'name' => "items.add",
        ];
        $permissions[] = [
            'id' => sizeof($permissions)+1 ,
            'name' => "items.branch",
        ];
        \DB::table('permissions')->delete();
        \DB::table('permissions')->insert($permissions);

        // -- roles * permissions

        $permRole = [];
        $id = 1;
        for ($i = 1; $i <= count($permissions); $i++) {
            $pName = $permissions[$i-1]['name'];
            $permRole[] = [
                'id' => $id++,
                'role_id' => 1,
                'permission_id' => $i,
            ];
            if(!preg_match("/^all/", $pName)) {
                if (preg_match("/view$/", $pName)) {
                    $permRole[] = [
                        'id' => $id++,
                        'role_id' => 4,
                        'permission_id' => $i,
                    ];
                    $permRole[] = [
                        'id' => $id++,
                        'role_id' => 5,
                        'permission_id' => $i,
                    ];
                }
                if (preg_match("/create$/", $pName)) {
                    $permRole[] = [
                        'id' => $id++,
                        'role_id' => 5,
                        'permission_id' => $i,
                    ];
                }
                if (preg_match("/^(purchases|users)/", $pName)) {
                    $permRole[] = [
                        'id' => $id++,
                        'role_id' => 2,
                        'permission_id' => $i,
                    ];
                }
            }
        }
        \DB::table('perm_role')->delete();
        \DB::table('perm_role')->insert($permRole);

        // -- branches

        \DB::table('branches')->delete();
        \DB::table('branches')->insert([
                array (
                    'id' => 1,
                    'name' => 'สาขาสยามสแควร์',
                    'br_email' => 'info@masterpiececlinic.com',
                    'br_phone' => '026580531',
                    'br_fax' => '026580503',
                    'br_address' => '199/6,201 ถ.พระราม1',
                    'br_distinct' => 'แขวงปทุมวัน',
                    'br_amphur' => 'เขตปทุมวัน',
                    'br_province' => 'กรุงเทพ',
                    'br_country_id' => 218,
                    'br_zipcode' => 10330,
                    'br_desc' => 'สาขาแรก',
                ),
            ]
        );

        // -- users

        if(true) {
            \DB::table('users')->delete();
            \DB::table('users')->insert([
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@pos.com',
                'f_name' => 'admin',
                'l_name' => 'surname',
                'phone' => '020001111',
                'phone_2' => '020001112',
                'password' => '$2y$10$jKx1j9r.Ma5XyIxoaK2FXOiaAYzkK7klmZ6CSSqyNmLk3hFeInWyC',
                'role_id' => 1,
                'group_id' => 1,
                'branch_id' => 1,
                'lang' => 'th',
                'remember_token' => 'ASoO1rdmzZ9IdRtbQx29frtAqKUfYD3YofxUu1ADJQsUJUGjYhSoveZ2CaY8',
                'created_at' => '2015-10-29 05:52:06',
                'updated_at' => '2015-12-03 11:41:12',
                'created_by' => 0,
                'updated_by' => 0,
                'deleted_by' => 2015,
                'deleted_at' => NULL,
            ]);
        }
    }
}