<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    public $name;
    public $type;
    public $labelName;

    public function __construct($name, $labelName = '', $type = 'text')
    {
        $this->name = $name;
        $this->type = $type;
        $this->labelName = $labelName;
    }

    public function render()
    {
        return view('components.input');
    }
}
