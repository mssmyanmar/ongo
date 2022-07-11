<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon::now();
        DB::table('branches')->truncate();
        DB::table('branches')->insert([
            [
                'branch_name' => 'Aung Lan - 049',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Aung Pan - 061',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Bago - 007',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Belin - 036',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Chauk - 057',
                'created_at'  =>  $mytime,
            ],
        ]);
    }
}
