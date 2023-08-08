<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\EmployeeEmailType;

class EmailInputArray extends Component
{
    public $name;
    public $emailTypes = [];

    public function __construct($name)
    {
        $this->name = $name;
        $this->emailTypes = EmployeeEmailType::all();
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.email-input-array');
    }
}
