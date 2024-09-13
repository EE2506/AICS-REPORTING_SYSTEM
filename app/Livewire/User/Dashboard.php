<?php
namespace App\Livewire\User;

use App\Models\Document;
use App\Models\Recycle;
use Livewire\Component;


class Dashboard extends Component
{
    public $totalDocument, $totalRecycles, $totalMedical, $totalFuneral, $totalFoodAssistance;
    public $totalServedClients, $totalAmountAssistance, $mostRequestedAssistance, $dobData;
    public $data = [];

    public function mount()
    {
        // Initialize data on component mount
        $this->totalDocument = Document::count();
        $this->totalRecycles = Recycle::count();
        $this->totalServedClients = 191; // Replace with dynamic data retrieval if needed
        $this->totalAmountAssistance = 3493604.77; // Replace with dynamic data retrieval if needed
        $this->mostRequestedAssistance = 'Medical'; // Replace with dynamic data retrieval if needed

        $this->data = [
            'total_amount' => $this->totalAmountAssistance,
            'total_clients' => $this->totalServedClients,
            'most_requested' => $this->mostRequestedAssistance,


            'assistance_distribution' => [
                'medical' => [
                    'female' => 1465654,
                    'male' => 1390700,
                ],
                'funeral' => [
                    'female' => 261400,
                    'male' => 174000,
                ],
                'food' => [
                    'female' => 143850,
                    'male' => 58000,
                ],
            ],
            'pie_charts' => [
                'type_of_assistance' => [
                    'medical' => 2856355,
                    'funeral' => 435400,
                    'food' => 201850,
                ],
                'sex_distribution' => [
                    'female' => 120,
                    'male' => 71,
                ],
            ],
        ];

        $this->dobData = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August'], // Replace with dynamic data retrieval if needed
            'values' => [120, 190, 300, 500, 200, 1000, 360, 20000], // Replace with dynamic data retrieval if needed
        ];

        $this->totalMedical = $this->data['assistance_distribution']['medical']['female'] + $this->data['assistance_distribution']['medical']['male'];
        $this->totalFuneral = $this->data['assistance_distribution']['funeral']['female'] + $this->data['assistance_distribution']['funeral']['male'];
        $this->totalFoodAssistance = $this->data['assistance_distribution']['food']['female'] + $this->data['assistance_distribution']['food']['male'];
    }

    public function render()
    {
        return view('livewire.user.dashboard')
            ->with('data', $this->data)
            ->layout('layouts.user-app');
    }
}


