<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name_image'); // Nama gambar untuk generate slug
            $table->string('slug')->unique(); // Slug harus unik
            $table->string('image'); // Path atau nama file gambar
            $table->text('description')->nullable(); // Deskripsi slide, optional
            $table->boolean('is_publish')->default(false); // Status publikasi
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}

