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
    public function show($role, $currentPage = null)
    {
        $roleModel = Role::where('role', $role)->first();
        $selectedActions = collect([]);

        if ($roleModel) {
            $selectedActions =  $roleModel->getActions->map(function ($name) {
                return ($name->id);
            });
        }

        $currentPage = IlluminateRequest::input('page') ?? $currentPage ?? 1;

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $rules = Action::paginate(10);
        return view('admin.rules.index', [
            'role' => $roleModel,
            'requestedRole' => $role,
            'rules' => $rules,
            'selectedActions' => $selectedActions,
            'currentPage' => $currentPage
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
        
        return $this->show($request->input('role'), $request->input('currentPage'));
    }
}
