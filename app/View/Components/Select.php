<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $items;
    public $default;

    public function __construct($name, $items = [], $default='')
    {
        $this->name = $name;
        $this->items = $items;
        $this->default = $default;
    }

    public function render()
    {
        return view('components.select');
    }
}
