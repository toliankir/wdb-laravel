<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleController extends Controller
{
    public function index(){
        $rules = Action::paginate(10);
        return view('admin.rules.index', [
            'rules' => $rules
        ]);
    }

    public function attach($id) {
        $rules = Action::paginate(10);
        $role = auth()->user()->getRole();
        $action = Action::find($id);
        // dd($action);
        $role->getActions()->attach($id);
        // $user->attach($action);
        return view('admin.rules.index', [
            'rules' => $rules,
            'id' => $id
        ]);

    }
}
