<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permisoAlmacenes = Permission::firstOrCreate(['name' => 'ver almacenes']);
        $permisoProductos = Permission::firstOrCreate(['name' => 'ver productos']);

        $rolAlmacen = Role::firstOrCreate(['name' => 'almacen']);
        $rolProducto = Role::firstOrCreate(['name' => 'producto']);
        $rolAdmin = Role::firstOrCreate(['name' => 'admin']);

        $rolAlmacen->syncPermissions([$permisoAlmacenes]);
        $rolProducto->syncPermissions([$permisoProductos]);
        $rolAdmin->syncPermissions([$permisoAlmacenes, $permisoProductos]);

        $userAlmacen = User::updateOrCreate(
            ['email' => 'almacen@test.com'],
            [
                'name' => 'Usuario Almacen',
                'password' => Hash::make('12345678'),
            ]
        );

        $userProducto = User::updateOrCreate(
            ['email' => 'producto@test.com'],
            [
                'name' => 'Usuario Producto',
                'password' => Hash::make('12345678'),
            ]
        );

        $userAdmin = User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('12345678'),
            ]
        );

        $userAlmacen->syncRoles([$rolAlmacen]);
        $userProducto->syncRoles([$rolProducto]);
        $userAdmin->syncRoles([$rolAdmin]);
    }
}
