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
            $table->text('cover_letter');
            $table->string('resume');
            $table->enum('status' , [
                                    'waiting for medical' , 'waiting for visa' , 'waiting for arrival'
                                    ,'waiting for interview' , 'pending' , 'cancelled' , 'refused' , 'completed'
                                ])->default('pending');
            $table->boolean('forwarded')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');//The user who proposed the application (Talent)
            $table->unsignedBigInteger('job_id');
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
