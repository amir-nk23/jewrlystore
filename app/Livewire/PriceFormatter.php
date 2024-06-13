<?php

namespace App\Livewire;

use Livewire\Component;

class PriceFormatter extends Component
{
    public $price=0.0;

    public function updatedInputValue($value)
    {
        $this->emit('inputValueChanged', $value);
    }


    public function render()
    {


        return view('livewire.price-formatter',);
    }
}
