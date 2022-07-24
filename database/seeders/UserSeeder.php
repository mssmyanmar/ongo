<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name          = "admin";
        $user->phone_number  = "0987654321";
        $user->password      = 123456789;
        $user->address       = "Yangon";
        $user->active_status = 1;
        $user->nrc           = "5/khaoota(n)123456";
        $user->save();
        $user->assignRole('admin');

        $user = new User;
        $user->name          = "staff1";
        $user->phone_number  = "0987654322";
        $user->password      = 123456789;
        $user->address       = "Yangon";
        $user->active_status = 1;
        $user->nrc           = "5/khaoota(n)112233";
        $user->code          = "1234";
        $user->save();
        $user->assignRole('staff');

        $user = new User;
        $user->name          = "staff2";
        $user->phone_number  = "0987654323";
        $user->password      = 123456789;
        $user->address       = "Yangon";
        $user->active_status = 0;
        $user->nrc           = "5/khaoota(n)445566";
        $user->code          = "5678";
        $user->save();
        $user->assignRole('staff');
    }
}