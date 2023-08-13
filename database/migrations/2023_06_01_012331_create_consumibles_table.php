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
        Schema::create('consumibles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activo_id');
            $table->string('name', 45)->nullable();
            $table->string('quantity', 11)->nullable();
            $table->string('price', 45)->nullable();
            $table->string('divisa', 45)->nullable();
            $table->unsignedInteger('supplier_id');
            $table->string('category', 45)->nullable();
            $table->string('foil', 45)->nullable();
            $table->string('brand', 45)->nullable();
            $table->string('model', 45)->nullable();
            $table->string('location', 45)->nullable();
            $table->string('sub_location', 45)->nullable();
            $table->string('belonging', 45)->nullable();
            $table->string('owner', 45)->nullable();
            $table->string('imagen', 45)->nullable();
            $table->string('comments', 45)->nullable();
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
        Schema::dropIfExists('consumibles');
    }
};
