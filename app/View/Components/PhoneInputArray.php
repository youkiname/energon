<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\EmployeePhoneType;

class PhoneInputArray extends Component
{
    public $name;
    public $phoneTypes = [];

    public function __construct($name)
    {
        $this->name = $name;
        $this->phoneTypes = EmployeePhoneType::all();
    }

    public function render()
    {
        return view('components.phone-input-array');
    }
}
