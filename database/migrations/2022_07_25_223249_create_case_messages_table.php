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
        Schema::create('case_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade'); //sender
            $table->foreignId('ticket_id')->references('id')->on('tickets')->constrained()->onDelete('cascade'); //sender
            $table->text('message');
            $table->boolean('is_forwarded_employer')->default(false);
            $table->boolean('is_forwarded_employee')->default(false);
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
        Schema::dropIfExists('case_messages');
    }
};
