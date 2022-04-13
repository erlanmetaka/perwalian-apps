<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view perwalian']);
        Permission::create(['name' => 'create perwalian']);
        Permission::create(['name' => 'edit perwalian']);
        Permission::create(['name' => 'delete perwalian']);

        //create roles and assign existing permissions
        $mahasiswaRole = Role::create(['name' => 'mahasiswa']);
        $mahasiswaRole->givePermissionTo('view perwalian');
        $mahasiswaRole->givePermissionTo('create perwalian');

        $dosenRole = Role::create(['name' => 'dosen']);
        $dosenRole->givePermissionTo('view perwalian');

        $adminRole = Role::create(['name' => 'admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'Erlan Metaka',
            'email' => 'erlan@gmail.com',
            'password' => bcrypt('12345678'),
            'user_id' => 100,
            'role_id' => 3
        ]);
        $user->assignRole($adminRole);

        // $user = User::factory()->create([
        //     'name' => 'Siti Yulianti',
        //     'email' => 'siti@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        // $user->assignRole($dosenRole);

        // $user = User::factory()->create([
        //     'name' => 'Kahfi',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('12345678')
        // ]);
        // $user->assignRole($adminRole);
    }
}
