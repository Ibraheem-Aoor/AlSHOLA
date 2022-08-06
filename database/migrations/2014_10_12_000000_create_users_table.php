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
            $table->string('avatar')->default('user.png');
            $table->string('name');
            $table->string('registration_No')->nullable(); //auto generate
            $table->string('responsible_person')->nullable();  //represnts the predefined company that the user belongs to.
            $table->string('profile')->nullable(); //attachment
            $table->string('license')->nullable(); //attachment
            $table->string('identity_number')->nullable(); //attachment
            $table->string('agreement')->nullable(); //attachment
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->enum('type' , ['Agent' , 'Client' , 'Broker' , 'Personal' , 'Admin']);
            $table->enum('status' , ['blocked' , 'active'])->default('active');
            $table->bigInteger('total_required_sales')->nullable(); //For Broker
            $table->bigInteger('total_achived')->nullable(); //For Broker
            $table->bigInteger('commission_rate')->nullable(); //For Broker
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
