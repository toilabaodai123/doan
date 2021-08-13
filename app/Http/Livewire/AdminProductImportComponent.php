<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminProductImportComponent extends Component
{
    public function render()
    {
        return view('livewire.admin-product-import-component')
					->layout('layouts.template');
    }
}
