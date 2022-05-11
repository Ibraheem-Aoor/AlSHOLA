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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('brief')->nullable();
            $table->string('cv')->nullable();
            $table->string('mobile')->nullable();
            $table->unsignedBigInteger('company_name')->nullable();
            $table->index('company_name');
            $table->foreign('company_name')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('avatar')->default('user.png');
            $table->string('type');
            $table->enum('status' , ['blocked' , 'active'])->default('active');
            $table->boolean('is_admin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
