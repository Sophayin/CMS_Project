<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonReason = [
            [
                'name' => 'Multiple Bank lending',
                'name_translate' => "កម្ចីច្រើនធនាគារ",
                'type' => 'application',
                'description' => 'Client is stucking with many bank lending currently',
                'action' => 'reject'
            ], [
                'name' => 'Low Income',
                'name_translate' => "ប្រាក់ចំណូលទាប",
                'type' => 'application',
                'description' => 'it is high over their income that cannot be able to pay back.',
                'action' => 'reject'
            ], [
                'name' => 'Bad CBC Credit',
                'name_translate' => "ប្រវត្តិឥណទានមិនល្អ",
                'type' => 'application',
                'description' => 'This client always pays late to MFI, and sometimes not pay at all.',
                'action' => 'reject'
            ], [
                'name' => 'No Warranty Property',
                'name_translate' => "មិនមានទ្រព្យបញ្ចាំ",
                'type' => 'application',
                'description' => 'He lives in rent room, has no property for warranty on this loan, high risk.',
                'action' => 'reject'
            ], [
                'name' => 'Insufficient Documents',
                'name_translate' => "ខ្វះឯកសារ",
                'type' => 'application',
                'description' => 'This client look good, but we are not provided enough documents for process this loan.',
                'action' => 'reject'
            ]
        ];
        foreach ($jsonReason  as $reason) {
            DB::table('reasons')->insert([
                'name' => $reason['name'],
                'name_translate' => $reason['name_translate'],
                'type'  => $reason['type'],
                'description' => $reason['description'],
                'action' => $reason['action'],
            ]);
        }
    }
}
