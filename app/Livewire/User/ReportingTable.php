<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination; // Add this import for pagination
use App\Models\Client; // Import the Client model
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AICSExport; // Ensure this namespace matches your file structure

class ReportingTable extends Component
{
    use WithPagination; // Use the pagination trait

    public function export()
    {
        // Create an instance of AICSExport and download the file
        return Excel::download(new AICSExport, 'AICS-Reporting-' . now()->format('Y-m-d') . '.xlsx');
    }

    public function render()
    {
        // Fetch and paginate clients, adjusting pagination based on current page
        $clients = Client::paginate(10);

        // Pass clients to the view
        return view('livewire.user.reporting', ['clients' => $clients])
            ->layout('layouts.user-app');
    }
}
