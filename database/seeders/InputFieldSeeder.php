<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InputFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon::now();
        DB::table('input_fields')->truncate();
        DB::table('input_fields')->insert([
            [
                'client_id'       => 1,
                'display_name'    => 'Amount',
                'identifier'      => 'amount',
                'validation_regx' => '[0-9]+',
                'display_order'   => '1',
                'field_type'      => 'number',
                'isRequired'      => true,
                'min'             => '0',
                'max'             => '10000000',
                'branch_data'     => null,
                'format'          => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 1,
                'display_name'    => 'Notes',
                'identifier'      => 'description',
                'validation_regx' => '[^xyz]',
                'display_order'   => '3',
                'field_type'      => 'text',
                'isRequired'      => true,
                'min'             => null,
                'max'             => null,
                'branch_data'     => null,
                'format'          => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 1,
                'display_name'    => 'Unique ID',
                'identifier'      => 'unique_id',
                'validation_regx' => '[^xyz]',
                'display_order'   => '2',
                'field_type'      => 'text',
                'isRequired'      => true,
                'min'             => null,
                'max'             => null,
                'branch_data'     => null,
                'format'          => "401941/3141",
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 2,
                'display_name'    => 'Amount',
                'identifier'      => 'amount',
                'validation_regx' => '[0-9]+',
                'display_order'   => '1',
                'field_type'      => 'number',
                'isRequired'      => true,
                'min'             => '0',
                'max'             => '10000000',
                'branch_data'     => null,
                'format'          => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 2,
                'display_name'    => 'Notes',
                'identifier'      => 'description',
                'validation_regx' => '[^xyz]',
                'display_order'   => '2',
                'field_type'      => 'text',
                'isRequired'      => true,
                'min'             => null,
                'max'             => null,
                'branch_data'     => null,
                'format'          => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 2,
                'display_name'    => 'Branch',
                'identifier'      => 'branch_id',
                'validation_regx' => '[0-9]+',
                'display_order'   => '3',
                'field_type'      => 'list',
                'isRequired'      => true,
                'min'             => null,
                'max'             => null,
                'branch_data'     => '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71',
                'format'          => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 2,
                'display_name'    => 'Loan ID',
                'identifier'      => 'loan_id',
                'validation_regx' => '[0-9]+',
                'display_order'   => '4',
                'field_type'      => 'number',
                'isRequired'      => true,
                'min'             => null,
                'max'             => null,
                'branch_data'     => null,
                'format'          => "82-004947-01-4",
                'created_at'      => $mytime,
            ],
        ]);
    }
}