<?php

namespace Database\Seeders;

use App\Models\ClinicInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'manager@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        $infos =[
            [
            'name'=>'Clinic Group One',
            'address'=>'Tbaeng,Banteay Srei, Siem Reap, Cambodia',
            'email'=>'myclinic@gmail.com',
            'phone'=>'0978219556',
            'working'=>'Mon - Fri : 09.00 AM - 09.00 PM',
            'map'=>'www.googlemap.com',
            'facebook'=>'www.facebook.com/klinic',
            'twitter'=>'www.twitter.com/klinic',
            'youtube'=>'www.youtube.com/klinic',
            'linkedin'=>'www.klinic',
            'instagram'=>'www.instagram.com/klinic'
            ]
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
        foreach ($infos as $key => $info) {
            ClinicInfo::create($info);
        }
    }
}
