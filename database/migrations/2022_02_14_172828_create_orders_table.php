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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('ebook_id');
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ebook_id')->references('id')->on('ebooks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
