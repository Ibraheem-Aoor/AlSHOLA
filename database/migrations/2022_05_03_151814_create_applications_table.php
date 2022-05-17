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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->text('ref');
            $table->date('date');
            $table->foreignId('title_id'); //position applied for.
            $table->string('address');
            $table->string('passport_no');
            $table->string('contact_no');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('age');
            $table->string('relegion');
            $table->string('place_issued');
            $table->string('date_issued');
            $table->string('expiry_issued');
            $table->string('sex');
            $table->string('children');
            $table->string('height');
            $table->string('weihgt');

            //Language:
            $table->string('arabic');

            $table->enum('status' , [
                                    'waiting for medical' , 'waiting for visa' , 'waiting for arrival'
                                    ,'waiting for interview' , 'pending' , 'cancelled' , 'refused' , 'completed'
                                ])->default('pending');
            $table->boolean('forwarded')->default(false); //forwarded to employer
            $table->unsignedBigInteger('user_id'); //agent who submited this form
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');//The user who proposed the application (Talent)
            $table->unsignedBigInteger('job_id'); //the job that this application submited for.
            $table->index('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
};
