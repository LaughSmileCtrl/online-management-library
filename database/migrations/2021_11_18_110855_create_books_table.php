<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('isbn', 20)->unique();
            $table->string('title', 20);
            $table->string('author', 100);
            $table->string('publisher', 20);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('book_categories');
            $table->year('year');
            $table->text('description');
            $table->integer('quantity');
            $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')->references('id')->on('book_conditions');
            $table->string('image', 100);
            $table->timestamps();
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
