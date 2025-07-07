<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Kutab permissions
            'view kutabs',
            'create kutabs',
            'edit kutabs',
            'delete kutabs',
            
            // Group permissions
            'view groups',
            'create groups',
            'edit groups',
            'delete groups',
            
            // Sheikh permissions
            'view sheikhs',
            'create sheikhs',
            'edit sheikhs',
            'delete sheikhs',
            
            // Student permissions
            'view students',
            'create students',
            'edit students',
            'delete students',
            
            // User management permissions
            'view users',
            'create users',
            'edit users',
            'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $superSheikhRole = Role::create(['name' => 'super-sheikh']);
        $superSheikhRole->givePermissionTo(Permission::all());

        $sheikhRole = Role::create(['name' => 'sheikh']);
        $sheikhRole->givePermissionTo([
            'view kutabs',
            'view groups',
            'edit groups',
            'view sheikhs',
            'view students',
            'create students',
            'edit students',
            'view users',
        ]);

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo([
            'view groups',
            'view sheikhs',
        ]);

        $parentRole = Role::create(['name' => 'parent']);
        $parentRole->givePermissionTo([
            'view groups',
            'view sheikhs',
            'view students',
            'edit students',
        ]);
    }
} 