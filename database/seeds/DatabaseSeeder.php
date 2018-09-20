<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //$this->call(UsersTableSeeder::class);

        // USERS
        DB::table('users')->insert([
            'name' => 'Tony Stark',
            'email' =>'tony@gmail.com',
            'password' => bcrypt('test'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // PROPERTIES
        DB::table('properties')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address_1' => '2300 N 3300 W', 
            'address_2' => '', 
            'city' => 'Hollady', 
            'state' => 'UT', 
            'zip' => '84020', 
            'country' => 'United States', 
            'occupied' => '1',
            'lease_length' => '12',
            'rent_amount' => '1356',
            'pet' => '1',
            'user_id' => '1',
            'tenant_id' => '1',
            'maintenance_id' => '1',
            'repair_id' => '1',
        ]);
        DB::table('properties')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address_1' => '263 W 987 N', 
            'address_2' => '', 
            'city' => 'Tempe', 
            'state' => 'AZ', 
            'zip' => '84345', 
            'country' => 'United States', 
            'occupied' => '1',
            'lease_length' => '6',
            'rent_amount' => '1555',
            'pet' => '1',
            'user_id' => '1',
            'tenant_id' => '2',
            'maintenance_id' => '2',
            'repair_id' => '2',
        ]);
        DB::table('properties')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address_1' => '654 E 789 W', 
            'address_2' => '', 
            'city' => 'Las Vegas', 
            'state' => 'NV', 
            'zip' => '84559', 
            'country' => 'United States', 
            'occupied' => '1',
            'lease_length' => '3',
            'rent_amount' => '1645',
            'pet' => '1',
            'user_id' => '1',
            'tenant_id' => '3',
            'maintenance_id' => '3',
            'repair_id' => '3',
        ]);
        factory(App\Property::class, 5)->create();

        // TENANTS
        DB::table('tenants')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => 'Peter Parker', 
            'phone' => '8884569874', 
            'email' => 'peter@gmail.com', 
            'balance' => '1356', 
            'user_id' => '1',
            'property_id' => '1', 
        ]);
        DB::table('tenants')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => 'Bruce Banner', 
            'phone' => '8885557416', 
            'email' => 'bruce@gmail.com', 
            'balance' => '0', 
            'user_id' => '1',
            'property_id' => '2', 
        ]);
        DB::table('tenants')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => 'Dr. Stephen Strange', 
            'phone' => '9875558748', 
            'email' => 'dr.strange@gmail.com', 
            'balance' => '500', 
            'user_id' => '2',
            'property_id' => '3', 
        ]);
        factory(App\Tenant::class, 5)->create();

        // MAINTENANCE
        factory(App\Maintenance::class, 15)->create();

        // REPAIRS
        factory(App\Repair::class, 20)->create();

        // BILLING

        // REPORTS

        // FEEDBACK
    }
}
