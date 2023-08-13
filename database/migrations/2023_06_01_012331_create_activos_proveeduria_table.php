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
        Schema::create('activos_proveeduria', function (Blueprint $table) {
            $table->unsignedInteger('activo_id')->primary();
            $table->string('belonging', 45)->nullable();
            $table->string('owner', 45)->nullable();
            $table->string('sold_by', 45)->nullable();
            $table->string('guarder_by', 45)->nullable();
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
        Schema::dropIfExists('activos_proveeduria');
    }
};
