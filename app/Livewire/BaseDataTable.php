<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

abstract class BaseDataTable extends Component implements HasTable, HasForms
{
    use InteractsWithForms, InteractsWithTable;

    public function render()
    {
        return view('livewire.base-data-table');
    }
}
