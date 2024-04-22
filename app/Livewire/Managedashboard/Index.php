<?php

namespace App\Livewire\Managedashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.managedashboard.index')->extends('livewire.managedashboard.layout.main')->section('content'); 
    }
}
