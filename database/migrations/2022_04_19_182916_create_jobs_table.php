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
            $table->string('contract_period')
            ->default('2 Years')
            ->nullable(true);
            $table->string('working_hours')
            ->default('8 Hours')
            ->nullable(true);
            $table->string('working_days')->nullable(true);
            $table->string('off_day')->nullable(true);
            $table->string('accommodation')->nullable(true);
            $table->string('transport')
            ->default('Provided By Employer')
            ->nullable(true);
            $table->string('medical')
            ->default('As per Labour Law')
            ->nullable(true);
            $table->string('insurance')
            ->default('As per Labour Law')
            ->nullable(true);

            $table->string('food')->nullable(true);
            $table->string('food_amount')->nullable(true);


            $table->string('annual_leave')
            ->default('As per Labour Law')
            ->nullable(true);
            $table->string('joining_ticket')->nullable(true);
            $table->string('return_ticket')->nullable(true);
            $table->string('indemnity_leave_and_overtime_salary')
            ->default('As per Labour Law')
            ->nullable(true);
            $table->string('covid_test')
            ->default('Employers are liable for measures or preventive measures imposed by official authorities inside their country')
            ->nullable(true);
            $table->string('age')->nullable(true);
            $table->string('requested_by')->nullable(true);
            $table->string('sex')->nullable(true);
            $table->string('currency')->nullable(true);

            $table->enum('gender_prefrences' , ['male' , 'female' , 'no prefrences'])->nullable(true);
            $table->enum('age_limit' , ['Below 40' , 'Below 50', 'Below 60'])->nullable(true);
            $table->string('accommodation_amount')->nullable(true);

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
