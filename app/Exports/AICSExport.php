<?php
namespace App\Exports;

use resources\views\livewire\user\reporting as ReportingTable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AICSExport implements FromView
{
    public function view(): View
    {
        return view('exports.user.reporting', data: ['reporting' => ReportingTable::all()]);

    }
}


