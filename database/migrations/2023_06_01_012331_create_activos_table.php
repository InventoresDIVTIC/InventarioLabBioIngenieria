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
        Schema::create('activos', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique('id_unique');
            $table->unsignedInteger('user_id');
            $table->string('category', 45);
            $table->string('type');
            $table->string('brand', 45);
            $table->string('model', 45);
            $table->string('serial', 45);
            $table->string('location', 45)->nullable();
            $table->string('sublocation', 45)->nullable();
            $table->string('status', 45);
            $table->string('hierarchy', 45);
            $table->string('class', 45)->nullable();
            $table->string('criticality', 45)->nullable();
            $table->string('risk', 45)->nullable();
            $table->string('ing_assigned', 45)->nullable();
            $table->string('description', 100)->nullable();
            $table->string('comments', 500)->nullable();
            $table->string('last_editor', 100)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->string('software_ver', 45)->nullable();
            $table->string('so', 45)->nullable();
            $table->string('firmware_ver', 45)->nullable();
            $table->date('leaving_date')->nullable();
            $table->string('motive', 100)->nullable();
            $table->string('leaving_comments')->nullable();
            $table->string('manual_doc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activos');
    }
};
