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
        Schema::create('servicios_firmas', function (Blueprint $table) {
            $table->unsignedInteger('services_id')->primary();
            $table->string('service_head_signature')->nullable();
            $table->string('service_enigieer_signature')->nullable();
            $table->string('last_user_signature')->nullable();
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
        Schema::dropIfExists('servicios_firmas');
    }
};
