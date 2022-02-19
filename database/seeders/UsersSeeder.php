<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin Pariwisata";
        $adminRole->save();

        //membuat the database seed.
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member Pariwisata";
        $memberRole->save();

        $userAdmin = new User;
        $userAdmin->name = "Muhmammad Albi S";
        $userAdmin->email = "albi@gmail.com";
        $userAdmin->password = bcrypt("wisata");
        $userAdmin->save();
        $userAdmin->attachRole($adminRole);

        //membuat role member
        $userMember = new User;
        $userMember->name = "Siti";
        $userMember->email = "siti@gmail.com";
        $userMember->password = bcrypt("wisata");
        $userMember->save();
        $userMember->attachRole($memberRole);
    }
}
