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

        // LANDLORD - USERS
        DB::table('users')->insert([
            'name' => 'Tony Stark',
            'email' =>'tony@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('test'),
            'remember_token' => '',
            'isAdmin' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Travis Harley',
            'email' =>'travis@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('test'),
            'remember_token' => '',
            'isAdmin' => '1',
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
        DB::table('properties')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address_1' => '123 happy street', 
            'address_2' => '', 
            'city' => 'Salt Lake City', 
            'state' => 'UT', 
            'zip' => '84559', 
            'country' => 'United States', 
            'occupied' => '1',
            'lease_length' => '3',
            'rent_amount' => '1645',
            'pet' => '1',
            'user_id' => '2',
            'tenant_id' => '4',
            'maintenance_id' => '4',
            'repair_id' => '0',
        ]);
        factory(App\Property::class, 5)->create();

        // TENANTS
        DB::table('tenants')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => 'Peter Parker', 
            'phone' => '8884569874', 
            'email' => 'peter@test.com', 
            'balance' => '1356', 
            'user_id' => '1',
            'property_id' => '1', 
            'maintenance_id' => '1'
        ]);
        DB::table('tenants')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => 'Bruce Banner', 
            'phone' => '8885557416', 
            'email' => 'bruce@test.com', 
            'balance' => '0', 
            'user_id' => '1',
            'property_id' => '2', 
            'maintenance_id' => '2'
        ]);
        DB::table('tenants')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => 'Dr. Stephen Strange', 
            'phone' => '9875558748', 
            'email' => 'dr.strange@test.com', 
            'balance' => '500', 
            'user_id' => '2',
            'property_id' => '3', 
            'maintenance_id' => '3'
        ]);
        DB::table('tenants')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => 'Lennon Harley', 
            'phone' => '9875558748', 
            'email' => 'lennon@test.com', 
            'balance' => '500', 
            'user_id' => '2',
            'property_id' => '4', 
            'maintenance_id' => '4'
        ]);
        factory(App\Tenant::class, 5)->create();

        // TENANT - USERS
        DB::table('users')->insert([
            'name' => 'Peter Parker',
            'email' =>'pete@test.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('test'),
            'remember_token' => '',
            'isAdmin' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Bruce Banner',
            'email' =>'bruce@test.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('test'),
            'remember_token' => '',
            'isAdmin' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // USER TENANTS
        DB::table('user_tenant')->insert([
            'user_id' => '1',
            'tenant_id' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('user_tenant')->insert([
            'user_id' => '2',
            'tenant_id' =>'2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // MAINTENANCE
        DB::table('maintenances')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'subject' => 'My Roof Is Leaking Again!!', 
            'type' => '7', 
            'description' => 'i woke up this morning and had a flood in my house! it rained all night and the water came in from a giant hole in the roof!', 
            'emergency' => '1', 
            'permission' => '1',
            'status' => '0',
            'property_id' => '1', 
            'user_id' => '1', 
            'repair_id' => '0', 
            'tenant_id' => '1', 
        ]);
        DB::table('maintenances')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'subject' => 'The dishwasher is overflowing', 
            'type' => '5', 
            'description' => 'I ran a cycle on my dishwasher, and bubbles started coming out. Can you believe that!!', 
            'emergency' => '1', 
            'permission' => '1',
            'status' => '1',
            'property_id' => '2', 
            'user_id' => '1', 
            'repair_id' => '0', 
            'tenant_id' => '2', 
        ]);
        DB::table('maintenances')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'subject' => 'We have spiders like you wouldnt believe. ants are not the problem anymore', 
            'type' => '1', 
            'description' => 'i wake up and all i see are spiders! were used to the ants, just dont make us live with the spiders', 
            'emergency' => '1', 
            'permission' => '1',
            'status' => '2',
            'property_id' => '3', 
            'user_id' => '1', 
            'repair_id' => '0', 
            'tenant_id' => '3', 
        ]);
        DB::table('maintenances')->insert([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'subject' => 'We have spiders like you wouldnt believe. ants are not the problem anymore', 
            'type' => '1', 
            'description' => 'i wake up and all i see are spiders! were used to the ants, just dont make us live with the spiders', 
            'emergency' => '1', 
            'permission' => '1',
            'status' => '0',
            'property_id' => '4', 
            'user_id' => '2', 
            'repair_id' => '0', 
            'tenant_id' => '4', 
        ]);
        //factory(App\Maintenance::class, 15)->create();

        // REPAIRS
        factory(App\Repair::class, 20)->create();

        // BILLING

        // REPORTS

        // FEEDBACK
    }
}
