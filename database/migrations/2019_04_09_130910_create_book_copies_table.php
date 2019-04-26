<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_copies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('copy_no');
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('book_status_id')->unsigned()->default(1);
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('book_status_id')->references('id')->on('book_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_copies');
    }
}
