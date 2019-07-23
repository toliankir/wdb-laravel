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
        $roleDefaultPermission = Config::get('constants.defaultUsersPermissions');
        DB::table('roles')->insert([
            'role' => 'admin',
            'homepage' => '/admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $role = new Role;
        $role->role = 'user';
        $role->homepage = '/posts';
        $role->save();

        foreach ($roleDefaultPermission as $permission)  {
        $action = Action::where('controller', $permission['controller'])->where('method', $permission['method'])->first();
        $role->getActions()->attach($action->id);
        }
    }
}
