<?php

use Illuminate\Database\Seeder;

class TbProvinceTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_province')->delete();
        
		\DB::table('tb_province')->insert(array (
			0 => 
			array (
				'province_id' => 1,
				'province_code' => '10',
				'province_name' => 'กรุงเทพมหานคร   ',
				'country_id' => 218,
			),
			1 => 
			array (
				'province_id' => 2,
				'province_code' => '11',
				'province_name' => 'สมุทรปราการ   ',
				'country_id' => 218,
			),
			2 => 
			array (
				'province_id' => 3,
				'province_code' => '12',
				'province_name' => 'นนทบุรี   ',
				'country_id' => 218,
			),
			3 => 
			array (
				'province_id' => 4,
				'province_code' => '13',
				'province_name' => 'ปทุมธานี   ',
				'country_id' => 218,
			),
			4 => 
			array (
				'province_id' => 5,
				'province_code' => '14',
				'province_name' => 'พระนครศรีอยุธยา   ',
				'country_id' => 218,
			),
			5 => 
			array (
				'province_id' => 6,
				'province_code' => '15',
				'province_name' => 'อ่างทอง   ',
				'country_id' => 218,
			),
			6 => 
			array (
				'province_id' => 7,
				'province_code' => '16',
				'province_name' => 'ลพบุรี   ',
				'country_id' => 218,
			),
			7 => 
			array (
				'province_id' => 8,
				'province_code' => '17',
				'province_name' => 'สิงห์บุรี   ',
				'country_id' => 218,
			),
			8 => 
			array (
				'province_id' => 9,
				'province_code' => '18',
				'province_name' => 'ชัยนาท   ',
				'country_id' => 218,
			),
			9 => 
			array (
				'province_id' => 10,
				'province_code' => '19',
				'province_name' => 'สระบุรี',
				'country_id' => 218,
			),
			10 => 
			array (
				'province_id' => 11,
				'province_code' => '20',
				'province_name' => 'ชลบุรี   ',
				'country_id' => 218,
			),
			11 => 
			array (
				'province_id' => 12,
				'province_code' => '21',
				'province_name' => 'ระยอง   ',
				'country_id' => 218,
			),
			12 => 
			array (
				'province_id' => 13,
				'province_code' => '22',
				'province_name' => 'จันทบุรี   ',
				'country_id' => 218,
			),
			13 => 
			array (
				'province_id' => 14,
				'province_code' => '23',
				'province_name' => 'ตราด   ',
				'country_id' => 218,
			),
			14 => 
			array (
				'province_id' => 15,
				'province_code' => '24',
				'province_name' => 'ฉะเชิงเทรา   ',
				'country_id' => 218,
			),
			15 => 
			array (
				'province_id' => 16,
				'province_code' => '25',
				'province_name' => 'ปราจีนบุรี   ',
				'country_id' => 218,
			),
			16 => 
			array (
				'province_id' => 17,
				'province_code' => '26',
				'province_name' => 'นครนายก   ',
				'country_id' => 218,
			),
			17 => 
			array (
				'province_id' => 18,
				'province_code' => '27',
				'province_name' => 'สระแก้ว   ',
				'country_id' => 218,
			),
			18 => 
			array (
				'province_id' => 19,
				'province_code' => '30',
				'province_name' => 'นครราชสีมา   ',
				'country_id' => 218,
			),
			19 => 
			array (
				'province_id' => 20,
				'province_code' => '31',
				'province_name' => 'บุรีรัมย์   ',
				'country_id' => 218,
			),
			20 => 
			array (
				'province_id' => 21,
				'province_code' => '32',
				'province_name' => 'สุรินทร์   ',
				'country_id' => 218,
			),
			21 => 
			array (
				'province_id' => 22,
				'province_code' => '33',
				'province_name' => 'ศรีสะเกษ   ',
				'country_id' => 218,
			),
			22 => 
			array (
				'province_id' => 23,
				'province_code' => '34',
				'province_name' => 'อุบลราชธานี   ',
				'country_id' => 218,
			),
			23 => 
			array (
				'province_id' => 24,
				'province_code' => '35',
				'province_name' => 'ยโสธร   ',
				'country_id' => 218,
			),
			24 => 
			array (
				'province_id' => 25,
				'province_code' => '36',
				'province_name' => 'ชัยภูมิ   ',
				'country_id' => 218,
			),
			25 => 
			array (
				'province_id' => 26,
				'province_code' => '37',
				'province_name' => 'อำนาจเจริญ   ',
				'country_id' => 218,
			),
			26 => 
			array (
				'province_id' => 27,
				'province_code' => '39',
				'province_name' => 'หนองบัวลำภู   ',
				'country_id' => 218,
			),
			27 => 
			array (
				'province_id' => 28,
				'province_code' => '40',
				'province_name' => 'ขอนแก่น   ',
				'country_id' => 218,
			),
			28 => 
			array (
				'province_id' => 29,
				'province_code' => '41',
				'province_name' => 'อุดรธานี   ',
				'country_id' => 218,
			),
			29 => 
			array (
				'province_id' => 30,
				'province_code' => '42',
				'province_name' => 'เลย   ',
				'country_id' => 218,
			),
			30 => 
			array (
				'province_id' => 31,
				'province_code' => '43',
				'province_name' => 'หนองคาย   ',
				'country_id' => 218,
			),
			31 => 
			array (
				'province_id' => 32,
				'province_code' => '44',
				'province_name' => 'มหาสารคาม   ',
				'country_id' => 218,
			),
			32 => 
			array (
				'province_id' => 33,
				'province_code' => '45',
				'province_name' => 'ร้อยเอ็ด   ',
				'country_id' => 218,
			),
			33 => 
			array (
				'province_id' => 34,
				'province_code' => '46',
				'province_name' => 'กาฬสินธุ์   ',
				'country_id' => 218,
			),
			34 => 
			array (
				'province_id' => 35,
				'province_code' => '47',
				'province_name' => 'สกลนคร   ',
				'country_id' => 218,
			),
			35 => 
			array (
				'province_id' => 36,
				'province_code' => '48',
				'province_name' => 'นครพนม   ',
				'country_id' => 218,
			),
			36 => 
			array (
				'province_id' => 37,
				'province_code' => '49',
				'province_name' => 'มุกดาหาร   ',
				'country_id' => 218,
			),
			37 => 
			array (
				'province_id' => 38,
				'province_code' => '50',
				'province_name' => 'เชียงใหม่   ',
				'country_id' => 218,
			),
			38 => 
			array (
				'province_id' => 39,
				'province_code' => '51',
				'province_name' => 'ลำพูน   ',
				'country_id' => 218,
			),
			39 => 
			array (
				'province_id' => 40,
				'province_code' => '52',
				'province_name' => 'ลำปาง   ',
				'country_id' => 218,
			),
			40 => 
			array (
				'province_id' => 41,
				'province_code' => '53',
				'province_name' => 'อุตรดิตถ์   ',
				'country_id' => 218,
			),
			41 => 
			array (
				'province_id' => 42,
				'province_code' => '54',
				'province_name' => 'แพร่   ',
				'country_id' => 218,
			),
			42 => 
			array (
				'province_id' => 43,
				'province_code' => '55',
				'province_name' => 'น่าน   ',
				'country_id' => 218,
			),
			43 => 
			array (
				'province_id' => 44,
				'province_code' => '56',
				'province_name' => 'พะเยา   ',
				'country_id' => 218,
			),
			44 => 
			array (
				'province_id' => 45,
				'province_code' => '57',
				'province_name' => 'เชียงราย   ',
				'country_id' => 218,
			),
			45 => 
			array (
				'province_id' => 46,
				'province_code' => '58',
				'province_name' => 'แม่ฮ่องสอน   ',
				'country_id' => 218,
			),
			46 => 
			array (
				'province_id' => 47,
				'province_code' => '60',
				'province_name' => 'นครสวรรค์   ',
				'country_id' => 218,
			),
			47 => 
			array (
				'province_id' => 48,
				'province_code' => '61',
				'province_name' => 'อุทัยธานี   ',
				'country_id' => 218,
			),
			48 => 
			array (
				'province_id' => 49,
				'province_code' => '62',
				'province_name' => 'กำแพงเพชร   ',
				'country_id' => 218,
			),
			49 => 
			array (
				'province_id' => 50,
				'province_code' => '63',
				'province_name' => 'ตาก   ',
				'country_id' => 218,
			),
			50 => 
			array (
				'province_id' => 51,
				'province_code' => '64',
				'province_name' => 'สุโขทัย   ',
				'country_id' => 218,
			),
			51 => 
			array (
				'province_id' => 52,
				'province_code' => '65',
				'province_name' => 'พิษณุโลก   ',
				'country_id' => 218,
			),
			52 => 
			array (
				'province_id' => 53,
				'province_code' => '66',
				'province_name' => 'พิจิตร   ',
				'country_id' => 218,
			),
			53 => 
			array (
				'province_id' => 54,
				'province_code' => '67',
				'province_name' => 'เพชรบูรณ์   ',
				'country_id' => 218,
			),
			54 => 
			array (
				'province_id' => 55,
				'province_code' => '70',
				'province_name' => 'ราชบุรี   ',
				'country_id' => 218,
			),
			55 => 
			array (
				'province_id' => 56,
				'province_code' => '71',
				'province_name' => 'กาญจนบุรี   ',
				'country_id' => 218,
			),
			56 => 
			array (
				'province_id' => 57,
				'province_code' => '72',
				'province_name' => 'สุพรรณบุรี   ',
				'country_id' => 218,
			),
			57 => 
			array (
				'province_id' => 58,
				'province_code' => '73',
				'province_name' => 'นครปฐม   ',
				'country_id' => 218,
			),
			58 => 
			array (
				'province_id' => 59,
				'province_code' => '74',
				'province_name' => 'สมุทรสาคร   ',
				'country_id' => 218,
			),
			59 => 
			array (
				'province_id' => 60,
				'province_code' => '75',
				'province_name' => 'สมุทรสงคราม   ',
				'country_id' => 218,
			),
			60 => 
			array (
				'province_id' => 61,
				'province_code' => '76',
				'province_name' => 'เพชรบุรี   ',
				'country_id' => 218,
			),
			61 => 
			array (
				'province_id' => 62,
				'province_code' => '77',
				'province_name' => 'ประจวบคีรีขันธ์   ',
				'country_id' => 218,
			),
			62 => 
			array (
				'province_id' => 63,
				'province_code' => '80',
				'province_name' => 'นครศรีธรรมราช   ',
				'country_id' => 218,
			),
			63 => 
			array (
				'province_id' => 64,
				'province_code' => '81',
				'province_name' => 'กระบี่   ',
				'country_id' => 218,
			),
			64 => 
			array (
				'province_id' => 65,
				'province_code' => '82',
				'province_name' => 'พังงา   ',
				'country_id' => 218,
			),
			65 => 
			array (
				'province_id' => 66,
				'province_code' => '83',
				'province_name' => 'ภูเก็ต   ',
				'country_id' => 218,
			),
			66 => 
			array (
				'province_id' => 67,
				'province_code' => '84',
				'province_name' => 'สุราษฎร์ธานี   ',
				'country_id' => 218,
			),
			67 => 
			array (
				'province_id' => 68,
				'province_code' => '85',
				'province_name' => 'ระนอง   ',
				'country_id' => 218,
			),
			68 => 
			array (
				'province_id' => 69,
				'province_code' => '86',
				'province_name' => 'ชุมพร   ',
				'country_id' => 218,
			),
			69 => 
			array (
				'province_id' => 70,
				'province_code' => '90',
				'province_name' => 'สงขลา   ',
				'country_id' => 218,
			),
			70 => 
			array (
				'province_id' => 71,
				'province_code' => '91',
				'province_name' => 'สตูล   ',
				'country_id' => 218,
			),
			71 => 
			array (
				'province_id' => 72,
				'province_code' => '92',
				'province_name' => 'ตรัง   ',
				'country_id' => 218,
			),
			72 => 
			array (
				'province_id' => 73,
				'province_code' => '93',
				'province_name' => 'พัทลุง   ',
				'country_id' => 218,
			),
			73 => 
			array (
				'province_id' => 74,
				'province_code' => '94',
				'province_name' => 'ปัตตานี   ',
				'country_id' => 218,
			),
			74 => 
			array (
				'province_id' => 75,
				'province_code' => '95',
				'province_name' => 'ยะลา   ',
				'country_id' => 218,
			),
			75 => 
			array (
				'province_id' => 76,
				'province_code' => '96',
				'province_name' => 'นราธิวาส   ',
				'country_id' => 218,
			),
			76 => 
			array (
				'province_id' => 77,
				'province_code' => '97',
				'province_name' => 'บึงกาฬ',
				'country_id' => 218,
			),
		));
	}

}
