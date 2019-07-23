<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Action;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => Config::get('constants.defaultRoles.admin.name'),
            'homepage' => Config::get('constants.defaultRoles.admin.homepage'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $role = new Role;
        $role->role = Config::get('constants.defaultRoles.user.name');
        $role->homepage = Config::get('constants.defaultRoles.user.homepage');
        $role->save();

        foreach (Config::get('constants.defaultUsersPermissions') as $permission) {
            $action = Action::where('controller', $permission['controller'])->where('method', $permission['method'])->first();
            $role->getActions()->attach($action->id);
        }
    }
}
