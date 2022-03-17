<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('authors');
            $table->string('teachers');
            $table->string('title');
            $table->integer('year');
            $table->text('target', 650);
            $table->text('methodology', 650);
            $table->text('results', 650);
            $table->text('recomendations', 650);
            $table->foreignId('area_id')->constrained();
            $table->foreignId('university_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('works');
    }
};
