<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    public $name;
    public $type;
    public $class;
    public $labelName;
    public $required;

    public function __construct($name, $labelName = '', $type = 'text', $class = '', $required=false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->class = $class;
        $this->labelName = $labelName;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.input');
    }
}
