<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('isbn', 20);
            $table->string('title', 20);
            $table->string('author', 100);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('book_categories');
            $table->string('publisher', 20);
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
        Schema::dropIfExists('donate_books');
    }
}
