<?php

use Illuminate\Database\Seeder;

class TbCountryTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_country')->delete();
        
		\DB::table('tb_country')->insert(array (
			0 => 
			array (
				'country_id' => 1,
				'country_code' => 'AD',
				'country_name_en' => 'Andorra',
				'country_name_th' => 'Andorra',
			),
			1 => 
			array (
				'country_id' => 2,
				'country_code' => 'AE',
				'country_name_en' => 'United Arab Emirates',
				'country_name_th' => 'United Arab Emirates',
			),
			2 => 
			array (
				'country_id' => 3,
				'country_code' => 'AF',
				'country_name_en' => 'Afghanistan',
				'country_name_th' => 'Afghanistan',
			),
			3 => 
			array (
				'country_id' => 4,
				'country_code' => 'AG',
				'country_name_en' => 'Antigua and Barbuda',
				'country_name_th' => 'Antigua and Barbuda',
			),
			4 => 
			array (
				'country_id' => 5,
				'country_code' => 'AI',
				'country_name_en' => 'Anguilla',
				'country_name_th' => 'Anguilla',
			),
			5 => 
			array (
				'country_id' => 6,
				'country_code' => 'AL',
				'country_name_en' => 'Albania',
				'country_name_th' => 'Albania',
			),
			6 => 
			array (
				'country_id' => 7,
				'country_code' => 'AM',
				'country_name_en' => 'Armenia',
				'country_name_th' => 'Armenia',
			),
			7 => 
			array (
				'country_id' => 8,
				'country_code' => 'AO',
				'country_name_en' => 'Angola',
				'country_name_th' => 'Angola',
			),
			8 => 
			array (
				'country_id' => 9,
				'country_code' => 'AQ',
				'country_name_en' => 'Antarctica',
				'country_name_th' => 'Antarctica',
			),
			9 => 
			array (
				'country_id' => 10,
				'country_code' => 'AR',
				'country_name_en' => 'Argentina',
				'country_name_th' => 'Argentina',
			),
			10 => 
			array (
				'country_id' => 11,
				'country_code' => 'AS',
				'country_name_en' => 'American Samoa',
				'country_name_th' => 'American Samoa',
			),
			11 => 
			array (
				'country_id' => 12,
				'country_code' => 'AT',
				'country_name_en' => 'Austria',
				'country_name_th' => 'Austria',
			),
			12 => 
			array (
				'country_id' => 13,
				'country_code' => 'AU',
				'country_name_en' => 'Australia',
				'country_name_th' => 'Australia',
			),
			13 => 
			array (
				'country_id' => 14,
				'country_code' => 'AW',
				'country_name_en' => 'Aruba',
				'country_name_th' => 'Aruba',
			),
			14 => 
			array (
				'country_id' => 15,
				'country_code' => 'AX',
				'country_name_en' => '?land Islands',
				'country_name_th' => '?land Islands',
			),
			15 => 
			array (
				'country_id' => 16,
				'country_code' => 'AZ',
				'country_name_en' => 'Azerbaijan',
				'country_name_th' => 'Azerbaijan',
			),
			16 => 
			array (
				'country_id' => 17,
				'country_code' => 'BA',
				'country_name_en' => 'Bosnia and Herzegovina',
				'country_name_th' => 'Bosnia and Herzegovina',
			),
			17 => 
			array (
				'country_id' => 18,
				'country_code' => 'BB',
				'country_name_en' => 'Barbados',
				'country_name_th' => 'Barbados',
			),
			18 => 
			array (
				'country_id' => 19,
				'country_code' => 'BD',
				'country_name_en' => 'Bangladesh',
				'country_name_th' => 'Bangladesh',
			),
			19 => 
			array (
				'country_id' => 20,
				'country_code' => 'BE',
				'country_name_en' => 'Belgium',
				'country_name_th' => 'Belgium',
			),
			20 => 
			array (
				'country_id' => 21,
				'country_code' => 'BF',
				'country_name_en' => 'Burkina Faso',
				'country_name_th' => 'Burkina Faso',
			),
			21 => 
			array (
				'country_id' => 22,
				'country_code' => 'BG',
				'country_name_en' => 'Bulgaria',
				'country_name_th' => 'Bulgaria',
			),
			22 => 
			array (
				'country_id' => 23,
				'country_code' => 'BH',
				'country_name_en' => 'Bahrain',
				'country_name_th' => 'Bahrain',
			),
			23 => 
			array (
				'country_id' => 24,
				'country_code' => 'BI',
				'country_name_en' => 'Burundi',
				'country_name_th' => 'Burundi',
			),
			24 => 
			array (
				'country_id' => 25,
				'country_code' => 'BJ',
				'country_name_en' => 'Benin',
				'country_name_th' => 'Benin',
			),
			25 => 
			array (
				'country_id' => 26,
				'country_code' => 'BL',
				'country_name_en' => 'Saint Barth?lemy',
				'country_name_th' => 'Saint Barth?lemy',
			),
			26 => 
			array (
				'country_id' => 27,
				'country_code' => 'BM',
				'country_name_en' => 'Bermuda',
				'country_name_th' => 'Bermuda',
			),
			27 => 
			array (
				'country_id' => 28,
				'country_code' => 'BN',
				'country_name_en' => 'Brunei Darussalam',
				'country_name_th' => 'Brunei Darussalam',
			),
			28 => 
			array (
				'country_id' => 29,
				'country_code' => 'BO',
				'country_name_en' => 'Bolivia, Plurinational State of',
				'country_name_th' => 'Bolivia, Plurinational State of',
			),
			29 => 
			array (
				'country_id' => 30,
				'country_code' => 'BQ',
				'country_name_en' => 'Bonaire, Sint Eustatius and Saba',
				'country_name_th' => 'Bonaire, Sint Eustatius and Saba',
			),
			30 => 
			array (
				'country_id' => 31,
				'country_code' => 'BR',
				'country_name_en' => 'Brazil',
				'country_name_th' => 'Brazil',
			),
			31 => 
			array (
				'country_id' => 32,
				'country_code' => 'BS',
				'country_name_en' => 'Bahamas',
				'country_name_th' => 'Bahamas',
			),
			32 => 
			array (
				'country_id' => 33,
				'country_code' => 'BT',
				'country_name_en' => 'Bhutan',
				'country_name_th' => 'Bhutan',
			),
			33 => 
			array (
				'country_id' => 34,
				'country_code' => 'BV',
				'country_name_en' => 'Bouvet Island',
				'country_name_th' => 'Bouvet Island',
			),
			34 => 
			array (
				'country_id' => 35,
				'country_code' => 'BW',
				'country_name_en' => 'Botswana',
				'country_name_th' => 'Botswana',
			),
			35 => 
			array (
				'country_id' => 36,
				'country_code' => 'BY',
				'country_name_en' => 'Belarus',
				'country_name_th' => 'Belarus',
			),
			36 => 
			array (
				'country_id' => 37,
				'country_code' => 'BZ',
				'country_name_en' => 'Belize',
				'country_name_th' => 'Belize',
			),
			37 => 
			array (
				'country_id' => 38,
				'country_code' => 'CA',
				'country_name_en' => 'Canada',
				'country_name_th' => 'Canada',
			),
			38 => 
			array (
				'country_id' => 39,
				'country_code' => 'CC',
			'country_name_en' => 'Cocos (Keeling) Islands',
			'country_name_th' => 'Cocos (Keeling) Islands',
			),
			39 => 
			array (
				'country_id' => 40,
				'country_code' => 'CD',
				'country_name_en' => 'Congo, the Democratic Republic of the',
				'country_name_th' => 'Congo, the Democratic Republic of the',
			),
			40 => 
			array (
				'country_id' => 41,
				'country_code' => 'CF',
				'country_name_en' => 'Central African Republic',
				'country_name_th' => 'Central African Republic',
			),
			41 => 
			array (
				'country_id' => 42,
				'country_code' => 'CG',
				'country_name_en' => 'Congo',
				'country_name_th' => 'Congo',
			),
			42 => 
			array (
				'country_id' => 43,
				'country_code' => 'CH',
				'country_name_en' => 'Switzerland',
				'country_name_th' => 'Switzerland',
			),
			43 => 
			array (
				'country_id' => 44,
				'country_code' => 'CI',
				'country_name_en' => 'C?te d\'Ivoire',
				'country_name_th' => 'C?te d\'Ivoire',
			),
			44 => 
			array (
				'country_id' => 45,
				'country_code' => 'CK',
				'country_name_en' => 'Cook Islands',
				'country_name_th' => 'Cook Islands',
			),
			45 => 
			array (
				'country_id' => 46,
				'country_code' => 'CL',
				'country_name_en' => 'Chile',
				'country_name_th' => 'Chile',
			),
			46 => 
			array (
				'country_id' => 47,
				'country_code' => 'CM',
				'country_name_en' => 'Cameroon',
				'country_name_th' => 'Cameroon',
			),
			47 => 
			array (
				'country_id' => 48,
				'country_code' => 'CN',
				'country_name_en' => 'China',
				'country_name_th' => 'China',
			),
			48 => 
			array (
				'country_id' => 49,
				'country_code' => 'CO',
				'country_name_en' => 'Colombia',
				'country_name_th' => 'Colombia',
			),
			49 => 
			array (
				'country_id' => 50,
				'country_code' => 'CR',
				'country_name_en' => 'Costa Rica',
				'country_name_th' => 'Costa Rica',
			),
			50 => 
			array (
				'country_id' => 51,
				'country_code' => 'CU',
				'country_name_en' => 'Cuba',
				'country_name_th' => 'Cuba',
			),
			51 => 
			array (
				'country_id' => 52,
				'country_code' => 'CV',
				'country_name_en' => 'Cabo Verde',
				'country_name_th' => 'Cabo Verde',
			),
			52 => 
			array (
				'country_id' => 53,
				'country_code' => 'CW',
				'country_name_en' => 'Cura?ao',
				'country_name_th' => 'Cura?ao',
			),
			53 => 
			array (
				'country_id' => 54,
				'country_code' => 'CX',
				'country_name_en' => 'Christmas Island',
				'country_name_th' => 'Christmas Island',
			),
			54 => 
			array (
				'country_id' => 55,
				'country_code' => 'CY',
				'country_name_en' => 'Cyprus',
				'country_name_th' => 'Cyprus',
			),
			55 => 
			array (
				'country_id' => 56,
				'country_code' => 'CZ',
				'country_name_en' => 'Czech Republic',
				'country_name_th' => 'Czech Republic',
			),
			56 => 
			array (
				'country_id' => 57,
				'country_code' => 'DE',
				'country_name_en' => 'Germany',
				'country_name_th' => 'Germany',
			),
			57 => 
			array (
				'country_id' => 58,
				'country_code' => 'DJ',
				'country_name_en' => 'Djibouti',
				'country_name_th' => 'Djibouti',
			),
			58 => 
			array (
				'country_id' => 59,
				'country_code' => 'DK',
				'country_name_en' => 'Denmark',
				'country_name_th' => 'Denmark',
			),
			59 => 
			array (
				'country_id' => 60,
				'country_code' => 'DM',
				'country_name_en' => 'Dominica',
				'country_name_th' => 'Dominica',
			),
			60 => 
			array (
				'country_id' => 61,
				'country_code' => 'DO',
				'country_name_en' => 'Dominican Republic',
				'country_name_th' => 'Dominican Republic',
			),
			61 => 
			array (
				'country_id' => 62,
				'country_code' => 'DZ',
				'country_name_en' => 'Algeria',
				'country_name_th' => 'Algeria',
			),
			62 => 
			array (
				'country_id' => 63,
				'country_code' => 'EC',
				'country_name_en' => 'Ecuador',
				'country_name_th' => 'Ecuador',
			),
			63 => 
			array (
				'country_id' => 64,
				'country_code' => 'EE',
				'country_name_en' => 'Estonia',
				'country_name_th' => 'Estonia',
			),
			64 => 
			array (
				'country_id' => 65,
				'country_code' => 'EG',
				'country_name_en' => 'Egypt',
				'country_name_th' => 'Egypt',
			),
			65 => 
			array (
				'country_id' => 66,
				'country_code' => 'EH',
				'country_name_en' => 'Western Sahara',
				'country_name_th' => 'Western Sahara',
			),
			66 => 
			array (
				'country_id' => 67,
				'country_code' => 'ER',
				'country_name_en' => 'Eritrea',
				'country_name_th' => 'Eritrea',
			),
			67 => 
			array (
				'country_id' => 68,
				'country_code' => 'ES',
				'country_name_en' => 'Spain',
				'country_name_th' => 'Spain',
			),
			68 => 
			array (
				'country_id' => 69,
				'country_code' => 'ET',
				'country_name_en' => 'Ethiopia',
				'country_name_th' => 'Ethiopia',
			),
			69 => 
			array (
				'country_id' => 70,
				'country_code' => 'FI',
				'country_name_en' => 'Finland',
				'country_name_th' => 'Finland',
			),
			70 => 
			array (
				'country_id' => 71,
				'country_code' => 'FJ',
				'country_name_en' => 'Fiji',
				'country_name_th' => 'Fiji',
			),
			71 => 
			array (
				'country_id' => 72,
				'country_code' => 'FK',
			'country_name_en' => 'Falkland Islands (Malvinas)',
			'country_name_th' => 'Falkland Islands (Malvinas)',
			),
			72 => 
			array (
				'country_id' => 73,
				'country_code' => 'FM',
				'country_name_en' => 'Micronesia, Federated States of',
				'country_name_th' => 'Micronesia, Federated States of',
			),
			73 => 
			array (
				'country_id' => 74,
				'country_code' => 'FO',
				'country_name_en' => 'Faroe Islands',
				'country_name_th' => 'Faroe Islands',
			),
			74 => 
			array (
				'country_id' => 75,
				'country_code' => 'FR',
				'country_name_en' => 'France',
				'country_name_th' => 'France',
			),
			75 => 
			array (
				'country_id' => 76,
				'country_code' => 'GA',
				'country_name_en' => 'Gabon',
				'country_name_th' => 'Gabon',
			),
			76 => 
			array (
				'country_id' => 77,
				'country_code' => 'GB',
				'country_name_en' => 'United Kingdom of Great Britain and Northern Ireland',
				'country_name_th' => 'United Kingdom of Great Britain and Northern Ireland',
			),
			77 => 
			array (
				'country_id' => 78,
				'country_code' => 'GD',
				'country_name_en' => 'Grenada',
				'country_name_th' => 'Grenada',
			),
			78 => 
			array (
				'country_id' => 79,
				'country_code' => 'GE',
				'country_name_en' => 'Georgia',
				'country_name_th' => 'Georgia',
			),
			79 => 
			array (
				'country_id' => 80,
				'country_code' => 'GF',
				'country_name_en' => 'French Guiana',
				'country_name_th' => 'French Guiana',
			),
			80 => 
			array (
				'country_id' => 81,
				'country_code' => 'GG',
				'country_name_en' => 'Guernsey',
				'country_name_th' => 'Guernsey',
			),
			81 => 
			array (
				'country_id' => 82,
				'country_code' => 'GH',
				'country_name_en' => 'Ghana',
				'country_name_th' => 'Ghana',
			),
			82 => 
			array (
				'country_id' => 83,
				'country_code' => 'GI',
				'country_name_en' => 'Gibraltar',
				'country_name_th' => 'Gibraltar',
			),
			83 => 
			array (
				'country_id' => 84,
				'country_code' => 'GL',
				'country_name_en' => 'Greenland',
				'country_name_th' => 'Greenland',
			),
			84 => 
			array (
				'country_id' => 85,
				'country_code' => 'GM',
				'country_name_en' => 'Gambia',
				'country_name_th' => 'Gambia',
			),
			85 => 
			array (
				'country_id' => 86,
				'country_code' => 'GN',
				'country_name_en' => 'Guinea',
				'country_name_th' => 'Guinea',
			),
			86 => 
			array (
				'country_id' => 87,
				'country_code' => 'GP',
				'country_name_en' => 'Guadeloupe',
				'country_name_th' => 'Guadeloupe',
			),
			87 => 
			array (
				'country_id' => 88,
				'country_code' => 'GQ',
				'country_name_en' => 'Equatorial Guinea',
				'country_name_th' => 'Equatorial Guinea',
			),
			88 => 
			array (
				'country_id' => 89,
				'country_code' => 'GR',
				'country_name_en' => 'Greece',
				'country_name_th' => 'Greece',
			),
			89 => 
			array (
				'country_id' => 90,
				'country_code' => 'GS',
				'country_name_en' => 'South Georgia and the South Sandwich Islands',
				'country_name_th' => 'South Georgia and the South Sandwich Islands',
			),
			90 => 
			array (
				'country_id' => 91,
				'country_code' => 'GT',
				'country_name_en' => 'Guatemala',
				'country_name_th' => 'Guatemala',
			),
			91 => 
			array (
				'country_id' => 92,
				'country_code' => 'GU',
				'country_name_en' => 'Guam',
				'country_name_th' => 'Guam',
			),
			92 => 
			array (
				'country_id' => 93,
				'country_code' => 'GW',
				'country_name_en' => 'Guinea-Bissau',
				'country_name_th' => 'Guinea-Bissau',
			),
			93 => 
			array (
				'country_id' => 94,
				'country_code' => 'GY',
				'country_name_en' => 'Guyana',
				'country_name_th' => 'Guyana',
			),
			94 => 
			array (
				'country_id' => 95,
				'country_code' => 'HK',
				'country_name_en' => 'Hong Kong',
				'country_name_th' => 'Hong Kong',
			),
			95 => 
			array (
				'country_id' => 96,
				'country_code' => 'HM',
				'country_name_en' => 'Heard Island and McDonald Islands',
				'country_name_th' => 'Heard Island and McDonald Islands',
			),
			96 => 
			array (
				'country_id' => 97,
				'country_code' => 'HN',
				'country_name_en' => 'Honduras',
				'country_name_th' => 'Honduras',
			),
			97 => 
			array (
				'country_id' => 98,
				'country_code' => 'HR',
				'country_name_en' => 'Croatia',
				'country_name_th' => 'Croatia',
			),
			98 => 
			array (
				'country_id' => 99,
				'country_code' => 'HT',
				'country_name_en' => 'Haiti',
				'country_name_th' => 'Haiti',
			),
			99 => 
			array (
				'country_id' => 100,
				'country_code' => 'HU',
				'country_name_en' => 'Hungary',
				'country_name_th' => 'Hungary',
			),
			100 => 
			array (
				'country_id' => 101,
				'country_code' => 'ID',
				'country_name_en' => 'Indonesia',
				'country_name_th' => 'Indonesia',
			),
			101 => 
			array (
				'country_id' => 102,
				'country_code' => 'IE',
				'country_name_en' => 'Ireland',
				'country_name_th' => 'Ireland',
			),
			102 => 
			array (
				'country_id' => 103,
				'country_code' => 'IL',
				'country_name_en' => 'Israel',
				'country_name_th' => 'Israel',
			),
			103 => 
			array (
				'country_id' => 104,
				'country_code' => 'IM',
				'country_name_en' => 'Isle of Man',
				'country_name_th' => 'Isle of Man',
			),
			104 => 
			array (
				'country_id' => 105,
				'country_code' => 'IN',
				'country_name_en' => 'India',
				'country_name_th' => 'India',
			),
			105 => 
			array (
				'country_id' => 106,
				'country_code' => 'IO',
				'country_name_en' => 'British Indian Ocean Territory',
				'country_name_th' => 'British Indian Ocean Territory',
			),
			106 => 
			array (
				'country_id' => 107,
				'country_code' => 'IQ',
				'country_name_en' => 'Iraq',
				'country_name_th' => 'Iraq',
			),
			107 => 
			array (
				'country_id' => 108,
				'country_code' => 'IR',
				'country_name_en' => 'Iran, Islamic Republic of',
				'country_name_th' => 'Iran, Islamic Republic of',
			),
			108 => 
			array (
				'country_id' => 109,
				'country_code' => 'IS',
				'country_name_en' => 'Iceland',
				'country_name_th' => 'Iceland',
			),
			109 => 
			array (
				'country_id' => 110,
				'country_code' => 'IT',
				'country_name_en' => 'Italy',
				'country_name_th' => 'Italy',
			),
			110 => 
			array (
				'country_id' => 111,
				'country_code' => 'JE',
				'country_name_en' => 'Jersey',
				'country_name_th' => 'Jersey',
			),
			111 => 
			array (
				'country_id' => 112,
				'country_code' => 'JM',
				'country_name_en' => 'Jamaica',
				'country_name_th' => 'Jamaica',
			),
			112 => 
			array (
				'country_id' => 113,
				'country_code' => 'JO',
				'country_name_en' => 'Jordan',
				'country_name_th' => 'Jordan',
			),
			113 => 
			array (
				'country_id' => 114,
				'country_code' => 'JP',
				'country_name_en' => 'Japan',
				'country_name_th' => 'Japan',
			),
			114 => 
			array (
				'country_id' => 115,
				'country_code' => 'KE',
				'country_name_en' => 'Kenya',
				'country_name_th' => 'Kenya',
			),
			115 => 
			array (
				'country_id' => 116,
				'country_code' => 'KG',
				'country_name_en' => 'Kyrgyzstan',
				'country_name_th' => 'Kyrgyzstan',
			),
			116 => 
			array (
				'country_id' => 117,
				'country_code' => 'KH',
				'country_name_en' => 'Cambodia',
				'country_name_th' => 'Cambodia',
			),
			117 => 
			array (
				'country_id' => 118,
				'country_code' => 'KI',
				'country_name_en' => 'Kiribati',
				'country_name_th' => 'Kiribati',
			),
			118 => 
			array (
				'country_id' => 119,
				'country_code' => 'KM',
				'country_name_en' => 'Comoros',
				'country_name_th' => 'Comoros',
			),
			119 => 
			array (
				'country_id' => 120,
				'country_code' => 'KN',
				'country_name_en' => 'Saint Kitts and Nevis',
				'country_name_th' => 'Saint Kitts and Nevis',
			),
			120 => 
			array (
				'country_id' => 121,
				'country_code' => 'KP',
				'country_name_en' => 'Korea, Democratic People\'s Republic of',
				'country_name_th' => 'Korea, Democratic People\'s Republic of',
			),
			121 => 
			array (
				'country_id' => 122,
				'country_code' => 'KR',
				'country_name_en' => 'Korea, Republic of',
				'country_name_th' => 'Korea, Republic of',
			),
			122 => 
			array (
				'country_id' => 123,
				'country_code' => 'KW',
				'country_name_en' => 'Kuwait',
				'country_name_th' => 'Kuwait',
			),
			123 => 
			array (
				'country_id' => 124,
				'country_code' => 'KY',
				'country_name_en' => 'Cayman Islands',
				'country_name_th' => 'Cayman Islands',
			),
			124 => 
			array (
				'country_id' => 125,
				'country_code' => 'KZ',
				'country_name_en' => 'Kazakhstan',
				'country_name_th' => 'Kazakhstan',
			),
			125 => 
			array (
				'country_id' => 126,
				'country_code' => 'LA',
				'country_name_en' => 'Lao People\'s Democratic Republic',
				'country_name_th' => 'Lao People\'s Democratic Republic',
			),
			126 => 
			array (
				'country_id' => 127,
				'country_code' => 'LB',
				'country_name_en' => 'Lebanon',
				'country_name_th' => 'Lebanon',
			),
			127 => 
			array (
				'country_id' => 128,
				'country_code' => 'LC',
				'country_name_en' => 'Saint Lucia',
				'country_name_th' => 'Saint Lucia',
			),
			128 => 
			array (
				'country_id' => 129,
				'country_code' => 'LI',
				'country_name_en' => 'Liechtenstein',
				'country_name_th' => 'Liechtenstein',
			),
			129 => 
			array (
				'country_id' => 130,
				'country_code' => 'LK',
				'country_name_en' => 'Sri Lanka',
				'country_name_th' => 'Sri Lanka',
			),
			130 => 
			array (
				'country_id' => 131,
				'country_code' => 'LR',
				'country_name_en' => 'Liberia',
				'country_name_th' => 'Liberia',
			),
			131 => 
			array (
				'country_id' => 132,
				'country_code' => 'LS',
				'country_name_en' => 'Lesotho',
				'country_name_th' => 'Lesotho',
			),
			132 => 
			array (
				'country_id' => 133,
				'country_code' => 'LT',
				'country_name_en' => 'Lithuania',
				'country_name_th' => 'Lithuania',
			),
			133 => 
			array (
				'country_id' => 134,
				'country_code' => 'LU',
				'country_name_en' => 'Luxembourg',
				'country_name_th' => 'Luxembourg',
			),
			134 => 
			array (
				'country_id' => 135,
				'country_code' => 'LV',
				'country_name_en' => 'Latvia',
				'country_name_th' => 'Latvia',
			),
			135 => 
			array (
				'country_id' => 136,
				'country_code' => 'LY',
				'country_name_en' => 'Libya',
				'country_name_th' => 'Libya',
			),
			136 => 
			array (
				'country_id' => 137,
				'country_code' => 'MA',
				'country_name_en' => 'Morocco',
				'country_name_th' => 'Morocco',
			),
			137 => 
			array (
				'country_id' => 138,
				'country_code' => 'MC',
				'country_name_en' => 'Monaco',
				'country_name_th' => 'Monaco',
			),
			138 => 
			array (
				'country_id' => 139,
				'country_code' => 'MD',
				'country_name_en' => 'Moldova, Republic of',
				'country_name_th' => 'Moldova, Republic of',
			),
			139 => 
			array (
				'country_id' => 140,
				'country_code' => 'ME',
				'country_name_en' => 'Montenegro',
				'country_name_th' => 'Montenegro',
			),
			140 => 
			array (
				'country_id' => 141,
				'country_code' => 'MF',
			'country_name_en' => 'Saint Martin (French part)',
			'country_name_th' => 'Saint Martin (French part)',
			),
			141 => 
			array (
				'country_id' => 142,
				'country_code' => 'MG',
				'country_name_en' => 'Madagascar',
				'country_name_th' => 'Madagascar',
			),
			142 => 
			array (
				'country_id' => 143,
				'country_code' => 'MH',
				'country_name_en' => 'Marshall Islands',
				'country_name_th' => 'Marshall Islands',
			),
			143 => 
			array (
				'country_id' => 144,
				'country_code' => 'MK',
				'country_name_en' => 'Macedonia, the former Yugoslav Republic of',
				'country_name_th' => 'Macedonia, the former Yugoslav Republic of',
			),
			144 => 
			array (
				'country_id' => 145,
				'country_code' => 'ML',
				'country_name_en' => 'Mali',
				'country_name_th' => 'Mali',
			),
			145 => 
			array (
				'country_id' => 146,
				'country_code' => 'MM',
				'country_name_en' => 'Myanmar',
				'country_name_th' => 'Myanmar',
			),
			146 => 
			array (
				'country_id' => 147,
				'country_code' => 'MN',
				'country_name_en' => 'Mongolia',
				'country_name_th' => 'Mongolia',
			),
			147 => 
			array (
				'country_id' => 148,
				'country_code' => 'MO',
				'country_name_en' => 'Macao',
				'country_name_th' => 'Macao',
			),
			148 => 
			array (
				'country_id' => 149,
				'country_code' => 'MP',
				'country_name_en' => 'Northern Mariana Islands',
				'country_name_th' => 'Northern Mariana Islands',
			),
			149 => 
			array (
				'country_id' => 150,
				'country_code' => 'MQ',
				'country_name_en' => 'Martinique',
				'country_name_th' => 'Martinique',
			),
			150 => 
			array (
				'country_id' => 151,
				'country_code' => 'MR',
				'country_name_en' => 'Mauritania',
				'country_name_th' => 'Mauritania',
			),
			151 => 
			array (
				'country_id' => 152,
				'country_code' => 'MS',
				'country_name_en' => 'Montserrat',
				'country_name_th' => 'Montserrat',
			),
			152 => 
			array (
				'country_id' => 153,
				'country_code' => 'MT',
				'country_name_en' => 'Malta',
				'country_name_th' => 'Malta',
			),
			153 => 
			array (
				'country_id' => 154,
				'country_code' => 'MU',
				'country_name_en' => 'Mauritius',
				'country_name_th' => 'Mauritius',
			),
			154 => 
			array (
				'country_id' => 155,
				'country_code' => 'MV',
				'country_name_en' => 'Maldives',
				'country_name_th' => 'Maldives',
			),
			155 => 
			array (
				'country_id' => 156,
				'country_code' => 'MW',
				'country_name_en' => 'Malawi',
				'country_name_th' => 'Malawi',
			),
			156 => 
			array (
				'country_id' => 157,
				'country_code' => 'MX',
				'country_name_en' => 'Mexico',
				'country_name_th' => 'Mexico',
			),
			157 => 
			array (
				'country_id' => 158,
				'country_code' => 'MY',
				'country_name_en' => 'Malaysia',
				'country_name_th' => 'Malaysia',
			),
			158 => 
			array (
				'country_id' => 159,
				'country_code' => 'MZ',
				'country_name_en' => 'Mozambique',
				'country_name_th' => 'Mozambique',
			),
			159 => 
			array (
				'country_id' => 160,
				'country_code' => 'NA',
				'country_name_en' => 'Namibia',
				'country_name_th' => 'Namibia',
			),
			160 => 
			array (
				'country_id' => 161,
				'country_code' => 'NC',
				'country_name_en' => 'New Caledonia',
				'country_name_th' => 'New Caledonia',
			),
			161 => 
			array (
				'country_id' => 162,
				'country_code' => 'NE',
				'country_name_en' => 'Niger',
				'country_name_th' => 'Niger',
			),
			162 => 
			array (
				'country_id' => 163,
				'country_code' => 'NF',
				'country_name_en' => 'Norfolk Island',
				'country_name_th' => 'Norfolk Island',
			),
			163 => 
			array (
				'country_id' => 164,
				'country_code' => 'NG',
				'country_name_en' => 'Nigeria',
				'country_name_th' => 'Nigeria',
			),
			164 => 
			array (
				'country_id' => 165,
				'country_code' => 'NI',
				'country_name_en' => 'Nicaragua',
				'country_name_th' => 'Nicaragua',
			),
			165 => 
			array (
				'country_id' => 166,
				'country_code' => 'NL',
				'country_name_en' => 'Netherlands',
				'country_name_th' => 'Netherlands',
			),
			166 => 
			array (
				'country_id' => 167,
				'country_code' => 'NO',
				'country_name_en' => 'Norway',
				'country_name_th' => 'Norway',
			),
			167 => 
			array (
				'country_id' => 168,
				'country_code' => 'NP',
				'country_name_en' => 'Nepal',
				'country_name_th' => 'Nepal',
			),
			168 => 
			array (
				'country_id' => 169,
				'country_code' => 'NR',
				'country_name_en' => 'Nauru',
				'country_name_th' => 'Nauru',
			),
			169 => 
			array (
				'country_id' => 170,
				'country_code' => 'NU',
				'country_name_en' => 'Niue',
				'country_name_th' => 'Niue',
			),
			170 => 
			array (
				'country_id' => 171,
				'country_code' => 'NZ',
				'country_name_en' => 'New Zealand',
				'country_name_th' => 'New Zealand',
			),
			171 => 
			array (
				'country_id' => 172,
				'country_code' => 'OM',
				'country_name_en' => 'Oman',
				'country_name_th' => 'Oman',
			),
			172 => 
			array (
				'country_id' => 173,
				'country_code' => 'PA',
				'country_name_en' => 'Panama',
				'country_name_th' => 'Panama',
			),
			173 => 
			array (
				'country_id' => 174,
				'country_code' => 'PE',
				'country_name_en' => 'Peru',
				'country_name_th' => 'Peru',
			),
			174 => 
			array (
				'country_id' => 175,
				'country_code' => 'PF',
				'country_name_en' => 'French Polynesia',
				'country_name_th' => 'French Polynesia',
			),
			175 => 
			array (
				'country_id' => 176,
				'country_code' => 'PG',
				'country_name_en' => 'Papua New Guinea',
				'country_name_th' => 'Papua New Guinea',
			),
			176 => 
			array (
				'country_id' => 177,
				'country_code' => 'PH',
				'country_name_en' => 'Philippines',
				'country_name_th' => 'Philippines',
			),
			177 => 
			array (
				'country_id' => 178,
				'country_code' => 'PK',
				'country_name_en' => 'Pakistan',
				'country_name_th' => 'Pakistan',
			),
			178 => 
			array (
				'country_id' => 179,
				'country_code' => 'PL',
				'country_name_en' => 'Poland',
				'country_name_th' => 'Poland',
			),
			179 => 
			array (
				'country_id' => 180,
				'country_code' => 'PM',
				'country_name_en' => 'Saint Pierre and Miquelon',
				'country_name_th' => 'Saint Pierre and Miquelon',
			),
			180 => 
			array (
				'country_id' => 181,
				'country_code' => 'PN',
				'country_name_en' => 'Pitcairn',
				'country_name_th' => 'Pitcairn',
			),
			181 => 
			array (
				'country_id' => 182,
				'country_code' => 'PR',
				'country_name_en' => 'Puerto Rico',
				'country_name_th' => 'Puerto Rico',
			),
			182 => 
			array (
				'country_id' => 183,
				'country_code' => 'PS',
				'country_name_en' => 'Palestine, State of',
				'country_name_th' => 'Palestine, State of',
			),
			183 => 
			array (
				'country_id' => 184,
				'country_code' => 'PT',
				'country_name_en' => 'Portugal',
				'country_name_th' => 'Portugal',
			),
			184 => 
			array (
				'country_id' => 185,
				'country_code' => 'PW',
				'country_name_en' => 'Palau',
				'country_name_th' => 'Palau',
			),
			185 => 
			array (
				'country_id' => 186,
				'country_code' => 'PY',
				'country_name_en' => 'Paraguay',
				'country_name_th' => 'Paraguay',
			),
			186 => 
			array (
				'country_id' => 187,
				'country_code' => 'QA',
				'country_name_en' => 'Qatar',
				'country_name_th' => 'Qatar',
			),
			187 => 
			array (
				'country_id' => 188,
				'country_code' => 'RE',
				'country_name_en' => 'R?union',
				'country_name_th' => 'R?union',
			),
			188 => 
			array (
				'country_id' => 189,
				'country_code' => 'RO',
				'country_name_en' => 'Romania',
				'country_name_th' => 'Romania',
			),
			189 => 
			array (
				'country_id' => 190,
				'country_code' => 'RS',
				'country_name_en' => 'Serbia',
				'country_name_th' => 'Serbia',
			),
			190 => 
			array (
				'country_id' => 191,
				'country_code' => 'RU',
				'country_name_en' => 'Russian Federation',
				'country_name_th' => 'Russian Federation',
			),
			191 => 
			array (
				'country_id' => 192,
				'country_code' => 'RW',
				'country_name_en' => 'Rwanda',
				'country_name_th' => 'Rwanda',
			),
			192 => 
			array (
				'country_id' => 193,
				'country_code' => 'SA',
				'country_name_en' => 'Saudi Arabia',
				'country_name_th' => 'Saudi Arabia',
			),
			193 => 
			array (
				'country_id' => 194,
				'country_code' => 'SB',
				'country_name_en' => 'Solomon Islands',
				'country_name_th' => 'Solomon Islands',
			),
			194 => 
			array (
				'country_id' => 195,
				'country_code' => 'SC',
				'country_name_en' => 'Seychelles',
				'country_name_th' => 'Seychelles',
			),
			195 => 
			array (
				'country_id' => 196,
				'country_code' => 'SD',
				'country_name_en' => 'Sudan',
				'country_name_th' => 'Sudan',
			),
			196 => 
			array (
				'country_id' => 197,
				'country_code' => 'SE',
				'country_name_en' => 'Sweden',
				'country_name_th' => 'Sweden',
			),
			197 => 
			array (
				'country_id' => 198,
				'country_code' => 'SG',
				'country_name_en' => 'Singapore',
				'country_name_th' => 'Singapore',
			),
			198 => 
			array (
				'country_id' => 199,
				'country_code' => 'SH',
				'country_name_en' => 'Saint Helena, Ascension and Tristan da Cunha',
				'country_name_th' => 'Saint Helena, Ascension and Tristan da Cunha',
			),
			199 => 
			array (
				'country_id' => 200,
				'country_code' => 'SI',
				'country_name_en' => 'Slovenia',
				'country_name_th' => 'Slovenia',
			),
			200 => 
			array (
				'country_id' => 201,
				'country_code' => 'SJ',
				'country_name_en' => 'Svalbard and Jan Mayen',
				'country_name_th' => 'Svalbard and Jan Mayen',
			),
			201 => 
			array (
				'country_id' => 202,
				'country_code' => 'SK',
				'country_name_en' => 'Slovakia',
				'country_name_th' => 'Slovakia',
			),
			202 => 
			array (
				'country_id' => 203,
				'country_code' => 'SL',
				'country_name_en' => 'Sierra Leone',
				'country_name_th' => 'Sierra Leone',
			),
			203 => 
			array (
				'country_id' => 204,
				'country_code' => 'SM',
				'country_name_en' => 'San Marino',
				'country_name_th' => 'San Marino',
			),
			204 => 
			array (
				'country_id' => 205,
				'country_code' => 'SN',
				'country_name_en' => 'Senegal',
				'country_name_th' => 'Senegal',
			),
			205 => 
			array (
				'country_id' => 206,
				'country_code' => 'SO',
				'country_name_en' => 'Somalia',
				'country_name_th' => 'Somalia',
			),
			206 => 
			array (
				'country_id' => 207,
				'country_code' => 'SR',
				'country_name_en' => 'Suriname',
				'country_name_th' => 'Suriname',
			),
			207 => 
			array (
				'country_id' => 208,
				'country_code' => 'SS',
				'country_name_en' => 'South Sudan',
				'country_name_th' => 'South Sudan',
			),
			208 => 
			array (
				'country_id' => 209,
				'country_code' => 'ST',
				'country_name_en' => 'Sao Tome and Principe',
				'country_name_th' => 'Sao Tome and Principe',
			),
			209 => 
			array (
				'country_id' => 210,
				'country_code' => 'SV',
				'country_name_en' => 'El Salvador',
				'country_name_th' => 'El Salvador',
			),
			210 => 
			array (
				'country_id' => 211,
				'country_code' => 'SX',
			'country_name_en' => 'Sint Maarten (Dutch part)',
			'country_name_th' => 'Sint Maarten (Dutch part)',
			),
			211 => 
			array (
				'country_id' => 212,
				'country_code' => 'SY',
				'country_name_en' => 'Syrian Arab Republic',
				'country_name_th' => 'Syrian Arab Republic',
			),
			212 => 
			array (
				'country_id' => 213,
				'country_code' => 'SZ',
				'country_name_en' => 'Swaziland',
				'country_name_th' => 'Swaziland',
			),
			213 => 
			array (
				'country_id' => 214,
				'country_code' => 'TC',
				'country_name_en' => 'Turks and Caicos Islands',
				'country_name_th' => 'Turks and Caicos Islands',
			),
			214 => 
			array (
				'country_id' => 215,
				'country_code' => 'TD',
				'country_name_en' => 'Chad',
				'country_name_th' => 'Chad',
			),
			215 => 
			array (
				'country_id' => 216,
				'country_code' => 'TF',
				'country_name_en' => 'French Southern Territories',
				'country_name_th' => 'French Southern Territories',
			),
			216 => 
			array (
				'country_id' => 217,
				'country_code' => 'TG',
				'country_name_en' => 'Togo',
				'country_name_th' => 'Togo',
			),
			217 => 
			array (
				'country_id' => 218,
				'country_code' => 'TH',
				'country_name_en' => 'Thailand',
				'country_name_th' => 'Thailand',
			),
			218 => 
			array (
				'country_id' => 219,
				'country_code' => 'TJ',
				'country_name_en' => 'Tajikistan',
				'country_name_th' => 'Tajikistan',
			),
			219 => 
			array (
				'country_id' => 220,
				'country_code' => 'TK',
				'country_name_en' => 'Tokelau',
				'country_name_th' => 'Tokelau',
			),
			220 => 
			array (
				'country_id' => 221,
				'country_code' => 'TL',
				'country_name_en' => 'Timor-Leste',
				'country_name_th' => 'Timor-Leste',
			),
			221 => 
			array (
				'country_id' => 222,
				'country_code' => 'TM',
				'country_name_en' => 'Turkmenistan',
				'country_name_th' => 'Turkmenistan',
			),
			222 => 
			array (
				'country_id' => 223,
				'country_code' => 'TN',
				'country_name_en' => 'Tunisia',
				'country_name_th' => 'Tunisia',
			),
			223 => 
			array (
				'country_id' => 224,
				'country_code' => 'TO',
				'country_name_en' => 'Tonga',
				'country_name_th' => 'Tonga',
			),
			224 => 
			array (
				'country_id' => 225,
				'country_code' => 'TR',
				'country_name_en' => 'Turkey',
				'country_name_th' => 'Turkey',
			),
			225 => 
			array (
				'country_id' => 226,
				'country_code' => 'TT',
				'country_name_en' => 'Trinidad and Tobago',
				'country_name_th' => 'Trinidad and Tobago',
			),
			226 => 
			array (
				'country_id' => 227,
				'country_code' => 'TV',
				'country_name_en' => 'Tuvalu',
				'country_name_th' => 'Tuvalu',
			),
			227 => 
			array (
				'country_id' => 228,
				'country_code' => 'TW',
				'country_name_en' => 'Taiwan, Province of China',
				'country_name_th' => 'Taiwan, Province of China',
			),
			228 => 
			array (
				'country_id' => 229,
				'country_code' => 'TZ',
				'country_name_en' => 'Tanzania, United Republic of',
				'country_name_th' => 'Tanzania, United Republic of',
			),
			229 => 
			array (
				'country_id' => 230,
				'country_code' => 'UA',
				'country_name_en' => 'Ukraine',
				'country_name_th' => 'Ukraine',
			),
			230 => 
			array (
				'country_id' => 231,
				'country_code' => 'UG',
				'country_name_en' => 'Uganda',
				'country_name_th' => 'Uganda',
			),
			231 => 
			array (
				'country_id' => 232,
				'country_code' => 'UM',
				'country_name_en' => 'United States Minor Outlying Islands',
				'country_name_th' => 'United States Minor Outlying Islands',
			),
			232 => 
			array (
				'country_id' => 233,
				'country_code' => 'US',
				'country_name_en' => 'United States of America',
				'country_name_th' => 'United States of America',
			),
			233 => 
			array (
				'country_id' => 234,
				'country_code' => 'UY',
				'country_name_en' => 'Uruguay',
				'country_name_th' => 'Uruguay',
			),
			234 => 
			array (
				'country_id' => 235,
				'country_code' => 'UZ',
				'country_name_en' => 'Uzbekistan',
				'country_name_th' => 'Uzbekistan',
			),
			235 => 
			array (
				'country_id' => 236,
				'country_code' => 'VA',
				'country_name_en' => 'Holy See',
				'country_name_th' => 'Holy See',
			),
			236 => 
			array (
				'country_id' => 237,
				'country_code' => 'VC',
				'country_name_en' => 'Saint Vincent and the Grenadines',
				'country_name_th' => 'Saint Vincent and the Grenadines',
			),
			237 => 
			array (
				'country_id' => 238,
				'country_code' => 'VE',
				'country_name_en' => 'Venezuela, Bolivarian Republic of',
				'country_name_th' => 'Venezuela, Bolivarian Republic of',
			),
			238 => 
			array (
				'country_id' => 239,
				'country_code' => 'VG',
				'country_name_en' => 'Virgin Islands, British',
				'country_name_th' => 'Virgin Islands, British',
			),
			239 => 
			array (
				'country_id' => 240,
				'country_code' => 'VI',
				'country_name_en' => 'Virgin Islands, U.S.',
				'country_name_th' => 'Virgin Islands, U.S.',
			),
			240 => 
			array (
				'country_id' => 241,
				'country_code' => 'VN',
				'country_name_en' => 'Viet Nam',
				'country_name_th' => 'Viet Nam',
			),
			241 => 
			array (
				'country_id' => 242,
				'country_code' => 'VU',
				'country_name_en' => 'Vanuatu',
				'country_name_th' => 'Vanuatu',
			),
			242 => 
			array (
				'country_id' => 243,
				'country_code' => 'WF',
				'country_name_en' => 'Wallis and Futuna',
				'country_name_th' => 'Wallis and Futuna',
			),
			243 => 
			array (
				'country_id' => 244,
				'country_code' => 'WS',
				'country_name_en' => 'Samoa',
				'country_name_th' => 'Samoa',
			),
			244 => 
			array (
				'country_id' => 245,
				'country_code' => 'YE',
				'country_name_en' => 'Yemen',
				'country_name_th' => 'Yemen',
			),
			245 => 
			array (
				'country_id' => 246,
				'country_code' => 'YT',
				'country_name_en' => 'Mayotte',
				'country_name_th' => 'Mayotte',
			),
			246 => 
			array (
				'country_id' => 247,
				'country_code' => 'ZA',
				'country_name_en' => 'South Africa',
				'country_name_th' => 'South Africa',
			),
			247 => 
			array (
				'country_id' => 248,
				'country_code' => 'ZM',
				'country_name_en' => 'Zambia',
				'country_name_th' => 'Zambia',
			),
			248 => 
			array (
				'country_id' => 249,
				'country_code' => 'ZW',
				'country_name_en' => 'Zimbabwe',
				'country_name_th' => 'Zimbabwe',
			),
		));
	}

}
