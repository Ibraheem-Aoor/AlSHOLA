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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('number');
            $table->enum('status' , ['Totaly Paid' , 'Partly Paid' , 'Unpaid']);
            $table->double('paid_amount')->default(0.0);
            $table->string('trn')->nullable();
            $table->string('currency')->nullable();
            $table->foreignId('job_id')->references('id')->on('jobs')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
};
