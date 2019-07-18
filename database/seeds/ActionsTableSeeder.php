<?php

use App\Action;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class ActionsTableSeeder extends Seeder
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

            $rule_exist = Action::where([
                'controller' => $controller,
                'method' => $method
            ])->first();
            if (!$rule_exist) {
                $rule = new Action();
                $rule->controller = $controller;
                $rule->uri = $uri;
                $rule->method = $method;
                $rule->save();
            }
        }
    }
}
