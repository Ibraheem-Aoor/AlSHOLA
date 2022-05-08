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
        Schema::create('application_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_forwarded_employer')->default(false);
            $table->boolean('is_forwarded_talent')->default(false);
            $table->unsignedBigInteger('application_id');
            $table->index('application_id');
            $table->foreign('application_id')->references('id')->on('applications')->constrained()->onDelete('cascade');//note writer
            $table->unsignedBigInteger('user_id');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');//attachment sender
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
        Schema::dropIfExists('application_attachments');
    }
};
