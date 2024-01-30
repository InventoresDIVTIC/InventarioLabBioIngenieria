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
            $table->unsignedInteger('code')->unique('code_unique');
            $table->string('name', 45)->nullable();
            $table->string('lastname', 45)->nullable();
            $table->string('email', 45)->unique('email_unique');
            $table->string('password');
            $table->string('rol', 45)->nullable();
            $table->string('area', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('photo')->default('Profile-img/user.png');
            $table->timestamp('last_seen')->nullable();
            $table->date('delete_date')->nullable();
            $table->string('reason', 45)->nullable();
            $table->string('delete_comments', 45)->nullable();
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
