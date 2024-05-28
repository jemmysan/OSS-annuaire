<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
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

    }

    public function down()
    {
        // clear cache
        app()['cache']->forget('spatie.permission.cache');

        // Clear all data table data
        $tableNames = config('permission.table_names');

        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}
