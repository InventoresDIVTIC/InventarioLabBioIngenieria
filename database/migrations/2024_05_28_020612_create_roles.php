<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Usuario']);
        Role::firstOrCreate(['name' => 'Prestador de servicio']);
        Role::firstOrCreate(['name' => 'Web designer']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('name', 'Admin')->delete();
        Role::where('name', 'Usuario')->delete();
        Role::where('name', 'Prestador de servicio')->delete();
        Role::where('name', 'Web designer')->delete();
    }
}

