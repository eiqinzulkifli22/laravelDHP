<?php

use App\Book;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'copy_no' => '11100333880',
            'title' => 'HTML & CSS : design and build websites',
            'author' => 'Duckett, Jon',
            'isbn' => '9781118008188',
            'call_no' => 'QA76.76 H94 D835H 2011',
            'publication_year' => 2011,
            'book_category' => 'General',
            'book_level' => 'Level 4',
            'book_shelf' => 'Shelf 52',
            'library_location' => 'Central Library, Gombak',
            'desc' => 'Available',
        ]);

        Book::create([
            'copy_no' => '00011304878',
            'title' => 'Systems Analysis and Design',
            'author' => 'Kendall, Kenneth E.',
            'isbn' => '9780273787105',
            'call_no' => 'QA76.9 S88 K33S 2014',
            'publication_year' => 2014,
            'book_category' => 'Red Spot/Reserves',
            'book_level' => 'Level 4',
            'book_shelf' => 'Shelf 49',
            'library_location' => 'Central Library, Gombak',
            'desc' => 'On Loan',
        ]);

        Book::create([
            'copy_no' => '11100341623',
            'title' => 'Systems Analysis and Design',
            'author' => 'Kendall, Kenneth E.',
            'isbn' => '9780273787105',
            'call_no' => 'QA76.9 S88 K33S 2014',
            'publication_year' => 2014,
            'book_category' => 'General',
            'book_level' => 'Level 4',
            'book_shelf' => 'Shelf 49',
            'library_location' => 'Central Library, Gombak',
            'desc' => 'On Loan',
        ]);

        Book::create([
            'copy_no' => '11100341624',
            'title' => 'Systems Analysis and Design',
            'author' => 'Kendall, Kenneth E.',
            'isbn' => '9780273787105',
            'call_no' => 'QA76.9 S88 K33S 2014',
            'publication_year' => 2014,
            'book_category' => 'General',
            'book_level' => 'Level 4',
            'book_shelf' => 'Shelf 49',
            'library_location' => 'Central Library, Gombak',
            'desc' => 'Unvailable',
        ]);
    }
}
