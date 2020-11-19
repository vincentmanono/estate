<?php

namespace App\Http\Livewire;

use App\Unit;
use App\User;
use Livewire\Component;

class TenantRent extends Component
{
    public $unit = null ;
    public function render()
    {
        $unit = Unit::find($this->unit);

        return view('livewire.tenant-rent',[
            'user' => $unit->leased->user ?? "" ,
        ]);
    }
}
