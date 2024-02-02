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
        Schema::create('servicios_detalles', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('assigned_enginier', 45)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('starting_hour', 11)->nullable();
            $table->string('end_hour', 11)->nullable();
            $table->string('summary', 45)->nullable();
            $table->string('description')->nullable();
            $table->string('conclusions')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_detalles');
    }
};
