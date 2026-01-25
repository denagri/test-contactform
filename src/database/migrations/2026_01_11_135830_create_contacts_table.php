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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('email');
            $table->integer('tel');
            $table->string('address');
            $table->string('building')->nullable();
            $table->string('kinds');
            $table->text('detail');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('category_id')->constrained();
            $table->string('content');
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
