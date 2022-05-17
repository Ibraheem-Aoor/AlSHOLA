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
            $table->text('description')->nullable(true);
            $table->text('quantity')->nullable(true);
            $table->string('salary')->nullable(true);
            $table->string('contract_period')->nullable(true);
            $table->string('working_hours')->nullable(true);
            $table->string('working_days')->nullable(true);
            $table->string('off_day')->nullable(true);
            $table->string('accommodation')->nullable(true);
            $table->string('transport')->nullable(true);
            $table->string('medical')->nullable(true);
            $table->string('insurance')->nullable(true);
            $table->string('food')->nullable(true);
            $table->string('annual_leave')->nullable(true);
            $table->string('air_ticket')->nullable(true);
            $table->string('indemnity_leave_and_overtime_salary')->nullable(true);
            $table->string('covid_test')->nullable(true);
            $table->string('age')->nullable(true);
            $table->string('requested_by')->nullable(true);
            $table->string('sex')->nullable(true);
            $table->text('other_terms')->nullable(true);
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
