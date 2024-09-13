<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination; // Add this import for pagination
use App\Models\Client; // Import the Client model
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AICSExport; // Ensure this namespace matches your file structure

class ReportingTable extends Component
{
    use WithPagination;
    public function export()
    {
        // Create an instance of AICSExport and download the file
        return Excel::download(new AICSExport, 'AICS-Reporting-' . now()->format('Y-m-d') . '.xlsx');
    }

    public $clients = [];
    public $totalsByGender = [];



public function calculateTotalsByGenderTable1($clients) {
    $totals = [
        'FAMILY_HEADS_AND_OTHER_NEEDY_ADULT' => [
            'MALE' => [
                '18-29' => 0,
                '30-44' => 0,
                '45-59' => 0,
            ],
            'FEMALE' => [
                '18-29' => 0,
                '30-44' => 0,
                '45-59' => 0,
            ],
        ],
        'MEN/WOMEN_IN_SPECIALLY_DIFFICULT_CIRCUMSTANCES'=> [
            'MALE'=> ['18-29' => 0,
            '30-44' => 0,
            '45-59'=> 0,
            ],
            'FEMALE'=> ['18-29' => 0,
            '30-44' => 0,
            '45-59' => 0,
            ],
        ],
        'SENIOR_CITIZENS' => [
            'MALE' => [
                '60-70' => 0,
                '71-79' => 0,
                '80+' => 0,
            ],
            'FEMALE' => [
                '60-70' => 0,
                '71-79' => 0,
                '80+' => 0,
            ],
        ],
        'CHILDREN_IN_NEED_OF_SPECIAL_PROTECTION' => [
            'MALE' => [
                '0-13' => 0,
                '14-17' => 0,
            ],
            'FEMALE' => [
                '0-13' => 0,
                '14-17' => 0,
            ],
        ],
        'YOUTH' => [
            'MALE' => [
                '18-30' => 0,
            ],
            'FEMALE' => [
                '18-30' => 0,
            ],
        ],
        'PERSONS_WITH_DISABILITIES' => [
            'MALE' => [
                '0-13' => 0,
                '14-17' => 0,
                '18-29' => 0,
                '30-44' => 0,
                '45-59' => 0,
                '60-70' => 0,
                '71-79' => 0,
                '80+' => 0,
            ],
            'FEMALE' => [
                '0-13' => 0,
                '14-17' => 0,
                '18-29' => 0,
                '30-44' => 0,
                '45-59' => 0,
                '60-70' => 0,
                '71-79' => 0,
                '80+' => 0,
            ],
        ],
        'PERSONS_LIVING_WITH_HIV-AIDS' => [
            'MALE' => [
                '0-13' => 0,
                '14-17' => 0,
                '18-29' => 0,
                '30-44' => 0,
                '45-59' => 0,
                '60-70' => 0,
                '71-79' => 0,
                '80+' => 0,
            ],
            'FEMALE' => [
                '0-13' => 0,
                '14-17' => 0,
                '18-29' => 0,
                '30-44' => 0,
                '45-59' => 0,
                '60-70' => 0,
                '71-79' => 0,
                '80+' => 0,
            ],
        ],
    ];
  //  dd($clients);

    foreach ($clients as $client) {
        $category = $client['client_category'];
        $age = $client['age'];
        $amount = $client['amount1'];
        $sex = strtoupper($client['sex']);  // 'Male' or 'Female'

      // dd($client);  // Shows the current client and stops execution

        if ($category === 'FAMILY HEADS AND OTHER NEEDY ADULT') {
            if ($age >= 18 && $age <= 29) $totals['FAMILY_HEADS_AND_OTHER_NEEDY_ADULT'][$sex]['18-29'] += $amount;
            elseif ($age >= 30 && $age <= 44) $totals['FAMILY_HEADS_AND_OTHER_NEEDY_ADULT'][$sex]['30-44'] += $amount;
            elseif ($age >= 45 && $age <= 59) $totals['FAMILY_HEADS_AND_OTHER_NEEDY_ADULT'][$sex]['45-59'] += $amount;
        }

        if ($category === 'MEN/WOMEN IN SPECIALLY DIFFICULT CIRCUMSTANCES') {
            if ($age >= 18 && $age <= 29) $totals['MEN/WOMEN_IN_SPECIALLY_DIFFICULT_CIRCUMSTANCES'][$sex]['18-29'] += $amount;
            elseif ($age >= 30 && $age <= 44) $totals['MEN/WOMEN_IN_SPECIALLY_DIFFICULT_CIRCUMSTANCES'][$sex]['30-44'] += $amount;
            elseif ($age >= 45 && $age <= 59) $totals['MEN/WOMEN_IN_SPECIALLY_DIFFICULT_CIRCUMSTANCES'][$sex]['45-59'] += $amount;
        }

        if ($category === 'SENIOR CITIZENS') {
            if ($age >= 60 && $age <= 70) $totals['SENIOR_CITIZENS'][$sex]['60-70'] += $amount;
            elseif ($age >= 71 && $age <= 79) $totals['SENIOR_CITIZENS'][$sex]['71-79'] += $amount;
            elseif ($age >= 80) $totals['SENIOR_CITIZENS'][$sex]['80+'] += $amount;
        }



        if ($category === 'CHILDREN_IN_NEED_OF_SPECIAL_PROTECTION') {
            if ($age >= 0 && $age <= 13) $totals['CHILDREN_IN_NEED_OF_SPECIAL_PROTECTION'][$sex]['0-13'] += $amount;
            elseif ($age >= 14 && $age <= 17) $totals['CHILDREN_IN_NEED_OF_SPECIAL_PROTECTION'][$sex]['14-17'] += $amount;
        }

        if ($category === 'YOUTH') {
            if ($age >= 18 && $age <= 30) $totals['YOUTH'][$sex]['18-30'] += $amount;
        }

        if ($category === 'PERSONS WITH DISABILITIES') {
            if ($age >= 0 && $age <= 13) $totals['PERSONS_WITH_DISABILITIES'][$sex]['0-13'] += $amount;
            elseif ($age >= 14 && $age <= 17) $totals['PERSONS_WITH_DISABILITIES'][$sex]['14-17'] += $amount;
            elseif ($age >= 18 && $age <= 29) $totals['PERSONS_WITH_DISABILITIES'][$sex]['18-29'] += $amount;
            elseif ($age >= 30 && $age <= 44) $totals['PERSONS_WITH_DISABILITIES'][$sex]['30-44'] += $amount;
            elseif ($age >= 45 && $age <= 59) $totals['PERSONS_WITH_DISABILITIES'][$sex]['45-59'] += $amount;
            elseif ($age >= 60 && $age <= 70) $totals['PERSONS_WITH_DISABILITIES'][$sex]['60-70'] += $amount;
            elseif ($age >= 71 && $age <= 79) $totals['PERSONS_WITH_DISABILITIES'][$sex]['71-79'] += $amount;
            elseif ($age >= 80) $totals['PERSONS_WITH_DISABILITIES'][$sex]['80+'] += $amount;
        }

        if ($category === 'Persons Living with HIV-AIDS') {
            if ($age >= 0 && $age <= 13) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['0-13'] += $amount;
            elseif ($age >= 14 && $age <= 17) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['14-17'] += $amount;
            elseif ($age >= 18 && $age <= 29) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['18-29'] += $amount;
            elseif ($age >= 30 && $age <= 44) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['30-44'] += $amount;
            elseif ($age >= 45 && $age <= 59) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['45-59'] += $amount;
            elseif ($age >= 60 && $age <= 70) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['60-70'] += $amount;
            elseif ($age >= 71 && $age <= 79) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['71-79'] += $amount;
            elseif ($age >= 80) $totals['PERSONS LIVING WITH HIV-AIDS'][$sex]['80+'] += $amount;
        }
    }
   //dd($totals);  // This will output the final totals and stop execution
  // Example usage
$clients = Client::all()->toArray();  // Fetch client data from the database
//$totalsByGender = calculateTotalsByGenderTable1($clients);

return $totals;

}

// Example usage
//$clients = Client::all()->toArray();  // Fetch client data from the database
//$totalsByGender = calculateTotalsByGender($clients);


//Table 1 funciton



    public function render()
    {
        // Fetch and paginate clients, adjusting pagination based on current page
    $clients = Client::paginate(100000);

    // Calculate totals by gender for Table 1
    $totalsByGender = $this->calculateTotalsByGenderTable1($clients->items()); // Use items() to get the paginated data
//dd($totalsByGender);
        // Pass clients to the view
        return view('livewire.user.reporting', ['clients' => $clients,
        'totalsByGender' => $totalsByGender])
            ->layout('layouts.user-app');
    }
}
