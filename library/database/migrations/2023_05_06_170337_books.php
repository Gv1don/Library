<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Books extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('genre_id');
            $table->integer('amount');

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
