<?php

namespace Database\Seeders;
use App\Model\User;

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
        $inputan['name'] = 'septian';
        $inputan['email'] = 'septian@gmail.com';//ganti pake emailmu
        $inputan['password'] = Hash::make('123258');//passwordnya 123258
        $inputan['phone'] = '085852527575';
        $inputan['alamat'] = 'UNTAG SURABAYA';
        $inputan['role'] = 'admin';//kita akan membuat akun atau users in dengan role admin
        User::create($inputan);
    }
}
