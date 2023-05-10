<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Authors extends Migration
{
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table){
            $table->id();
            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
