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
        Schema::create('demand_terms', function (Blueprint $table) {
            $table->id();
            $table->stirng('title');
            $table->stirng('serivce_charge');
            $table->stirng('per');
            $table->foreignId('job_id')->references('id')->on('jobs')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade'); //because temrms differs from agent to another.
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
        Schema::dropIfExists('demand_terms');
    }
};
