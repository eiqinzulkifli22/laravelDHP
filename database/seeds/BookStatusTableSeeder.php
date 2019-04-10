<?php

use Illuminate\Database\Seeder;
use App\BookStatus;

class BookStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookStatus::create(['desc' => 'Available']);
        BookStatus::create(['desc' => 'On Loan']);
        BookStatus::create(['desc' => 'Unavailable']);
    }
}
