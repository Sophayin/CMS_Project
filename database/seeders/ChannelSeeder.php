<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonChannels = [
            [
                'title' => 'Field',
                'language' => ['lang' => 'kh', 'name' => "ខាងក្រៅ"],
                'description' => 'Get application from outsource'
            ],  [
                'title' => 'Partner Shop',
                'language' => ['lang' => 'kh', 'name' => "ដៃគូសហការណ៍ហាង"],
                'description' => 'Get application from Partner Shop'
            ],  [
                'title' => 'Agency',
                'language' => ['lang' => 'kh', 'name' => "ភ្នាក់ងារ"],
                'description' => 'Get application from Agency'
            ],  [
                'title' => 'In House',
                'language' => ['lang' => 'kh', 'name' => "ខាងក្នុង"],
                'description' => 'Get application from In House'
            ],  [
                'title' => '121 Digital Online',
                'language' => ['lang' => 'kh', 'name' => "១២១ឌីជីថលអនឡាញ"],
                'description' => 'Get application from 121 Digital Online'
            ],  [
                'title' => 'Online Agency',
                'language' => ['lang' => 'kh', 'name' => "ភ្នាក់ងារអនឡាញ"],
                'description' => 'Get application from Online Agency'
            ]
        ];
        foreach ($jsonChannels as $item) {
            DB::table('channels')->insert([
                'title' => $item['title'],
                'languages' => json_encode($item['language'], JSON_UNESCAPED_UNICODE),
                'description' => $item['description'],
                'status' => true,
            ]);
        }
    }
}
