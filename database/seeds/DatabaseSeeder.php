<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User();
        $user->fname = 'Noppadol';
        $user->lname = 'Lanngain';
        $user->email = 'noppadol@gmial.com';
        $user->username = '58543206016-8';
        $user->password = Hash::make('123456');

        $user2 = new App\User();
        $user2->fname = 'Noppadol2';
        $user2->lname = 'Lanngain2';
        $user2->email = 'noppadol2@gmial.com';
        $user2->username = '58543206016-9';
        $user2->password = Hash::make('000000');

        $possition = new App\Possition();
        $possition->name = 'เจ้าหน้าที่ระดับสูง';
        $possition2 = new App\Possition();
        $possition2->name = 'เจ้าหน้าที่ตรวจเอกสาร';
        $possition3 = new App\Possition();
        $possition3->name = 'เจ้าหน้าที่รับเอกสาร';

        $admin = new App\Admin();
        $admin->fname = 'Super';
        $admin->lname = 'Admin';
        $admin->email = 'Admin1@gmial.com';
        $admin->username = 'Admin1';
        $admin->password = Hash::make('123456');
        $admin->possition = 1;

        $user->save();
        $user2->save();
        $possition->save();
        $possition2->save();
        $possition3->save();
        $admin->save();
    }
}
