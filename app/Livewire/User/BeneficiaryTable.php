<?php
namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination; // Add this import for pagination
use App\Models\Client; // Import the Client model

class BeneficiaryTable extends Component
{
    use WithPagination; // Use the pagination trait

    public function render()
    {
        // Fetch and paginate clients, adjusting pagination based on current page
        $clients = Client::paginate(15);

        // Pass clients to the view
        return view('livewire.user.beneficiary-table', ['clients' => $clients])->layout('layouts.user-app');
    }
}
