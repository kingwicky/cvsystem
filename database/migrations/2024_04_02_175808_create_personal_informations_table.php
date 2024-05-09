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





        Schema::create('personal_informations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->string('fname');
            $table->string('lname');
            $table->string('country_code');
            $table->string('mobile');
            $table->string('email');
            $table->string('address1');
            $table->string('address2');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->date('dob');
            $table->string('gender');
            $table->integer('user_id');
            $table->timestamps();
            $table->string('profile_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_informations');
    }
};
