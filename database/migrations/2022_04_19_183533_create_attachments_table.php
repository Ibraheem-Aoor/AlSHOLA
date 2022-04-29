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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('job_id');
            $table->index('job_id');
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->foreign('job_id')->references('id')->on('jobs')->constrained()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');//note writer
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
        Schema::dropIfExists('attachments');
    }
};
