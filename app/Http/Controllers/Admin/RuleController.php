<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleController extends Controller
{
    public function index(){
        $rules = Action::paginate(10);
//        dd($rules);
        return view('admin.rules.index', [
            'rules' => $rules
        ]);
    }
}
