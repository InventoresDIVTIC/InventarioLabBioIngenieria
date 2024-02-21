<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('user_name', 255)->nullable();
            $table->string('assigned_engineer', 255)->nullable();
            $table->string('status', 45)->nullable();
            $table->string('services_type', 45)->nullable();
            $table->string('active_model', 45)->nullable();
            $table->string('active_sublocation', 45)->nullable();
            $table->string('service_type', 45)->nullable();
            $table->string('supplier_name', 45)->nullable();
            $table->string('active_name', 191)->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('active_id')->nullable();
            $table->string('foil', 45)->nullable();
            $table->date('scheduled_date')->nullable();
            $table->date('scheduled_end_date')->nullable();
            $table->string('origin', 45)->nullable();
            $table->string('reference', 45)->nullable();
            $table->timestamps(); // This will add created_at and updated_at as timestamps
            $table->string('last_editor', 45)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
