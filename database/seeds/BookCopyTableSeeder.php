<?php

use Illuminate\Database\Seeder;
use App\BookCopy;

class BookCopyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookCopy::create([
            'book_id' => 1,
            'copy_no' => '11100333880',              
            'book_status_id' =>  1,
        ]);
        
        BookCopy::create([
            'book_id' => 2,
            'copy_no' => '00011304878',
            'book_status_id' =>  1,
        ]);
        
        BookCopy::create([
            'book_id' => 2,
            'copy_no' => '11100341623',
            'book_status_id' =>  2,
        ]);
        
        BookCopy::create([
            'book_id' => 2,
            'copy_no' => '11100341624',
            'book_status_id' =>  3,
        ]);
        
        BookCopy::create([
            'book_id' => 3,
            'copy_no' => '00000363057O',
            'book_status_id' =>  2,
        ]);
        
        BookCopy::create([
            'book_id' => 4,
            'copy_no' => '00011002419I',
            'book_status_id' =>  1,
        ]);
    }
}
