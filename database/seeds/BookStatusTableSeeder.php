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
        BookStatus::create(['desc' => 'Requested for hold']);
        BookStatus::create(['desc' => 'Ready to pick up']);
        BookStatus::create(['desc' => 'Released']);
        BookStatus::create(['desc' => 'Picked up']);
    }
}
