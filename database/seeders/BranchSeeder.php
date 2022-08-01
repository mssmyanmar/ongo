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
            [
                'branch_name' => 'Chaung Son – 024',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Daik-U – 020',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Dala – 004',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'East Dagon - 038',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Gyo Bin Gouk - 044',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Head Office - 001',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Hmawbi - 016',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Hopong - 066',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Insein - 012',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Kanbalu - 070',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Kyaik Hto - 027',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Kyaukdager - 035',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Kyemyingdaing – 009',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Kyouk Se - 054',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Kyun Chan Kone - 041',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Let Pa Dan - 042',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Magway - 062',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Mawlamyine - 011',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Mayangone - 003',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Meikhtila – 046',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Min Hla - 051',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Minbu - 045',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Monywa – 058',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Mudon - 015',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Myin Chan - 056',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Myin Mu – 060',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Natmouk - 055',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'North Dagon - 029',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'North Okkalapa - 002',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Nyaunglaybin - 013',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Nyaung-U - 047',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Oak-Twin - 028',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Ohk Thar - 017',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Pakokku - 052',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Paung Tee – 040',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Phyargyi – 008',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Phyu - 032',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Pindaya - 067',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Pin Laung -071',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Pwint Phyu - 048',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Pyawbwe - 068',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Pyay - 030',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Pyin Oo Lwin – 064',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Sagaining - 059',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Salin - 043',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Shwe Bo - 063',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Shwe Taung - 039',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'TadaU - 069',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Taikkyi - 014',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Tamwe - 022',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Taung Dwin Gyi - 053',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Taungoo - 025',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Tawn Tay - 033',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'ThanphyuZayet - 021',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Thaton - 019',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Thayarwaddy - 050',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Thayet -073',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Thingangyun - 006',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Thone Gwa - 026',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Waw - 010',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Yae - 034',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Yan Kin - 031',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Ye Tar Shae – 037',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'YeU - 065',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Yin Mar Bin -072',
                'created_at'  =>  $mytime,
            ],
            [
                'branch_name' => 'Zin Kyeik – 018',
                'created_at'  =>  $mytime,
            ],
        ]);
    }
}
