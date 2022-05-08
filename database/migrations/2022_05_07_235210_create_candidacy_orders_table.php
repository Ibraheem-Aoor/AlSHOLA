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
        Schema::create('candidacy_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number');
            $table->unsignedBigInteger('recommended_id');
            $table->index('recommended_id');
            $table->foreign('recommended_id')->references('id')->on('users')->constrained()->onDelete('cascade');//represnets the recommended candidate
            $table->unsignedBigInteger('job_id');
            $table->index('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->constrained()->onDelete('cascade');//note writer
            $table->unsignedBigInteger('user_id'); //represents who made the recommendation
            $table->index('user_id');
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
        Schema::dropIfExists('candidacy_orders');
    }
};
