<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Action::paginate(10);
        return view('admin.rules.index', [
            'rules' => $rules
        ]);
    }

    public function attach(Request $request)
    {
        $rules = Action::paginate(10);

        $attach = $request->input('test');
        $dettach = array_diff($request->input('testhidden'), $attach);

        // var_dump($attach);
        // var_dump($dettach);
        $role = auth()->user()->getRole();
        foreach ($attach as $key => $rule) { 
            $role->getActions()->attach($key);
        }
        // $action = Action::find($id);
        // dd($action);
        // $role->getActions()->attach($id);
        // $user->attach($action);
        return view('admin.rules.index', [
            'rules' => $rules,
            'id' => 123
        ]);
    }
}
