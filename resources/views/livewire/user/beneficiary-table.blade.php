<div class="container-fluid">
    <!-- Single root element for the Livewire component -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h4 text-gray-700 font-weight-bold">Beneficiaries</h1>
            </div>



    <!-- Card Section for Table -->
    <div class="card shadow-sm">

            <!-- Display Table -->
            <div class="table-container">
                <table class="table table-striped table-responsive">
                    <thead class="table-header">
                        <tr>
                            <th>ID</th>
                            <th>Field Office</th>
                            <th>Client No</th>
                            <th>Date Accomplished</th>
                            <th>Region</th>
                            <th>Province</th>
                            <th>City/Municipality</th>
                            <th>Barangay</th>
                            <th>Sex</th>
                            <th>Civil Status</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Mode Of Admission</th>
                            <th>Type of Assistance 1</th>
                            <th>Amount 1</th>
                            <th>Source of Fund 1</th>
                            <th>Client Category</th>
                            <th>Subcategory</th>
                            <th>Through</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->field_office }}</td>
                            <td>{{ $client->client_no }}</td>
                            <td>{{ $client->date_accomplished }}</td>
                            <td>{{ $client->region }}</td>
                            <td>{{ $client->province }}</td>
                            <td>{{ $client->city_municipality }}</td>
                            <td>{{ $client->barangay }}</td>
                            <td>{{ $client->sex }}</td>
                            <td>{{ $client->civil_status }}</td>
                            <td>{{ $client->dob }}</td>
                            <td>{{ $client->age }}</td>
                            <td>{{ $client->mode_of_admission }}</td>
                            <td>{{ $client->type_of_assistance1 }}</td>
                            <td>{{ $client->amount1 }}</td>
                            <td>{{ $client->source_of_fund1 }}</td>
                            <td>{{ $client->client_category }}</td>
                            <td>{{ $client->subcategory }}</td>
                            <td>{{ $client->through }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Center the pagination -->
                <div class="pagination-container">
                    {{ $clients->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styling -->
<style>
    /* Container styling for spacing and responsiveness */
    .table-container {
        margin: 15px 0; /* Adjusted margin for better spacing */
        overflow-x: auto; /* Allows scrolling for smaller screens */
    }

    /* Custom header styling to make it blue */
    .table-header {
        background-color: #0654a8; /* Blue background for header */
        color: #fff; /* White text color */
        text-align: center; /* Center-align header text */
        font: 16px;
    }

    /* Styling for the table to adjust row height and text alignment */
    .table th,
    .table td {
        padding: 8px 10px; /* Adjust padding to make the table more compact */
        vertical-align: middle; /* Center-align vertically */
        text-align: center; /* Center-align text */
        white-space: nowrap; /* Prevent text from wrapping */
    }

    /* Center the pagination */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    /* Pagination styling */
    .pagination .page-link {
        color: #0654a8;
    }

    .pagination .page-item.active .page-link {
        background-color: #0654a8;
        border-color: #0654a8;
        color: white;
    }

    .pagination .page-link:hover {
        background-color: #e6f0ff; /* Light blue on hover */
    }
</style>
