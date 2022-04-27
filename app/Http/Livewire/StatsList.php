<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\CompanyStatus;
use App\Models\CompanyType;
use App\Models\Employee;
use App\Models\Task;

class Stat {
    public string $title;
    public string $manager;
    public int $amount;
    public string $date;

    public function __construct($title, $manager, $amount, $date="") {
        $this->title = $title;
        $this->manager = $manager;
        $this->amount = $amount;
        $this->date = $date;
    }
}

class StatsList extends Component
{

    public $stats = [];
    public $colors = ['red', 'green', 'yellow'];
    public $managers = [];
    public $selectedCompany = null;
    public $selectedCompanyType = null;
    public $selectedCompanyStatus = null;
    public $selectedCompanyName = "Все";
    public $selectedManager = null;
    public $managerRelation = 'creator_id';
    public $selectedType = null;
    public $beginDate = '';
    public $endDate = '';

    protected $listeners = [
        'changeManagerId' => 'onChangeManager',
        'changeStatType' => 'onChangeType',
        'changeManagerRelation' => 'onChangeManagerRelation',
        'changeDateRange' => 'onChangeDateRange',
        'changeCompanyId' => 'onChangeCompany',
        'changeCompanyTypeId' => 'onChangeCompanyType',
        'changeCompanyStatusId' => 'onChangeCompanyStatus',
    ];

    public function mount()
    {
        $this->managers = $this->getManagers();
        $this->companies = Company::all();
        $this->companyStatuses = CompanyStatus::all();
        $this->companyTypes = CompanyType::all();
        $this->collectStats();
    }

    public function render()
    {
        return view('livewire.stats-list');
    }

    public function onChangeCompany($id) {
        if ($id == 0) {
            $this->selectedCompany = null;
            $this->selectedCompanyName = "Все";
        } else {
            $this->selectedCompany = Company::find(intval($id));
            $this->selectedCompanyName = $this->selectedCompany->fullName();
        }
        $this->collectStats();
    }

    public function onChangeCompanyType($id) {
        if ($id == 0) {
            $this->selectedCompanyType = null;
        } else {
            $this->selectedCompanyType = CompanyType::find(intval($id));
        }
        $this->collectStats();
    }

    public function onChangeCompanyStatus($id) {
        if ($id == 0) {
            $this->selectedCompanyStatus = null;
        } else {
            $this->selectedCompanyStatus = CompanyStatus::find(intval($id));
        }
        $this->collectStats();
    }

    public function onChangeManager($id) {
        if ($id == 0) {
            $this->selectedManager = null;
        } else {
            $this->selectedManager = User::find(intval($id));
        }
        $this->collectStats();
    }

    public function onChangeManagerRelation($relation) {
        $this->managerRelation = $relation;
        $this->collectStats();
    }

    public function onChangeType($name) {
        $this->selectedType = $name;
        $this->collectStats();
    }

    public function onChangeDateRange($range) {
        $this->beginDate = $range['begin'] ?? '';
        $this->endDate = $range['end'] ?? '';
        $this->collectStats();
    }

    private function collectStats() {
        $this->stats = [];
        $tables = $this->getTables();
        $managers = $this->getManagers();
        
        foreach($tables as $filterData) {
            $title = $filterData['title'];
            if ($this->managerRelation == 'target_user_id') {
                $title = $title . ' (ответственный)';
            } else {
                $title = $title . ' (добавил)';

            }
            foreach($managers as $manager) {
                $amount = call_user_func_array(array($this, $filterData['get']), array($manager->id));;
                array_push($this->stats, 
                new Stat($title, $manager->name, $amount));
            }
        }
    }

    private function getManagers() {
        if (Auth::user()->role->id == 3) {
            return User::where('id', Auth::user()->id)->get();
        }
        if($this->selectedManager) {
            return [$this->selectedManager];
        }
        return User::all();
    }

    private function getTables() {
        $tables = [
            'companies' => ['title' => "Контрагенты", 'get' => 'getCompaniesAmount'],
            'tasks' => ['title' => "Задачи", 'get' => 'getTasksAmount'],
            'events' => ['title' => "События", 'get' => 'getEventsAmount'],
            'calls' => ['title' => "Звонки", 'get' => 'getCallsAmount'],
            'orders' => ['title' => "Заказы", 'get' => 'getOrdersAmount'],
            'requests' => ['title' => "Заявки", 'get' => 'getRequestsAmount'],
            'edits' => ['title' => "Редактирования", 'get' => 'getEditsAmount'],
            'comments' => ['title' => "Комментарии", 'get' => 'getCommentsAmount'],
        ];
        if($this->selectedCompany) {
            unset($tables['companies']);
        }
        if ($this->selectedType) {
            $selected = $this->selectedType;
            return array_filter($tables, function($k) use ($selected) {
                return $k == $selected;
            }, ARRAY_FILTER_USE_KEY);
        }
        return $tables;
    }

    private function getCompaniesAmount($managerId) {
        $query = DB::table('companies')
        ->where('creator_id', $managerId);
        $query = $this->applyDateFilter($query);
        return $query->count();
    }

    private function getTasksAmount($managerId) {
        $query = DB::table('tasks')
        ->where($this->managerRelation, $managerId);
        $query = $this->applyDateFilter($query);
        $query = $this->applyCompanyFilter($query);
        return $query->count();
    }

    private function getEventsAmount($managerId) {
        $query = DB::table('events')
        ->where($this->managerRelation, $managerId);
        $query = $this->applyDateFilter($query);
        $query = $this->applyCompanyFilter($query);
        return $query->count();
    }

    private function getEventsWithTypeAmount($managerId, $eventTypeId) {
        $query = DB::table('events')
        ->where($this->managerRelation, $managerId)
        ->where('event_type_id', $eventTypeId);
        $query = $this->applyDateFilter($query);
        $query = $this->applyCompanyFilter($query);
        return $query->count();
    }

    private function getCallsAmount($managerId) {
        return $this->getEventsWithTypeAmount($managerId, 1);
    }

    private function getOrdersAmount($managerId) {
        return $this->getEventsWithTypeAmount($managerId, 2);
    }

    private function getRequestsAmount($managerId) {
        return $this->getEventsWithTypeAmount($managerId, 3);
    }

    private function getEditsAmount($managerId) {
        return $this->getEventsWithTypeAmount($managerId, 4);
    }

    private function getCommentsAmount($managerId) {
        return $this->getEventsWithTypeAmount($managerId, 5);
    }

    private function applyCompanyFilter($query) {
        if (!$this->selectedCompany) {
            if ($this->selectedCompanyType) {
                $query = $query->whereRaw("company_id in (select 1 from companies where companies.company_type_id = ?)", [$this->selectedCompanyType->id]);
            }
            if ($this->selectedCompanyStatus) {
                $query = $query->whereRaw("company_id in (select 1 from companies where companies.company_status_id = ?)", [$this->selectedCompanyStatus->id]);
            }
            return $query;
        }
        return $query->where('company_id', $this->selectedCompany->id);
    }

    private function applyDateFilter($query) {
        if ($this->beginDate) {
            $query = $query->where('created_at', '>=', $this->beginDate);
        }
        if ($this->endDate) {
            $query = $query->where('created_at', '<=', $this->endDate);
        }
        return $query;
    }
}
