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
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('gender_id');
            $table->string('first_name', 25);
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25);
            $table->string('email', 50);
            $table->string('password');
            $table->string('display_picture_link', 255);
            $table->integer('delete_flag')->default(false);
            $table->date('modified_at')->nullable();
            $table->string('modified_by', 255)->nullable();
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onUpdate('cascade')->onDelete('cascade');
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
