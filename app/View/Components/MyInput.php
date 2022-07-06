<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MyInput extends Component
{

    public $label, $name, $type, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $type='text', $value="")
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.my-input');
    }
}
