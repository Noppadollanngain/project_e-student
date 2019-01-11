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
        $user->password_firebase = '123456';

        $user2 = new App\User();
        $user2->fname = 'Noppadol2';
        $user2->lname = 'Lanngain2';
        $user2->email = 'noppadol2@gmial.com';
        $user2->username = '58543206016-9';
        $user2->password = Hash::make('000000');
        $user2->password_firebase = '000000';

        $user3 = new App\User();
        $user3->fname = 'Noppadol3';
        $user3->lname = 'Lanngain3';
        $user3->email = 'noppadol3@gmial.com';
        $user3->username = '58543206016-7';
        $user3->password = Hash::make('456789');
        $user3->password_firebase = '456789';



        $user4 = new App\User();
        $user4->fname = 'Noppadol4';
        $user4->lname = 'Lanngain4';
        $user4->email = 'noppadol4@gmial.com';
        $user4->username = '58543206016-6';
        $user4->password = Hash::make('789654');
        $user4->password_firebase = '789654';

        $possition = new App\Possition();
        $possition->name = 'เจ้าหน้าที่ระดับสูง';
        $possition2 = new App\Possition();
        $possition2->name = 'เจ้าหน้าที่ตรวจเอกสาร';
        $possition3 = new App\Possition();
        $possition3->name = 'เจ้าหน้าที่รับเอกสาร';

        $type = new App\Typestudent();
        $type->typename = 'รายใหม่';
        $type2 = new App\Typestudent();
        $type2->typename = 'รายใหม่เลื่อนชั้นปี';
        $type3 = new App\Typestudent();
        $type3->typename = 'รายเก่า';
        $type4 = new App\Typestudent();
        $type4->typename = 'ยกเลิกกูยืม';
        $type5 = new App\Typestudent();
        $type5->typename = 'ทั้งหมด';

        $admin = new App\Admin();
        $admin->fname = 'Super';
        $admin->lname = 'Admin';
        $admin->email = 'Admin1@gmial.com';
        $admin->image = 'Profile_320×450.jpg';
        $admin->username = 'Admin1';
        $admin->password = Hash::make('123456');
        $admin->possition = 1;

        $document = new App\Documents;
        $document->student = 1;
        $document->typestudent =1;

        $document2 = new App\Documents;
        $document2->student = 2;
        $document2->typestudent =2;

        $document3 = new App\Documents;
        $document3->student = 3;
        $document3->typestudent =3;

        $document4 = new App\Documents;
        $document4->student = 4;
        $document4->typestudent =4;

        $user->save();
        $user2->save();
        $user3->save();
        $user4->save();
        $possition->save();
        $possition2->save();
        $possition3->save();
        $type->save();
        $type2->save();
        $type3->save();
        $type4->save();
        $type5->save();
        $admin->save();
        $document->save();
        //$document2->save();
        $document3->save();
        //$document4->save();

    }
}
