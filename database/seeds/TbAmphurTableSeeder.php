<?php

use Illuminate\Database\Seeder;

class TbAmphurTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_amphur')->delete();
        
		\DB::table('tb_amphur')->insert(array (
			0 => 
			array (
				'amphur_id' => 1,
				'amphur_code' => '1001',
				'amphur_name' => 'เขตพระนคร   ',
				'province_id' => 1,
			),
			1 => 
			array (
				'amphur_id' => 2,
				'amphur_code' => '1002',
				'amphur_name' => 'เขตดุสิต   ',
				'province_id' => 1,
			),
			2 => 
			array (
				'amphur_id' => 3,
				'amphur_code' => '1003',
				'amphur_name' => 'เขตหนองจอก   ',
				'province_id' => 1,
			),
			3 => 
			array (
				'amphur_id' => 4,
				'amphur_code' => '1004',
				'amphur_name' => 'เขตบางรัก   ',
				'province_id' => 1,
			),
			4 => 
			array (
				'amphur_id' => 5,
				'amphur_code' => '1005',
				'amphur_name' => 'เขตบางเขน   ',
				'province_id' => 1,
			),
			5 => 
			array (
				'amphur_id' => 6,
				'amphur_code' => '1006',
				'amphur_name' => 'เขตบางกะปิ   ',
				'province_id' => 1,
			),
			6 => 
			array (
				'amphur_id' => 7,
				'amphur_code' => '1007',
				'amphur_name' => 'เขตปทุมวัน   ',
				'province_id' => 1,
			),
			7 => 
			array (
				'amphur_id' => 8,
				'amphur_code' => '1008',
				'amphur_name' => 'เขตป้อมปราบศัตรูพ่าย   ',
				'province_id' => 1,
			),
			8 => 
			array (
				'amphur_id' => 9,
				'amphur_code' => '1009',
				'amphur_name' => 'เขตพระโขนง   ',
				'province_id' => 1,
			),
			9 => 
			array (
				'amphur_id' => 10,
				'amphur_code' => '1010',
				'amphur_name' => 'เขตมีนบุรี   ',
				'province_id' => 1,
			),
			10 => 
			array (
				'amphur_id' => 11,
				'amphur_code' => '1011',
				'amphur_name' => 'เขตลาดกระบัง   ',
				'province_id' => 1,
			),
			11 => 
			array (
				'amphur_id' => 12,
				'amphur_code' => '1012',
				'amphur_name' => 'เขตยานนาวา   ',
				'province_id' => 1,
			),
			12 => 
			array (
				'amphur_id' => 13,
				'amphur_code' => '1013',
				'amphur_name' => 'เขตสัมพันธวงศ์   ',
				'province_id' => 1,
			),
			13 => 
			array (
				'amphur_id' => 14,
				'amphur_code' => '1014',
				'amphur_name' => 'เขตพญาไท   ',
				'province_id' => 1,
			),
			14 => 
			array (
				'amphur_id' => 15,
				'amphur_code' => '1015',
				'amphur_name' => 'เขตธนบุรี   ',
				'province_id' => 1,
			),
			15 => 
			array (
				'amphur_id' => 16,
				'amphur_code' => '1016',
				'amphur_name' => 'เขตบางกอกใหญ่   ',
				'province_id' => 1,
			),
			16 => 
			array (
				'amphur_id' => 17,
				'amphur_code' => '1017',
				'amphur_name' => 'เขตห้วยขวาง   ',
				'province_id' => 1,
			),
			17 => 
			array (
				'amphur_id' => 18,
				'amphur_code' => '1018',
				'amphur_name' => 'เขตคลองสาน   ',
				'province_id' => 1,
			),
			18 => 
			array (
				'amphur_id' => 19,
				'amphur_code' => '1019',
				'amphur_name' => 'เขตตลิ่งชัน   ',
				'province_id' => 1,
			),
			19 => 
			array (
				'amphur_id' => 20,
				'amphur_code' => '1020',
				'amphur_name' => 'เขตบางกอกน้อย   ',
				'province_id' => 1,
			),
			20 => 
			array (
				'amphur_id' => 21,
				'amphur_code' => '1021',
				'amphur_name' => 'เขตบางขุนเทียน   ',
				'province_id' => 1,
			),
			21 => 
			array (
				'amphur_id' => 22,
				'amphur_code' => '1022',
				'amphur_name' => 'เขตภาษีเจริญ   ',
				'province_id' => 1,
			),
			22 => 
			array (
				'amphur_id' => 23,
				'amphur_code' => '1023',
				'amphur_name' => 'เขตหนองแขม   ',
				'province_id' => 1,
			),
			23 => 
			array (
				'amphur_id' => 24,
				'amphur_code' => '1024',
				'amphur_name' => 'เขตราษฎร์บูรณะ   ',
				'province_id' => 1,
			),
			24 => 
			array (
				'amphur_id' => 25,
				'amphur_code' => '1025',
				'amphur_name' => 'เขตบางพลัด   ',
				'province_id' => 1,
			),
			25 => 
			array (
				'amphur_id' => 26,
				'amphur_code' => '1026',
				'amphur_name' => 'เขตดินแดง   ',
				'province_id' => 1,
			),
			26 => 
			array (
				'amphur_id' => 27,
				'amphur_code' => '1027',
				'amphur_name' => 'เขตบึงกุ่ม   ',
				'province_id' => 1,
			),
			27 => 
			array (
				'amphur_id' => 28,
				'amphur_code' => '1028',
				'amphur_name' => 'เขตสาทร   ',
				'province_id' => 1,
			),
			28 => 
			array (
				'amphur_id' => 29,
				'amphur_code' => '1029',
				'amphur_name' => 'เขตบางซื่อ   ',
				'province_id' => 1,
			),
			29 => 
			array (
				'amphur_id' => 30,
				'amphur_code' => '1030',
				'amphur_name' => 'เขตจตุจักร   ',
				'province_id' => 1,
			),
			30 => 
			array (
				'amphur_id' => 31,
				'amphur_code' => '1031',
				'amphur_name' => 'เขตบางคอแหลม   ',
				'province_id' => 1,
			),
			31 => 
			array (
				'amphur_id' => 32,
				'amphur_code' => '1032',
				'amphur_name' => 'เขตประเวศ   ',
				'province_id' => 1,
			),
			32 => 
			array (
				'amphur_id' => 33,
				'amphur_code' => '1033',
				'amphur_name' => 'เขตคลองเตย   ',
				'province_id' => 1,
			),
			33 => 
			array (
				'amphur_id' => 34,
				'amphur_code' => '1034',
				'amphur_name' => 'เขตสวนหลวง   ',
				'province_id' => 1,
			),
			34 => 
			array (
				'amphur_id' => 35,
				'amphur_code' => '1035',
				'amphur_name' => 'เขตจอมทอง   ',
				'province_id' => 1,
			),
			35 => 
			array (
				'amphur_id' => 36,
				'amphur_code' => '1036',
				'amphur_name' => 'เขตดอนเมือง   ',
				'province_id' => 1,
			),
			36 => 
			array (
				'amphur_id' => 37,
				'amphur_code' => '1037',
				'amphur_name' => 'เขตราชเทวี   ',
				'province_id' => 1,
			),
			37 => 
			array (
				'amphur_id' => 38,
				'amphur_code' => '1038',
				'amphur_name' => 'เขตลาดพร้าว   ',
				'province_id' => 1,
			),
			38 => 
			array (
				'amphur_id' => 39,
				'amphur_code' => '1039',
				'amphur_name' => 'เขตวัฒนา   ',
				'province_id' => 1,
			),
			39 => 
			array (
				'amphur_id' => 40,
				'amphur_code' => '1040',
				'amphur_name' => 'เขตบางแค   ',
				'province_id' => 1,
			),
			40 => 
			array (
				'amphur_id' => 41,
				'amphur_code' => '1041',
				'amphur_name' => 'เขตหลักสี่   ',
				'province_id' => 1,
			),
			41 => 
			array (
				'amphur_id' => 42,
				'amphur_code' => '1042',
				'amphur_name' => 'เขตสายไหม   ',
				'province_id' => 1,
			),
			42 => 
			array (
				'amphur_id' => 43,
				'amphur_code' => '1043',
				'amphur_name' => 'เขตคันนายาว   ',
				'province_id' => 1,
			),
			43 => 
			array (
				'amphur_id' => 44,
				'amphur_code' => '1044',
				'amphur_name' => 'เขตสะพานสูง   ',
				'province_id' => 1,
			),
			44 => 
			array (
				'amphur_id' => 45,
				'amphur_code' => '1045',
				'amphur_name' => 'เขตวังทองหลาง   ',
				'province_id' => 1,
			),
			45 => 
			array (
				'amphur_id' => 46,
				'amphur_code' => '1046',
				'amphur_name' => 'เขตคลองสามวา   ',
				'province_id' => 1,
			),
			46 => 
			array (
				'amphur_id' => 47,
				'amphur_code' => '1047',
				'amphur_name' => 'เขตบางนา   ',
				'province_id' => 1,
			),
			47 => 
			array (
				'amphur_id' => 48,
				'amphur_code' => '1048',
				'amphur_name' => 'เขตทวีวัฒนา   ',
				'province_id' => 1,
			),
			48 => 
			array (
				'amphur_id' => 49,
				'amphur_code' => '1049',
				'amphur_name' => 'เขตทุ่งครุ   ',
				'province_id' => 1,
			),
			49 => 
			array (
				'amphur_id' => 50,
				'amphur_code' => '1050',
				'amphur_name' => 'เขตบางบอน   ',
				'province_id' => 1,
			),
			50 => 
			array (
				'amphur_id' => 51,
				'amphur_code' => '1081',
				'amphur_name' => '*บ้านทะวาย   ',
				'province_id' => 1,
			),
			51 => 
			array (
				'amphur_id' => 52,
				'amphur_code' => '1101',
				'amphur_name' => 'เมืองสมุทรปราการ   ',
				'province_id' => 2,
			),
			52 => 
			array (
				'amphur_id' => 53,
				'amphur_code' => '1102',
				'amphur_name' => 'บางบ่อ   ',
				'province_id' => 2,
			),
			53 => 
			array (
				'amphur_id' => 54,
				'amphur_code' => '1103',
				'amphur_name' => 'บางพลี   ',
				'province_id' => 2,
			),
			54 => 
			array (
				'amphur_id' => 55,
				'amphur_code' => '1104',
				'amphur_name' => 'พระประแดง   ',
				'province_id' => 2,
			),
			55 => 
			array (
				'amphur_id' => 56,
				'amphur_code' => '1105',
				'amphur_name' => 'พระสมุทรเจดีย์   ',
				'province_id' => 2,
			),
			56 => 
			array (
				'amphur_id' => 57,
				'amphur_code' => '1106',
				'amphur_name' => 'บางเสาธง   ',
				'province_id' => 2,
			),
			57 => 
			array (
				'amphur_id' => 58,
				'amphur_code' => '1201',
				'amphur_name' => 'เมืองนนทบุรี   ',
				'province_id' => 3,
			),
			58 => 
			array (
				'amphur_id' => 59,
				'amphur_code' => '1202',
				'amphur_name' => 'บางกรวย   ',
				'province_id' => 3,
			),
			59 => 
			array (
				'amphur_id' => 60,
				'amphur_code' => '1203',
				'amphur_name' => 'บางใหญ่   ',
				'province_id' => 3,
			),
			60 => 
			array (
				'amphur_id' => 61,
				'amphur_code' => '1204',
				'amphur_name' => 'บางบัวทอง   ',
				'province_id' => 3,
			),
			61 => 
			array (
				'amphur_id' => 62,
				'amphur_code' => '1205',
				'amphur_name' => 'ไทรน้อย   ',
				'province_id' => 3,
			),
			62 => 
			array (
				'amphur_id' => 63,
				'amphur_code' => '1206',
				'amphur_name' => 'ปากเกร็ด   ',
				'province_id' => 3,
			),
			63 => 
			array (
				'amphur_id' => 64,
				'amphur_code' => '1251',
			'amphur_name' => 'เทศบาลนครนนทบุรี (สาขาแขวงท่าทราย)*   ',
				'province_id' => 3,
			),
			64 => 
			array (
				'amphur_id' => 65,
				'amphur_code' => '1297',
				'amphur_name' => 'เทศบาลเมืองปากเกร็ด*   ',
				'province_id' => 3,
			),
			65 => 
			array (
				'amphur_id' => 66,
				'amphur_code' => '1301',
				'amphur_name' => 'เมืองปทุมธานี   ',
				'province_id' => 4,
			),
			66 => 
			array (
				'amphur_id' => 67,
				'amphur_code' => '1302',
				'amphur_name' => 'คลองหลวง   ',
				'province_id' => 4,
			),
			67 => 
			array (
				'amphur_id' => 68,
				'amphur_code' => '1303',
				'amphur_name' => 'ธัญบุรี   ',
				'province_id' => 4,
			),
			68 => 
			array (
				'amphur_id' => 69,
				'amphur_code' => '1304',
				'amphur_name' => 'หนองเสือ   ',
				'province_id' => 4,
			),
			69 => 
			array (
				'amphur_id' => 70,
				'amphur_code' => '1305',
				'amphur_name' => 'ลาดหลุมแก้ว   ',
				'province_id' => 4,
			),
			70 => 
			array (
				'amphur_id' => 71,
				'amphur_code' => '1306',
				'amphur_name' => 'ลำลูกกา   ',
				'province_id' => 4,
			),
			71 => 
			array (
				'amphur_id' => 72,
				'amphur_code' => '1307',
				'amphur_name' => 'สามโคก   ',
				'province_id' => 4,
			),
			72 => 
			array (
				'amphur_id' => 73,
				'amphur_code' => '1351',
			'amphur_name' => 'ลำลูกกา (สาขาตำบลคูคต)*   ',
				'province_id' => 4,
			),
			73 => 
			array (
				'amphur_id' => 74,
				'amphur_code' => '1401',
				'amphur_name' => 'พระนครศรีอยุธยา   ',
				'province_id' => 5,
			),
			74 => 
			array (
				'amphur_id' => 75,
				'amphur_code' => '1402',
				'amphur_name' => 'ท่าเรือ   ',
				'province_id' => 5,
			),
			75 => 
			array (
				'amphur_id' => 76,
				'amphur_code' => '1403',
				'amphur_name' => 'นครหลวง   ',
				'province_id' => 5,
			),
			76 => 
			array (
				'amphur_id' => 77,
				'amphur_code' => '1404',
				'amphur_name' => 'บางไทร   ',
				'province_id' => 5,
			),
			77 => 
			array (
				'amphur_id' => 78,
				'amphur_code' => '1405',
				'amphur_name' => 'บางบาล   ',
				'province_id' => 5,
			),
			78 => 
			array (
				'amphur_id' => 79,
				'amphur_code' => '1406',
				'amphur_name' => 'บางปะอิน   ',
				'province_id' => 5,
			),
			79 => 
			array (
				'amphur_id' => 80,
				'amphur_code' => '1407',
				'amphur_name' => 'บางปะหัน   ',
				'province_id' => 5,
			),
			80 => 
			array (
				'amphur_id' => 81,
				'amphur_code' => '1408',
				'amphur_name' => 'ผักไห่   ',
				'province_id' => 5,
			),
			81 => 
			array (
				'amphur_id' => 82,
				'amphur_code' => '1409',
				'amphur_name' => 'ภาชี   ',
				'province_id' => 5,
			),
			82 => 
			array (
				'amphur_id' => 83,
				'amphur_code' => '1410',
				'amphur_name' => 'ลาดบัวหลวง   ',
				'province_id' => 5,
			),
			83 => 
			array (
				'amphur_id' => 84,
				'amphur_code' => '1411',
				'amphur_name' => 'วังน้อย   ',
				'province_id' => 5,
			),
			84 => 
			array (
				'amphur_id' => 85,
				'amphur_code' => '1412',
				'amphur_name' => 'เสนา   ',
				'province_id' => 5,
			),
			85 => 
			array (
				'amphur_id' => 86,
				'amphur_code' => '1413',
				'amphur_name' => 'บางซ้าย   ',
				'province_id' => 5,
			),
			86 => 
			array (
				'amphur_id' => 87,
				'amphur_code' => '1414',
				'amphur_name' => 'อุทัย   ',
				'province_id' => 5,
			),
			87 => 
			array (
				'amphur_id' => 88,
				'amphur_code' => '1415',
				'amphur_name' => 'มหาราช   ',
				'province_id' => 5,
			),
			88 => 
			array (
				'amphur_id' => 89,
				'amphur_code' => '1416',
				'amphur_name' => 'บ้านแพรก   ',
				'province_id' => 5,
			),
			89 => 
			array (
				'amphur_id' => 90,
				'amphur_code' => '1501',
				'amphur_name' => 'เมืองอ่างทอง   ',
				'province_id' => 6,
			),
			90 => 
			array (
				'amphur_id' => 91,
				'amphur_code' => '1502',
				'amphur_name' => 'ไชโย   ',
				'province_id' => 6,
			),
			91 => 
			array (
				'amphur_id' => 92,
				'amphur_code' => '1503',
				'amphur_name' => 'ป่าโมก   ',
				'province_id' => 6,
			),
			92 => 
			array (
				'amphur_id' => 93,
				'amphur_code' => '1504',
				'amphur_name' => 'โพธิ์ทอง   ',
				'province_id' => 6,
			),
			93 => 
			array (
				'amphur_id' => 94,
				'amphur_code' => '1505',
				'amphur_name' => 'แสวงหา   ',
				'province_id' => 6,
			),
			94 => 
			array (
				'amphur_id' => 95,
				'amphur_code' => '1506',
				'amphur_name' => 'วิเศษชัยชาญ   ',
				'province_id' => 6,
			),
			95 => 
			array (
				'amphur_id' => 96,
				'amphur_code' => '1507',
				'amphur_name' => 'สามโก้   ',
				'province_id' => 6,
			),
			96 => 
			array (
				'amphur_id' => 97,
				'amphur_code' => '1601',
				'amphur_name' => 'เมืองลพบุรี   ',
				'province_id' => 7,
			),
			97 => 
			array (
				'amphur_id' => 98,
				'amphur_code' => '1602',
				'amphur_name' => 'พัฒนานิคม   ',
				'province_id' => 7,
			),
			98 => 
			array (
				'amphur_id' => 99,
				'amphur_code' => '1603',
				'amphur_name' => 'โคกสำโรง   ',
				'province_id' => 7,
			),
			99 => 
			array (
				'amphur_id' => 100,
				'amphur_code' => '1604',
				'amphur_name' => 'ชัยบาดาล   ',
				'province_id' => 7,
			),
			100 => 
			array (
				'amphur_id' => 101,
				'amphur_code' => '1605',
				'amphur_name' => 'ท่าวุ้ง   ',
				'province_id' => 7,
			),
			101 => 
			array (
				'amphur_id' => 102,
				'amphur_code' => '1606',
				'amphur_name' => 'บ้านหมี่   ',
				'province_id' => 7,
			),
			102 => 
			array (
				'amphur_id' => 103,
				'amphur_code' => '1607',
				'amphur_name' => 'ท่าหลวง   ',
				'province_id' => 7,
			),
			103 => 
			array (
				'amphur_id' => 104,
				'amphur_code' => '1608',
				'amphur_name' => 'สระโบสถ์   ',
				'province_id' => 7,
			),
			104 => 
			array (
				'amphur_id' => 105,
				'amphur_code' => '1609',
				'amphur_name' => 'โคกเจริญ   ',
				'province_id' => 7,
			),
			105 => 
			array (
				'amphur_id' => 106,
				'amphur_code' => '1610',
				'amphur_name' => 'ลำสนธิ   ',
				'province_id' => 7,
			),
			106 => 
			array (
				'amphur_id' => 107,
				'amphur_code' => '1611',
				'amphur_name' => 'หนองม่วง   ',
				'province_id' => 7,
			),
			107 => 
			array (
				'amphur_id' => 108,
				'amphur_code' => '1681',
				'amphur_name' => '*อ.บ้านเช่า  จ.ลพบุรี   ',
				'province_id' => 7,
			),
			108 => 
			array (
				'amphur_id' => 109,
				'amphur_code' => '1701',
				'amphur_name' => 'เมืองสิงห์บุรี   ',
				'province_id' => 8,
			),
			109 => 
			array (
				'amphur_id' => 110,
				'amphur_code' => '1702',
				'amphur_name' => 'บางระจัน   ',
				'province_id' => 8,
			),
			110 => 
			array (
				'amphur_id' => 111,
				'amphur_code' => '1703',
				'amphur_name' => 'ค่ายบางระจัน   ',
				'province_id' => 8,
			),
			111 => 
			array (
				'amphur_id' => 112,
				'amphur_code' => '1704',
				'amphur_name' => 'พรหมบุรี   ',
				'province_id' => 8,
			),
			112 => 
			array (
				'amphur_id' => 113,
				'amphur_code' => '1705',
				'amphur_name' => 'ท่าช้าง   ',
				'province_id' => 8,
			),
			113 => 
			array (
				'amphur_id' => 114,
				'amphur_code' => '1706',
				'amphur_name' => 'อินทร์บุรี   ',
				'province_id' => 8,
			),
			114 => 
			array (
				'amphur_id' => 115,
				'amphur_code' => '1801',
				'amphur_name' => 'เมืองชัยนาท   ',
				'province_id' => 9,
			),
			115 => 
			array (
				'amphur_id' => 116,
				'amphur_code' => '1802',
				'amphur_name' => 'มโนรมย์   ',
				'province_id' => 9,
			),
			116 => 
			array (
				'amphur_id' => 117,
				'amphur_code' => '1803',
				'amphur_name' => 'วัดสิงห์   ',
				'province_id' => 9,
			),
			117 => 
			array (
				'amphur_id' => 118,
				'amphur_code' => '1804',
				'amphur_name' => 'สรรพยา   ',
				'province_id' => 9,
			),
			118 => 
			array (
				'amphur_id' => 119,
				'amphur_code' => '1805',
				'amphur_name' => 'สรรคบุรี   ',
				'province_id' => 9,
			),
			119 => 
			array (
				'amphur_id' => 120,
				'amphur_code' => '1806',
				'amphur_name' => 'หันคา   ',
				'province_id' => 9,
			),
			120 => 
			array (
				'amphur_id' => 121,
				'amphur_code' => '1807',
				'amphur_name' => 'หนองมะโมง   ',
				'province_id' => 9,
			),
			121 => 
			array (
				'amphur_id' => 122,
				'amphur_code' => '1808',
				'amphur_name' => 'เนินขาม   ',
				'province_id' => 9,
			),
			122 => 
			array (
				'amphur_id' => 123,
				'amphur_code' => '1901',
				'amphur_name' => 'เมืองสระบุรี   ',
				'province_id' => 10,
			),
			123 => 
			array (
				'amphur_id' => 124,
				'amphur_code' => '1902',
				'amphur_name' => 'แก่งคอย   ',
				'province_id' => 10,
			),
			124 => 
			array (
				'amphur_id' => 125,
				'amphur_code' => '1903',
				'amphur_name' => 'หนองแค   ',
				'province_id' => 10,
			),
			125 => 
			array (
				'amphur_id' => 126,
				'amphur_code' => '1904',
				'amphur_name' => 'วิหารแดง   ',
				'province_id' => 10,
			),
			126 => 
			array (
				'amphur_id' => 127,
				'amphur_code' => '1905',
				'amphur_name' => 'หนองแซง   ',
				'province_id' => 10,
			),
			127 => 
			array (
				'amphur_id' => 128,
				'amphur_code' => '1906',
				'amphur_name' => 'บ้านหมอ   ',
				'province_id' => 10,
			),
			128 => 
			array (
				'amphur_id' => 129,
				'amphur_code' => '1907',
				'amphur_name' => 'ดอนพุด   ',
				'province_id' => 10,
			),
			129 => 
			array (
				'amphur_id' => 130,
				'amphur_code' => '1908',
				'amphur_name' => 'หนองโดน   ',
				'province_id' => 10,
			),
			130 => 
			array (
				'amphur_id' => 131,
				'amphur_code' => '1909',
				'amphur_name' => 'พระพุทธบาท   ',
				'province_id' => 10,
			),
			131 => 
			array (
				'amphur_id' => 132,
				'amphur_code' => '1910',
				'amphur_name' => 'เสาไห้   ',
				'province_id' => 10,
			),
			132 => 
			array (
				'amphur_id' => 133,
				'amphur_code' => '1911',
				'amphur_name' => 'มวกเหล็ก   ',
				'province_id' => 10,
			),
			133 => 
			array (
				'amphur_id' => 134,
				'amphur_code' => '1912',
				'amphur_name' => 'วังม่วง   ',
				'province_id' => 10,
			),
			134 => 
			array (
				'amphur_id' => 135,
				'amphur_code' => '1913',
				'amphur_name' => 'เฉลิมพระเกียรติ   ',
				'province_id' => 10,
			),
			135 => 
			array (
				'amphur_id' => 136,
				'amphur_code' => '2001',
				'amphur_name' => 'เมืองชลบุรี   ',
				'province_id' => 11,
			),
			136 => 
			array (
				'amphur_id' => 137,
				'amphur_code' => '2002',
				'amphur_name' => 'บ้านบึง   ',
				'province_id' => 11,
			),
			137 => 
			array (
				'amphur_id' => 138,
				'amphur_code' => '2003',
				'amphur_name' => 'หนองใหญ่   ',
				'province_id' => 11,
			),
			138 => 
			array (
				'amphur_id' => 139,
				'amphur_code' => '2004',
				'amphur_name' => 'บางละมุง   ',
				'province_id' => 11,
			),
			139 => 
			array (
				'amphur_id' => 140,
				'amphur_code' => '2005',
				'amphur_name' => 'พานทอง   ',
				'province_id' => 11,
			),
			140 => 
			array (
				'amphur_id' => 141,
				'amphur_code' => '2006',
				'amphur_name' => 'พนัสนิคม   ',
				'province_id' => 11,
			),
			141 => 
			array (
				'amphur_id' => 142,
				'amphur_code' => '2007',
				'amphur_name' => 'ศรีราชา   ',
				'province_id' => 11,
			),
			142 => 
			array (
				'amphur_id' => 143,
				'amphur_code' => '2008',
				'amphur_name' => 'เกาะสีชัง   ',
				'province_id' => 11,
			),
			143 => 
			array (
				'amphur_id' => 144,
				'amphur_code' => '2009',
				'amphur_name' => 'สัตหีบ   ',
				'province_id' => 11,
			),
			144 => 
			array (
				'amphur_id' => 145,
				'amphur_code' => '2010',
				'amphur_name' => 'บ่อทอง   ',
				'province_id' => 11,
			),
			145 => 
			array (
				'amphur_id' => 146,
				'amphur_code' => '2011',
				'amphur_name' => 'เกาะจันทร์   ',
				'province_id' => 11,
			),
			146 => 
			array (
				'amphur_id' => 147,
				'amphur_code' => '2051',
			'amphur_name' => 'สัตหีบ (สาขาตำบลบางเสร่)*   ',
				'province_id' => 11,
			),
			147 => 
			array (
				'amphur_id' => 148,
				'amphur_code' => '2072',
				'amphur_name' => 'ท้องถิ่นเทศบาลเมืองหนองปรือ*   ',
				'province_id' => 11,
			),
			148 => 
			array (
				'amphur_id' => 149,
				'amphur_code' => '2093',
				'amphur_name' => 'เทศบาลตำบลแหลมฉบัง*   ',
				'province_id' => 11,
			),
			149 => 
			array (
				'amphur_id' => 150,
				'amphur_code' => '2099',
				'amphur_name' => 'เทศบาลเมืองชลบุรี*   ',
				'province_id' => 11,
			),
			150 => 
			array (
				'amphur_id' => 151,
				'amphur_code' => '2101',
				'amphur_name' => 'เมืองระยอง   ',
				'province_id' => 12,
			),
			151 => 
			array (
				'amphur_id' => 152,
				'amphur_code' => '2102',
				'amphur_name' => 'บ้านฉาง   ',
				'province_id' => 12,
			),
			152 => 
			array (
				'amphur_id' => 153,
				'amphur_code' => '2103',
				'amphur_name' => 'แกลง   ',
				'province_id' => 12,
			),
			153 => 
			array (
				'amphur_id' => 154,
				'amphur_code' => '2104',
				'amphur_name' => 'วังจันทร์   ',
				'province_id' => 12,
			),
			154 => 
			array (
				'amphur_id' => 155,
				'amphur_code' => '2105',
				'amphur_name' => 'บ้านค่าย   ',
				'province_id' => 12,
			),
			155 => 
			array (
				'amphur_id' => 156,
				'amphur_code' => '2106',
				'amphur_name' => 'ปลวกแดง   ',
				'province_id' => 12,
			),
			156 => 
			array (
				'amphur_id' => 157,
				'amphur_code' => '2107',
				'amphur_name' => 'เขาชะเมา   ',
				'province_id' => 12,
			),
			157 => 
			array (
				'amphur_id' => 158,
				'amphur_code' => '2108',
				'amphur_name' => 'นิคมพัฒนา   ',
				'province_id' => 12,
			),
			158 => 
			array (
				'amphur_id' => 159,
				'amphur_code' => '2151',
				'amphur_name' => 'สาขาตำบลมาบข่า*   ',
				'province_id' => 12,
			),
			159 => 
			array (
				'amphur_id' => 160,
				'amphur_code' => '2201',
				'amphur_name' => 'เมืองจันทบุรี   ',
				'province_id' => 13,
			),
			160 => 
			array (
				'amphur_id' => 161,
				'amphur_code' => '2202',
				'amphur_name' => 'ขลุง   ',
				'province_id' => 13,
			),
			161 => 
			array (
				'amphur_id' => 162,
				'amphur_code' => '2203',
				'amphur_name' => 'ท่าใหม่   ',
				'province_id' => 13,
			),
			162 => 
			array (
				'amphur_id' => 163,
				'amphur_code' => '2204',
				'amphur_name' => 'โป่งน้ำร้อน   ',
				'province_id' => 13,
			),
			163 => 
			array (
				'amphur_id' => 164,
				'amphur_code' => '2205',
				'amphur_name' => 'มะขาม   ',
				'province_id' => 13,
			),
			164 => 
			array (
				'amphur_id' => 165,
				'amphur_code' => '2206',
				'amphur_name' => 'แหลมสิงห์   ',
				'province_id' => 13,
			),
			165 => 
			array (
				'amphur_id' => 166,
				'amphur_code' => '2207',
				'amphur_name' => 'สอยดาว   ',
				'province_id' => 13,
			),
			166 => 
			array (
				'amphur_id' => 167,
				'amphur_code' => '2208',
				'amphur_name' => 'แก่งหางแมว   ',
				'province_id' => 13,
			),
			167 => 
			array (
				'amphur_id' => 168,
				'amphur_code' => '2209',
				'amphur_name' => 'นายายอาม   ',
				'province_id' => 13,
			),
			168 => 
			array (
				'amphur_id' => 169,
				'amphur_code' => '2210',
				'amphur_name' => 'เขาคิชฌกูฏ   ',
				'province_id' => 13,
			),
			169 => 
			array (
				'amphur_id' => 170,
				'amphur_code' => '2281',
				'amphur_name' => '*กิ่ง อ.กำพุธ  จ.จันทบุรี   ',
				'province_id' => 13,
			),
			170 => 
			array (
				'amphur_id' => 171,
				'amphur_code' => '2301',
				'amphur_name' => 'เมืองตราด   ',
				'province_id' => 14,
			),
			171 => 
			array (
				'amphur_id' => 172,
				'amphur_code' => '2302',
				'amphur_name' => 'คลองใหญ่   ',
				'province_id' => 14,
			),
			172 => 
			array (
				'amphur_id' => 173,
				'amphur_code' => '2303',
				'amphur_name' => 'เขาสมิง   ',
				'province_id' => 14,
			),
			173 => 
			array (
				'amphur_id' => 174,
				'amphur_code' => '2304',
				'amphur_name' => 'บ่อไร่   ',
				'province_id' => 14,
			),
			174 => 
			array (
				'amphur_id' => 175,
				'amphur_code' => '2305',
				'amphur_name' => 'แหลมงอบ   ',
				'province_id' => 14,
			),
			175 => 
			array (
				'amphur_id' => 176,
				'amphur_code' => '2306',
				'amphur_name' => 'เกาะกูด   ',
				'province_id' => 14,
			),
			176 => 
			array (
				'amphur_id' => 177,
				'amphur_code' => '2307',
				'amphur_name' => 'เกาะช้าง   ',
				'province_id' => 14,
			),
			177 => 
			array (
				'amphur_id' => 178,
				'amphur_code' => '2401',
				'amphur_name' => 'เมืองฉะเชิงเทรา   ',
				'province_id' => 15,
			),
			178 => 
			array (
				'amphur_id' => 179,
				'amphur_code' => '2402',
				'amphur_name' => 'บางคล้า   ',
				'province_id' => 15,
			),
			179 => 
			array (
				'amphur_id' => 180,
				'amphur_code' => '2403',
				'amphur_name' => 'บางน้ำเปรี้ยว   ',
				'province_id' => 15,
			),
			180 => 
			array (
				'amphur_id' => 181,
				'amphur_code' => '2404',
				'amphur_name' => 'บางปะกง   ',
				'province_id' => 15,
			),
			181 => 
			array (
				'amphur_id' => 182,
				'amphur_code' => '2405',
				'amphur_name' => 'บ้านโพธิ์   ',
				'province_id' => 15,
			),
			182 => 
			array (
				'amphur_id' => 183,
				'amphur_code' => '2406',
				'amphur_name' => 'พนมสารคาม   ',
				'province_id' => 15,
			),
			183 => 
			array (
				'amphur_id' => 184,
				'amphur_code' => '2407',
				'amphur_name' => 'ราชสาส์น   ',
				'province_id' => 15,
			),
			184 => 
			array (
				'amphur_id' => 185,
				'amphur_code' => '2408',
				'amphur_name' => 'สนามชัยเขต   ',
				'province_id' => 15,
			),
			185 => 
			array (
				'amphur_id' => 186,
				'amphur_code' => '2409',
				'amphur_name' => 'แปลงยาว   ',
				'province_id' => 15,
			),
			186 => 
			array (
				'amphur_id' => 187,
				'amphur_code' => '2410',
				'amphur_name' => 'ท่าตะเกียบ   ',
				'province_id' => 15,
			),
			187 => 
			array (
				'amphur_id' => 188,
				'amphur_code' => '2411',
				'amphur_name' => 'คลองเขื่อน   ',
				'province_id' => 15,
			),
			188 => 
			array (
				'amphur_id' => 189,
				'amphur_code' => '2501',
				'amphur_name' => 'เมืองปราจีนบุรี   ',
				'province_id' => 16,
			),
			189 => 
			array (
				'amphur_id' => 190,
				'amphur_code' => '2502',
				'amphur_name' => 'กบินทร์บุรี   ',
				'province_id' => 16,
			),
			190 => 
			array (
				'amphur_id' => 191,
				'amphur_code' => '2503',
				'amphur_name' => 'นาดี   ',
				'province_id' => 16,
			),
			191 => 
			array (
				'amphur_id' => 192,
				'amphur_code' => '2504',
				'amphur_name' => '*สระแก้ว   ',
				'province_id' => 16,
			),
			192 => 
			array (
				'amphur_id' => 193,
				'amphur_code' => '2505',
				'amphur_name' => '*วังน้ำเย็น   ',
				'province_id' => 16,
			),
			193 => 
			array (
				'amphur_id' => 194,
				'amphur_code' => '2506',
				'amphur_name' => 'บ้านสร้าง   ',
				'province_id' => 16,
			),
			194 => 
			array (
				'amphur_id' => 195,
				'amphur_code' => '2507',
				'amphur_name' => 'ประจันตคาม   ',
				'province_id' => 16,
			),
			195 => 
			array (
				'amphur_id' => 196,
				'amphur_code' => '2508',
				'amphur_name' => 'ศรีมหาโพธิ   ',
				'province_id' => 16,
			),
			196 => 
			array (
				'amphur_id' => 197,
				'amphur_code' => '2509',
				'amphur_name' => 'ศรีมโหสถ   ',
				'province_id' => 16,
			),
			197 => 
			array (
				'amphur_id' => 198,
				'amphur_code' => '2510',
				'amphur_name' => '*อรัญประเทศ   ',
				'province_id' => 16,
			),
			198 => 
			array (
				'amphur_id' => 199,
				'amphur_code' => '2511',
				'amphur_name' => '*ตาพระยา   ',
				'province_id' => 16,
			),
			199 => 
			array (
				'amphur_id' => 200,
				'amphur_code' => '2512',
				'amphur_name' => '*วัฒนานคร   ',
				'province_id' => 16,
			),
			200 => 
			array (
				'amphur_id' => 201,
				'amphur_code' => '2513',
				'amphur_name' => '*คลองหาด   ',
				'province_id' => 16,
			),
			201 => 
			array (
				'amphur_id' => 202,
				'amphur_code' => '2601',
				'amphur_name' => 'เมืองนครนายก   ',
				'province_id' => 17,
			),
			202 => 
			array (
				'amphur_id' => 203,
				'amphur_code' => '2602',
				'amphur_name' => 'ปากพลี   ',
				'province_id' => 17,
			),
			203 => 
			array (
				'amphur_id' => 204,
				'amphur_code' => '2603',
				'amphur_name' => 'บ้านนา   ',
				'province_id' => 17,
			),
			204 => 
			array (
				'amphur_id' => 205,
				'amphur_code' => '2604',
				'amphur_name' => 'องครักษ์   ',
				'province_id' => 17,
			),
			205 => 
			array (
				'amphur_id' => 206,
				'amphur_code' => '2701',
				'amphur_name' => 'เมืองสระแก้ว   ',
				'province_id' => 18,
			),
			206 => 
			array (
				'amphur_id' => 207,
				'amphur_code' => '2702',
				'amphur_name' => 'คลองหาด   ',
				'province_id' => 18,
			),
			207 => 
			array (
				'amphur_id' => 208,
				'amphur_code' => '2703',
				'amphur_name' => 'ตาพระยา   ',
				'province_id' => 18,
			),
			208 => 
			array (
				'amphur_id' => 209,
				'amphur_code' => '2704',
				'amphur_name' => 'วังน้ำเย็น   ',
				'province_id' => 18,
			),
			209 => 
			array (
				'amphur_id' => 210,
				'amphur_code' => '2705',
				'amphur_name' => 'วัฒนานคร   ',
				'province_id' => 18,
			),
			210 => 
			array (
				'amphur_id' => 211,
				'amphur_code' => '2706',
				'amphur_name' => 'อรัญประเทศ   ',
				'province_id' => 18,
			),
			211 => 
			array (
				'amphur_id' => 212,
				'amphur_code' => '2707',
				'amphur_name' => 'เขาฉกรรจ์   ',
				'province_id' => 18,
			),
			212 => 
			array (
				'amphur_id' => 213,
				'amphur_code' => '2708',
				'amphur_name' => 'โคกสูง   ',
				'province_id' => 18,
			),
			213 => 
			array (
				'amphur_id' => 214,
				'amphur_code' => '2709',
				'amphur_name' => 'วังสมบูรณ์   ',
				'province_id' => 18,
			),
			214 => 
			array (
				'amphur_id' => 215,
				'amphur_code' => '3001',
				'amphur_name' => 'เมืองนครราชสีมา   ',
				'province_id' => 19,
			),
			215 => 
			array (
				'amphur_id' => 216,
				'amphur_code' => '3002',
				'amphur_name' => 'ครบุรี   ',
				'province_id' => 19,
			),
			216 => 
			array (
				'amphur_id' => 217,
				'amphur_code' => '3003',
				'amphur_name' => 'เสิงสาง   ',
				'province_id' => 19,
			),
			217 => 
			array (
				'amphur_id' => 218,
				'amphur_code' => '3004',
				'amphur_name' => 'คง   ',
				'province_id' => 19,
			),
			218 => 
			array (
				'amphur_id' => 219,
				'amphur_code' => '3005',
				'amphur_name' => 'บ้านเหลื่อม   ',
				'province_id' => 19,
			),
			219 => 
			array (
				'amphur_id' => 220,
				'amphur_code' => '3006',
				'amphur_name' => 'จักราช   ',
				'province_id' => 19,
			),
			220 => 
			array (
				'amphur_id' => 221,
				'amphur_code' => '3007',
				'amphur_name' => 'โชคชัย   ',
				'province_id' => 19,
			),
			221 => 
			array (
				'amphur_id' => 222,
				'amphur_code' => '3008',
				'amphur_name' => 'ด่านขุนทด   ',
				'province_id' => 19,
			),
			222 => 
			array (
				'amphur_id' => 223,
				'amphur_code' => '3009',
				'amphur_name' => 'โนนไทย   ',
				'province_id' => 19,
			),
			223 => 
			array (
				'amphur_id' => 224,
				'amphur_code' => '3010',
				'amphur_name' => 'โนนสูง   ',
				'province_id' => 19,
			),
			224 => 
			array (
				'amphur_id' => 225,
				'amphur_code' => '3011',
				'amphur_name' => 'ขามสะแกแสง   ',
				'province_id' => 19,
			),
			225 => 
			array (
				'amphur_id' => 226,
				'amphur_code' => '3012',
				'amphur_name' => 'บัวใหญ่   ',
				'province_id' => 19,
			),
			226 => 
			array (
				'amphur_id' => 227,
				'amphur_code' => '3013',
				'amphur_name' => 'ประทาย   ',
				'province_id' => 19,
			),
			227 => 
			array (
				'amphur_id' => 228,
				'amphur_code' => '3014',
				'amphur_name' => 'ปักธงชัย   ',
				'province_id' => 19,
			),
			228 => 
			array (
				'amphur_id' => 229,
				'amphur_code' => '3015',
				'amphur_name' => 'พิมาย   ',
				'province_id' => 19,
			),
			229 => 
			array (
				'amphur_id' => 230,
				'amphur_code' => '3016',
				'amphur_name' => 'ห้วยแถลง   ',
				'province_id' => 19,
			),
			230 => 
			array (
				'amphur_id' => 231,
				'amphur_code' => '3017',
				'amphur_name' => 'ชุมพวง   ',
				'province_id' => 19,
			),
			231 => 
			array (
				'amphur_id' => 232,
				'amphur_code' => '3018',
				'amphur_name' => 'สูงเนิน   ',
				'province_id' => 19,
			),
			232 => 
			array (
				'amphur_id' => 233,
				'amphur_code' => '3019',
				'amphur_name' => 'ขามทะเลสอ   ',
				'province_id' => 19,
			),
			233 => 
			array (
				'amphur_id' => 234,
				'amphur_code' => '3020',
				'amphur_name' => 'สีคิ้ว   ',
				'province_id' => 19,
			),
			234 => 
			array (
				'amphur_id' => 235,
				'amphur_code' => '3021',
				'amphur_name' => 'ปากช่อง   ',
				'province_id' => 19,
			),
			235 => 
			array (
				'amphur_id' => 236,
				'amphur_code' => '3022',
				'amphur_name' => 'หนองบุญมาก   ',
				'province_id' => 19,
			),
			236 => 
			array (
				'amphur_id' => 237,
				'amphur_code' => '3023',
				'amphur_name' => 'แก้งสนามนาง   ',
				'province_id' => 19,
			),
			237 => 
			array (
				'amphur_id' => 238,
				'amphur_code' => '3024',
				'amphur_name' => 'โนนแดง   ',
				'province_id' => 19,
			),
			238 => 
			array (
				'amphur_id' => 239,
				'amphur_code' => '3025',
				'amphur_name' => 'วังน้ำเขียว   ',
				'province_id' => 19,
			),
			239 => 
			array (
				'amphur_id' => 240,
				'amphur_code' => '3026',
				'amphur_name' => 'เทพารักษ์   ',
				'province_id' => 19,
			),
			240 => 
			array (
				'amphur_id' => 241,
				'amphur_code' => '3027',
				'amphur_name' => 'เมืองยาง   ',
				'province_id' => 19,
			),
			241 => 
			array (
				'amphur_id' => 242,
				'amphur_code' => '3028',
				'amphur_name' => 'พระทองคำ   ',
				'province_id' => 19,
			),
			242 => 
			array (
				'amphur_id' => 243,
				'amphur_code' => '3029',
				'amphur_name' => 'ลำทะเมนชัย   ',
				'province_id' => 19,
			),
			243 => 
			array (
				'amphur_id' => 244,
				'amphur_code' => '3030',
				'amphur_name' => 'บัวลาย   ',
				'province_id' => 19,
			),
			244 => 
			array (
				'amphur_id' => 245,
				'amphur_code' => '3031',
				'amphur_name' => 'สีดา   ',
				'province_id' => 19,
			),
			245 => 
			array (
				'amphur_id' => 246,
				'amphur_code' => '3032',
				'amphur_name' => 'เฉลิมพระเกียรติ   ',
				'province_id' => 19,
			),
			246 => 
			array (
				'amphur_id' => 247,
				'amphur_code' => '3049',
				'amphur_name' => 'ท้องถิ่นเทศบาลตำบลโพธิ์กลาง*   ',
				'province_id' => 19,
			),
			247 => 
			array (
				'amphur_id' => 248,
				'amphur_code' => '3051',
				'amphur_name' => 'สาขาตำบลมะค่า-พลสงคราม*   ',
				'province_id' => 19,
			),
			248 => 
			array (
				'amphur_id' => 249,
				'amphur_code' => '3081',
				'amphur_name' => '*โนนลาว   ',
				'province_id' => 19,
			),
			249 => 
			array (
				'amphur_id' => 250,
				'amphur_code' => '3101',
				'amphur_name' => 'เมืองบุรีรัมย์   ',
				'province_id' => 20,
			),
			250 => 
			array (
				'amphur_id' => 251,
				'amphur_code' => '3102',
				'amphur_name' => 'คูเมือง   ',
				'province_id' => 20,
			),
			251 => 
			array (
				'amphur_id' => 252,
				'amphur_code' => '3103',
				'amphur_name' => 'กระสัง',
				'province_id' => 20,
			),
			252 => 
			array (
				'amphur_id' => 253,
				'amphur_code' => '3104',
				'amphur_name' => 'นางรอง   ',
				'province_id' => 20,
			),
			253 => 
			array (
				'amphur_id' => 254,
				'amphur_code' => '3105',
				'amphur_name' => 'หนองกี่   ',
				'province_id' => 20,
			),
			254 => 
			array (
				'amphur_id' => 255,
				'amphur_code' => '3106',
				'amphur_name' => 'ละหานทราย   ',
				'province_id' => 20,
			),
			255 => 
			array (
				'amphur_id' => 256,
				'amphur_code' => '3107',
				'amphur_name' => 'ประโคนชัย   ',
				'province_id' => 20,
			),
			256 => 
			array (
				'amphur_id' => 257,
				'amphur_code' => '3108',
				'amphur_name' => 'บ้านกรวด   ',
				'province_id' => 20,
			),
			257 => 
			array (
				'amphur_id' => 258,
				'amphur_code' => '3109',
				'amphur_name' => 'พุทไธสง   ',
				'province_id' => 20,
			),
			258 => 
			array (
				'amphur_id' => 259,
				'amphur_code' => '3110',
				'amphur_name' => 'ลำปลายมาศ   ',
				'province_id' => 20,
			),
			259 => 
			array (
				'amphur_id' => 260,
				'amphur_code' => '3111',
				'amphur_name' => 'สตึก   ',
				'province_id' => 20,
			),
			260 => 
			array (
				'amphur_id' => 261,
				'amphur_code' => '3112',
				'amphur_name' => 'ปะคำ   ',
				'province_id' => 20,
			),
			261 => 
			array (
				'amphur_id' => 262,
				'amphur_code' => '3113',
				'amphur_name' => 'นาโพธิ์   ',
				'province_id' => 20,
			),
			262 => 
			array (
				'amphur_id' => 263,
				'amphur_code' => '3114',
				'amphur_name' => 'หนองหงส์   ',
				'province_id' => 20,
			),
			263 => 
			array (
				'amphur_id' => 264,
				'amphur_code' => '3115',
				'amphur_name' => 'พลับพลาชัย   ',
				'province_id' => 20,
			),
			264 => 
			array (
				'amphur_id' => 265,
				'amphur_code' => '3116',
				'amphur_name' => 'ห้วยราช   ',
				'province_id' => 20,
			),
			265 => 
			array (
				'amphur_id' => 266,
				'amphur_code' => '3117',
				'amphur_name' => 'โนนสุวรรณ   ',
				'province_id' => 20,
			),
			266 => 
			array (
				'amphur_id' => 267,
				'amphur_code' => '3118',
				'amphur_name' => 'ชำนิ   ',
				'province_id' => 20,
			),
			267 => 
			array (
				'amphur_id' => 268,
				'amphur_code' => '3119',
				'amphur_name' => 'บ้านใหม่ไชยพจน์   ',
				'province_id' => 20,
			),
			268 => 
			array (
				'amphur_id' => 269,
				'amphur_code' => '3120',
				'amphur_name' => 'โนนดินแดง   ',
				'province_id' => 20,
			),
			269 => 
			array (
				'amphur_id' => 270,
				'amphur_code' => '3121',
				'amphur_name' => 'บ้านด่าน   ',
				'province_id' => 20,
			),
			270 => 
			array (
				'amphur_id' => 271,
				'amphur_code' => '3122',
				'amphur_name' => 'แคนดง   ',
				'province_id' => 20,
			),
			271 => 
			array (
				'amphur_id' => 272,
				'amphur_code' => '3123',
				'amphur_name' => 'เฉลิมพระเกียรติ   ',
				'province_id' => 20,
			),
			272 => 
			array (
				'amphur_id' => 273,
				'amphur_code' => '3201',
				'amphur_name' => 'เมืองสุรินทร์   ',
				'province_id' => 21,
			),
			273 => 
			array (
				'amphur_id' => 274,
				'amphur_code' => '3202',
				'amphur_name' => 'ชุมพลบุรี   ',
				'province_id' => 21,
			),
			274 => 
			array (
				'amphur_id' => 275,
				'amphur_code' => '3203',
				'amphur_name' => 'ท่าตูม   ',
				'province_id' => 21,
			),
			275 => 
			array (
				'amphur_id' => 276,
				'amphur_code' => '3204',
				'amphur_name' => 'จอมพระ   ',
				'province_id' => 21,
			),
			276 => 
			array (
				'amphur_id' => 277,
				'amphur_code' => '3205',
				'amphur_name' => 'ปราสาท   ',
				'province_id' => 21,
			),
			277 => 
			array (
				'amphur_id' => 278,
				'amphur_code' => '3206',
				'amphur_name' => 'กาบเชิง   ',
				'province_id' => 21,
			),
			278 => 
			array (
				'amphur_id' => 279,
				'amphur_code' => '3207',
				'amphur_name' => 'รัตนบุรี   ',
				'province_id' => 21,
			),
			279 => 
			array (
				'amphur_id' => 280,
				'amphur_code' => '3208',
				'amphur_name' => 'สนม   ',
				'province_id' => 21,
			),
			280 => 
			array (
				'amphur_id' => 281,
				'amphur_code' => '3209',
				'amphur_name' => 'ศีขรภูมิ   ',
				'province_id' => 21,
			),
			281 => 
			array (
				'amphur_id' => 282,
				'amphur_code' => '3210',
				'amphur_name' => 'สังขะ   ',
				'province_id' => 21,
			),
			282 => 
			array (
				'amphur_id' => 283,
				'amphur_code' => '3211',
				'amphur_name' => 'ลำดวน   ',
				'province_id' => 21,
			),
			283 => 
			array (
				'amphur_id' => 284,
				'amphur_code' => '3212',
				'amphur_name' => 'สำโรงทาบ   ',
				'province_id' => 21,
			),
			284 => 
			array (
				'amphur_id' => 285,
				'amphur_code' => '3213',
				'amphur_name' => 'บัวเชด   ',
				'province_id' => 21,
			),
			285 => 
			array (
				'amphur_id' => 286,
				'amphur_code' => '3214',
				'amphur_name' => 'พนมดงรัก   ',
				'province_id' => 21,
			),
			286 => 
			array (
				'amphur_id' => 287,
				'amphur_code' => '3215',
				'amphur_name' => 'ศรีณรงค์   ',
				'province_id' => 21,
			),
			287 => 
			array (
				'amphur_id' => 288,
				'amphur_code' => '3216',
				'amphur_name' => 'เขวาสินรินทร์   ',
				'province_id' => 21,
			),
			288 => 
			array (
				'amphur_id' => 289,
				'amphur_code' => '3217',
				'amphur_name' => 'โนนนารายณ์   ',
				'province_id' => 21,
			),
			289 => 
			array (
				'amphur_id' => 290,
				'amphur_code' => '3301',
				'amphur_name' => 'เมืองศรีสะเกษ   ',
				'province_id' => 22,
			),
			290 => 
			array (
				'amphur_id' => 291,
				'amphur_code' => '3302',
				'amphur_name' => 'ยางชุมน้อย   ',
				'province_id' => 22,
			),
			291 => 
			array (
				'amphur_id' => 292,
				'amphur_code' => '3303',
				'amphur_name' => 'กันทรารมย์   ',
				'province_id' => 22,
			),
			292 => 
			array (
				'amphur_id' => 293,
				'amphur_code' => '3304',
				'amphur_name' => 'กันทรลักษ์   ',
				'province_id' => 22,
			),
			293 => 
			array (
				'amphur_id' => 294,
				'amphur_code' => '3305',
				'amphur_name' => 'ขุขันธ์   ',
				'province_id' => 22,
			),
			294 => 
			array (
				'amphur_id' => 295,
				'amphur_code' => '3306',
				'amphur_name' => 'ไพรบึง   ',
				'province_id' => 22,
			),
			295 => 
			array (
				'amphur_id' => 296,
				'amphur_code' => '3307',
				'amphur_name' => 'ปรางค์กู่   ',
				'province_id' => 22,
			),
			296 => 
			array (
				'amphur_id' => 297,
				'amphur_code' => '3308',
				'amphur_name' => 'ขุนหาญ   ',
				'province_id' => 22,
			),
			297 => 
			array (
				'amphur_id' => 298,
				'amphur_code' => '3309',
				'amphur_name' => 'ราษีไศล   ',
				'province_id' => 22,
			),
			298 => 
			array (
				'amphur_id' => 299,
				'amphur_code' => '3310',
				'amphur_name' => 'อุทุมพรพิสัย   ',
				'province_id' => 22,
			),
			299 => 
			array (
				'amphur_id' => 300,
				'amphur_code' => '3311',
				'amphur_name' => 'บึงบูรพ์   ',
				'province_id' => 22,
			),
			300 => 
			array (
				'amphur_id' => 301,
				'amphur_code' => '3312',
				'amphur_name' => 'ห้วยทับทัน   ',
				'province_id' => 22,
			),
			301 => 
			array (
				'amphur_id' => 302,
				'amphur_code' => '3313',
				'amphur_name' => 'โนนคูณ   ',
				'province_id' => 22,
			),
			302 => 
			array (
				'amphur_id' => 303,
				'amphur_code' => '3314',
				'amphur_name' => 'ศรีรัตนะ   ',
				'province_id' => 22,
			),
			303 => 
			array (
				'amphur_id' => 304,
				'amphur_code' => '3315',
				'amphur_name' => 'น้ำเกลี้ยง   ',
				'province_id' => 22,
			),
			304 => 
			array (
				'amphur_id' => 305,
				'amphur_code' => '3316',
				'amphur_name' => 'วังหิน   ',
				'province_id' => 22,
			),
			305 => 
			array (
				'amphur_id' => 306,
				'amphur_code' => '3317',
				'amphur_name' => 'ภูสิงห์   ',
				'province_id' => 22,
			),
			306 => 
			array (
				'amphur_id' => 307,
				'amphur_code' => '3318',
				'amphur_name' => 'เมืองจันทร์   ',
				'province_id' => 22,
			),
			307 => 
			array (
				'amphur_id' => 308,
				'amphur_code' => '3319',
				'amphur_name' => 'เบญจลักษ์   ',
				'province_id' => 22,
			),
			308 => 
			array (
				'amphur_id' => 309,
				'amphur_code' => '3320',
				'amphur_name' => 'พยุห์   ',
				'province_id' => 22,
			),
			309 => 
			array (
				'amphur_id' => 310,
				'amphur_code' => '3321',
				'amphur_name' => 'โพธิ์ศรีสุวรรณ   ',
				'province_id' => 22,
			),
			310 => 
			array (
				'amphur_id' => 311,
				'amphur_code' => '3322',
				'amphur_name' => 'ศิลาลาด   ',
				'province_id' => 22,
			),
			311 => 
			array (
				'amphur_id' => 312,
				'amphur_code' => '3401',
				'amphur_name' => 'เมืองอุบลราชธานี   ',
				'province_id' => 23,
			),
			312 => 
			array (
				'amphur_id' => 313,
				'amphur_code' => '3402',
				'amphur_name' => 'ศรีเมืองใหม่   ',
				'province_id' => 23,
			),
			313 => 
			array (
				'amphur_id' => 314,
				'amphur_code' => '3403',
				'amphur_name' => 'โขงเจียม   ',
				'province_id' => 23,
			),
			314 => 
			array (
				'amphur_id' => 315,
				'amphur_code' => '3404',
				'amphur_name' => 'เขื่องใน   ',
				'province_id' => 23,
			),
			315 => 
			array (
				'amphur_id' => 316,
				'amphur_code' => '3405',
				'amphur_name' => 'เขมราฐ   ',
				'province_id' => 23,
			),
			316 => 
			array (
				'amphur_id' => 317,
				'amphur_code' => '3406',
				'amphur_name' => '*ชานุมาน   ',
				'province_id' => 23,
			),
			317 => 
			array (
				'amphur_id' => 318,
				'amphur_code' => '3407',
				'amphur_name' => 'เดชอุดม   ',
				'province_id' => 23,
			),
			318 => 
			array (
				'amphur_id' => 319,
				'amphur_code' => '3408',
				'amphur_name' => 'นาจะหลวย   ',
				'province_id' => 23,
			),
			319 => 
			array (
				'amphur_id' => 320,
				'amphur_code' => '3409',
				'amphur_name' => 'น้ำยืน   ',
				'province_id' => 23,
			),
			320 => 
			array (
				'amphur_id' => 321,
				'amphur_code' => '3410',
				'amphur_name' => 'บุณฑริก   ',
				'province_id' => 23,
			),
			321 => 
			array (
				'amphur_id' => 322,
				'amphur_code' => '3411',
				'amphur_name' => 'ตระการพืชผล   ',
				'province_id' => 23,
			),
			322 => 
			array (
				'amphur_id' => 323,
				'amphur_code' => '3412',
				'amphur_name' => 'กุดข้าวปุ้น   ',
				'province_id' => 23,
			),
			323 => 
			array (
				'amphur_id' => 324,
				'amphur_code' => '3413',
				'amphur_name' => '*พนา   ',
				'province_id' => 23,
			),
			324 => 
			array (
				'amphur_id' => 325,
				'amphur_code' => '3414',
				'amphur_name' => 'ม่วงสามสิบ   ',
				'province_id' => 23,
			),
			325 => 
			array (
				'amphur_id' => 326,
				'amphur_code' => '3415',
				'amphur_name' => 'วารินชำราบ   ',
				'province_id' => 23,
			),
			326 => 
			array (
				'amphur_id' => 327,
				'amphur_code' => '3416',
				'amphur_name' => '*อำนาจเจริญ   ',
				'province_id' => 23,
			),
			327 => 
			array (
				'amphur_id' => 328,
				'amphur_code' => '3417',
				'amphur_name' => '*เสนางคนิคม   ',
				'province_id' => 23,
			),
			328 => 
			array (
				'amphur_id' => 329,
				'amphur_code' => '3418',
				'amphur_name' => '*หัวตะพาน   ',
				'province_id' => 23,
			),
			329 => 
			array (
				'amphur_id' => 330,
				'amphur_code' => '3419',
				'amphur_name' => 'พิบูลมังสาหาร   ',
				'province_id' => 23,
			),
			330 => 
			array (
				'amphur_id' => 331,
				'amphur_code' => '3420',
				'amphur_name' => 'ตาลสุม   ',
				'province_id' => 23,
			),
			331 => 
			array (
				'amphur_id' => 332,
				'amphur_code' => '3421',
				'amphur_name' => 'โพธิ์ไทร   ',
				'province_id' => 23,
			),
			332 => 
			array (
				'amphur_id' => 333,
				'amphur_code' => '3422',
				'amphur_name' => 'สำโรง   ',
				'province_id' => 23,
			),
			333 => 
			array (
				'amphur_id' => 334,
				'amphur_code' => '3423',
				'amphur_name' => '*กิ่งอำเภอลืออำนาจ   ',
				'province_id' => 23,
			),
			334 => 
			array (
				'amphur_id' => 335,
				'amphur_code' => '3424',
				'amphur_name' => 'ดอนมดแดง   ',
				'province_id' => 23,
			),
			335 => 
			array (
				'amphur_id' => 336,
				'amphur_code' => '3425',
				'amphur_name' => 'สิรินธร   ',
				'province_id' => 23,
			),
			336 => 
			array (
				'amphur_id' => 337,
				'amphur_code' => '3426',
				'amphur_name' => 'ทุ่งศรีอุดม   ',
				'province_id' => 23,
			),
			337 => 
			array (
				'amphur_id' => 338,
				'amphur_code' => '3427',
				'amphur_name' => '*ปทุมราชวงศา   ',
				'province_id' => 23,
			),
			338 => 
			array (
				'amphur_id' => 339,
				'amphur_code' => '3428',
				'amphur_name' => '*กิ่งอำเภอศรีหลักชัย   ',
				'province_id' => 23,
			),
			339 => 
			array (
				'amphur_id' => 340,
				'amphur_code' => '3429',
				'amphur_name' => 'นาเยีย   ',
				'province_id' => 23,
			),
			340 => 
			array (
				'amphur_id' => 341,
				'amphur_code' => '3430',
				'amphur_name' => 'นาตาล   ',
				'province_id' => 23,
			),
			341 => 
			array (
				'amphur_id' => 342,
				'amphur_code' => '3431',
				'amphur_name' => 'เหล่าเสือโก้ก   ',
				'province_id' => 23,
			),
			342 => 
			array (
				'amphur_id' => 343,
				'amphur_code' => '3432',
				'amphur_name' => 'สว่างวีระวงศ์   ',
				'province_id' => 23,
			),
			343 => 
			array (
				'amphur_id' => 344,
				'amphur_code' => '3433',
				'amphur_name' => 'น้ำขุ่น   ',
				'province_id' => 23,
			),
			344 => 
			array (
				'amphur_id' => 345,
				'amphur_code' => '3481',
				'amphur_name' => '*อ.สุวรรณวารี  จ.อุบลราชธานี   ',
				'province_id' => 23,
			),
			345 => 
			array (
				'amphur_id' => 346,
				'amphur_code' => '3501',
				'amphur_name' => 'เมืองยโสธร   ',
				'province_id' => 24,
			),
			346 => 
			array (
				'amphur_id' => 347,
				'amphur_code' => '3502',
				'amphur_name' => 'ทรายมูล   ',
				'province_id' => 24,
			),
			347 => 
			array (
				'amphur_id' => 348,
				'amphur_code' => '3503',
				'amphur_name' => 'กุดชุม   ',
				'province_id' => 24,
			),
			348 => 
			array (
				'amphur_id' => 349,
				'amphur_code' => '3504',
				'amphur_name' => 'คำเขื่อนแก้ว   ',
				'province_id' => 24,
			),
			349 => 
			array (
				'amphur_id' => 350,
				'amphur_code' => '3505',
				'amphur_name' => 'ป่าติ้ว   ',
				'province_id' => 24,
			),
			350 => 
			array (
				'amphur_id' => 351,
				'amphur_code' => '3506',
				'amphur_name' => 'มหาชนะชัย   ',
				'province_id' => 24,
			),
			351 => 
			array (
				'amphur_id' => 352,
				'amphur_code' => '3507',
				'amphur_name' => 'ค้อวัง   ',
				'province_id' => 24,
			),
			352 => 
			array (
				'amphur_id' => 353,
				'amphur_code' => '3508',
				'amphur_name' => 'เลิงนกทา   ',
				'province_id' => 24,
			),
			353 => 
			array (
				'amphur_id' => 354,
				'amphur_code' => '3509',
				'amphur_name' => 'ไทยเจริญ   ',
				'province_id' => 24,
			),
			354 => 
			array (
				'amphur_id' => 355,
				'amphur_code' => '3601',
				'amphur_name' => 'เมืองชัยภูมิ   ',
				'province_id' => 25,
			),
			355 => 
			array (
				'amphur_id' => 356,
				'amphur_code' => '3602',
				'amphur_name' => 'บ้านเขว้า   ',
				'province_id' => 25,
			),
			356 => 
			array (
				'amphur_id' => 357,
				'amphur_code' => '3603',
				'amphur_name' => 'คอนสวรรค์   ',
				'province_id' => 25,
			),
			357 => 
			array (
				'amphur_id' => 358,
				'amphur_code' => '3604',
				'amphur_name' => 'เกษตรสมบูรณ์   ',
				'province_id' => 25,
			),
			358 => 
			array (
				'amphur_id' => 359,
				'amphur_code' => '3605',
				'amphur_name' => 'หนองบัวแดง   ',
				'province_id' => 25,
			),
			359 => 
			array (
				'amphur_id' => 360,
				'amphur_code' => '3606',
				'amphur_name' => 'จัตุรัส   ',
				'province_id' => 25,
			),
			360 => 
			array (
				'amphur_id' => 361,
				'amphur_code' => '3607',
				'amphur_name' => 'บำเหน็จณรงค์   ',
				'province_id' => 25,
			),
			361 => 
			array (
				'amphur_id' => 362,
				'amphur_code' => '3608',
				'amphur_name' => 'หนองบัวระเหว   ',
				'province_id' => 25,
			),
			362 => 
			array (
				'amphur_id' => 363,
				'amphur_code' => '3609',
				'amphur_name' => 'เทพสถิต   ',
				'province_id' => 25,
			),
			363 => 
			array (
				'amphur_id' => 364,
				'amphur_code' => '3610',
				'amphur_name' => 'ภูเขียว   ',
				'province_id' => 25,
			),
			364 => 
			array (
				'amphur_id' => 365,
				'amphur_code' => '3611',
				'amphur_name' => 'บ้านแท่น   ',
				'province_id' => 25,
			),
			365 => 
			array (
				'amphur_id' => 366,
				'amphur_code' => '3612',
				'amphur_name' => 'แก้งคร้อ   ',
				'province_id' => 25,
			),
			366 => 
			array (
				'amphur_id' => 367,
				'amphur_code' => '3613',
				'amphur_name' => 'คอนสาร   ',
				'province_id' => 25,
			),
			367 => 
			array (
				'amphur_id' => 368,
				'amphur_code' => '3614',
				'amphur_name' => 'ภักดีชุมพล   ',
				'province_id' => 25,
			),
			368 => 
			array (
				'amphur_id' => 369,
				'amphur_code' => '3615',
				'amphur_name' => 'เนินสง่า   ',
				'province_id' => 25,
			),
			369 => 
			array (
				'amphur_id' => 370,
				'amphur_code' => '3616',
				'amphur_name' => 'ซับใหญ่   ',
				'province_id' => 25,
			),
			370 => 
			array (
				'amphur_id' => 371,
				'amphur_code' => '3651',
			'amphur_name' => 'เมืองชัยภูมิ (สาขาตำบลโนนสำราญ)*   ',
				'province_id' => 25,
			),
			371 => 
			array (
				'amphur_id' => 372,
				'amphur_code' => '3652',
				'amphur_name' => 'สาขาตำบลบ้านหว่าเฒ่า*   ',
				'province_id' => 25,
			),
			372 => 
			array (
				'amphur_id' => 373,
				'amphur_code' => '3653',
			'amphur_name' => 'หนองบัวแดง (สาขาตำบลวังชมภู)*   ',
				'province_id' => 25,
			),
			373 => 
			array (
				'amphur_id' => 374,
				'amphur_code' => '3654',
			'amphur_name' => 'กิ่งอำเภอซับใหญ่ (สาขาตำบลซับใหญ่)*   ',
				'province_id' => 25,
			),
			374 => 
			array (
				'amphur_id' => 375,
				'amphur_code' => '3655',
				'amphur_name' => 'สาขาตำบลโคกเพชร*   ',
				'province_id' => 25,
			),
			375 => 
			array (
				'amphur_id' => 376,
				'amphur_code' => '3656',
			'amphur_name' => 'เทพสถิต (สาขาตำบลนายางกลัก)*   ',
				'province_id' => 25,
			),
			376 => 
			array (
				'amphur_id' => 377,
				'amphur_code' => '3657',
			'amphur_name' => 'บ้านแท่น (สาขาตำบลบ้านเต่า)*   ',
				'province_id' => 25,
			),
			377 => 
			array (
				'amphur_id' => 378,
				'amphur_code' => '3658',
			'amphur_name' => 'แก้งคร้อ (สาขาตำบลท่ามะไฟหวาน)*   ',
				'province_id' => 25,
			),
			378 => 
			array (
				'amphur_id' => 379,
				'amphur_code' => '3659',
			'amphur_name' => 'คอนสาร (สาขาตำบลโนนคูณ)*   ',
				'province_id' => 25,
			),
			379 => 
			array (
				'amphur_id' => 380,
				'amphur_code' => '3701',
				'amphur_name' => 'เมืองอำนาจเจริญ   ',
				'province_id' => 26,
			),
			380 => 
			array (
				'amphur_id' => 381,
				'amphur_code' => '3702',
				'amphur_name' => 'ชานุมาน   ',
				'province_id' => 26,
			),
			381 => 
			array (
				'amphur_id' => 382,
				'amphur_code' => '3703',
				'amphur_name' => 'ปทุมราชวงศา   ',
				'province_id' => 26,
			),
			382 => 
			array (
				'amphur_id' => 383,
				'amphur_code' => '3704',
				'amphur_name' => 'พนา   ',
				'province_id' => 26,
			),
			383 => 
			array (
				'amphur_id' => 384,
				'amphur_code' => '3705',
				'amphur_name' => 'เสนางคนิคม   ',
				'province_id' => 26,
			),
			384 => 
			array (
				'amphur_id' => 385,
				'amphur_code' => '3706',
				'amphur_name' => 'หัวตะพาน   ',
				'province_id' => 26,
			),
			385 => 
			array (
				'amphur_id' => 386,
				'amphur_code' => '3707',
				'amphur_name' => 'ลืออำนาจ   ',
				'province_id' => 26,
			),
			386 => 
			array (
				'amphur_id' => 387,
				'amphur_code' => '3901',
				'amphur_name' => 'เมืองหนองบัวลำภู   ',
				'province_id' => 27,
			),
			387 => 
			array (
				'amphur_id' => 388,
				'amphur_code' => '3902',
				'amphur_name' => 'นากลาง   ',
				'province_id' => 27,
			),
			388 => 
			array (
				'amphur_id' => 389,
				'amphur_code' => '3903',
				'amphur_name' => 'โนนสัง   ',
				'province_id' => 27,
			),
			389 => 
			array (
				'amphur_id' => 390,
				'amphur_code' => '3904',
				'amphur_name' => 'ศรีบุญเรือง   ',
				'province_id' => 27,
			),
			390 => 
			array (
				'amphur_id' => 391,
				'amphur_code' => '3905',
				'amphur_name' => 'สุวรรณคูหา   ',
				'province_id' => 27,
			),
			391 => 
			array (
				'amphur_id' => 392,
				'amphur_code' => '3906',
				'amphur_name' => 'นาวัง   ',
				'province_id' => 27,
			),
			392 => 
			array (
				'amphur_id' => 393,
				'amphur_code' => '4001',
				'amphur_name' => 'เมืองขอนแก่น   ',
				'province_id' => 28,
			),
			393 => 
			array (
				'amphur_id' => 394,
				'amphur_code' => '4002',
				'amphur_name' => 'บ้านฝาง   ',
				'province_id' => 28,
			),
			394 => 
			array (
				'amphur_id' => 395,
				'amphur_code' => '4003',
				'amphur_name' => 'พระยืน   ',
				'province_id' => 28,
			),
			395 => 
			array (
				'amphur_id' => 396,
				'amphur_code' => '4004',
				'amphur_name' => 'หนองเรือ   ',
				'province_id' => 28,
			),
			396 => 
			array (
				'amphur_id' => 397,
				'amphur_code' => '4005',
				'amphur_name' => 'ชุมแพ   ',
				'province_id' => 28,
			),
			397 => 
			array (
				'amphur_id' => 398,
				'amphur_code' => '4006',
				'amphur_name' => 'สีชมพู   ',
				'province_id' => 28,
			),
			398 => 
			array (
				'amphur_id' => 399,
				'amphur_code' => '4007',
				'amphur_name' => 'น้ำพอง   ',
				'province_id' => 28,
			),
			399 => 
			array (
				'amphur_id' => 400,
				'amphur_code' => '4008',
				'amphur_name' => 'อุบลรัตน์   ',
				'province_id' => 28,
			),
			400 => 
			array (
				'amphur_id' => 401,
				'amphur_code' => '4009',
				'amphur_name' => 'กระนวน   ',
				'province_id' => 28,
			),
			401 => 
			array (
				'amphur_id' => 402,
				'amphur_code' => '4010',
				'amphur_name' => 'บ้านไผ่   ',
				'province_id' => 28,
			),
			402 => 
			array (
				'amphur_id' => 403,
				'amphur_code' => '4011',
				'amphur_name' => 'เปือยน้อย   ',
				'province_id' => 28,
			),
			403 => 
			array (
				'amphur_id' => 404,
				'amphur_code' => '4012',
				'amphur_name' => 'พล   ',
				'province_id' => 28,
			),
			404 => 
			array (
				'amphur_id' => 405,
				'amphur_code' => '4013',
				'amphur_name' => 'แวงใหญ่   ',
				'province_id' => 28,
			),
			405 => 
			array (
				'amphur_id' => 406,
				'amphur_code' => '4014',
				'amphur_name' => 'แวงน้อย   ',
				'province_id' => 28,
			),
			406 => 
			array (
				'amphur_id' => 407,
				'amphur_code' => '4015',
				'amphur_name' => 'หนองสองห้อง   ',
				'province_id' => 28,
			),
			407 => 
			array (
				'amphur_id' => 408,
				'amphur_code' => '4016',
				'amphur_name' => 'ภูเวียง   ',
				'province_id' => 28,
			),
			408 => 
			array (
				'amphur_id' => 409,
				'amphur_code' => '4017',
				'amphur_name' => 'มัญจาคีรี   ',
				'province_id' => 28,
			),
			409 => 
			array (
				'amphur_id' => 410,
				'amphur_code' => '4018',
				'amphur_name' => 'ชนบท   ',
				'province_id' => 28,
			),
			410 => 
			array (
				'amphur_id' => 411,
				'amphur_code' => '4019',
				'amphur_name' => 'เขาสวนกวาง   ',
				'province_id' => 28,
			),
			411 => 
			array (
				'amphur_id' => 412,
				'amphur_code' => '4020',
				'amphur_name' => 'ภูผาม่าน   ',
				'province_id' => 28,
			),
			412 => 
			array (
				'amphur_id' => 413,
				'amphur_code' => '4021',
				'amphur_name' => 'ซำสูง   ',
				'province_id' => 28,
			),
			413 => 
			array (
				'amphur_id' => 414,
				'amphur_code' => '4022',
				'amphur_name' => 'โคกโพธิ์ไชย   ',
				'province_id' => 28,
			),
			414 => 
			array (
				'amphur_id' => 415,
				'amphur_code' => '4023',
				'amphur_name' => 'หนองนาคำ   ',
				'province_id' => 28,
			),
			415 => 
			array (
				'amphur_id' => 416,
				'amphur_code' => '4024',
				'amphur_name' => 'บ้านแฮด   ',
				'province_id' => 28,
			),
			416 => 
			array (
				'amphur_id' => 417,
				'amphur_code' => '4025',
				'amphur_name' => 'โนนศิลา   ',
				'province_id' => 28,
			),
			417 => 
			array (
				'amphur_id' => 418,
				'amphur_code' => '4029',
				'amphur_name' => 'เวียงเก่า   ',
				'province_id' => 28,
			),
			418 => 
			array (
				'amphur_id' => 419,
				'amphur_code' => '4068',
				'amphur_name' => 'ท้องถิ่นเทศบาลตำบลบ้านเป็ด*   ',
				'province_id' => 28,
			),
			419 => 
			array (
				'amphur_id' => 420,
				'amphur_code' => '4098',
				'amphur_name' => 'เทศบาลตำบลเมืองพล*   ',
				'province_id' => 28,
			),
			420 => 
			array (
				'amphur_id' => 421,
				'amphur_code' => '4101',
				'amphur_name' => 'เมืองอุดรธานี   ',
				'province_id' => 29,
			),
			421 => 
			array (
				'amphur_id' => 422,
				'amphur_code' => '4102',
				'amphur_name' => 'กุดจับ   ',
				'province_id' => 29,
			),
			422 => 
			array (
				'amphur_id' => 423,
				'amphur_code' => '4103',
				'amphur_name' => 'หนองวัวซอ   ',
				'province_id' => 29,
			),
			423 => 
			array (
				'amphur_id' => 424,
				'amphur_code' => '4104',
				'amphur_name' => 'กุมภวาปี   ',
				'province_id' => 29,
			),
			424 => 
			array (
				'amphur_id' => 425,
				'amphur_code' => '4105',
				'amphur_name' => 'โนนสะอาด   ',
				'province_id' => 29,
			),
			425 => 
			array (
				'amphur_id' => 426,
				'amphur_code' => '4106',
				'amphur_name' => 'หนองหาน   ',
				'province_id' => 29,
			),
			426 => 
			array (
				'amphur_id' => 427,
				'amphur_code' => '4107',
				'amphur_name' => 'ทุ่งฝน   ',
				'province_id' => 29,
			),
			427 => 
			array (
				'amphur_id' => 428,
				'amphur_code' => '4108',
				'amphur_name' => 'ไชยวาน   ',
				'province_id' => 29,
			),
			428 => 
			array (
				'amphur_id' => 429,
				'amphur_code' => '4109',
				'amphur_name' => 'ศรีธาตุ   ',
				'province_id' => 29,
			),
			429 => 
			array (
				'amphur_id' => 430,
				'amphur_code' => '4110',
				'amphur_name' => 'วังสามหมอ   ',
				'province_id' => 29,
			),
			430 => 
			array (
				'amphur_id' => 431,
				'amphur_code' => '4111',
				'amphur_name' => 'บ้านดุง   ',
				'province_id' => 29,
			),
			431 => 
			array (
				'amphur_id' => 432,
				'amphur_code' => '4112',
				'amphur_name' => '*หนองบัวลำภู   ',
				'province_id' => 29,
			),
			432 => 
			array (
				'amphur_id' => 433,
				'amphur_code' => '4113',
				'amphur_name' => '*ศรีบุญเรือง   ',
				'province_id' => 29,
			),
			433 => 
			array (
				'amphur_id' => 434,
				'amphur_code' => '4114',
				'amphur_name' => '*นากลาง   ',
				'province_id' => 29,
			),
			434 => 
			array (
				'amphur_id' => 435,
				'amphur_code' => '4115',
				'amphur_name' => '*สุวรรณคูหา   ',
				'province_id' => 29,
			),
			435 => 
			array (
				'amphur_id' => 436,
				'amphur_code' => '4116',
				'amphur_name' => '*โนนสัง   ',
				'province_id' => 29,
			),
			436 => 
			array (
				'amphur_id' => 437,
				'amphur_code' => '4117',
				'amphur_name' => 'บ้านผือ   ',
				'province_id' => 29,
			),
			437 => 
			array (
				'amphur_id' => 438,
				'amphur_code' => '4118',
				'amphur_name' => 'น้ำโสม   ',
				'province_id' => 29,
			),
			438 => 
			array (
				'amphur_id' => 439,
				'amphur_code' => '4119',
				'amphur_name' => 'เพ็ญ   ',
				'province_id' => 29,
			),
			439 => 
			array (
				'amphur_id' => 440,
				'amphur_code' => '4120',
				'amphur_name' => 'สร้างคอม   ',
				'province_id' => 29,
			),
			440 => 
			array (
				'amphur_id' => 441,
				'amphur_code' => '4121',
				'amphur_name' => 'หนองแสง   ',
				'province_id' => 29,
			),
			441 => 
			array (
				'amphur_id' => 442,
				'amphur_code' => '4122',
				'amphur_name' => 'นายูง   ',
				'province_id' => 29,
			),
			442 => 
			array (
				'amphur_id' => 443,
				'amphur_code' => '4123',
				'amphur_name' => 'พิบูลย์รักษ์   ',
				'province_id' => 29,
			),
			443 => 
			array (
				'amphur_id' => 444,
				'amphur_code' => '4124',
				'amphur_name' => 'กู่แก้ว   ',
				'province_id' => 29,
			),
			444 => 
			array (
				'amphur_id' => 445,
				'amphur_code' => '4125',
				'amphur_name' => 'ประจักษ์ศิลปาคม   ',
				'province_id' => 29,
			),
			445 => 
			array (
				'amphur_id' => 446,
				'amphur_code' => '4201',
				'amphur_name' => 'เมืองเลย   ',
				'province_id' => 30,
			),
			446 => 
			array (
				'amphur_id' => 447,
				'amphur_code' => '4202',
				'amphur_name' => 'นาด้วง   ',
				'province_id' => 30,
			),
			447 => 
			array (
				'amphur_id' => 448,
				'amphur_code' => '4203',
				'amphur_name' => 'เชียงคาน   ',
				'province_id' => 30,
			),
			448 => 
			array (
				'amphur_id' => 449,
				'amphur_code' => '4204',
				'amphur_name' => 'ปากชม   ',
				'province_id' => 30,
			),
			449 => 
			array (
				'amphur_id' => 450,
				'amphur_code' => '4205',
				'amphur_name' => 'ด่านซ้าย   ',
				'province_id' => 30,
			),
			450 => 
			array (
				'amphur_id' => 451,
				'amphur_code' => '4206',
				'amphur_name' => 'นาแห้ว   ',
				'province_id' => 30,
			),
			451 => 
			array (
				'amphur_id' => 452,
				'amphur_code' => '4207',
				'amphur_name' => 'ภูเรือ   ',
				'province_id' => 30,
			),
			452 => 
			array (
				'amphur_id' => 453,
				'amphur_code' => '4208',
				'amphur_name' => 'ท่าลี่   ',
				'province_id' => 30,
			),
			453 => 
			array (
				'amphur_id' => 454,
				'amphur_code' => '4209',
				'amphur_name' => 'วังสะพุง   ',
				'province_id' => 30,
			),
			454 => 
			array (
				'amphur_id' => 455,
				'amphur_code' => '4210',
				'amphur_name' => 'ภูกระดึง   ',
				'province_id' => 30,
			),
			455 => 
			array (
				'amphur_id' => 456,
				'amphur_code' => '4211',
				'amphur_name' => 'ภูหลวง   ',
				'province_id' => 30,
			),
			456 => 
			array (
				'amphur_id' => 457,
				'amphur_code' => '4212',
				'amphur_name' => 'ผาขาว   ',
				'province_id' => 30,
			),
			457 => 
			array (
				'amphur_id' => 458,
				'amphur_code' => '4213',
				'amphur_name' => 'เอราวัณ   ',
				'province_id' => 30,
			),
			458 => 
			array (
				'amphur_id' => 459,
				'amphur_code' => '4214',
				'amphur_name' => 'หนองหิน   ',
				'province_id' => 30,
			),
			459 => 
			array (
				'amphur_id' => 460,
				'amphur_code' => '4301',
				'amphur_name' => 'เมืองหนองคาย   ',
				'province_id' => 31,
			),
			460 => 
			array (
				'amphur_id' => 461,
				'amphur_code' => '4302',
				'amphur_name' => 'ท่าบ่อ   ',
				'province_id' => 31,
			),
			461 => 
			array (
				'amphur_id' => 464,
				'amphur_code' => '4305',
				'amphur_name' => 'โพนพิสัย   ',
				'province_id' => 31,
			),
			462 => 
			array (
				'amphur_id' => 466,
				'amphur_code' => '4307',
				'amphur_name' => 'ศรีเชียงใหม่   ',
				'province_id' => 31,
			),
			463 => 
			array (
				'amphur_id' => 467,
				'amphur_code' => '4308',
				'amphur_name' => 'สังคม   ',
				'province_id' => 31,
			),
			464 => 
			array (
				'amphur_id' => 473,
				'amphur_code' => '4314',
				'amphur_name' => 'สระใคร   ',
				'province_id' => 31,
			),
			465 => 
			array (
				'amphur_id' => 474,
				'amphur_code' => '4315',
				'amphur_name' => 'เฝ้าไร่   ',
				'province_id' => 31,
			),
			466 => 
			array (
				'amphur_id' => 475,
				'amphur_code' => '4316',
				'amphur_name' => 'รัตนวาปี   ',
				'province_id' => 31,
			),
			467 => 
			array (
				'amphur_id' => 476,
				'amphur_code' => '4317',
				'amphur_name' => 'โพธิ์ตาก   ',
				'province_id' => 31,
			),
			468 => 
			array (
				'amphur_id' => 477,
				'amphur_code' => '4401',
				'amphur_name' => 'เมืองมหาสารคาม   ',
				'province_id' => 32,
			),
			469 => 
			array (
				'amphur_id' => 478,
				'amphur_code' => '4402',
				'amphur_name' => 'แกดำ   ',
				'province_id' => 32,
			),
			470 => 
			array (
				'amphur_id' => 479,
				'amphur_code' => '4403',
				'amphur_name' => 'โกสุมพิสัย   ',
				'province_id' => 32,
			),
			471 => 
			array (
				'amphur_id' => 480,
				'amphur_code' => '4404',
				'amphur_name' => 'กันทรวิชัย   ',
				'province_id' => 32,
			),
			472 => 
			array (
				'amphur_id' => 481,
				'amphur_code' => '4405',
				'amphur_name' => 'เชียงยืน   ',
				'province_id' => 32,
			),
			473 => 
			array (
				'amphur_id' => 482,
				'amphur_code' => '4406',
				'amphur_name' => 'บรบือ   ',
				'province_id' => 32,
			),
			474 => 
			array (
				'amphur_id' => 483,
				'amphur_code' => '4407',
				'amphur_name' => 'นาเชือก   ',
				'province_id' => 32,
			),
			475 => 
			array (
				'amphur_id' => 484,
				'amphur_code' => '4408',
				'amphur_name' => 'พยัคฆภูมิพิสัย   ',
				'province_id' => 32,
			),
			476 => 
			array (
				'amphur_id' => 485,
				'amphur_code' => '4409',
				'amphur_name' => 'วาปีปทุม   ',
				'province_id' => 32,
			),
			477 => 
			array (
				'amphur_id' => 486,
				'amphur_code' => '4410',
				'amphur_name' => 'นาดูน   ',
				'province_id' => 32,
			),
			478 => 
			array (
				'amphur_id' => 487,
				'amphur_code' => '4411',
				'amphur_name' => 'ยางสีสุราช   ',
				'province_id' => 32,
			),
			479 => 
			array (
				'amphur_id' => 488,
				'amphur_code' => '4412',
				'amphur_name' => 'กุดรัง   ',
				'province_id' => 32,
			),
			480 => 
			array (
				'amphur_id' => 489,
				'amphur_code' => '4413',
				'amphur_name' => 'ชื่นชม   ',
				'province_id' => 32,
			),
			481 => 
			array (
				'amphur_id' => 490,
				'amphur_code' => '4481',
				'amphur_name' => '*หลุบ   ',
				'province_id' => 32,
			),
			482 => 
			array (
				'amphur_id' => 491,
				'amphur_code' => '4501',
				'amphur_name' => 'เมืองร้อยเอ็ด   ',
				'province_id' => 33,
			),
			483 => 
			array (
				'amphur_id' => 492,
				'amphur_code' => '4502',
				'amphur_name' => 'เกษตรวิสัย   ',
				'province_id' => 33,
			),
			484 => 
			array (
				'amphur_id' => 493,
				'amphur_code' => '4503',
				'amphur_name' => 'ปทุมรัตต์   ',
				'province_id' => 33,
			),
			485 => 
			array (
				'amphur_id' => 494,
				'amphur_code' => '4504',
				'amphur_name' => 'จตุรพักตรพิมาน   ',
				'province_id' => 33,
			),
			486 => 
			array (
				'amphur_id' => 495,
				'amphur_code' => '4505',
				'amphur_name' => 'ธวัชบุรี   ',
				'province_id' => 33,
			),
			487 => 
			array (
				'amphur_id' => 496,
				'amphur_code' => '4506',
				'amphur_name' => 'พนมไพร   ',
				'province_id' => 33,
			),
			488 => 
			array (
				'amphur_id' => 497,
				'amphur_code' => '4507',
				'amphur_name' => 'โพนทอง   ',
				'province_id' => 33,
			),
			489 => 
			array (
				'amphur_id' => 498,
				'amphur_code' => '4508',
				'amphur_name' => 'โพธิ์ชัย   ',
				'province_id' => 33,
			),
			490 => 
			array (
				'amphur_id' => 499,
				'amphur_code' => '4509',
				'amphur_name' => 'หนองพอก   ',
				'province_id' => 33,
			),
			491 => 
			array (
				'amphur_id' => 500,
				'amphur_code' => '4510',
				'amphur_name' => 'เสลภูมิ   ',
				'province_id' => 33,
			),
			492 => 
			array (
				'amphur_id' => 501,
				'amphur_code' => '4511',
				'amphur_name' => 'สุวรรณภูมิ   ',
				'province_id' => 33,
			),
			493 => 
			array (
				'amphur_id' => 502,
				'amphur_code' => '4512',
				'amphur_name' => 'เมืองสรวง   ',
				'province_id' => 33,
			),
			494 => 
			array (
				'amphur_id' => 503,
				'amphur_code' => '4513',
				'amphur_name' => 'โพนทราย   ',
				'province_id' => 33,
			),
			495 => 
			array (
				'amphur_id' => 504,
				'amphur_code' => '4514',
				'amphur_name' => 'อาจสามารถ   ',
				'province_id' => 33,
			),
			496 => 
			array (
				'amphur_id' => 505,
				'amphur_code' => '4515',
				'amphur_name' => 'เมยวดี   ',
				'province_id' => 33,
			),
			497 => 
			array (
				'amphur_id' => 506,
				'amphur_code' => '4516',
				'amphur_name' => 'ศรีสมเด็จ   ',
				'province_id' => 33,
			),
			498 => 
			array (
				'amphur_id' => 507,
				'amphur_code' => '4517',
				'amphur_name' => 'จังหาร   ',
				'province_id' => 33,
			),
			499 => 
			array (
				'amphur_id' => 508,
				'amphur_code' => '4518',
				'amphur_name' => 'เชียงขวัญ   ',
				'province_id' => 33,
			),
		));
		\DB::table('tb_amphur')->insert(array (
			0 => 
			array (
				'amphur_id' => 509,
				'amphur_code' => '4519',
				'amphur_name' => 'หนองฮี   ',
				'province_id' => 33,
			),
			1 => 
			array (
				'amphur_id' => 510,
				'amphur_code' => '4520',
				'amphur_name' => 'ทุ่งเขาหลวง   ',
				'province_id' => 33,
			),
			2 => 
			array (
				'amphur_id' => 511,
				'amphur_code' => '4601',
				'amphur_name' => 'เมืองกาฬสินธุ์   ',
				'province_id' => 34,
			),
			3 => 
			array (
				'amphur_id' => 512,
				'amphur_code' => '4602',
				'amphur_name' => 'นามน   ',
				'province_id' => 34,
			),
			4 => 
			array (
				'amphur_id' => 513,
				'amphur_code' => '4603',
				'amphur_name' => 'กมลาไสย   ',
				'province_id' => 34,
			),
			5 => 
			array (
				'amphur_id' => 514,
				'amphur_code' => '4604',
				'amphur_name' => 'ร่องคำ   ',
				'province_id' => 34,
			),
			6 => 
			array (
				'amphur_id' => 515,
				'amphur_code' => '4605',
				'amphur_name' => 'กุฉินารายณ์   ',
				'province_id' => 34,
			),
			7 => 
			array (
				'amphur_id' => 516,
				'amphur_code' => '4606',
				'amphur_name' => 'เขาวง   ',
				'province_id' => 34,
			),
			8 => 
			array (
				'amphur_id' => 517,
				'amphur_code' => '4607',
				'amphur_name' => 'ยางตลาด   ',
				'province_id' => 34,
			),
			9 => 
			array (
				'amphur_id' => 518,
				'amphur_code' => '4608',
				'amphur_name' => 'ห้วยเม็ก   ',
				'province_id' => 34,
			),
			10 => 
			array (
				'amphur_id' => 519,
				'amphur_code' => '4609',
				'amphur_name' => 'สหัสขันธ์   ',
				'province_id' => 34,
			),
			11 => 
			array (
				'amphur_id' => 520,
				'amphur_code' => '4610',
				'amphur_name' => 'คำม่วง   ',
				'province_id' => 34,
			),
			12 => 
			array (
				'amphur_id' => 521,
				'amphur_code' => '4611',
				'amphur_name' => 'ท่าคันโท   ',
				'province_id' => 34,
			),
			13 => 
			array (
				'amphur_id' => 522,
				'amphur_code' => '4612',
				'amphur_name' => 'หนองกุงศรี   ',
				'province_id' => 34,
			),
			14 => 
			array (
				'amphur_id' => 523,
				'amphur_code' => '4613',
				'amphur_name' => 'สมเด็จ   ',
				'province_id' => 34,
			),
			15 => 
			array (
				'amphur_id' => 524,
				'amphur_code' => '4614',
				'amphur_name' => 'ห้วยผึ้ง   ',
				'province_id' => 34,
			),
			16 => 
			array (
				'amphur_id' => 525,
				'amphur_code' => '4615',
				'amphur_name' => 'สามชัย   ',
				'province_id' => 34,
			),
			17 => 
			array (
				'amphur_id' => 526,
				'amphur_code' => '4616',
				'amphur_name' => 'นาคู   ',
				'province_id' => 34,
			),
			18 => 
			array (
				'amphur_id' => 527,
				'amphur_code' => '4617',
				'amphur_name' => 'ดอนจาน   ',
				'province_id' => 34,
			),
			19 => 
			array (
				'amphur_id' => 528,
				'amphur_code' => '4618',
				'amphur_name' => 'ฆ้องชัย   ',
				'province_id' => 34,
			),
			20 => 
			array (
				'amphur_id' => 529,
				'amphur_code' => '4701',
				'amphur_name' => 'เมืองสกลนคร   ',
				'province_id' => 35,
			),
			21 => 
			array (
				'amphur_id' => 530,
				'amphur_code' => '4702',
				'amphur_name' => 'กุสุมาลย์   ',
				'province_id' => 35,
			),
			22 => 
			array (
				'amphur_id' => 531,
				'amphur_code' => '4703',
				'amphur_name' => 'กุดบาก   ',
				'province_id' => 35,
			),
			23 => 
			array (
				'amphur_id' => 532,
				'amphur_code' => '4704',
				'amphur_name' => 'พรรณานิคม   ',
				'province_id' => 35,
			),
			24 => 
			array (
				'amphur_id' => 533,
				'amphur_code' => '4705',
				'amphur_name' => 'พังโคน   ',
				'province_id' => 35,
			),
			25 => 
			array (
				'amphur_id' => 534,
				'amphur_code' => '4706',
				'amphur_name' => 'วาริชภูมิ   ',
				'province_id' => 35,
			),
			26 => 
			array (
				'amphur_id' => 535,
				'amphur_code' => '4707',
				'amphur_name' => 'นิคมน้ำอูน   ',
				'province_id' => 35,
			),
			27 => 
			array (
				'amphur_id' => 536,
				'amphur_code' => '4708',
				'amphur_name' => 'วานรนิวาส   ',
				'province_id' => 35,
			),
			28 => 
			array (
				'amphur_id' => 537,
				'amphur_code' => '4709',
				'amphur_name' => 'คำตากล้า   ',
				'province_id' => 35,
			),
			29 => 
			array (
				'amphur_id' => 538,
				'amphur_code' => '4710',
				'amphur_name' => 'บ้านม่วง   ',
				'province_id' => 35,
			),
			30 => 
			array (
				'amphur_id' => 539,
				'amphur_code' => '4711',
				'amphur_name' => 'อากาศอำนวย   ',
				'province_id' => 35,
			),
			31 => 
			array (
				'amphur_id' => 540,
				'amphur_code' => '4712',
				'amphur_name' => 'สว่างแดนดิน   ',
				'province_id' => 35,
			),
			32 => 
			array (
				'amphur_id' => 541,
				'amphur_code' => '4713',
				'amphur_name' => 'ส่องดาว   ',
				'province_id' => 35,
			),
			33 => 
			array (
				'amphur_id' => 542,
				'amphur_code' => '4714',
				'amphur_name' => 'เต่างอย   ',
				'province_id' => 35,
			),
			34 => 
			array (
				'amphur_id' => 543,
				'amphur_code' => '4715',
				'amphur_name' => 'โคกศรีสุพรรณ   ',
				'province_id' => 35,
			),
			35 => 
			array (
				'amphur_id' => 544,
				'amphur_code' => '4716',
				'amphur_name' => 'เจริญศิลป์   ',
				'province_id' => 35,
			),
			36 => 
			array (
				'amphur_id' => 545,
				'amphur_code' => '4717',
				'amphur_name' => 'โพนนาแก้ว   ',
				'province_id' => 35,
			),
			37 => 
			array (
				'amphur_id' => 546,
				'amphur_code' => '4718',
				'amphur_name' => 'ภูพาน   ',
				'province_id' => 35,
			),
			38 => 
			array (
				'amphur_id' => 547,
				'amphur_code' => '4751',
			'amphur_name' => 'วานรนิวาส (สาขาตำบลกุดเรือคำ)*   ',
				'province_id' => 35,
			),
			39 => 
			array (
				'amphur_id' => 548,
				'amphur_code' => '4781',
				'amphur_name' => '*อ.บ้านหัน  จ.สกลนคร   ',
				'province_id' => 35,
			),
			40 => 
			array (
				'amphur_id' => 549,
				'amphur_code' => '4801',
				'amphur_name' => 'เมืองนครพนม   ',
				'province_id' => 36,
			),
			41 => 
			array (
				'amphur_id' => 550,
				'amphur_code' => '4802',
				'amphur_name' => 'ปลาปาก   ',
				'province_id' => 36,
			),
			42 => 
			array (
				'amphur_id' => 551,
				'amphur_code' => '4803',
				'amphur_name' => 'ท่าอุเทน   ',
				'province_id' => 36,
			),
			43 => 
			array (
				'amphur_id' => 552,
				'amphur_code' => '4804',
				'amphur_name' => 'บ้านแพง   ',
				'province_id' => 36,
			),
			44 => 
			array (
				'amphur_id' => 553,
				'amphur_code' => '4805',
				'amphur_name' => 'ธาตุพนม   ',
				'province_id' => 36,
			),
			45 => 
			array (
				'amphur_id' => 554,
				'amphur_code' => '4806',
				'amphur_name' => 'เรณูนคร   ',
				'province_id' => 36,
			),
			46 => 
			array (
				'amphur_id' => 555,
				'amphur_code' => '4807',
				'amphur_name' => 'นาแก   ',
				'province_id' => 36,
			),
			47 => 
			array (
				'amphur_id' => 556,
				'amphur_code' => '4808',
				'amphur_name' => 'ศรีสงคราม   ',
				'province_id' => 36,
			),
			48 => 
			array (
				'amphur_id' => 557,
				'amphur_code' => '4809',
				'amphur_name' => 'นาหว้า   ',
				'province_id' => 36,
			),
			49 => 
			array (
				'amphur_id' => 558,
				'amphur_code' => '4810',
				'amphur_name' => 'โพนสวรรค์   ',
				'province_id' => 36,
			),
			50 => 
			array (
				'amphur_id' => 559,
				'amphur_code' => '4811',
				'amphur_name' => 'นาทม   ',
				'province_id' => 36,
			),
			51 => 
			array (
				'amphur_id' => 560,
				'amphur_code' => '4812',
				'amphur_name' => 'วังยาง   ',
				'province_id' => 36,
			),
			52 => 
			array (
				'amphur_id' => 561,
				'amphur_code' => '4901',
				'amphur_name' => 'เมืองมุกดาหาร   ',
				'province_id' => 37,
			),
			53 => 
			array (
				'amphur_id' => 562,
				'amphur_code' => '4902',
				'amphur_name' => 'นิคมคำสร้อย   ',
				'province_id' => 37,
			),
			54 => 
			array (
				'amphur_id' => 563,
				'amphur_code' => '4903',
				'amphur_name' => 'ดอนตาล   ',
				'province_id' => 37,
			),
			55 => 
			array (
				'amphur_id' => 564,
				'amphur_code' => '4904',
				'amphur_name' => 'ดงหลวง   ',
				'province_id' => 37,
			),
			56 => 
			array (
				'amphur_id' => 565,
				'amphur_code' => '4905',
				'amphur_name' => 'คำชะอี   ',
				'province_id' => 37,
			),
			57 => 
			array (
				'amphur_id' => 566,
				'amphur_code' => '4906',
				'amphur_name' => 'หว้านใหญ่   ',
				'province_id' => 37,
			),
			58 => 
			array (
				'amphur_id' => 567,
				'amphur_code' => '4907',
				'amphur_name' => 'หนองสูง   ',
				'province_id' => 37,
			),
			59 => 
			array (
				'amphur_id' => 568,
				'amphur_code' => '5001',
				'amphur_name' => 'เมืองเชียงใหม่   ',
				'province_id' => 38,
			),
			60 => 
			array (
				'amphur_id' => 569,
				'amphur_code' => '5002',
				'amphur_name' => 'จอมทอง   ',
				'province_id' => 38,
			),
			61 => 
			array (
				'amphur_id' => 570,
				'amphur_code' => '5003',
				'amphur_name' => 'แม่แจ่ม   ',
				'province_id' => 38,
			),
			62 => 
			array (
				'amphur_id' => 571,
				'amphur_code' => '5004',
				'amphur_name' => 'เชียงดาว   ',
				'province_id' => 38,
			),
			63 => 
			array (
				'amphur_id' => 572,
				'amphur_code' => '5005',
				'amphur_name' => 'ดอยสะเก็ด   ',
				'province_id' => 38,
			),
			64 => 
			array (
				'amphur_id' => 573,
				'amphur_code' => '5006',
				'amphur_name' => 'แม่แตง   ',
				'province_id' => 38,
			),
			65 => 
			array (
				'amphur_id' => 574,
				'amphur_code' => '5007',
				'amphur_name' => 'แม่ริม   ',
				'province_id' => 38,
			),
			66 => 
			array (
				'amphur_id' => 575,
				'amphur_code' => '5008',
				'amphur_name' => 'สะเมิง   ',
				'province_id' => 38,
			),
			67 => 
			array (
				'amphur_id' => 576,
				'amphur_code' => '5009',
				'amphur_name' => 'ฝาง   ',
				'province_id' => 38,
			),
			68 => 
			array (
				'amphur_id' => 577,
				'amphur_code' => '5010',
				'amphur_name' => 'แม่อาย   ',
				'province_id' => 38,
			),
			69 => 
			array (
				'amphur_id' => 578,
				'amphur_code' => '5011',
				'amphur_name' => 'พร้าว   ',
				'province_id' => 38,
			),
			70 => 
			array (
				'amphur_id' => 579,
				'amphur_code' => '5012',
				'amphur_name' => 'สันป่าตอง   ',
				'province_id' => 38,
			),
			71 => 
			array (
				'amphur_id' => 580,
				'amphur_code' => '5013',
				'amphur_name' => 'สันกำแพง   ',
				'province_id' => 38,
			),
			72 => 
			array (
				'amphur_id' => 581,
				'amphur_code' => '5014',
				'amphur_name' => 'สันทราย   ',
				'province_id' => 38,
			),
			73 => 
			array (
				'amphur_id' => 582,
				'amphur_code' => '5015',
				'amphur_name' => 'หางดง   ',
				'province_id' => 38,
			),
			74 => 
			array (
				'amphur_id' => 583,
				'amphur_code' => '5016',
				'amphur_name' => 'ฮอด   ',
				'province_id' => 38,
			),
			75 => 
			array (
				'amphur_id' => 584,
				'amphur_code' => '5017',
				'amphur_name' => 'ดอยเต่า   ',
				'province_id' => 38,
			),
			76 => 
			array (
				'amphur_id' => 585,
				'amphur_code' => '5018',
				'amphur_name' => 'อมก๋อย   ',
				'province_id' => 38,
			),
			77 => 
			array (
				'amphur_id' => 586,
				'amphur_code' => '5019',
				'amphur_name' => 'สารภี   ',
				'province_id' => 38,
			),
			78 => 
			array (
				'amphur_id' => 587,
				'amphur_code' => '5020',
				'amphur_name' => 'เวียงแหง   ',
				'province_id' => 38,
			),
			79 => 
			array (
				'amphur_id' => 588,
				'amphur_code' => '5021',
				'amphur_name' => 'ไชยปราการ   ',
				'province_id' => 38,
			),
			80 => 
			array (
				'amphur_id' => 589,
				'amphur_code' => '5022',
				'amphur_name' => 'แม่วาง   ',
				'province_id' => 38,
			),
			81 => 
			array (
				'amphur_id' => 590,
				'amphur_code' => '5023',
				'amphur_name' => 'แม่ออน   ',
				'province_id' => 38,
			),
			82 => 
			array (
				'amphur_id' => 591,
				'amphur_code' => '5024',
				'amphur_name' => 'ดอยหล่อ   ',
				'province_id' => 38,
			),
			83 => 
			array (
				'amphur_id' => 592,
				'amphur_code' => '5051',
				'amphur_name' => 'เทศบาลนครเชียงใหม่ (สาขาแขวงกาลวิละ*   ',
					'province_id' => 38,
				),
				84 => 
				array (
					'amphur_id' => 593,
					'amphur_code' => '5052',
					'amphur_name' => 'เทศบาลนครเชียงใหม่ (สาขาแขวงศรีวิชั*   ',
						'province_id' => 38,
					),
					85 => 
					array (
						'amphur_id' => 594,
						'amphur_code' => '5053',
						'amphur_name' => 'เทศบาลนครเชียงใหม่ (สาขาเม็งราย*   ',
							'province_id' => 38,
						),
						86 => 
						array (
							'amphur_id' => 595,
							'amphur_code' => '5101',
							'amphur_name' => 'เมืองลำพูน   ',
							'province_id' => 39,
						),
						87 => 
						array (
							'amphur_id' => 596,
							'amphur_code' => '5102',
							'amphur_name' => 'แม่ทา   ',
							'province_id' => 39,
						),
						88 => 
						array (
							'amphur_id' => 597,
							'amphur_code' => '5103',
							'amphur_name' => 'บ้านโฮ่ง   ',
							'province_id' => 39,
						),
						89 => 
						array (
							'amphur_id' => 598,
							'amphur_code' => '5104',
							'amphur_name' => 'ลี้   ',
							'province_id' => 39,
						),
						90 => 
						array (
							'amphur_id' => 599,
							'amphur_code' => '5105',
							'amphur_name' => 'ทุ่งหัวช้าง   ',
							'province_id' => 39,
						),
						91 => 
						array (
							'amphur_id' => 600,
							'amphur_code' => '5106',
							'amphur_name' => 'ป่าซาง   ',
							'province_id' => 39,
						),
						92 => 
						array (
							'amphur_id' => 601,
							'amphur_code' => '5107',
							'amphur_name' => 'บ้านธิ   ',
							'province_id' => 39,
						),
						93 => 
						array (
							'amphur_id' => 602,
							'amphur_code' => '5108',
							'amphur_name' => 'เวียงหนองล่อง   ',
							'province_id' => 39,
						),
						94 => 
						array (
							'amphur_id' => 603,
							'amphur_code' => '5201',
							'amphur_name' => 'เมืองลำปาง   ',
							'province_id' => 40,
						),
						95 => 
						array (
							'amphur_id' => 604,
							'amphur_code' => '5202',
							'amphur_name' => 'แม่เมาะ   ',
							'province_id' => 40,
						),
						96 => 
						array (
							'amphur_id' => 605,
							'amphur_code' => '5203',
							'amphur_name' => 'เกาะคา   ',
							'province_id' => 40,
						),
						97 => 
						array (
							'amphur_id' => 606,
							'amphur_code' => '5204',
							'amphur_name' => 'เสริมงาม   ',
							'province_id' => 40,
						),
						98 => 
						array (
							'amphur_id' => 607,
							'amphur_code' => '5205',
							'amphur_name' => 'งาว   ',
							'province_id' => 40,
						),
						99 => 
						array (
							'amphur_id' => 608,
							'amphur_code' => '5206',
							'amphur_name' => 'แจ้ห่ม   ',
							'province_id' => 40,
						),
						100 => 
						array (
							'amphur_id' => 609,
							'amphur_code' => '5207',
							'amphur_name' => 'วังเหนือ   ',
							'province_id' => 40,
						),
						101 => 
						array (
							'amphur_id' => 610,
							'amphur_code' => '5208',
							'amphur_name' => 'เถิน   ',
							'province_id' => 40,
						),
						102 => 
						array (
							'amphur_id' => 611,
							'amphur_code' => '5209',
							'amphur_name' => 'แม่พริก   ',
							'province_id' => 40,
						),
						103 => 
						array (
							'amphur_id' => 612,
							'amphur_code' => '5210',
							'amphur_name' => 'แม่ทะ   ',
							'province_id' => 40,
						),
						104 => 
						array (
							'amphur_id' => 613,
							'amphur_code' => '5211',
							'amphur_name' => 'สบปราบ   ',
							'province_id' => 40,
						),
						105 => 
						array (
							'amphur_id' => 614,
							'amphur_code' => '5212',
							'amphur_name' => 'ห้างฉัตร   ',
							'province_id' => 40,
						),
						106 => 
						array (
							'amphur_id' => 615,
							'amphur_code' => '5213',
							'amphur_name' => 'เมืองปาน   ',
							'province_id' => 40,
						),
						107 => 
						array (
							'amphur_id' => 616,
							'amphur_code' => '5301',
							'amphur_name' => 'เมืองอุตรดิตถ์   ',
							'province_id' => 41,
						),
						108 => 
						array (
							'amphur_id' => 617,
							'amphur_code' => '5302',
							'amphur_name' => 'ตรอน   ',
							'province_id' => 41,
						),
						109 => 
						array (
							'amphur_id' => 618,
							'amphur_code' => '5303',
							'amphur_name' => 'ท่าปลา   ',
							'province_id' => 41,
						),
						110 => 
						array (
							'amphur_id' => 619,
							'amphur_code' => '5304',
							'amphur_name' => 'น้ำปาด   ',
							'province_id' => 41,
						),
						111 => 
						array (
							'amphur_id' => 620,
							'amphur_code' => '5305',
							'amphur_name' => 'ฟากท่า   ',
							'province_id' => 41,
						),
						112 => 
						array (
							'amphur_id' => 621,
							'amphur_code' => '5306',
							'amphur_name' => 'บ้านโคก   ',
							'province_id' => 41,
						),
						113 => 
						array (
							'amphur_id' => 622,
							'amphur_code' => '5307',
							'amphur_name' => 'พิชัย   ',
							'province_id' => 41,
						),
						114 => 
						array (
							'amphur_id' => 623,
							'amphur_code' => '5308',
							'amphur_name' => 'ลับแล   ',
							'province_id' => 41,
						),
						115 => 
						array (
							'amphur_id' => 624,
							'amphur_code' => '5309',
							'amphur_name' => 'ทองแสนขัน   ',
							'province_id' => 41,
						),
						116 => 
						array (
							'amphur_id' => 625,
							'amphur_code' => '5401',
							'amphur_name' => 'เมืองแพร่   ',
							'province_id' => 42,
						),
						117 => 
						array (
							'amphur_id' => 626,
							'amphur_code' => '5402',
							'amphur_name' => 'ร้องกวาง   ',
							'province_id' => 42,
						),
						118 => 
						array (
							'amphur_id' => 627,
							'amphur_code' => '5403',
							'amphur_name' => 'ลอง   ',
							'province_id' => 42,
						),
						119 => 
						array (
							'amphur_id' => 628,
							'amphur_code' => '5404',
							'amphur_name' => 'สูงเม่น   ',
							'province_id' => 42,
						),
						120 => 
						array (
							'amphur_id' => 629,
							'amphur_code' => '5405',
							'amphur_name' => 'เด่นชัย   ',
							'province_id' => 42,
						),
						121 => 
						array (
							'amphur_id' => 630,
							'amphur_code' => '5406',
							'amphur_name' => 'สอง   ',
							'province_id' => 42,
						),
						122 => 
						array (
							'amphur_id' => 631,
							'amphur_code' => '5407',
							'amphur_name' => 'วังชิ้น   ',
							'province_id' => 42,
						),
						123 => 
						array (
							'amphur_id' => 632,
							'amphur_code' => '5408',
							'amphur_name' => 'หนองม่วงไข่   ',
							'province_id' => 42,
						),
						124 => 
						array (
							'amphur_id' => 633,
							'amphur_code' => '5501',
							'amphur_name' => 'เมืองน่าน   ',
							'province_id' => 43,
						),
						125 => 
						array (
							'amphur_id' => 634,
							'amphur_code' => '5502',
							'amphur_name' => 'แม่จริม   ',
							'province_id' => 43,
						),
						126 => 
						array (
							'amphur_id' => 635,
							'amphur_code' => '5503',
							'amphur_name' => 'บ้านหลวง   ',
							'province_id' => 43,
						),
						127 => 
						array (
							'amphur_id' => 636,
							'amphur_code' => '5504',
							'amphur_name' => 'นาน้อย   ',
							'province_id' => 43,
						),
						128 => 
						array (
							'amphur_id' => 637,
							'amphur_code' => '5505',
							'amphur_name' => 'ปัว   ',
							'province_id' => 43,
						),
						129 => 
						array (
							'amphur_id' => 638,
							'amphur_code' => '5506',
							'amphur_name' => 'ท่าวังผา   ',
							'province_id' => 43,
						),
						130 => 
						array (
							'amphur_id' => 639,
							'amphur_code' => '5507',
							'amphur_name' => 'เวียงสา   ',
							'province_id' => 43,
						),
						131 => 
						array (
							'amphur_id' => 640,
							'amphur_code' => '5508',
							'amphur_name' => 'ทุ่งช้าง   ',
							'province_id' => 43,
						),
						132 => 
						array (
							'amphur_id' => 641,
							'amphur_code' => '5509',
							'amphur_name' => 'เชียงกลาง   ',
							'province_id' => 43,
						),
						133 => 
						array (
							'amphur_id' => 642,
							'amphur_code' => '5510',
							'amphur_name' => 'นาหมื่น   ',
							'province_id' => 43,
						),
						134 => 
						array (
							'amphur_id' => 643,
							'amphur_code' => '5511',
							'amphur_name' => 'สันติสุข   ',
							'province_id' => 43,
						),
						135 => 
						array (
							'amphur_id' => 644,
							'amphur_code' => '5512',
							'amphur_name' => 'บ่อเกลือ   ',
							'province_id' => 43,
						),
						136 => 
						array (
							'amphur_id' => 645,
							'amphur_code' => '5513',
							'amphur_name' => 'สองแคว   ',
							'province_id' => 43,
						),
						137 => 
						array (
							'amphur_id' => 646,
							'amphur_code' => '5514',
							'amphur_name' => 'ภูเพียง   ',
							'province_id' => 43,
						),
						138 => 
						array (
							'amphur_id' => 647,
							'amphur_code' => '5515',
							'amphur_name' => 'เฉลิมพระเกียรติ   ',
							'province_id' => 43,
						),
						139 => 
						array (
							'amphur_id' => 648,
							'amphur_code' => '5601',
							'amphur_name' => 'เมืองพะเยา   ',
							'province_id' => 44,
						),
						140 => 
						array (
							'amphur_id' => 649,
							'amphur_code' => '5602',
							'amphur_name' => 'จุน   ',
							'province_id' => 44,
						),
						141 => 
						array (
							'amphur_id' => 650,
							'amphur_code' => '5603',
							'amphur_name' => 'เชียงคำ   ',
							'province_id' => 44,
						),
						142 => 
						array (
							'amphur_id' => 651,
							'amphur_code' => '5604',
							'amphur_name' => 'เชียงม่วน   ',
							'province_id' => 44,
						),
						143 => 
						array (
							'amphur_id' => 652,
							'amphur_code' => '5605',
							'amphur_name' => 'ดอกคำใต้   ',
							'province_id' => 44,
						),
						144 => 
						array (
							'amphur_id' => 653,
							'amphur_code' => '5606',
							'amphur_name' => 'ปง   ',
							'province_id' => 44,
						),
						145 => 
						array (
							'amphur_id' => 654,
							'amphur_code' => '5607',
							'amphur_name' => 'แม่ใจ   ',
							'province_id' => 44,
						),
						146 => 
						array (
							'amphur_id' => 655,
							'amphur_code' => '5608',
							'amphur_name' => 'ภูซาง   ',
							'province_id' => 44,
						),
						147 => 
						array (
							'amphur_id' => 656,
							'amphur_code' => '5609',
							'amphur_name' => 'ภูกามยาว   ',
							'province_id' => 44,
						),
						148 => 
						array (
							'amphur_id' => 657,
							'amphur_code' => '5701',
							'amphur_name' => 'เมืองเชียงราย   ',
							'province_id' => 45,
						),
						149 => 
						array (
							'amphur_id' => 658,
							'amphur_code' => '5702',
							'amphur_name' => 'เวียงชัย   ',
							'province_id' => 45,
						),
						150 => 
						array (
							'amphur_id' => 659,
							'amphur_code' => '5703',
							'amphur_name' => 'เชียงของ   ',
							'province_id' => 45,
						),
						151 => 
						array (
							'amphur_id' => 660,
							'amphur_code' => '5704',
							'amphur_name' => 'เทิง   ',
							'province_id' => 45,
						),
						152 => 
						array (
							'amphur_id' => 661,
							'amphur_code' => '5705',
							'amphur_name' => 'พาน   ',
							'province_id' => 45,
						),
						153 => 
						array (
							'amphur_id' => 662,
							'amphur_code' => '5706',
							'amphur_name' => 'ป่าแดด   ',
							'province_id' => 45,
						),
						154 => 
						array (
							'amphur_id' => 663,
							'amphur_code' => '5707',
							'amphur_name' => 'แม่จัน   ',
							'province_id' => 45,
						),
						155 => 
						array (
							'amphur_id' => 664,
							'amphur_code' => '5708',
							'amphur_name' => 'เชียงแสน   ',
							'province_id' => 45,
						),
						156 => 
						array (
							'amphur_id' => 665,
							'amphur_code' => '5709',
							'amphur_name' => 'แม่สาย   ',
							'province_id' => 45,
						),
						157 => 
						array (
							'amphur_id' => 666,
							'amphur_code' => '5710',
							'amphur_name' => 'แม่สรวย   ',
							'province_id' => 45,
						),
						158 => 
						array (
							'amphur_id' => 667,
							'amphur_code' => '5711',
							'amphur_name' => 'เวียงป่าเป้า   ',
							'province_id' => 45,
						),
						159 => 
						array (
							'amphur_id' => 668,
							'amphur_code' => '5712',
							'amphur_name' => 'พญาเม็งราย   ',
							'province_id' => 45,
						),
						160 => 
						array (
							'amphur_id' => 669,
							'amphur_code' => '5713',
							'amphur_name' => 'เวียงแก่น   ',
							'province_id' => 45,
						),
						161 => 
						array (
							'amphur_id' => 670,
							'amphur_code' => '5714',
							'amphur_name' => 'ขุนตาล   ',
							'province_id' => 45,
						),
						162 => 
						array (
							'amphur_id' => 671,
							'amphur_code' => '5715',
							'amphur_name' => 'แม่ฟ้าหลวง   ',
							'province_id' => 45,
						),
						163 => 
						array (
							'amphur_id' => 672,
							'amphur_code' => '5716',
							'amphur_name' => 'แม่ลาว   ',
							'province_id' => 45,
						),
						164 => 
						array (
							'amphur_id' => 673,
							'amphur_code' => '5717',
							'amphur_name' => 'เวียงเชียงรุ้ง   ',
							'province_id' => 45,
						),
						165 => 
						array (
							'amphur_id' => 674,
							'amphur_code' => '5718',
							'amphur_name' => 'ดอยหลวง   ',
							'province_id' => 45,
						),
						166 => 
						array (
							'amphur_id' => 675,
							'amphur_code' => '5801',
							'amphur_name' => 'เมืองแม่ฮ่องสอน   ',
							'province_id' => 46,
						),
						167 => 
						array (
							'amphur_id' => 676,
							'amphur_code' => '5802',
							'amphur_name' => 'ขุนยวม   ',
							'province_id' => 46,
						),
						168 => 
						array (
							'amphur_id' => 677,
							'amphur_code' => '5803',
							'amphur_name' => 'ปาย   ',
							'province_id' => 46,
						),
						169 => 
						array (
							'amphur_id' => 678,
							'amphur_code' => '5804',
							'amphur_name' => 'แม่สะเรียง   ',
							'province_id' => 46,
						),
						170 => 
						array (
							'amphur_id' => 679,
							'amphur_code' => '5805',
							'amphur_name' => 'แม่ลาน้อย   ',
							'province_id' => 46,
						),
						171 => 
						array (
							'amphur_id' => 680,
							'amphur_code' => '5806',
							'amphur_name' => 'สบเมย   ',
							'province_id' => 46,
						),
						172 => 
						array (
							'amphur_id' => 681,
							'amphur_code' => '5807',
							'amphur_name' => 'ปางมะผ้า   ',
							'province_id' => 46,
						),
						173 => 
						array (
							'amphur_id' => 682,
							'amphur_code' => '5881',
							'amphur_name' => '*อ.ม่วยต่อ  จ.แม่ฮ่องสอน   ',
							'province_id' => 46,
						),
						174 => 
						array (
							'amphur_id' => 683,
							'amphur_code' => '6001',
							'amphur_name' => 'เมืองนครสวรรค์   ',
							'province_id' => 47,
						),
						175 => 
						array (
							'amphur_id' => 684,
							'amphur_code' => '6002',
							'amphur_name' => 'โกรกพระ   ',
							'province_id' => 47,
						),
						176 => 
						array (
							'amphur_id' => 685,
							'amphur_code' => '6003',
							'amphur_name' => 'ชุมแสง   ',
							'province_id' => 47,
						),
						177 => 
						array (
							'amphur_id' => 686,
							'amphur_code' => '6004',
							'amphur_name' => 'หนองบัว   ',
							'province_id' => 47,
						),
						178 => 
						array (
							'amphur_id' => 687,
							'amphur_code' => '6005',
							'amphur_name' => 'บรรพตพิสัย   ',
							'province_id' => 47,
						),
						179 => 
						array (
							'amphur_id' => 688,
							'amphur_code' => '6006',
							'amphur_name' => 'เก้าเลี้ยว   ',
							'province_id' => 47,
						),
						180 => 
						array (
							'amphur_id' => 689,
							'amphur_code' => '6007',
							'amphur_name' => 'ตาคลี   ',
							'province_id' => 47,
						),
						181 => 
						array (
							'amphur_id' => 690,
							'amphur_code' => '6008',
							'amphur_name' => 'ท่าตะโก   ',
							'province_id' => 47,
						),
						182 => 
						array (
							'amphur_id' => 691,
							'amphur_code' => '6009',
							'amphur_name' => 'ไพศาลี   ',
							'province_id' => 47,
						),
						183 => 
						array (
							'amphur_id' => 692,
							'amphur_code' => '6010',
							'amphur_name' => 'พยุหะคีรี   ',
							'province_id' => 47,
						),
						184 => 
						array (
							'amphur_id' => 693,
							'amphur_code' => '6011',
							'amphur_name' => 'ลาดยาว   ',
							'province_id' => 47,
						),
						185 => 
						array (
							'amphur_id' => 694,
							'amphur_code' => '6012',
							'amphur_name' => 'ตากฟ้า   ',
							'province_id' => 47,
						),
						186 => 
						array (
							'amphur_id' => 695,
							'amphur_code' => '6013',
							'amphur_name' => 'แม่วงก์   ',
							'province_id' => 47,
						),
						187 => 
						array (
							'amphur_id' => 696,
							'amphur_code' => '6014',
							'amphur_name' => 'แม่เปิน   ',
							'province_id' => 47,
						),
						188 => 
						array (
							'amphur_id' => 697,
							'amphur_code' => '6015',
							'amphur_name' => 'ชุมตาบง   ',
							'province_id' => 47,
						),
						189 => 
						array (
							'amphur_id' => 698,
							'amphur_code' => '6051',
							'amphur_name' => 'สาขาตำบลห้วยน้ำหอม*   ',
							'province_id' => 47,
						),
						190 => 
						array (
							'amphur_id' => 699,
							'amphur_code' => '6052',
						'amphur_name' => 'กิ่งอำเภอชุมตาบง (สาขาตำบลชุมตาบง)*   ',
							'province_id' => 47,
						),
						191 => 
						array (
							'amphur_id' => 700,
							'amphur_code' => '6053',
						'amphur_name' => 'แม่วงก์ (สาขาตำบลแม่เล่ย์)*   ',
							'province_id' => 47,
						),
						192 => 
						array (
							'amphur_id' => 701,
							'amphur_code' => '6101',
							'amphur_name' => 'เมืองอุทัยธานี   ',
							'province_id' => 48,
						),
						193 => 
						array (
							'amphur_id' => 702,
							'amphur_code' => '6102',
							'amphur_name' => 'ทัพทัน   ',
							'province_id' => 48,
						),
						194 => 
						array (
							'amphur_id' => 703,
							'amphur_code' => '6103',
							'amphur_name' => 'สว่างอารมณ์   ',
							'province_id' => 48,
						),
						195 => 
						array (
							'amphur_id' => 704,
							'amphur_code' => '6104',
							'amphur_name' => 'หนองฉาง   ',
							'province_id' => 48,
						),
						196 => 
						array (
							'amphur_id' => 705,
							'amphur_code' => '6105',
							'amphur_name' => 'หนองขาหย่าง   ',
							'province_id' => 48,
						),
						197 => 
						array (
							'amphur_id' => 706,
							'amphur_code' => '6106',
							'amphur_name' => 'บ้านไร่   ',
							'province_id' => 48,
						),
						198 => 
						array (
							'amphur_id' => 707,
							'amphur_code' => '6107',
							'amphur_name' => 'ลานสัก   ',
							'province_id' => 48,
						),
						199 => 
						array (
							'amphur_id' => 708,
							'amphur_code' => '6108',
							'amphur_name' => 'ห้วยคต   ',
							'province_id' => 48,
						),
						200 => 
						array (
							'amphur_id' => 709,
							'amphur_code' => '6201',
							'amphur_name' => 'เมืองกำแพงเพชร   ',
							'province_id' => 49,
						),
						201 => 
						array (
							'amphur_id' => 710,
							'amphur_code' => '6202',
							'amphur_name' => 'ไทรงาม   ',
							'province_id' => 49,
						),
						202 => 
						array (
							'amphur_id' => 711,
							'amphur_code' => '6203',
							'amphur_name' => 'คลองลาน   ',
							'province_id' => 49,
						),
						203 => 
						array (
							'amphur_id' => 712,
							'amphur_code' => '6204',
							'amphur_name' => 'ขาณุวรลักษบุรี   ',
							'province_id' => 49,
						),
						204 => 
						array (
							'amphur_id' => 713,
							'amphur_code' => '6205',
							'amphur_name' => 'คลองขลุง   ',
							'province_id' => 49,
						),
						205 => 
						array (
							'amphur_id' => 714,
							'amphur_code' => '6206',
							'amphur_name' => 'พรานกระต่าย   ',
							'province_id' => 49,
						),
						206 => 
						array (
							'amphur_id' => 715,
							'amphur_code' => '6207',
							'amphur_name' => 'ลานกระบือ   ',
							'province_id' => 49,
						),
						207 => 
						array (
							'amphur_id' => 716,
							'amphur_code' => '6208',
							'amphur_name' => 'ทรายทองวัฒนา   ',
							'province_id' => 49,
						),
						208 => 
						array (
							'amphur_id' => 717,
							'amphur_code' => '6209',
							'amphur_name' => 'ปางศิลาทอง   ',
							'province_id' => 49,
						),
						209 => 
						array (
							'amphur_id' => 718,
							'amphur_code' => '6210',
							'amphur_name' => 'บึงสามัคคี   ',
							'province_id' => 49,
						),
						210 => 
						array (
							'amphur_id' => 719,
							'amphur_code' => '6211',
							'amphur_name' => 'โกสัมพีนคร   ',
							'province_id' => 49,
						),
						211 => 
						array (
							'amphur_id' => 720,
							'amphur_code' => '6301',
							'amphur_name' => 'เมืองตาก   ',
							'province_id' => 50,
						),
						212 => 
						array (
							'amphur_id' => 721,
							'amphur_code' => '6302',
							'amphur_name' => 'บ้านตาก   ',
							'province_id' => 50,
						),
						213 => 
						array (
							'amphur_id' => 722,
							'amphur_code' => '6303',
							'amphur_name' => 'สามเงา   ',
							'province_id' => 50,
						),
						214 => 
						array (
							'amphur_id' => 723,
							'amphur_code' => '6304',
							'amphur_name' => 'แม่ระมาด   ',
							'province_id' => 50,
						),
						215 => 
						array (
							'amphur_id' => 724,
							'amphur_code' => '6305',
							'amphur_name' => 'ท่าสองยาง   ',
							'province_id' => 50,
						),
						216 => 
						array (
							'amphur_id' => 725,
							'amphur_code' => '6306',
							'amphur_name' => 'แม่สอด   ',
							'province_id' => 50,
						),
						217 => 
						array (
							'amphur_id' => 726,
							'amphur_code' => '6307',
							'amphur_name' => 'พบพระ   ',
							'province_id' => 50,
						),
						218 => 
						array (
							'amphur_id' => 727,
							'amphur_code' => '6308',
							'amphur_name' => 'อุ้มผาง   ',
							'province_id' => 50,
						),
						219 => 
						array (
							'amphur_id' => 728,
							'amphur_code' => '6309',
							'amphur_name' => 'วังเจ้า   ',
							'province_id' => 50,
						),
						220 => 
						array (
							'amphur_id' => 729,
							'amphur_code' => '6381',
							'amphur_name' => '*กิ่ง อ.ท่าปุย  จ.ตาก   ',
							'province_id' => 50,
						),
						221 => 
						array (
							'amphur_id' => 730,
							'amphur_code' => '6401',
							'amphur_name' => 'เมืองสุโขทัย   ',
							'province_id' => 51,
						),
						222 => 
						array (
							'amphur_id' => 731,
							'amphur_code' => '6402',
							'amphur_name' => 'บ้านด่านลานหอย   ',
							'province_id' => 51,
						),
						223 => 
						array (
							'amphur_id' => 732,
							'amphur_code' => '6403',
							'amphur_name' => 'คีรีมาศ   ',
							'province_id' => 51,
						),
						224 => 
						array (
							'amphur_id' => 733,
							'amphur_code' => '6404',
							'amphur_name' => 'กงไกรลาศ   ',
							'province_id' => 51,
						),
						225 => 
						array (
							'amphur_id' => 734,
							'amphur_code' => '6405',
							'amphur_name' => 'ศรีสัชนาลัย   ',
							'province_id' => 51,
						),
						226 => 
						array (
							'amphur_id' => 735,
							'amphur_code' => '6406',
							'amphur_name' => 'ศรีสำโรง   ',
							'province_id' => 51,
						),
						227 => 
						array (
							'amphur_id' => 736,
							'amphur_code' => '6407',
							'amphur_name' => 'สวรรคโลก   ',
							'province_id' => 51,
						),
						228 => 
						array (
							'amphur_id' => 737,
							'amphur_code' => '6408',
							'amphur_name' => 'ศรีนคร   ',
							'province_id' => 51,
						),
						229 => 
						array (
							'amphur_id' => 738,
							'amphur_code' => '6409',
							'amphur_name' => 'ทุ่งเสลี่ยม   ',
							'province_id' => 51,
						),
						230 => 
						array (
							'amphur_id' => 739,
							'amphur_code' => '6501',
							'amphur_name' => 'เมืองพิษณุโลก   ',
							'province_id' => 52,
						),
						231 => 
						array (
							'amphur_id' => 740,
							'amphur_code' => '6502',
							'amphur_name' => 'นครไทย   ',
							'province_id' => 52,
						),
						232 => 
						array (
							'amphur_id' => 741,
							'amphur_code' => '6503',
							'amphur_name' => 'ชาติตระการ   ',
							'province_id' => 52,
						),
						233 => 
						array (
							'amphur_id' => 742,
							'amphur_code' => '6504',
							'amphur_name' => 'บางระกำ   ',
							'province_id' => 52,
						),
						234 => 
						array (
							'amphur_id' => 743,
							'amphur_code' => '6505',
							'amphur_name' => 'บางกระทุ่ม   ',
							'province_id' => 52,
						),
						235 => 
						array (
							'amphur_id' => 744,
							'amphur_code' => '6506',
							'amphur_name' => 'พรหมพิราม   ',
							'province_id' => 52,
						),
						236 => 
						array (
							'amphur_id' => 745,
							'amphur_code' => '6507',
							'amphur_name' => 'วัดโบสถ์   ',
							'province_id' => 52,
						),
						237 => 
						array (
							'amphur_id' => 746,
							'amphur_code' => '6508',
							'amphur_name' => 'วังทอง   ',
							'province_id' => 52,
						),
						238 => 
						array (
							'amphur_id' => 747,
							'amphur_code' => '6509',
							'amphur_name' => 'เนินมะปราง   ',
							'province_id' => 52,
						),
						239 => 
						array (
							'amphur_id' => 748,
							'amphur_code' => '6601',
							'amphur_name' => 'เมืองพิจิตร   ',
							'province_id' => 53,
						),
						240 => 
						array (
							'amphur_id' => 749,
							'amphur_code' => '6602',
							'amphur_name' => 'วังทรายพูน   ',
							'province_id' => 53,
						),
						241 => 
						array (
							'amphur_id' => 750,
							'amphur_code' => '6603',
							'amphur_name' => 'โพธิ์ประทับช้าง   ',
							'province_id' => 53,
						),
						242 => 
						array (
							'amphur_id' => 751,
							'amphur_code' => '6604',
							'amphur_name' => 'ตะพานหิน   ',
							'province_id' => 53,
						),
						243 => 
						array (
							'amphur_id' => 752,
							'amphur_code' => '6605',
							'amphur_name' => 'บางมูลนาก   ',
							'province_id' => 53,
						),
						244 => 
						array (
							'amphur_id' => 753,
							'amphur_code' => '6606',
							'amphur_name' => 'โพทะเล   ',
							'province_id' => 53,
						),
						245 => 
						array (
							'amphur_id' => 754,
							'amphur_code' => '6607',
							'amphur_name' => 'สามง่าม   ',
							'province_id' => 53,
						),
						246 => 
						array (
							'amphur_id' => 755,
							'amphur_code' => '6608',
							'amphur_name' => 'ทับคล้อ   ',
							'province_id' => 53,
						),
						247 => 
						array (
							'amphur_id' => 756,
							'amphur_code' => '6609',
							'amphur_name' => 'สากเหล็ก   ',
							'province_id' => 53,
						),
						248 => 
						array (
							'amphur_id' => 757,
							'amphur_code' => '6610',
							'amphur_name' => 'บึงนาราง   ',
							'province_id' => 53,
						),
						249 => 
						array (
							'amphur_id' => 758,
							'amphur_code' => '6611',
							'amphur_name' => 'ดงเจริญ   ',
							'province_id' => 53,
						),
						250 => 
						array (
							'amphur_id' => 759,
							'amphur_code' => '6612',
							'amphur_name' => 'วชิรบารมี   ',
							'province_id' => 53,
						),
						251 => 
						array (
							'amphur_id' => 760,
							'amphur_code' => '6701',
							'amphur_name' => 'เมืองเพชรบูรณ์   ',
							'province_id' => 54,
						),
						252 => 
						array (
							'amphur_id' => 761,
							'amphur_code' => '6702',
							'amphur_name' => 'ชนแดน   ',
							'province_id' => 54,
						),
						253 => 
						array (
							'amphur_id' => 762,
							'amphur_code' => '6703',
							'amphur_name' => 'หล่มสัก   ',
							'province_id' => 54,
						),
						254 => 
						array (
							'amphur_id' => 763,
							'amphur_code' => '6704',
							'amphur_name' => 'หล่มเก่า   ',
							'province_id' => 54,
						),
						255 => 
						array (
							'amphur_id' => 764,
							'amphur_code' => '6705',
							'amphur_name' => 'วิเชียรบุรี   ',
							'province_id' => 54,
						),
						256 => 
						array (
							'amphur_id' => 765,
							'amphur_code' => '6706',
							'amphur_name' => 'ศรีเทพ   ',
							'province_id' => 54,
						),
						257 => 
						array (
							'amphur_id' => 766,
							'amphur_code' => '6707',
							'amphur_name' => 'หนองไผ่   ',
							'province_id' => 54,
						),
						258 => 
						array (
							'amphur_id' => 767,
							'amphur_code' => '6708',
							'amphur_name' => 'บึงสามพัน   ',
							'province_id' => 54,
						),
						259 => 
						array (
							'amphur_id' => 768,
							'amphur_code' => '6709',
							'amphur_name' => 'น้ำหนาว   ',
							'province_id' => 54,
						),
						260 => 
						array (
							'amphur_id' => 769,
							'amphur_code' => '6710',
							'amphur_name' => 'วังโป่ง   ',
							'province_id' => 54,
						),
						261 => 
						array (
							'amphur_id' => 770,
							'amphur_code' => '6711',
							'amphur_name' => 'เขาค้อ   ',
							'province_id' => 54,
						),
						262 => 
						array (
							'amphur_id' => 771,
							'amphur_code' => '7001',
							'amphur_name' => 'เมืองราชบุรี   ',
							'province_id' => 55,
						),
						263 => 
						array (
							'amphur_id' => 772,
							'amphur_code' => '7002',
							'amphur_name' => 'จอมบึง   ',
							'province_id' => 55,
						),
						264 => 
						array (
							'amphur_id' => 773,
							'amphur_code' => '7003',
							'amphur_name' => 'สวนผึ้ง   ',
							'province_id' => 55,
						),
						265 => 
						array (
							'amphur_id' => 774,
							'amphur_code' => '7004',
							'amphur_name' => 'ดำเนินสะดวก   ',
							'province_id' => 55,
						),
						266 => 
						array (
							'amphur_id' => 775,
							'amphur_code' => '7005',
							'amphur_name' => 'บ้านโป่ง   ',
							'province_id' => 55,
						),
						267 => 
						array (
							'amphur_id' => 776,
							'amphur_code' => '7006',
							'amphur_name' => 'บางแพ   ',
							'province_id' => 55,
						),
						268 => 
						array (
							'amphur_id' => 777,
							'amphur_code' => '7007',
							'amphur_name' => 'โพธาราม   ',
							'province_id' => 55,
						),
						269 => 
						array (
							'amphur_id' => 778,
							'amphur_code' => '7008',
							'amphur_name' => 'ปากท่อ   ',
							'province_id' => 55,
						),
						270 => 
						array (
							'amphur_id' => 779,
							'amphur_code' => '7009',
							'amphur_name' => 'วัดเพลง   ',
							'province_id' => 55,
						),
						271 => 
						array (
							'amphur_id' => 780,
							'amphur_code' => '7010',
							'amphur_name' => 'บ้านคา   ',
							'province_id' => 55,
						),
						272 => 
						array (
							'amphur_id' => 781,
							'amphur_code' => '7074',
							'amphur_name' => 'ท้องถิ่นเทศบาลตำบลบ้านฆ้อง   ',
							'province_id' => 55,
						),
						273 => 
						array (
							'amphur_id' => 782,
							'amphur_code' => '7101',
							'amphur_name' => 'เมืองกาญจนบุรี   ',
							'province_id' => 56,
						),
						274 => 
						array (
							'amphur_id' => 783,
							'amphur_code' => '7102',
							'amphur_name' => 'ไทรโยค   ',
							'province_id' => 56,
						),
						275 => 
						array (
							'amphur_id' => 784,
							'amphur_code' => '7103',
							'amphur_name' => 'บ่อพลอย   ',
							'province_id' => 56,
						),
						276 => 
						array (
							'amphur_id' => 785,
							'amphur_code' => '7104',
							'amphur_name' => 'ศรีสวัสดิ์   ',
							'province_id' => 56,
						),
						277 => 
						array (
							'amphur_id' => 786,
							'amphur_code' => '7105',
							'amphur_name' => 'ท่ามะกา   ',
							'province_id' => 56,
						),
						278 => 
						array (
							'amphur_id' => 787,
							'amphur_code' => '7106',
							'amphur_name' => 'ท่าม่วง   ',
							'province_id' => 56,
						),
						279 => 
						array (
							'amphur_id' => 788,
							'amphur_code' => '7107',
							'amphur_name' => 'ทองผาภูมิ   ',
							'province_id' => 56,
						),
						280 => 
						array (
							'amphur_id' => 789,
							'amphur_code' => '7108',
							'amphur_name' => 'สังขละบุรี   ',
							'province_id' => 56,
						),
						281 => 
						array (
							'amphur_id' => 790,
							'amphur_code' => '7109',
							'amphur_name' => 'พนมทวน   ',
							'province_id' => 56,
						),
						282 => 
						array (
							'amphur_id' => 791,
							'amphur_code' => '7110',
							'amphur_name' => 'เลาขวัญ   ',
							'province_id' => 56,
						),
						283 => 
						array (
							'amphur_id' => 792,
							'amphur_code' => '7111',
							'amphur_name' => 'ด่านมะขามเตี้ย   ',
							'province_id' => 56,
						),
						284 => 
						array (
							'amphur_id' => 793,
							'amphur_code' => '7112',
							'amphur_name' => 'หนองปรือ   ',
							'province_id' => 56,
						),
						285 => 
						array (
							'amphur_id' => 794,
							'amphur_code' => '7113',
							'amphur_name' => 'ห้วยกระเจา   ',
							'province_id' => 56,
						),
						286 => 
						array (
							'amphur_id' => 795,
							'amphur_code' => '7151',
							'amphur_name' => 'สาขาตำบลท่ากระดาน*   ',
							'province_id' => 56,
						),
						287 => 
						array (
							'amphur_id' => 796,
							'amphur_code' => '7181',
							'amphur_name' => '*บ้านทวน  จ.กาญจนบุรี   ',
							'province_id' => 56,
						),
						288 => 
						array (
							'amphur_id' => 797,
							'amphur_code' => '7201',
							'amphur_name' => 'เมืองสุพรรณบุรี   ',
							'province_id' => 57,
						),
						289 => 
						array (
							'amphur_id' => 798,
							'amphur_code' => '7202',
							'amphur_name' => 'เดิมบางนางบวช   ',
							'province_id' => 57,
						),
						290 => 
						array (
							'amphur_id' => 799,
							'amphur_code' => '7203',
							'amphur_name' => 'ด่านช้าง   ',
							'province_id' => 57,
						),
						291 => 
						array (
							'amphur_id' => 800,
							'amphur_code' => '7204',
							'amphur_name' => 'บางปลาม้า   ',
							'province_id' => 57,
						),
						292 => 
						array (
							'amphur_id' => 801,
							'amphur_code' => '7205',
							'amphur_name' => 'ศรีประจันต์   ',
							'province_id' => 57,
						),
						293 => 
						array (
							'amphur_id' => 802,
							'amphur_code' => '7206',
							'amphur_name' => 'ดอนเจดีย์   ',
							'province_id' => 57,
						),
						294 => 
						array (
							'amphur_id' => 803,
							'amphur_code' => '7207',
							'amphur_name' => 'สองพี่น้อง   ',
							'province_id' => 57,
						),
						295 => 
						array (
							'amphur_id' => 804,
							'amphur_code' => '7208',
							'amphur_name' => 'สามชุก   ',
							'province_id' => 57,
						),
						296 => 
						array (
							'amphur_id' => 805,
							'amphur_code' => '7209',
							'amphur_name' => 'อู่ทอง   ',
							'province_id' => 57,
						),
						297 => 
						array (
							'amphur_id' => 806,
							'amphur_code' => '7210',
							'amphur_name' => 'หนองหญ้าไซ   ',
							'province_id' => 57,
						),
						298 => 
						array (
							'amphur_id' => 807,
							'amphur_code' => '7301',
							'amphur_name' => 'เมืองนครปฐม   ',
							'province_id' => 58,
						),
						299 => 
						array (
							'amphur_id' => 808,
							'amphur_code' => '7302',
							'amphur_name' => 'กำแพงแสน   ',
							'province_id' => 58,
						),
						300 => 
						array (
							'amphur_id' => 809,
							'amphur_code' => '7303',
							'amphur_name' => 'นครชัยศรี   ',
							'province_id' => 58,
						),
						301 => 
						array (
							'amphur_id' => 810,
							'amphur_code' => '7304',
							'amphur_name' => 'ดอนตูม   ',
							'province_id' => 58,
						),
						302 => 
						array (
							'amphur_id' => 811,
							'amphur_code' => '7305',
							'amphur_name' => 'บางเลน   ',
							'province_id' => 58,
						),
						303 => 
						array (
							'amphur_id' => 812,
							'amphur_code' => '7306',
							'amphur_name' => 'สามพราน   ',
							'province_id' => 58,
						),
						304 => 
						array (
							'amphur_id' => 813,
							'amphur_code' => '7307',
							'amphur_name' => 'พุทธมณฑล   ',
							'province_id' => 58,
						),
						305 => 
						array (
							'amphur_id' => 814,
							'amphur_code' => '7401',
							'amphur_name' => 'เมืองสมุทรสาคร   ',
							'province_id' => 59,
						),
						306 => 
						array (
							'amphur_id' => 815,
							'amphur_code' => '7402',
							'amphur_name' => 'กระทุ่มแบน   ',
							'province_id' => 59,
						),
						307 => 
						array (
							'amphur_id' => 816,
							'amphur_code' => '7403',
							'amphur_name' => 'บ้านแพ้ว   ',
							'province_id' => 59,
						),
						308 => 
						array (
							'amphur_id' => 817,
							'amphur_code' => '7501',
							'amphur_name' => 'เมืองสมุทรสงคราม   ',
							'province_id' => 60,
						),
						309 => 
						array (
							'amphur_id' => 818,
							'amphur_code' => '7502',
							'amphur_name' => 'บางคนที   ',
							'province_id' => 60,
						),
						310 => 
						array (
							'amphur_id' => 819,
							'amphur_code' => '7503',
							'amphur_name' => 'อัมพวา   ',
							'province_id' => 60,
						),
						311 => 
						array (
							'amphur_id' => 820,
							'amphur_code' => '7601',
							'amphur_name' => 'เมืองเพชรบุรี   ',
							'province_id' => 61,
						),
						312 => 
						array (
							'amphur_id' => 821,
							'amphur_code' => '7602',
							'amphur_name' => 'เขาย้อย   ',
							'province_id' => 61,
						),
						313 => 
						array (
							'amphur_id' => 822,
							'amphur_code' => '7603',
							'amphur_name' => 'หนองหญ้าปล้อง   ',
							'province_id' => 61,
						),
						314 => 
						array (
							'amphur_id' => 823,
							'amphur_code' => '7604',
							'amphur_name' => 'ชะอำ   ',
							'province_id' => 61,
						),
						315 => 
						array (
							'amphur_id' => 824,
							'amphur_code' => '7605',
							'amphur_name' => 'ท่ายาง   ',
							'province_id' => 61,
						),
						316 => 
						array (
							'amphur_id' => 825,
							'amphur_code' => '7606',
							'amphur_name' => 'บ้านลาด   ',
							'province_id' => 61,
						),
						317 => 
						array (
							'amphur_id' => 826,
							'amphur_code' => '7607',
							'amphur_name' => 'บ้านแหลม   ',
							'province_id' => 61,
						),
						318 => 
						array (
							'amphur_id' => 827,
							'amphur_code' => '7608',
							'amphur_name' => 'แก่งกระจาน   ',
							'province_id' => 61,
						),
						319 => 
						array (
							'amphur_id' => 828,
							'amphur_code' => '7701',
							'amphur_name' => 'เมืองประจวบคีรีขันธ์   ',
							'province_id' => 62,
						),
						320 => 
						array (
							'amphur_id' => 829,
							'amphur_code' => '7702',
							'amphur_name' => 'กุยบุรี   ',
							'province_id' => 62,
						),
						321 => 
						array (
							'amphur_id' => 830,
							'amphur_code' => '7703',
							'amphur_name' => 'ทับสะแก   ',
							'province_id' => 62,
						),
						322 => 
						array (
							'amphur_id' => 831,
							'amphur_code' => '7704',
							'amphur_name' => 'บางสะพาน   ',
							'province_id' => 62,
						),
						323 => 
						array (
							'amphur_id' => 832,
							'amphur_code' => '7705',
							'amphur_name' => 'บางสะพานน้อย   ',
							'province_id' => 62,
						),
						324 => 
						array (
							'amphur_id' => 833,
							'amphur_code' => '7706',
							'amphur_name' => 'ปราณบุรี   ',
							'province_id' => 62,
						),
						325 => 
						array (
							'amphur_id' => 834,
							'amphur_code' => '7707',
							'amphur_name' => 'หัวหิน   ',
							'province_id' => 62,
						),
						326 => 
						array (
							'amphur_id' => 835,
							'amphur_code' => '7708',
							'amphur_name' => 'สามร้อยยอด   ',
							'province_id' => 62,
						),
						327 => 
						array (
							'amphur_id' => 836,
							'amphur_code' => '8001',
							'amphur_name' => 'เมืองนครศรีธรรมราช   ',
							'province_id' => 63,
						),
						328 => 
						array (
							'amphur_id' => 837,
							'amphur_code' => '8002',
							'amphur_name' => 'พรหมคีรี   ',
							'province_id' => 63,
						),
						329 => 
						array (
							'amphur_id' => 838,
							'amphur_code' => '8003',
							'amphur_name' => 'ลานสกา   ',
							'province_id' => 63,
						),
						330 => 
						array (
							'amphur_id' => 839,
							'amphur_code' => '8004',
							'amphur_name' => 'ฉวาง   ',
							'province_id' => 63,
						),
						331 => 
						array (
							'amphur_id' => 840,
							'amphur_code' => '8005',
							'amphur_name' => 'พิปูน   ',
							'province_id' => 63,
						),
						332 => 
						array (
							'amphur_id' => 841,
							'amphur_code' => '8006',
							'amphur_name' => 'เชียรใหญ่   ',
							'province_id' => 63,
						),
						333 => 
						array (
							'amphur_id' => 842,
							'amphur_code' => '8007',
							'amphur_name' => 'ชะอวด   ',
							'province_id' => 63,
						),
						334 => 
						array (
							'amphur_id' => 843,
							'amphur_code' => '8008',
							'amphur_name' => 'ท่าศาลา   ',
							'province_id' => 63,
						),
						335 => 
						array (
							'amphur_id' => 844,
							'amphur_code' => '8009',
							'amphur_name' => 'ทุ่งสง   ',
							'province_id' => 63,
						),
						336 => 
						array (
							'amphur_id' => 845,
							'amphur_code' => '8010',
							'amphur_name' => 'นาบอน   ',
							'province_id' => 63,
						),
						337 => 
						array (
							'amphur_id' => 846,
							'amphur_code' => '8011',
							'amphur_name' => 'ทุ่งใหญ่   ',
							'province_id' => 63,
						),
						338 => 
						array (
							'amphur_id' => 847,
							'amphur_code' => '8012',
							'amphur_name' => 'ปากพนัง   ',
							'province_id' => 63,
						),
						339 => 
						array (
							'amphur_id' => 848,
							'amphur_code' => '8013',
							'amphur_name' => 'ร่อนพิบูลย์   ',
							'province_id' => 63,
						),
						340 => 
						array (
							'amphur_id' => 849,
							'amphur_code' => '8014',
							'amphur_name' => 'สิชล   ',
							'province_id' => 63,
						),
						341 => 
						array (
							'amphur_id' => 850,
							'amphur_code' => '8015',
							'amphur_name' => 'ขนอม   ',
							'province_id' => 63,
						),
						342 => 
						array (
							'amphur_id' => 851,
							'amphur_code' => '8016',
							'amphur_name' => 'หัวไทร   ',
							'province_id' => 63,
						),
						343 => 
						array (
							'amphur_id' => 852,
							'amphur_code' => '8017',
							'amphur_name' => 'บางขัน   ',
							'province_id' => 63,
						),
						344 => 
						array (
							'amphur_id' => 853,
							'amphur_code' => '8018',
							'amphur_name' => 'ถ้ำพรรณรา   ',
							'province_id' => 63,
						),
						345 => 
						array (
							'amphur_id' => 854,
							'amphur_code' => '8019',
							'amphur_name' => 'จุฬาภรณ์   ',
							'province_id' => 63,
						),
						346 => 
						array (
							'amphur_id' => 855,
							'amphur_code' => '8020',
							'amphur_name' => 'พระพรหม   ',
							'province_id' => 63,
						),
						347 => 
						array (
							'amphur_id' => 856,
							'amphur_code' => '8021',
							'amphur_name' => 'นบพิตำ   ',
							'province_id' => 63,
						),
						348 => 
						array (
							'amphur_id' => 857,
							'amphur_code' => '8022',
							'amphur_name' => 'ช้างกลาง   ',
							'province_id' => 63,
						),
						349 => 
						array (
							'amphur_id' => 858,
							'amphur_code' => '8023',
							'amphur_name' => 'เฉลิมพระเกียรติ   ',
							'province_id' => 63,
						),
						350 => 
						array (
							'amphur_id' => 859,
							'amphur_code' => '8051',
						'amphur_name' => 'เชียรใหญ่ (สาขาตำบลเสือหึง)*   ',
							'province_id' => 63,
						),
						351 => 
						array (
							'amphur_id' => 860,
							'amphur_code' => '8052',
							'amphur_name' => 'สาขาตำบลสวนหลวง**   ',
							'province_id' => 63,
						),
						352 => 
						array (
							'amphur_id' => 861,
							'amphur_code' => '8053',
						'amphur_name' => 'ร่อนพิบูลย์ (สาขาตำบลหินตก)*   ',
							'province_id' => 63,
						),
						353 => 
						array (
							'amphur_id' => 862,
							'amphur_code' => '8054',
						'amphur_name' => 'หัวไทร (สาขาตำบลควนชะลิก)*   ',
							'province_id' => 63,
						),
						354 => 
						array (
							'amphur_id' => 863,
							'amphur_code' => '8055',
						'amphur_name' => 'ทุ่งสง (สาขาตำบลกะปาง)*   ',
							'province_id' => 63,
						),
						355 => 
						array (
							'amphur_id' => 864,
							'amphur_code' => '8101',
							'amphur_name' => 'เมืองกระบี่   ',
							'province_id' => 64,
						),
						356 => 
						array (
							'amphur_id' => 865,
							'amphur_code' => '8102',
							'amphur_name' => 'เขาพนม   ',
							'province_id' => 64,
						),
						357 => 
						array (
							'amphur_id' => 866,
							'amphur_code' => '8103',
							'amphur_name' => 'เกาะลันตา   ',
							'province_id' => 64,
						),
						358 => 
						array (
							'amphur_id' => 867,
							'amphur_code' => '8104',
							'amphur_name' => 'คลองท่อม   ',
							'province_id' => 64,
						),
						359 => 
						array (
							'amphur_id' => 868,
							'amphur_code' => '8105',
							'amphur_name' => 'อ่าวลึก   ',
							'province_id' => 64,
						),
						360 => 
						array (
							'amphur_id' => 869,
							'amphur_code' => '8106',
							'amphur_name' => 'ปลายพระยา   ',
							'province_id' => 64,
						),
						361 => 
						array (
							'amphur_id' => 870,
							'amphur_code' => '8107',
							'amphur_name' => 'ลำทับ   ',
							'province_id' => 64,
						),
						362 => 
						array (
							'amphur_id' => 871,
							'amphur_code' => '8108',
							'amphur_name' => 'เหนือคลอง   ',
							'province_id' => 64,
						),
						363 => 
						array (
							'amphur_id' => 872,
							'amphur_code' => '8201',
							'amphur_name' => 'เมืองพังงา   ',
							'province_id' => 65,
						),
						364 => 
						array (
							'amphur_id' => 873,
							'amphur_code' => '8202',
							'amphur_name' => 'เกาะยาว   ',
							'province_id' => 65,
						),
						365 => 
						array (
							'amphur_id' => 874,
							'amphur_code' => '8203',
							'amphur_name' => 'กะปง   ',
							'province_id' => 65,
						),
						366 => 
						array (
							'amphur_id' => 875,
							'amphur_code' => '8204',
							'amphur_name' => 'ตะกั่วทุ่ง   ',
							'province_id' => 65,
						),
						367 => 
						array (
							'amphur_id' => 876,
							'amphur_code' => '8205',
							'amphur_name' => 'ตะกั่วป่า   ',
							'province_id' => 65,
						),
						368 => 
						array (
							'amphur_id' => 877,
							'amphur_code' => '8206',
							'amphur_name' => 'คุระบุรี   ',
							'province_id' => 65,
						),
						369 => 
						array (
							'amphur_id' => 878,
							'amphur_code' => '8207',
							'amphur_name' => 'ทับปุด   ',
							'province_id' => 65,
						),
						370 => 
						array (
							'amphur_id' => 879,
							'amphur_code' => '8208',
							'amphur_name' => 'ท้ายเหมือง   ',
							'province_id' => 65,
						),
						371 => 
						array (
							'amphur_id' => 880,
							'amphur_code' => '8301',
							'amphur_name' => 'เมืองภูเก็ต   ',
							'province_id' => 66,
						),
						372 => 
						array (
							'amphur_id' => 881,
							'amphur_code' => '8302',
							'amphur_name' => 'กะทู้   ',
							'province_id' => 66,
						),
						373 => 
						array (
							'amphur_id' => 882,
							'amphur_code' => '8303',
							'amphur_name' => 'ถลาง   ',
							'province_id' => 66,
						),
						374 => 
						array (
							'amphur_id' => 883,
							'amphur_code' => '8381',
							'amphur_name' => '*ทุ่งคา   ',
							'province_id' => 66,
						),
						375 => 
						array (
							'amphur_id' => 884,
							'amphur_code' => '8401',
							'amphur_name' => 'เมืองสุราษฎร์ธานี   ',
							'province_id' => 67,
						),
						376 => 
						array (
							'amphur_id' => 885,
							'amphur_code' => '8402',
							'amphur_name' => 'กาญจนดิษฐ์   ',
							'province_id' => 67,
						),
						377 => 
						array (
							'amphur_id' => 886,
							'amphur_code' => '8403',
							'amphur_name' => 'ดอนสัก   ',
							'province_id' => 67,
						),
						378 => 
						array (
							'amphur_id' => 887,
							'amphur_code' => '8404',
							'amphur_name' => 'เกาะสมุย   ',
							'province_id' => 67,
						),
						379 => 
						array (
							'amphur_id' => 888,
							'amphur_code' => '8405',
							'amphur_name' => 'เกาะพะงัน   ',
							'province_id' => 67,
						),
						380 => 
						array (
							'amphur_id' => 889,
							'amphur_code' => '8406',
							'amphur_name' => 'ไชยา   ',
							'province_id' => 67,
						),
						381 => 
						array (
							'amphur_id' => 890,
							'amphur_code' => '8407',
							'amphur_name' => 'ท่าชนะ   ',
							'province_id' => 67,
						),
						382 => 
						array (
							'amphur_id' => 891,
							'amphur_code' => '8408',
							'amphur_name' => 'คีรีรัฐนิคม   ',
							'province_id' => 67,
						),
						383 => 
						array (
							'amphur_id' => 892,
							'amphur_code' => '8409',
							'amphur_name' => 'บ้านตาขุน   ',
							'province_id' => 67,
						),
						384 => 
						array (
							'amphur_id' => 893,
							'amphur_code' => '8410',
							'amphur_name' => 'พนม   ',
							'province_id' => 67,
						),
						385 => 
						array (
							'amphur_id' => 894,
							'amphur_code' => '8411',
							'amphur_name' => 'ท่าฉาง   ',
							'province_id' => 67,
						),
						386 => 
						array (
							'amphur_id' => 895,
							'amphur_code' => '8412',
							'amphur_name' => 'บ้านนาสาร   ',
							'province_id' => 67,
						),
						387 => 
						array (
							'amphur_id' => 896,
							'amphur_code' => '8413',
							'amphur_name' => 'บ้านนาเดิม   ',
							'province_id' => 67,
						),
						388 => 
						array (
							'amphur_id' => 897,
							'amphur_code' => '8414',
							'amphur_name' => 'เคียนซา   ',
							'province_id' => 67,
						),
						389 => 
						array (
							'amphur_id' => 898,
							'amphur_code' => '8415',
							'amphur_name' => 'เวียงสระ   ',
							'province_id' => 67,
						),
						390 => 
						array (
							'amphur_id' => 899,
							'amphur_code' => '8416',
							'amphur_name' => 'พระแสง   ',
							'province_id' => 67,
						),
						391 => 
						array (
							'amphur_id' => 900,
							'amphur_code' => '8417',
							'amphur_name' => 'พุนพิน   ',
							'province_id' => 67,
						),
						392 => 
						array (
							'amphur_id' => 901,
							'amphur_code' => '8418',
							'amphur_name' => 'ชัยบุรี   ',
							'province_id' => 67,
						),
						393 => 
						array (
							'amphur_id' => 902,
							'amphur_code' => '8419',
							'amphur_name' => 'วิภาวดี   ',
							'province_id' => 67,
						),
						394 => 
						array (
							'amphur_id' => 903,
							'amphur_code' => '8451',
						'amphur_name' => 'เกาะพงัน (สาขาตำบลเกาะเต่า)*   ',
							'province_id' => 67,
						),
						395 => 
						array (
							'amphur_id' => 904,
							'amphur_code' => '8481',
							'amphur_name' => '*อ.บ้านดอน  จ.สุราษฎร์ธานี   ',
							'province_id' => 67,
						),
						396 => 
						array (
							'amphur_id' => 905,
							'amphur_code' => '8501',
							'amphur_name' => 'เมืองระนอง   ',
							'province_id' => 68,
						),
						397 => 
						array (
							'amphur_id' => 906,
							'amphur_code' => '8502',
							'amphur_name' => 'ละอุ่น   ',
							'province_id' => 68,
						),
						398 => 
						array (
							'amphur_id' => 907,
							'amphur_code' => '8503',
							'amphur_name' => 'กะเปอร์   ',
							'province_id' => 68,
						),
						399 => 
						array (
							'amphur_id' => 908,
							'amphur_code' => '8504',
							'amphur_name' => 'กระบุรี   ',
							'province_id' => 68,
						),
						400 => 
						array (
							'amphur_id' => 909,
							'amphur_code' => '8505',
							'amphur_name' => 'สุขสำราญ   ',
							'province_id' => 68,
						),
						401 => 
						array (
							'amphur_id' => 910,
							'amphur_code' => '8601',
							'amphur_name' => 'เมืองชุมพร   ',
							'province_id' => 69,
						),
						402 => 
						array (
							'amphur_id' => 911,
							'amphur_code' => '8602',
							'amphur_name' => 'ท่าแซะ   ',
							'province_id' => 69,
						),
						403 => 
						array (
							'amphur_id' => 912,
							'amphur_code' => '8603',
							'amphur_name' => 'ปะทิว   ',
							'province_id' => 69,
						),
						404 => 
						array (
							'amphur_id' => 913,
							'amphur_code' => '8604',
							'amphur_name' => 'หลังสวน   ',
							'province_id' => 69,
						),
						405 => 
						array (
							'amphur_id' => 914,
							'amphur_code' => '8605',
							'amphur_name' => 'ละแม   ',
							'province_id' => 69,
						),
						406 => 
						array (
							'amphur_id' => 915,
							'amphur_code' => '8606',
							'amphur_name' => 'พะโต๊ะ   ',
							'province_id' => 69,
						),
						407 => 
						array (
							'amphur_id' => 916,
							'amphur_code' => '8607',
							'amphur_name' => 'สวี   ',
							'province_id' => 69,
						),
						408 => 
						array (
							'amphur_id' => 917,
							'amphur_code' => '8608',
							'amphur_name' => 'ทุ่งตะโก   ',
							'province_id' => 69,
						),
						409 => 
						array (
							'amphur_id' => 918,
							'amphur_code' => '9001',
							'amphur_name' => 'เมืองสงขลา   ',
							'province_id' => 70,
						),
						410 => 
						array (
							'amphur_id' => 919,
							'amphur_code' => '9002',
							'amphur_name' => 'สทิงพระ   ',
							'province_id' => 70,
						),
						411 => 
						array (
							'amphur_id' => 920,
							'amphur_code' => '9003',
							'amphur_name' => 'จะนะ   ',
							'province_id' => 70,
						),
						412 => 
						array (
							'amphur_id' => 921,
							'amphur_code' => '9004',
							'amphur_name' => 'นาทวี   ',
							'province_id' => 70,
						),
						413 => 
						array (
							'amphur_id' => 922,
							'amphur_code' => '9005',
							'amphur_name' => 'เทพา   ',
							'province_id' => 70,
						),
						414 => 
						array (
							'amphur_id' => 923,
							'amphur_code' => '9006',
							'amphur_name' => 'สะบ้าย้อย   ',
							'province_id' => 70,
						),
						415 => 
						array (
							'amphur_id' => 924,
							'amphur_code' => '9007',
							'amphur_name' => 'ระโนด   ',
							'province_id' => 70,
						),
						416 => 
						array (
							'amphur_id' => 925,
							'amphur_code' => '9008',
							'amphur_name' => 'กระแสสินธุ์   ',
							'province_id' => 70,
						),
						417 => 
						array (
							'amphur_id' => 926,
							'amphur_code' => '9009',
							'amphur_name' => 'รัตภูมิ   ',
							'province_id' => 70,
						),
						418 => 
						array (
							'amphur_id' => 927,
							'amphur_code' => '9010',
							'amphur_name' => 'สะเดา   ',
							'province_id' => 70,
						),
						419 => 
						array (
							'amphur_id' => 928,
							'amphur_code' => '9011',
							'amphur_name' => 'หาดใหญ่   ',
							'province_id' => 70,
						),
						420 => 
						array (
							'amphur_id' => 929,
							'amphur_code' => '9012',
							'amphur_name' => 'นาหม่อม   ',
							'province_id' => 70,
						),
						421 => 
						array (
							'amphur_id' => 930,
							'amphur_code' => '9013',
							'amphur_name' => 'ควนเนียง   ',
							'province_id' => 70,
						),
						422 => 
						array (
							'amphur_id' => 931,
							'amphur_code' => '9014',
							'amphur_name' => 'บางกล่ำ   ',
							'province_id' => 70,
						),
						423 => 
						array (
							'amphur_id' => 932,
							'amphur_code' => '9015',
							'amphur_name' => 'สิงหนคร   ',
							'province_id' => 70,
						),
						424 => 
						array (
							'amphur_id' => 933,
							'amphur_code' => '9016',
							'amphur_name' => 'คลองหอยโข่ง   ',
							'province_id' => 70,
						),
						425 => 
						array (
							'amphur_id' => 934,
							'amphur_code' => '9077',
							'amphur_name' => 'ท้องถิ่นเทศบาลตำบลสำนักขาม   ',
							'province_id' => 70,
						),
						426 => 
						array (
							'amphur_id' => 935,
							'amphur_code' => '9096',
							'amphur_name' => 'เทศบาลตำบลบ้านพรุ*   ',
							'province_id' => 70,
						),
						427 => 
						array (
							'amphur_id' => 936,
							'amphur_code' => '9101',
							'amphur_name' => 'เมืองสตูล   ',
							'province_id' => 71,
						),
						428 => 
						array (
							'amphur_id' => 937,
							'amphur_code' => '9102',
							'amphur_name' => 'ควนโดน   ',
							'province_id' => 71,
						),
						429 => 
						array (
							'amphur_id' => 938,
							'amphur_code' => '9103',
							'amphur_name' => 'ควนกาหลง   ',
							'province_id' => 71,
						),
						430 => 
						array (
							'amphur_id' => 939,
							'amphur_code' => '9104',
							'amphur_name' => 'ท่าแพ   ',
							'province_id' => 71,
						),
						431 => 
						array (
							'amphur_id' => 940,
							'amphur_code' => '9105',
							'amphur_name' => 'ละงู   ',
							'province_id' => 71,
						),
						432 => 
						array (
							'amphur_id' => 941,
							'amphur_code' => '9106',
							'amphur_name' => 'ทุ่งหว้า   ',
							'province_id' => 71,
						),
						433 => 
						array (
							'amphur_id' => 942,
							'amphur_code' => '9107',
							'amphur_name' => 'มะนัง   ',
							'province_id' => 71,
						),
						434 => 
						array (
							'amphur_id' => 943,
							'amphur_code' => '9201',
							'amphur_name' => 'เมืองตรัง   ',
							'province_id' => 72,
						),
						435 => 
						array (
							'amphur_id' => 944,
							'amphur_code' => '9202',
							'amphur_name' => 'กันตัง   ',
							'province_id' => 72,
						),
						436 => 
						array (
							'amphur_id' => 945,
							'amphur_code' => '9203',
							'amphur_name' => 'ย่านตาขาว   ',
							'province_id' => 72,
						),
						437 => 
						array (
							'amphur_id' => 946,
							'amphur_code' => '9204',
							'amphur_name' => 'ปะเหลียน   ',
							'province_id' => 72,
						),
						438 => 
						array (
							'amphur_id' => 947,
							'amphur_code' => '9205',
							'amphur_name' => 'สิเกา   ',
							'province_id' => 72,
						),
						439 => 
						array (
							'amphur_id' => 948,
							'amphur_code' => '9206',
							'amphur_name' => 'ห้วยยอด   ',
							'province_id' => 72,
						),
						440 => 
						array (
							'amphur_id' => 949,
							'amphur_code' => '9207',
							'amphur_name' => 'วังวิเศษ   ',
							'province_id' => 72,
						),
						441 => 
						array (
							'amphur_id' => 950,
							'amphur_code' => '9208',
							'amphur_name' => 'นาโยง   ',
							'province_id' => 72,
						),
						442 => 
						array (
							'amphur_id' => 951,
							'amphur_code' => '9209',
							'amphur_name' => 'รัษฎา   ',
							'province_id' => 72,
						),
						443 => 
						array (
							'amphur_id' => 952,
							'amphur_code' => '9210',
							'amphur_name' => 'หาดสำราญ   ',
							'province_id' => 72,
						),
						444 => 
						array (
							'amphur_id' => 953,
							'amphur_code' => '9251',
						'amphur_name' => 'อำเภอเมืองตรัง(สาขาคลองเต็ง)**   ',
							'province_id' => 72,
						),
						445 => 
						array (
							'amphur_id' => 954,
							'amphur_code' => '9301',
							'amphur_name' => 'เมืองพัทลุง   ',
							'province_id' => 73,
						),
						446 => 
						array (
							'amphur_id' => 955,
							'amphur_code' => '9302',
							'amphur_name' => 'กงหรา   ',
							'province_id' => 73,
						),
						447 => 
						array (
							'amphur_id' => 956,
							'amphur_code' => '9303',
							'amphur_name' => 'เขาชัยสน   ',
							'province_id' => 73,
						),
						448 => 
						array (
							'amphur_id' => 957,
							'amphur_code' => '9304',
							'amphur_name' => 'ตะโหมด   ',
							'province_id' => 73,
						),
						449 => 
						array (
							'amphur_id' => 958,
							'amphur_code' => '9305',
							'amphur_name' => 'ควนขนุน   ',
							'province_id' => 73,
						),
						450 => 
						array (
							'amphur_id' => 959,
							'amphur_code' => '9306',
							'amphur_name' => 'ปากพะยูน   ',
							'province_id' => 73,
						),
						451 => 
						array (
							'amphur_id' => 960,
							'amphur_code' => '9307',
							'amphur_name' => 'ศรีบรรพต   ',
							'province_id' => 73,
						),
						452 => 
						array (
							'amphur_id' => 961,
							'amphur_code' => '9308',
							'amphur_name' => 'ป่าบอน   ',
							'province_id' => 73,
						),
						453 => 
						array (
							'amphur_id' => 962,
							'amphur_code' => '9309',
							'amphur_name' => 'บางแก้ว   ',
							'province_id' => 73,
						),
						454 => 
						array (
							'amphur_id' => 963,
							'amphur_code' => '9310',
							'amphur_name' => 'ป่าพะยอม   ',
							'province_id' => 73,
						),
						455 => 
						array (
							'amphur_id' => 964,
							'amphur_code' => '9311',
							'amphur_name' => 'ศรีนครินทร์   ',
							'province_id' => 73,
						),
						456 => 
						array (
							'amphur_id' => 965,
							'amphur_code' => '9401',
							'amphur_name' => 'เมืองปัตตานี   ',
							'province_id' => 74,
						),
						457 => 
						array (
							'amphur_id' => 966,
							'amphur_code' => '9402',
							'amphur_name' => 'โคกโพธิ์   ',
							'province_id' => 74,
						),
						458 => 
						array (
							'amphur_id' => 967,
							'amphur_code' => '9403',
							'amphur_name' => 'หนองจิก   ',
							'province_id' => 74,
						),
						459 => 
						array (
							'amphur_id' => 968,
							'amphur_code' => '9404',
							'amphur_name' => 'ปะนาเระ   ',
							'province_id' => 74,
						),
						460 => 
						array (
							'amphur_id' => 969,
							'amphur_code' => '9405',
							'amphur_name' => 'มายอ   ',
							'province_id' => 74,
						),
						461 => 
						array (
							'amphur_id' => 970,
							'amphur_code' => '9406',
							'amphur_name' => 'ทุ่งยางแดง   ',
							'province_id' => 74,
						),
						462 => 
						array (
							'amphur_id' => 971,
							'amphur_code' => '9407',
							'amphur_name' => 'สายบุรี   ',
							'province_id' => 74,
						),
						463 => 
						array (
							'amphur_id' => 972,
							'amphur_code' => '9408',
							'amphur_name' => 'ไม้แก่น   ',
							'province_id' => 74,
						),
						464 => 
						array (
							'amphur_id' => 973,
							'amphur_code' => '9409',
							'amphur_name' => 'ยะหริ่ง   ',
							'province_id' => 74,
						),
						465 => 
						array (
							'amphur_id' => 974,
							'amphur_code' => '9410',
							'amphur_name' => 'ยะรัง   ',
							'province_id' => 74,
						),
						466 => 
						array (
							'amphur_id' => 975,
							'amphur_code' => '9411',
							'amphur_name' => 'กะพ้อ   ',
							'province_id' => 74,
						),
						467 => 
						array (
							'amphur_id' => 976,
							'amphur_code' => '9412',
							'amphur_name' => 'แม่ลาน   ',
							'province_id' => 74,
						),
						468 => 
						array (
							'amphur_id' => 977,
							'amphur_code' => '9501',
							'amphur_name' => 'เมืองยะลา   ',
							'province_id' => 75,
						),
						469 => 
						array (
							'amphur_id' => 978,
							'amphur_code' => '9502',
							'amphur_name' => 'เบตง   ',
							'province_id' => 75,
						),
						470 => 
						array (
							'amphur_id' => 979,
							'amphur_code' => '9503',
							'amphur_name' => 'บันนังสตา   ',
							'province_id' => 75,
						),
						471 => 
						array (
							'amphur_id' => 980,
							'amphur_code' => '9504',
							'amphur_name' => 'ธารโต   ',
							'province_id' => 75,
						),
						472 => 
						array (
							'amphur_id' => 981,
							'amphur_code' => '9505',
							'amphur_name' => 'ยะหา   ',
							'province_id' => 75,
						),
						473 => 
						array (
							'amphur_id' => 982,
							'amphur_code' => '9506',
							'amphur_name' => 'รามัน   ',
							'province_id' => 75,
						),
						474 => 
						array (
							'amphur_id' => 983,
							'amphur_code' => '9507',
							'amphur_name' => 'กาบัง   ',
							'province_id' => 75,
						),
						475 => 
						array (
							'amphur_id' => 984,
							'amphur_code' => '9508',
							'amphur_name' => 'กรงปินัง   ',
							'province_id' => 75,
						),
						476 => 
						array (
							'amphur_id' => 985,
							'amphur_code' => '9601',
							'amphur_name' => 'เมืองนราธิวาส   ',
							'province_id' => 76,
						),
						477 => 
						array (
							'amphur_id' => 986,
							'amphur_code' => '9602',
							'amphur_name' => 'ตากใบ   ',
							'province_id' => 76,
						),
						478 => 
						array (
							'amphur_id' => 987,
							'amphur_code' => '9603',
							'amphur_name' => 'บาเจาะ   ',
							'province_id' => 76,
						),
						479 => 
						array (
							'amphur_id' => 988,
							'amphur_code' => '9604',
							'amphur_name' => 'ยี่งอ   ',
							'province_id' => 76,
						),
						480 => 
						array (
							'amphur_id' => 989,
							'amphur_code' => '9605',
							'amphur_name' => 'ระแงะ   ',
							'province_id' => 76,
						),
						481 => 
						array (
							'amphur_id' => 990,
							'amphur_code' => '9606',
							'amphur_name' => 'รือเสาะ   ',
							'province_id' => 76,
						),
						482 => 
						array (
							'amphur_id' => 991,
							'amphur_code' => '9607',
							'amphur_name' => 'ศรีสาคร   ',
							'province_id' => 76,
						),
						483 => 
						array (
							'amphur_id' => 992,
							'amphur_code' => '9608',
							'amphur_name' => 'แว้ง   ',
							'province_id' => 76,
						),
						484 => 
						array (
							'amphur_id' => 993,
							'amphur_code' => '9609',
							'amphur_name' => 'สุคิริน   ',
							'province_id' => 76,
						),
						485 => 
						array (
							'amphur_id' => 994,
							'amphur_code' => '9610',
							'amphur_name' => 'สุไหงโก-ลก   ',
							'province_id' => 76,
						),
						486 => 
						array (
							'amphur_id' => 995,
							'amphur_code' => '9611',
							'amphur_name' => 'สุไหงปาดี   ',
							'province_id' => 76,
						),
						487 => 
						array (
							'amphur_id' => 996,
							'amphur_code' => '9612',
							'amphur_name' => 'จะแนะ   ',
							'province_id' => 76,
						),
						488 => 
						array (
							'amphur_id' => 997,
							'amphur_code' => '9613',
							'amphur_name' => 'เจาะไอร้อง   ',
							'province_id' => 76,
						),
						489 => 
						array (
							'amphur_id' => 998,
							'amphur_code' => '9681',
							'amphur_name' => '*อ.บางนรา  จ.นราธิวาส   ',
							'province_id' => 76,
						),
						490 => 
						array (
							'amphur_id' => 999,
							'amphur_code' => '3801',
							'amphur_name' => 'เมืองบึงกาฬ',
							'province_id' => 77,
						),
						491 => 
						array (
							'amphur_id' => 1000,
							'amphur_code' => '3802',
							'amphur_name' => 'เซกา',
							'province_id' => 77,
						),
						492 => 
						array (
							'amphur_id' => 1001,
							'amphur_code' => '3803',
							'amphur_name' => 'โซ่พิสัย',
							'province_id' => 77,
						),
						493 => 
						array (
							'amphur_id' => 1002,
							'amphur_code' => '3804',
							'amphur_name' => 'พรเจริญ',
							'province_id' => 77,
						),
						494 => 
						array (
							'amphur_id' => 1003,
							'amphur_code' => '3805',
							'amphur_name' => 'ศรีวิไล',
							'province_id' => 77,
						),
						495 => 
						array (
							'amphur_id' => 1004,
							'amphur_code' => '3806',
							'amphur_name' => 'บึงโขงหลง',
							'province_id' => 77,
						),
						496 => 
						array (
							'amphur_id' => 1005,
							'amphur_code' => '3807',
							'amphur_name' => 'ปากคาด',
							'province_id' => 77,
						),
						497 => 
						array (
							'amphur_id' => 1006,
							'amphur_code' => '3808',
							'amphur_name' => 'บุ่งคล้า',
							'province_id' => 77,
						),
					));
	}

}
