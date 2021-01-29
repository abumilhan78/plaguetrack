<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
        	['id' => 11, 'prov_name' => "ACEH", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 12, 'prov_name' => "SUMATERA UTARA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 13, 'prov_name' => "SUMATERA BARAT", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 14, 'prov_name' => "RIAU", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 15, 'prov_name' => "JAMBI", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 16, 'prov_name' => "SUMATERA SELATAN", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 17, 'prov_name' => "BENGKULU", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 18, 'prov_name' => "LAMPUNG", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 19, 'prov_name' => "KEPULAUAN BANGKA BELITUNG", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 21, 'prov_name' => "KEPULAUAN RIAU", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 31, 'prov_name' => "DKI JAKARTA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 32, 'prov_name' => "JAWA BARAT", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 33, 'prov_name' => "JAWA TENGAH", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 34, 'prov_name' => "DI YOGYAKARTA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 35, 'prov_name' => "JAWA TIMUR", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 36, 'prov_name' => "BANTEN", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 51, 'prov_name' => "BALI", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 52, 'prov_name' => "NUSA TENGGARA BARAT", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 53, 'prov_name' => "NUSA TENGGARA TIMUR", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 61, 'prov_name' => "KALIMANTAN BARAT", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 62, 'prov_name' => "KALIMANTAN TENGAH", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 63, 'prov_name' => "KALIMANTAN SELATAN", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 64, 'prov_name' => "KALIMANTAN TIMUR", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 65, 'prov_name' => "KALIMANTAN UTARA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 71, 'prov_name' => "SULAWESI UTARA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 72, 'prov_name' => "SULAWESI TENGAH", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 73, 'prov_name' => "SULAWESI SELATAN", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 74, 'prov_name' => "SULAWESI TENGGARA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 75, 'prov_name' => "GORONTALO", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 76, 'prov_name' => "SULAWESI BARAT", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 81, 'prov_name' => "MALUKU", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 82, 'prov_name' => "MALUKU UTARA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 91, 'prov_name' => "PAPUA BARAT", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
],
			['id' => 94, 'prov_name' => "PAPUA", 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
]
        ];

        DB::table('provinces')->insert($provinces);

    }
}
