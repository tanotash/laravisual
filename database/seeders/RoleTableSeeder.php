<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->nombre = 'superadmin';  
        $role->descripcion = 'Super Administrador';
        $role->save();

        $role = new Role();
        $role->nombre = 'admin';
        $role->descripcion = 'Administrador';
        $role->save();

        $role = new Role();
        $role->nombre = 'user';
        $role->descripcion = 'Usuario';
        $role->save();
    }
}
