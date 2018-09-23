<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->integer('renting')->default('0')->comment('0 for yes, 1 for no');
            $table->integer('balance')->nullable();
        
            // fk
            $table->integer('user_id');
            $table->integer('property_id');
            // $table->integer('maintenance_id'); // check the actual id for this. plurarl?
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
