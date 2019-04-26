<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cover_page_url')->nullable();
            $table->string('title');
            $table->string('author');
            $table->year('publication_year');
            $table->string('publisher');
            $table->string('edition')->nullable();
            $table->string('isbn');
            $table->string('call_no');
            $table->bigInteger('book_category_id')->unsigned();
            $table->string('library_location');
            $table->string('book_level');
            $table->string('book_shelf');                     
            $table->timestamps();

            $table->foreign('book_category_id')->references('id')->on('book_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
