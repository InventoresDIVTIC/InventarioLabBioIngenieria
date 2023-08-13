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
        Schema::create('consumibles_garantias', function (Blueprint $table) {
            $table->unsignedInteger('consumables_id')->primary();
            $table->date('warranty_start')->nullable();
            $table->date('warranty_end')->nullable();
            $table->string('annex', 45)->nullable();
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
        Schema::dropIfExists('consumibles_garantias');
    }
};
