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
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('active_id');
            $table->string('type', 255)->nullable();
            $table->string('request', 255)->nullable();
            $table->string('type_request', 255)->nullable();
            $table->string('priority', 45)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->string('status', 45)->nullable();
            $table->string('last_editor', 45)->nullable();
            $table->string('solution', 500)->nullable();
            $table->string('comments', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
