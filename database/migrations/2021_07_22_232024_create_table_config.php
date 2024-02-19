<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->integer("product_pag")->nullable();
            $table->string("phone")->nullable();
            $table->string("current")->nullable();
            $table->string("fb")->nullable();
            $table->string("ig")->nullable();
            $table->string("wa")->nullable();
            $table->string("tg")->nullable();
            $table->text("descript")->nullable();
            $table->text("descript2")->nullable();

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
        Schema::dropIfExists('settings');
    }
}
