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
        Schema::create('activos_servicios', function (Blueprint $table) {
            $table->unsignedInteger('activo_id')->primary();
            $table->string('frecuency_mprev', 45)->nullable();
            $table->string('service_provider')->nullable();
            $table->date('last_mprev')->nullable();
            $table->date('next_mprev')->nullable();
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
        Schema::dropIfExists('activos_servicios');
    }
};
