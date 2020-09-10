<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //recordar q seeder es datos de prueba de base de datos
    	 $this->call(RoleTableSeeder::class);
         $this->call(UserTableSeeder::class);
    
    }
}
