<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\CompanyBundle;

class CompanyBundleController extends Controller
{
    public function confirm(Company $company, Company $another)
    {
        CompanyBundle::whereRaw("(a_company_id = ? AND b_company_id = ?) OR (b_company_id = ? AND a_company_id = ?)",
        [$company->id, $another->id, $company->id, $another->id])
        ->update(['status_id' => 2]);

        return back()->with('success', 'Связь подтверждена');
    }

    public function destroy(Company $company, Company $another)
    {
        CompanyBundle::where('a_company_id', $company->id)
        ->where('b_company_id', $another->id)->first()->delete();
        CompanyBundle::where('b_company_id', $company->id)
        ->where('a_company_id', $another->id)->first()->delete();

        return back()->with('success', 'Связь успешно удалена');
    }
}
