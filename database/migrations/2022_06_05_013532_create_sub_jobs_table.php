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
        Schema::create('sub_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->references('id')->on('jobs')->constrained()->onDelete('cascade');
            $table->foreignId('title_id')->references('id')->on('titles')->constrained()->onDelete('cascade');
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->constrained()->onDelete('cascade');
            // $table->foreignId('sector_id')->references('id')->on('sectors')->constrained()->onDelete('cascade');
            $table->string('salary');
            $table->string('age');
            $table->string('gender');
            $table->string('quantity');
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
        Schema::dropIfExists('sub_jobs');
    }
};
