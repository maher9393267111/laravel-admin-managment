<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset ='utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->integer('staff_leave')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('gender')->nullable();
            $table->string('lga')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('image')->nullable();
            $table->string('password');
            $table->date('employment_date')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('salary')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
