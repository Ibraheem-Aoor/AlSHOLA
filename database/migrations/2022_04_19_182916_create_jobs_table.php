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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('post_number');
            $table->enum('status' , ['completed' , 'active' , 'cancelled' , 'pending'])->default('active');
            $table->text('description');
            $table->text('quantity');
            $table->string('salary');
            $table->string('contract_period');
            $table->string('working_hours');
            $table->string('working_days');
            $table->string('off_day');
            $table->string('accommodation');
            $table->string('transport');
            $table->string('medical');
            $table->string('insurance');
            $table->string('food');
            $table->string('annual_leave');
            $table->string('air_ticket');
            $table->string('indemnity_leave_and_overtime_salary');
            $table->string('covid_test');
            $table->text('other_terms')->nullable();
            $table->unsignedBigInteger('user_id'); //represents the user.
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
};
