<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->string('gender');
            $table->string('email');
            $table->integer('tel');
            $table->string('address');
            $table->string('building')->nullable();
            $table->string('kinds');
            $table->text('detail');
            $table->timestamps();
        });
        Schema::create('register', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
        Schema::create('login', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('category_id')->constrained();
            $table->string('email');
            $table->string('password');
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
        Schema::dropIfExists('contacts');
    }
}
