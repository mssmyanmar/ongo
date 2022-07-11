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
                'validation_regx' => '[0-9]+',
                'display_order'   => '1',
                'field_type'      => 'number',
                'isRequired'      => true,
                'min'             => '0',
                'max'             => '10000000',
                'branch_data'     => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 1,
                'display_name'    => 'Description',
                'validation_regx' => '[^xyz]',
                'display_order'   => '2',
                'field_type'      => 'text',
                'isRequired'      => true,
                'min'             => null,
                'max'             => null,
                'branch_data'     => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 2,
                'display_name'    => 'Amount',
                'validation_regx' => '[0-9]+',
                'display_order'   => '1',
                'field_type'      => 'number',
                'isRequired'      => true,
                'min'             => '0',
                'max'             => '10000000',
                'branch_data'     => null,
                'created_at'      => $mytime,
            ],
            [
                'client_id'       => 2,
                'display_name'    => 'Description',
                'validation_regx' => '[^xyz]',
                'display_order'   => '2',
                'field_type'      => 'text',
                'isRequired'      => true,
                'min'             => null,
                'max'             => null,
                'branch_data'     => null,
                'created_at'      => $mytime,
            ],
        ]);
    }
}
