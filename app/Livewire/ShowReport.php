<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Report\Entities\Report;
use Modules\User\Entities\User;

class ShowReport extends Component
{
    public $customer = null ;

    public function render()
    {

        $reports=Report::all();

        if ($this->customer!=null){

            $reports=Report::where('user_id',$this->customer)->get();

        }


        $reports->load([
            'user'
        ]);

        $users=User::all();
        return view('livewire.show-report',compact('users','reports'));
    }
}
