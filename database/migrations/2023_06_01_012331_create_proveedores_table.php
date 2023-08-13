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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->string('company_name', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('state', 45)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('site_web', 45)->nullable();
            $table->string('business_email', 45)->nullable();
            $table->string('support_email', 45)->nullable();
            $table->string('description')->nullable();
            $table->string('category', 45)->nullable();
            $table->string('sub_category', 45)->nullable();
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
        Schema::dropIfExists('proveedores');
    }
};
