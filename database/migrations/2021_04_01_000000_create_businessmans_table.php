<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessmansTable extends Migration {
    public function up() {
        Schema::create('businessmans', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 200); //existem pessoas com o nome muito grande
            $table->string('cell_phone', 15)->unique();
            $table->timestamp('registered_in');
            $table->char('state', 2);
            $table->string('city', 100);
            $table->unsignedBigInteger('id_business_dad')->nullable();
            $table->foreign('id_business_dad')->references('id')->on('businessmans');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('businessmans');
    }
}
