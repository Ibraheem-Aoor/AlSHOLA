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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->index('order_id');
            $table->foreign('order_id')->references('id')->on('candidacy_orders')->constrained()->onDelete('cascade');//note writer
            $table->unsignedBigInteger('recommended_user');
            $table->index('recommended_user');
            $table->foreign('recommended_user')->references('id')->on('users')->constrained()->onDelete('cascade');//note writer
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
        Schema::dropIfExists('recommendations');
    }
};
