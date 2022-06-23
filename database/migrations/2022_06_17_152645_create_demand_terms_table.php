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
            $table->string('title');
            $table->string('serivce_charge');
            $table->string('per');
            $table->string('currency');
            $table->string('acceptence_duration');
            $table->string('submission_duration');
            $table->string('completion_duration');
            $table->string('pay_from');
            $table->string('pay_to');
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
