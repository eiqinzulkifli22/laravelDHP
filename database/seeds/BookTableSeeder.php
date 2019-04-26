/

<?php

use App\Book;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * isi permanent data then dia push masuk dalam database
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'HTML & CSS : design and build websites',
            'author' => 'Duckett, Jon',
            'publication_year' => 2011,
            'publisher'=> 'Wiley,',
            'edition' => 'N/A',
            'isbn' => '9781118008188',
            'call_no' => 'QA76.76 H94 D835H 2011',
            'book_category_id' => 1,
            'library_location' => 'Central Library, Gombak',
            'book_level' => '4',
            'book_shelf' => '52',
        ]);

        Book::create([
            'title' => 'Systems Analysis and Design',
            'author' => 'Kendall, Kenneth E.',
            'publication_year' => 2014,
            'publisher'=> 'Pearson Education Limited',
            'edition' => '9',
            'isbn' => '9780273787105',
            'call_no' => 'QA76.9 S88 K33S 2014',
            'book_category_id' => 2,
            'library_location' => 'Central Library, Gombak',
            'book_level' => '4',
            'book_shelf' => '49',
        ]);

        Book::create([
            'title' => 'The Capacitor',
            'author' => 'Paeg, H.',
            'publication_year' => 1990,
            'publisher'=> 'Siemens Aktienges, Munich',
            'edition' => 'N/A',
            'isbn' => '3800915715',
            'call_no' => 'TK 7872 C65 P126K4 1990',
            'book_category_id' => 1,
            'library_location' => 'Central Library, Gombak',
            'book_level' => '4',
            'book_shelf' => '26',
        ]);

        Book::create([
            // 'cover_page_url' => asset('9780521695244.jpg'),
          
            'title' => 'Quantum Groups A Path to Current Algebra',
            'author' => 'Street, R.',
            'publication_year' => 2007,
            'publisher'=> 'Cambridge Uniersity Press',
            'edition' => 'N/A',
            'isbn' => '9780521695244',
            'call_no' => 'QC 20.7 G76 S915Q 2007',
            'book_category_id' => 1,
            'library_location' => 'Central Library, Gombak',
            'book_level' => '4',
            'book_shelf' => '49',
        ]);
    }
}
// C:\xampp\htdocs\LaravelDarulHikmahPocket\database\seeds\BookTableSeeder.php
// database\seeds\BookTableSeeder.php