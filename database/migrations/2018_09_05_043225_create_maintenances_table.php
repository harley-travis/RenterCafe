<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('subject');
            $table->enum('type', [
                'Alarm System',
                'Appliances',
                'Balcony/Patio',
                'Blinds',
                'Cabinets',
                'Carbon Monoxide Detectors',
                'Counter Top',
                'Doors',
                'Electrical',
                'Fire Alarm/Fire Sprinklers/Extinguishers',
                'Flood',
                'Floors/Carpet',
                'Garage/Carport',
                'Garbage Disposal',
                'Gas Leak',
                'Glass/Windows/Screens',
                'Hardware',
                'Heating/Ventilation/AC',
                'Landscaping/Grounds',
                'Lighting',
                'Locks/Keys',
                'Paint',
                'Pest Control',
                'Plumbing',
                'Roof',
                'Smoke Detectors',
                'Storage Unit',
                'Toilet Problems',
                'Tub/Shower'
                ]); 
            $table->longText('description');
            $table->integer('emergency');
            $table->integer('permission');
            $table->integer('status');

            // FK
            $table->integer('property_id');
            $table->integer('user_id');
            $table->integer('repair_id');
            $table->integer('tenant_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('maintenances');
    }
}
