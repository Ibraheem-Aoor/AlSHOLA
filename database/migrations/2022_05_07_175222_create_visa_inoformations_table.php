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
        Schema::create('visa_inoformations', function (Blueprint $table) {
            $table->id();
            $table->string('visa_number')->nullable();
            $table->date('visa_expire_date')->nullable();
            $table->string('ticket')->nullable();
            $table->date('arrival_date')->nullable();
            $table->unsignedBigInteger('application_id');
            $table->index('application_id');
            $table->foreign('application_id')->nullable()->references('id')->on('applications')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('visa_inoformations');
    }
};
