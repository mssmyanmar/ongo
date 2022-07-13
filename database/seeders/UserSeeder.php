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
        $user->active_status = 0;
        $user->nrc           = "5/khaoota(n)123456";
        $user->save();
        $user->assignRole('admin');
    }
}