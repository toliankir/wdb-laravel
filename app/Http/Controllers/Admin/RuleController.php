<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request as IlluminateRequest;
use App\Role;

class RuleController extends Controller
{
    public function show($role)
    {
        $roleModel = Role::where('role', $role)->first();
        $selectedActions = collect([]);

        if ($roleModel) {
            $selectedActions = $roleModel->getActions->map(function ($name) {
                return ($name->id);
            });
        }
        var_dump(IlluminateRequest::input('page'));

        if (IlluminateRequest::input('page')) {
            Paginator::currentPageResolver(function () {
                return IlluminateRequest::input('page');
            });
        }

        $rules = Action::paginate(10);
        return view('admin.rules.index', [
            'role' => $roleModel,
            'requestedRole' => $role,
            'rules' => $rules,
            'selectedActions' => $selectedActions,
        ]);
    }

    public function sync(Request $request)
    {
        $roleModel = Role::where('role', $request->input('role'))->first();
        $attach = $request->input('selected-action') ?? [];

        $dettach = array_diff($request->input('all-action'), $attach);
        //Add new Actions for rule
        foreach ($attach as $key => $rule) {
            if (!$roleModel->getActions->contains($key)) {
                $roleModel->getActions()->attach($key);
            }
        }

        //Remove actions form rule
        foreach ($dettach as $key => $rule) {
            if ($roleModel->getActions->contains($key)) {
                $roleModel->getActions()->detach($key);
            }
        }
        return redirect($request->input('redirects_to'));
    }
}
