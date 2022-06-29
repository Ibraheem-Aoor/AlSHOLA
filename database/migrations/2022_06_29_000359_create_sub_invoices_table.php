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
        Schema::create('sub_invoices', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->integer('quantity');
            $table->integer('charge');
            $table->foreignId('application_id')->references('id')->on('applications')->constrained()->onDelete('cascade'); //the title applied
            $table->foreignId('invoice_id')->references('id')->on('invoices')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('sub_invoices');
    }
};
