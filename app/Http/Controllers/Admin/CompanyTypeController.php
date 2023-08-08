<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyType;

class CompanyTypeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('admin.companyTypes.index', ["companyTypes" => CompanyType::all()]);
    }

    public function create()
    {
        return view('admin.companyTypes.create');
    }

    public function show(CompanyType $companyType)
    {
        return view('admin.companyTypes.edit', ["companyType" => $companyType]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $companyType = CompanyType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.companyTypes.index')
            ->with('success', 'Тип клиента ' . $companyType->name . ' добавлен.');
    }

    public function edit(CompanyType $companyType)
    {
        return view('admin.companyTypes.edit', ["companyType" => $companyType]);
    }

    public function update(Request $request, CompanyType $companyType)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $companyType->name = $request->name;
        $companyType->save();

        return redirect()->route('admin.companyTypes.index')
            ->with('success', 'Тип клиента ' . $companyType->name . ' обновлен.');
    }

    public function destroy(CompanyType $companyType)
    {
        $companyType->delete();
        return redirect()->route('admin.companyTypes.index')
            ->with('success', 'Тип клиента ' . $companyType->name . ' удален.');
    }
}
