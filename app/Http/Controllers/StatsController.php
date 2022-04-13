<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Task;

class StatsController extends Controller
{
    public function index()
    {
        $companiesCount = Company::count();
        $employeesCount = Employee::count();
        $tasksCount = Task::count();

        $lastTaskDate = Task::latest('date')->first()->date;

        return view('stats.index', [
            'companiesCount' => $companiesCount,
            'employeesCount' => $employeesCount,
            'tasksCount' => $tasksCount,

            'lastTaskDate' => $lastTaskDate,
        ]);
    }
}
