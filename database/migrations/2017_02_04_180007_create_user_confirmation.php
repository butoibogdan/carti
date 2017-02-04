<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserConfirmation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userconfirmation', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('status');
            $table->string('uniqid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down() {
        Schema::drop('userconfirmation');
    }
}
