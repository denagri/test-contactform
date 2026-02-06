<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        return view('livewire.counter');
    }
    public function openModal($id)
   {
      $this->contact = Contact::with('category')->find($id);
      $this->showModal = true;
   }
}
