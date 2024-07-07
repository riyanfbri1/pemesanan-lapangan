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
        Schema::create('office_configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('kontak_wa');
            $table->string('alamat');
            $table->string('harga_sewa');
            $table->string('payment_name1');
            $table->string('payment_name2');
            $table->string('payment_name3');
            $table->string('payment_logo1');
            $table->string('payment_logo2');
            $table->string('payment_logo3');
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
        Schema::dropIfExists('office_configs');
    }
};
