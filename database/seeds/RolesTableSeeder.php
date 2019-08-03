<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador']); // Administrador del Sistema
        Role::create(['name' => 'Tutor']); // El encargado de registrar los jugadores
        Role::create(['name' => 'Jugador']); // El que va a realizar las operaciones
    }
}
