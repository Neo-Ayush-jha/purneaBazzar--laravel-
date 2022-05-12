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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('street');
            $table->string('landmark');
            $table->integer('pincode');
            $table->string('city');
            $table->string('state');
            $table->string('name');
            $table->string('contact');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->enum('type',['office','home'])->default('home');
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
        Schema::dropIfExists('addresses');
    }
};
