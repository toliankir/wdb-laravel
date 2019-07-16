<?php

namespace App\Http\Controllers\Admin;

use App\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuleController extends Controller
{
    public function index(){
        $rules = Rule::get();
        return view('admin.rules.index', [
            'rules' => $rules
        ]);
    }
}
