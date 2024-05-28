<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('azertyuiop')
        ]);

        Permission::create(['name' => 'creer_utilisateur' ,'guard_name'=>'web']);
        Permission::create(['name' => 'supprimer_utilisateur' ,'guard_name'=>'web']);
        Permission::create(['name' => 'modifer_utilisateur' ,'guard_name'=>'web']);
        Permission::create(['name' => 'voir_utilisateur' ,'guard_name'=>'web']);

        //financiere
        Permission::create(['name' => 'creer_financiere' ,'guard_name'=>'web']);
        Permission::create(['name' => 'supprimer_financiere' ,'guard_name'=>'web']);
        Permission::create(['name' => 'modifer_financiere' ,'guard_name'=>'web']);
        Permission::create(['name' => 'voir_financiere' ,'guard_name'=>'web']);
        //accompagnement
        Permission::create(['name' => 'creer_accompagnement' ,'guard_name'=>'web']);
        Permission::create(['name' => 'supprimer_accompagnement' ,'guard_name'=>'web']);
        Permission::create(['name' => 'modifer_accompagnement' ,'guard_name'=>'web']);
        Permission::create(['name' => 'voir_accompagnement' ,'guard_name'=>'web']);
        //startup
        Permission::create(['name' => 'creer_startup' ,'guard_name'=>'web']);
        Permission::create(['name' => 'supprimer_startup' ,'guard_name'=>'web']);
        Permission::create(['name' => 'editer_startup' ,'guard_name'=>'web']);
        Permission::create(['name' => 'voir_startup' ,'guard_name'=>'web']);
        //statistique
        Permission::create(['name' => 'voir_statistique' ,'guard_name'=>'web']);


        $roleAdmin = Role::create(['name' => 'Administrateur' ,'guard_name'=>'web']);
        $roleAdmin->givePermissionTo(Permission::all());
        $user->assignRole($roleAdmin->name);
    }
}
