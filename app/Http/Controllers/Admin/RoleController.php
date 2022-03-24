<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    public $data;

    public function __construct()
    {
        
    }

    public function index()
    {
        $this->data['roles'] = Role::all();
        return view('admin.roles.index', $this->data);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function show(Role $role)
    {
        $this->data['role'] = $role;
        return view('admin.roles.edit', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Роль ' . $role->name . ' добавлена.');
    }

    public function edit(Role $role)
    {
        $this->data['role'] = $role;
        return view('admin.roles.edit', $this->data);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $role->name = $request->name;
        $role->save();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Роль ' . $role->name . ' обновлена.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')
            ->with('success', 'Роль ' . $role->name . ' удалена.');
    }
}
