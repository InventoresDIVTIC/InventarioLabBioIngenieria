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
        Schema::create('activos_finanzas', function (Blueprint $table) {
            $table->unsignedInteger('activo_id')->primary();
            $table->string('bill_number', 45)->nullable();
            $table->date('acquisition_date')->nullable();
            $table->date('installation_date')->nullable();
            $table->string('divisa', 11)->nullable();
            $table->string('price', 45)->nullable();
            $table->date('warranty_start')->nullable();
            $table->date('warranty_end')->nullable();
            $table->string('bill')->nullable();
            $table->string('warranty_letter')->nullable();
            $table->string('health_registration')->nullable();
            $table->string('import')->nullable();
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
        Schema::dropIfExists('activos_finanzas');
    }
};
