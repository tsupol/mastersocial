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

class MyCustomSeeder extends Seeder {

    public function run()
    {
        // -- customers

        $customers = [];
        $max_customer = 40;
        $custBranch = [];
        for($i = 1; $i <= $max_customer; $i++){
            $date = Carbon::now()->addDays(-rand(15, 356*3));
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
                'created_at' => $date,
                'updated_at' => $date
            );

            $custBranch[] = [
                'id' => $i,
                'customer_id' => $i,
                'branch_id' => 1,
                'hn' => 5500000+$i,
                'created_at' => $date,
                'updated_at' => $date
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

        // -- branches

        \DB::table('branches')->delete();
        \DB::table('branches')->insert(array (
            0 =>
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
            1 =>
                array (
                    'id' => 2,
                    'name' => 'สาขาสยามสแควร์ ตึก 2',
                    'br_email' => 'siam2@mail.com',
                    'br_phone' => '020000000',
                    'br_fax' => '010000000',
                    'br_address' => '2/2',
                    'br_distinct' => 194,
                    'br_amphur' => 33,
                    'br_province' => 1,
                    'br_country_id' => 218,
                    'br_zipcode' => 10110,
                    'br_desc' => '',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'สาขาเชียงใหม่',
                    'br_email' => 'chiangmai@mail.com',
                    'br_phone' => '020000000',
                    'br_fax' => '010000000',
                    'br_address' => '3/3',
                    'br_distinct' => 5138,
                    'br_amphur' => 569,
                    'br_province' => 38,
                    'br_country_id' => 218,
                    'br_zipcode' => 32767,
                    'br_desc' => '',
                ),
        ));

        // -- users

        if(false) {
            \DB::table('users')->delete();
            \DB::table('users')->insert(array(
                0 =>
                    array(
                        'id' => 1,
                        'name' => 'admin',
                        'email' => 'admin@pos.com',
                        'password' => '$2y$10$jKx1j9r.Ma5XyIxoaK2FXOiaAYzkK7klmZ6CSSqyNmLk3hFeInWyC',
                        'remember_token' => NULL,
                        'f_name' => 'admin',
                        'l_name' => 'surname',
                        'phone' => '020001111',
                        'phone_2' => '020001112',
                        'group_id' => 1,
                        'branch_id' => 1,
                        'role_id' => 1,
                        'deleted_at' => Null,
                        'deleted_by' => '2015-10-29 05:52:06',
                        'created_by' => 0,
                        'updated_by' => 0,
                        'created_at' => '2015-10-29 05:52:06',
                        'updated_at' => '2015-10-29 05:52:06',
                    ),
                1 =>
                    array(
                        'id' => 2,
                        'name' => 'pok',
                        'email' => 'pok@pos.com',
                        'password' => '$2y$10$EMWqSykltI4FIg/mNCgUTOEUgIW5/dSWEml2D9.2hUAHZyhV7V9NG',
                        'remember_token' => NULL,
                        'f_name' => 'pok',
                        'l_name' => 'surname',
                        'phone' => '020001111',
                        'phone_2' => '020001112',
                        'role_id' => 2,
                        'group_id' => 5,
                        'branch_id' => 1,
                        'deleted_at' => Null,
                        'deleted_by' => '2015-10-29 05:52:06',
                        'created_by' => 0,
                        'updated_by' => 0,
                        'created_at' => '2015-10-29 05:52:06',
                        'updated_at' => '2015-10-29 05:52:06',
                    ),
                2 =>
                    array(
                        'id' => 3,
                        'name' => 'admin2',
                        'email' => 'admin2@pos.com',
                        'password' => '$2y$10$JZDnIGijO8QQtaD9mYAvX.PtPAiW.JkdNblLyJLzP00BCbSXryhN.',
                        'remember_token' => NULL,
                        'f_name' => 'admin2',
                        'l_name' => 'surname',
                        'phone' => '020001111',
                        'phone_2' => '020001112',
                        'role_id' => 1,
                        'group_id' => 5,
                        'branch_id' => 1,
                        'deleted_at' => Null,
                        'deleted_by' => '2015-10-29 05:52:06',
                        'created_by' => 0,
                        'updated_by' => 0,
                        'created_at' => '2015-10-29 05:52:06',
                        'updated_at' => '2015-10-29 05:52:06',
                    )
            ));
        }

        // -- Products

        $products = [];
        $max_product = 10;
        for($i = 1; $i <= $max_product; $i++){
            $price = rand(5, 15)*10;
            $products[] = [
                'id' => $i,
                'code' => 'PD'. str_pad($i,5, '0', STR_PAD_LEFT) ,
                'name' => 'product_'.$i,
                'cost' => $price-40,
                'price' => $price,
                'price_vip' => $price-20,
                'price_marketing' => $price-10,
                'price_employee' => $price-15,
                'price_member' => $price-5,
                'use_type' => 1,
                'created_at' => '2015-10-21 10:15:35',
                'updated_at' => '2015-10-28 11:58:28',
            ];
        }

        $items = [];
        $max_item = 10;
        for($i = 1; $i <= $max_item; $i++){
            $price = rand(1, 20)*5;
            $items[] = [
                'id' => $i,
                'name' => 'item_'.$i,
                'code' =>  'IT'. str_pad($i,5, '0', STR_PAD_LEFT) ,
                'cost' => $price,
                'created_at' => '2015-10-21 10:15:35',
                'updated_at' => '2015-10-28 11:58:28',
            ];
        }

        // -- Procedure

        $procedures = [];
        $procedure_product = [];
        $procedure_item = [];
        $pid = 1;
        $max_procedure = 10;
        for($i = 1; $i <= $max_procedure; $i++){
            $price = rand(5, 15)*100;
            $procedures[] = [
                'id' => $i,
                'code' => 'PC'. str_pad($i,5, '0', STR_PAD_LEFT) ,
                'name' => 'procedure_'.$i,
                'cost' => $price-40,
                'price' => $price,
                'price_vip' => $price-200,
                'price_marketing' => $price-100,
                'price_employee' => $price-150,
                'price_member' => $price-50,
                'created_at' => '2015-10-21 10:15:35',
                'updated_at' => '2015-10-28 11:58:28',
            ];

            $product_cnt = rand(1, 3);
            for($j = 0; $j < $product_cnt; $j++) {
                $procedure_product[] = [
                    'id' => $pid++,
                    'procedure_id' => $i,
                    'product_id' => rand(1, $max_product),
                    'amount' => rand(1, 5),
                    'created_at' => '2015-10-21 10:15:35',
                    'updated_at' => '2015-10-28 11:58:28',
                ];
            }

            $item_cnt = rand(1, 3);
            for($j = 0; $j < $item_cnt; $j++) {
                $procedure_item[] = [
                    'id' => $pid++,
                    'procedure_id' => $i,
                    'item_id' => rand(1, $max_item),
                    'amount' => rand(1, 5),
                    'created_at' => '2015-10-21 10:15:35',
                    'updated_at' => '2015-10-28 11:58:28',
                ];
            }
        }

        $max_pType = 5;
        $pack_types = [];
        for($i = 1; $i <= $max_pType; $i++){
            $pack_types[] = [
                'id' => $i,
                'name' => 'package_type_'.$i,
                'created_at' => '2015-10-21 10:15:35',
                'updated_at' => '2015-10-28 11:58:28',
            ];
        }
        // -- Package

        $packs = [];
        $pack_proc = [];
        $pack_prod = [];
        $max_pack = 10;
        $pid = 1;
        for($i = 1; $i <= $max_pack; $i++){
            $price = rand(5, 15)*100;
//             $isBuffet = true; // All is buffet
//            $isBuffet = false; // None is buffet
            $isBuffet = (rand(1, 5) == 1);
            $packs[] = [
                'id' => $i,
                'code' => 'PK'. str_pad($i,5, '0', STR_PAD_LEFT) ,
                'name' => ($isBuffet) ? 'buffet_'.$i  : 'package_'.$i,
                'cost' => $price-40,
                'price' => $price,
                'price_vip' => $price-200,
                'price_marketing' => $price-100,
                'price_employee' => $price-150,
                'price_member' => $price-50,
                'buffet_points' => ($isBuffet) ? rand(1, 5) * 10 : 0,
                'is_buffet' => $isBuffet,
                'type_id' => rand(1, $max_pType),
                'created_at' => '2015-10-21 10:15:35',
                'updated_at' => '2015-10-28 11:58:28',
            ];

            if($isBuffet) $cnt = rand(2, 4);
            else $cnt = rand(1, 3);

            $existing = [];
            for($j = 0; $j < $cnt; $j++) {

                // no duplicate procedure;
                do {
                    $proId = rand(1, $max_procedure);
                } while (in_array($proId, $existing));
                $existing[] = $proId;

                $pack_proc[] = [
                    'id' => $pid++,
                    'package_id' => $i,
                    'procedure_id' => $proId,
                    'amount' => ($isBuffet) ? 1 : rand(1, 5),
                    'points' => ($isBuffet) ? rand(1, 5) : 0,
                    'created_at' => '2015-10-21 10:15:35',
                    'updated_at' => '2015-10-28 11:58:28',
                ];
            }

            $cnt = rand(1, 3);
            for($j = 0; $j < $cnt; $j++) {
                $pack_prod[] = [
                    'id' => $pid++,
                    'package_id' => $i,
                    'product_id' => rand(1, $max_product),
                    'amount' => ($isBuffet) ? 1 : rand(1, 5),
                    'created_at' => '2015-10-21 10:15:35',
                    'updated_at' => '2015-10-28 11:58:28',
                ];
            }
        }


        \DB::table('products')->delete();
        \DB::table('products')->insert($products);
        \DB::table('items')->delete();
        \DB::table('items')->insert($items);
        \DB::table('procedures')->delete();
        \DB::table('procedures')->insert($procedures);
        \DB::table('procedure_product')->delete();
        \DB::table('procedure_product')->insert($procedure_product);
        \DB::table('procedure_item')->delete();
        \DB::table('procedure_item')->insert($procedure_item);

        \DB::table('package_types')->delete();
        \DB::table('package_types')->insert($pack_types);
        \DB::table('packages')->delete();
        \DB::table('packages')->insert($packs);
        \DB::table('package_procedure')->delete();
        \DB::table('package_procedure')->insert($pack_proc);
        \DB::table('package_product')->delete();
        \DB::table('package_product')->insert($pack_prod);




        // Purchases

        $ctype = ['price','price_vip','price_marketing','price_employee', 'price_member'];

        $purchase_pk = [];
        $purchase_pd = [];
        $purchases = [];
        $receipts = [];
        $pcId = 1;
        foreach($custBranch as $cb) {

            $hn = $cb['hn'];
            $cpc = rand(1,5);
//            $date = Carbon::now()->addYear(-3);
            while($cpc > 0) {
                $pcPrice = 0;
                $pcDiscount = 0;
                $c = rand(1, 3);
                $date = Carbon::now()->addDays(-rand(15, 356*3))->addMinutes(rand(0,1440));
                while($c > 0) {
                    $p = $packs[rand(1, $max_pack-1)];
                    $full_price = $p['price'];
                    $price = $p[$ctype[rand(0, count($ctype)-1)]];
                    $pcPrice += $price;
                    $pcDiscount += $full_price-$price;
                    $purchase_pk[] = [
                        'purchase_id' => $pcId,
                        'package_id' => $p['id'],
                        'price' => $price,
                        'discount' => $full_price-$price,
                        'hn' => $hn,
                        'customer_id' => $cb['customer_id'],
                        'amount' => rand(1, 3),
                        'created_at' => $date,
                        'updated_at' => $date,
                    ];
                    $c--;
                }

                $c = rand(-1, 2);
                while($c > 0) {
                    $p = $products[rand(1, $max_product-1)];
                    $full_price = $p['price'];
                    $price = $p[$ctype[rand(0, count($ctype)-1)]];
                    $pcPrice += $price;
                    $pcDiscount += $full_price-$price;
                    $purchase_pd[] = [
                        'purchase_id' => $pcId,
                        'product_id' => $p['id'],
                        'price' => $price,
                        'discount' => $full_price-$price,
                        'hn' => $hn,
                        'customer_id' => $cb['customer_id'],
                        'amount' => rand(1, 3),
                        'created_at' => $date,
                        'updated_at' => $date,
                    ];
                    $c--;
                }

                // -- receipt
                $status = 0;
                // if(rand(1, 10) > 2) {
                if(true) {
                    $pay1 = ceil($pcPrice * 0.1);
                    $receipts[] = [
                        'code' => 581200001+count($receipts),
                        'cash' => $pay1,
                        'credit' => '0.00',
                        'transfer' => '0.00',
                        'total' => $pay1,
                        'action_type' => 2,
                        'purchase_id' => $pcId,
                        'status' => 0,
                        'created_at' => $date,
                        'updated_at' => $date,
                    ];
                    if(rand(1, 10) > 5) {
                        $date2 = $date;
                        $date2->addDay(rand(1,15));
                        $receipts[] = [
                            'code' => 581200001+count($receipts),
                            'cash' => $pcPrice - $pay1,
                            'credit' => '0.00',
                            'transfer' => '0.00',
                            'total' => $pcPrice - $pay1,
                            'action_type' => 3,
                            'purchase_id' => $pcId,
                            'status' => 0,
                            'created_at' => $date2,
                            'updated_at' => $date2,
                        ];
                        $status = 1;
                    }
                }

                $sale1 = rand(0,2);

                if(rand(1,10) > 5) {
                    $sale2 = 0;
                } else {
                    $sale2 = ($sale1+1) % 3;
                    $sale2 += 6;
                }
                $sale1 += 6;

                $purchases[] = [
                    'id' => $pcId,
                    'price' => $pcPrice,
                    'discount' => $pcDiscount,
                    'hn' => $hn,
                    'customer_id' => $cb['customer_id'],
                    'sale2_id' => $sale2,
                    'sale_id' => $sale1,
                    'doctor_id' => rand(9,10),
                    'status' => $status,
                    'created_at' => $date,
                    'updated_at' => $date,
                ];

                $pcId++;
                $cpc--;
            }
        }

        $rowsPerChunk = 100;

        \DB::table('customers')->delete();
        \DB::table('customer_branch')->delete();
        \DB::table('purchases')->delete();
        \DB::table('purchase_package')->delete();
        \DB::table('purchase_product')->delete();
        \DB::table('receipts')->delete();

        $chunks = array_chunk($customers, $rowsPerChunk);
        foreach($chunks as $chunk) {
            DB::table('customers')->insert($chunk);
        }
        $chunks = array_chunk($custBranch, $rowsPerChunk);
        foreach($chunks as $chunk) {
            DB::table('customer_branch')->insert($chunk);
        }
        $chunks = array_chunk($purchases, $rowsPerChunk);
        foreach($chunks as $chunk) {
            DB::table('purchases')->insert($chunk);
        }
        $chunks = array_chunk($purchase_pk, $rowsPerChunk);
        foreach($chunks as $chunk) {
            DB::table('purchase_package')->insert($chunk);
        }
        $chunks = array_chunk($purchase_pd, $rowsPerChunk);
        foreach($chunks as $chunk) {
            DB::table('purchase_product')->insert($chunk);
        }
        $chunks = array_chunk($receipts, $rowsPerChunk);
        foreach($chunks as $chunk) {
            DB::table('receipts')->insert($chunk);
        }

        // *** auto billing

        $cPurchases = DB::table('purchases')->where('status', '=', 1)->get();
        $bills = [];
        $bill_pc = [];
        $bill_pd = [];
        $bill_it = [];
        $bid = 1;
        foreach($cPurchases as $cPurchase) {
            $pcid = $cPurchase->id;
            $cid = $cPurchase->customer_id;
            $hn = $cPurchase->hn;
            $bills[] = [
                'id' => $bid,
                'code' => 590100000+$bid,
                'purchase_id' => 0,
                'customer_id' => $cid,
                'hn' => $hn,
                'branch_id' => 1,
                'show_report' => 0,
                'created_at' => '2016-01-08 15:32:15',
                'updated_at' => '2016-01-08 15:32:15',
                'created_by' => 1,
                'updated_by' => 0,
                'deleted_by' => 0,
                'deleted_at' => NULL,
            ];
            $cPackages = DB::table('purchase_package')->where('purchase_id', '=', $pcid)->get();

            foreach($cPackages as $cPackage) {
                $packId = $cPackage->package_id;
//                Log::info('***'.$pcid.' - '.$packId);
                $cProcedures = DB::table('package_procedure')->where('package_id', '=', $packId)->get();
                foreach($cProcedures as $cProcedure) {
                    $procId = $cProcedure->procedure_id;
                    $bill_pc[] = [
                        'id' => count($bill_pc)+1,
                        'bill_id' => $bid,
                        'package_id' => $packId,
                        'purchase_id' => $pcid,
                        'procedure_id' => $procId,
                        'branch_id' => 1,
                        'points' => 0,
                        'amount' => $cProcedure->amount*$cPackage->amount,
                        'show_report' => 0,
                        'created_at' => '2016-01-08 15:32:15',
                        'updated_at' => '2016-01-08 15:32:15',
                        'created_by' => 1,
                        'updated_by' => 0,
                        'deleted_by' => 0,
                        'deleted_at' => NULL,
                    ];
                }
            }
            $bid++;
        }

        DB::table('bills')->delete();
        DB::table('bills')->insert($bills);
        DB::table('bill_procedure')->delete();
        DB::table('bill_procedure')->insert($bill_pc);

// -- Department

        $department = [];
        $depart_proc = [];
        $max_department = 10;
        $dpid = 1;
        for($i = 1; $i <= $max_department; $i++){
            $department[] = [
                'id' => $i,
                'name' => 'department_'.$i ,
                'created_at' => '2015-10-21 10:15:35',
                'updated_at' => '2015-10-28 11:58:28',
            ];
            $cnt = rand(1, 3);
            for($j = 0; $j < $cnt; $j++) {
                $depart_proc[] = [
                    'id' => $dpid++,
                    'department_id' => $i,
                    'name' => 'proc_cat_'.$dpid ,
                    'created_at' => '2015-10-21 10:15:35',
                    'updated_at' => '2015-10-28 11:58:28',
                ];
            }
        }


        \DB::table('departments')->delete();
        \DB::table('departments')->insert($department);
        \DB::table('procedure_cats')->delete();
        \DB::table('procedure_cats')->insert($depart_proc);


        $datagatering = [];
        $max_datagatering = 100;

        for($i = 1; $i <= $max_datagatering; $i++){
            $date = Carbon::now()->addDays(-rand(15, 356*1))->addMinutes(rand(0,1440));
            $datagatering[] = [
                'id' => $i,
                'customer_id' => rand(0, $max_customer) ,
                'department_id' => rand(1, $max_department) ,
                'procedure_cat_id' => rand(1, $dpid)  ,
                'doctor_id' => rand(9, 10)  ,
                'channel' => rand(1, 5)  ,
                'type' => rand(1, 4)  ,
                'notes' => 'notes_'.$i  ,
                'name' => 'name_'.$i  ,
                'phone' => '02000000'  ,
                'email' => 'test_'.$i.'@gmail.com' ,
                'line' => 'lineId_'.$i  ,
                'facebook' => 'facebook_'.$i  ,
                'created_at' => $date ,
                'updated_at' => $date,
            ];
        }

        \DB::table('report_department')->delete();
        \DB::table('report_department')->insert($datagatering);


        $product_branch = [];
        $max_product_branch = 100;

        for($i = 1; $i <= $max_product_branch; $i++){
            $date = Carbon::now()->addDays(-rand(15, 356*3))->addMinutes(rand(0,1440));
            $product_branch[] = [
                'id' => $i,
                'product_id' => rand(1, $max_product) ,
                'branch_id' => rand(1, 3) ,
                'amount' => rand(-100, 100)  ,
                'created_at' => $date
            ];
        }

        \DB::table('product_branch')->delete();
        \DB::table('product_branch')->insert($product_branch);

        $item_branch = [];
        $max_item_branch = 100;

        for($i = 1; $i <= $max_item_branch; $i++){
            $date = Carbon::now()->addDays(-rand(15, 356*3))->addMinutes(rand(0,1440));
            $item_branch[] = [
                'id' => $i,
                'product_id' => rand(1, $max_item) ,
                'branch_id' => rand(1, 3) ,
                'amount' => rand(-100, 100)  ,
                'created_at' => $date
            ];
        }

        \DB::table('product_branch')->delete();
        \DB::table('product_branch')->insert($item_branch);

        // -- customers x branches

//        \DB::table('customers')->insert($customers);
//        \DB::table('customer_branch')->insert($custBranch);
//        \DB::table('purchases')->insert($purchases);
//        \DB::table('purchase_package')->insert($purchase_pk);
//        \DB::table('purchase_product')->insert($purchase_pd);
//        \DB::table('receipts')->insert($receipts);

        return;

        // Bill
//        for($i = 1; $i <= $max_customer; $i++) {
//            $PPK = \App\Models\Bill::getPackages($i);
//        }

    }
}