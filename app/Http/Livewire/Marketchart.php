<?php

namespace App\Http\Livewire;

use App\Models\Market;
use Livewire\Component;

class Marketchart extends Component
{
    public $markets=[],$msize=[],$myear=[],$munit=[];
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function mount(){
        $this->markets = Market::take(5)->get();
        foreach ($this->markets as $market) {
            $this->myear[] = $market->year;
            $this->msize[] = $market->size;
            $this->munit[] = $market->unit;
        }
    }
    public function render()
    {
        return view('livewire.marketchart');
    }
}
