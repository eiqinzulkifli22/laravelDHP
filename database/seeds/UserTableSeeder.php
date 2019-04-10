<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nurul Ainna Syuhada Binti Norazmi',
            'email' => 'nainnasyuhada@hotmail.com',
            'password' => Hash::make('520592'),
            'phone_no' => '173043301',
            'matric_no' => '1520592',
            'barcode_no' => 'B1000895113',
            'centre' => 'Kuliyyah of Information and Communication Technology'
        ]);
    }
}
