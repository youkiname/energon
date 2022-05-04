<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CompanyManagerConfirmation;
use App\Models\TaskClosingRequest;
use App\Models\User;
use App\Models\Company;


class ConfirmationController extends Controller
{
    public function index()
    {
        $confirmations = CompanyManagerConfirmation::all();
        $tasksRequests = TaskClosingRequest::all();
        return view('confirmations.index', [
            'confirmations' => $confirmations,
            'tasksRequests' => $tasksRequests,
        ]);
    }

    public function show(CompanyManagerConfirmation $confirmation)
    {
        $managers = User::all();
        return view('confirmations.show', [
            'confirmation' => $confirmation,
            'managers' => $managers,
        ]);
    }

    public function destroy(CompanyManagerConfirmation $confirmation)
    {
        $confirmation->delete();
        return redirect()->route('confirmations.index');
    }
    
    public function destroyTaskRequest(TaskClosingRequest $taskRequest)
    {
        $taskRequest->delete();
        return redirect()->route('confirmations.index');
    }

    public function confirm(Request $request, CompanyManagerConfirmation $confirmation)
    {
        $company = Company::find($confirmation->company_id);
        $company->target_user_id = $request->new_manager_id;
        $company->save();

        $confirmation->delete();
        return redirect()->route('confirmations.index')->with([
            'success' => 'Менеджер переназначен.'
        ]);
    }
}
