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
        $userAdmin->name = "Priyadi S";
        $userAdmin->email = "adminPriyadi@gmail.com";
        $userAdmin->password = bcrypt("wisata");
        $userAdmin->save();
        $userAdmin->attachRole($adminRole);

        //membuat role member
        $userMember = new User;
        $userMember->name = "Ripa";
        $userMember->email = "memberRipa@gmail.com";
        $userMember->password = bcrypt("wisata");
        $userMember->save();
        $userMember->attachRole($memberRole);
    }
}
