<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonCountryData = File::json(public_path('jsonCountry.json'));
        foreach ($jsonCountryData as $item) {
            $getCountry = DB::table('countries')->where('name', $item['latin'])->first();
            if ($getCountry == null) {
                $conGetLastId = DB::table('countries')->insertGetId([
                    'name' => $item['latin'],
                    'code' => $item['code'],
                    'languages' => json_encode(['lang' => 'kh', 'name' => $item['khmer']], JSON_UNESCAPED_UNICODE), //'[{"lang":"kh","name":"' . $item['khmer'] . '"}]',
                ]);
                foreach ($item['city'] as $city) {
                    $cityGetLastId = DB::table('cities')->insertGetId([
                        'name' => $city['latin'],
                        'code' => $city['code'],
                        'languages' => json_encode(['lang' => 'kh', 'name' => $city['khmer']], JSON_UNESCAPED_UNICODE), // '[{"lang":"kh","name":"' . $city['khmer'] . '"}]',
                        'country_id' => $conGetLastId
                    ]);
                    foreach ($city['districts'] as $district) {
                        $distGetLastId =  DB::table('districts')->insertGetId([
                            'name' =>  $district['latin'],
                            'code' => $district['code'],
                            'languages' => json_encode(['lang' => 'kh', 'name' => $district['khmer']], JSON_UNESCAPED_UNICODE), //'[{"lang":"kh","name":"' . $district['khmer'] . '"}]',
                            'city_id' => $cityGetLastId,
                        ]);
                        foreach ($district['communes'] as $commune) {
                            $comGetLastId = DB::table('communes')->insertGetId([
                                'name' => $commune['latin'],
                                'code' => $commune['code'],
                                'languages' => json_encode(['lang' => 'kh', 'name' => $commune['khmer']], JSON_UNESCAPED_UNICODE), //'[{"lang":"kh","name":"' . $commune['khmer'] . '"}]',
                                'district_id' => $distGetLastId
                            ]);
                            foreach ($commune['villages'] as $village) {
                                DB::table('villages')->insert([
                                    'name' => $village['latin'],
                                    'code' => $village['code'],
                                    'languages' => json_encode(['lang' => 'kh', 'name' => $village['khmer']], JSON_UNESCAPED_UNICODE),
                                    'commune_id' => $comGetLastId,
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
