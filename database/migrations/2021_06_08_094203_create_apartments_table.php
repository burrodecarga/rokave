<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('condominio_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobil')->nullable();
            $table->float('area', 10,2)->default(0);
            $table->decimal('alicuota', 8,6)->default(0.1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('condominio_id')->references('id')->on('condominios')->onDelete('cascade');
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
        Schema::dropIfExists('apartments');
    }
}
