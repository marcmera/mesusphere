<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Roles
    $roleAdmin = Role::create(['name' => 'admin']);
    $roleTeacher = Role::create(['name' => 'teacher']);
    $roleStudent = Role::create(['name' => 'student']);
    // Crear y asignar permisos
    $permission = Permission::create(['name' => 'edit grades']);
    $roleTeacher->givePermissionTo($permission);
    }
}   