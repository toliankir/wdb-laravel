<?php

use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Route::getRoutes() as $route) {

            $action = explode('@', $route->getActionname());
            if (count($action) !== 2) {
                continue;
            }

            $controller = $action[0];
            $method = end($action);
            $uri = $route->uri();

            $rule_exist = Permission::where([
                'controller' => $controller,
                'method' => $method
            ])->first();
            if (!$rule_exist) {
                $rule = new Permission();
                $rule->controller = $controller;
                $rule->uri = $uri;
                $rule->method = $method;
                $rule->save();
            }
        }
    }
}
