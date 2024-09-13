<div>
    <x-slot name="title">
        User Dashboard
    </x-slot>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 m-0 font-weight-bold text-primary">Dashboard</h1>
            <div class="d-flex align-items-center">

 <!-- Date Filter -->
                <div class="d-flex align-items-center mr-3">

                        <input
                            type="text"
                            id="dateFilter"
                            class="form-control mr-3"
                            wire:model="selectedDate"
                            placeholder="Select Date"
                        />
                    </div>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#dateFilter", {
            dateFormat: "Y-m-d", // Ensure the format matches your database
            onChange: function(selectedDates, dateStr, instance) {
                @this.set('selectedDate', dateStr);
            }
        });
    });
</script>
                <div class="d-flex align-items-center mr-3">
                    <!-- Date Filter Dropdown -->
                    <select class="form-control mr-3" id="dateFilter">
                        <option value="day">Today</option>
                        <option value="monthly">Month</option>
                        <option value="semester">Semester</option>
                        <option value="year">Year</option>
                    </select>


                     <!-- Export Button -->
                     <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                        <button class="btn btn-secondary dropdown-toggle" style="width: 160px; background-color: #05498d; border-color: #05498d; color: #ffffff;" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownexport">
                          <a class="dropdown-item" href="#">Export as PDF</a>
                        </div>
                      </div>
                </div>
            </div>
            <style>
                .btn-dark-blue:hover {
                    background-color: #3676b6; /* Darker Blue for hover effect */
                    border-color: #3375b8;
                }
            </style>
        </div>

        <!-- Overview Section -->
        <div class="row justify-content-center mt-3">
            <!-- Total Documents Card -->
            <div class="col-xl-3 col-md-6 mb-4" style="height: 100px;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-center">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Documents</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDocument }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Served Clients Card -->
            <div class="col-xl-3 col-md-6 mb-4" style="height: 100px;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-center">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Served Clients</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalServedClients }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Amount of Assistance Card -->
            <div class="col-xl-3 col-md-6 mb-4" style="height: 100px;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-center">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Amount of Assistance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAmountAssistance }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Most Requested Assistance Card -->
            <div class="col-xl-3 col-md-6 mb-4" style="height: 100px;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 text-center">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Most Requested Assistance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mostRequestedAssistance }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytics Section with Tabs -->
        <div class="mt-4">
            <!-- Tabs -->
            <ul class="nav nav-tabs" id="analyticsTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-primary" id="distribution-tab" data-toggle="tab" href="#distribution" role="tab" aria-controls="distribution" aria-selected="true">Table 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="budget-tab" data-toggle="tab" href="#budget" role="tab" aria-controls="budget" aria-selected="false">Table 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="release-tab" data-toggle="tab" href="#release" role="tab" aria-controls="release" aria-selected="false">Table 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="table4-tab" data-toggle="tab" href="#table4" role="tab" aria-controls="table4" aria-selected="false">Table 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="table5-tab" data-toggle="tab" href="#table5" role="tab" aria-controls="table5" aria-selected="false">Table 5</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="table6-tab" data-toggle="tab" href="#table6" role="tab" aria-controls="table6" aria-selected="false">Table 6</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="table7-tab" data-toggle="tab" href="#table7" role="tab" aria-controls="table7" aria-selected="false">Table 7</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="table8-tab" data-toggle="tab" href="#table8" role="tab" aria-controls="table8" aria-selected="false">Table 8</a>
                </li>

            </ul>


            <!-- Tab Content -->
            <div class="tab-content" id="analyticsTabsContent">


                <!-- Assistance Distribution by Type and Gender Tab -->
                <div class="tab-pane fade show active" id="distribution" role="tabpanel" aria-labelledby="distribution-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Table 1: Summary of beneficiaries served with cost, beneficiary category and age group.
                            </h6>
                        </div>
                        <div class="card-body">
                            <!-- Pie Charts -->
                            <div class="row">
                                <!-- Pie Chart 1: Assistance Type Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Assistance Distribution Per Age</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="assistancePieChart1"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart 2: Sex Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Age Distribution Per Gender</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="assistancePieChart2"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress Bars: Additional Data -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Most Requested Assistance</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Progress Bars -->
                                            <div class="container">
                                                <!-- Data Category 1 -->
                                                <h6 class="font-weight-bold">Medical</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 90%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Female: 1,465,654</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 80%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Male: 1,390,700</div>
                                                </div>

                                                <!-- Data Category 2 -->
                                                <h6 class="font-weight-bold">Burial</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 60%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Female: 261,400</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> Male: 174,000</div>
                                                </div>

                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">Food</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Female: 143,850</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Male: 58,000</div>
                                                </div>
                                            </div>
                                        </div>

                                        <style>
                                            .progress-bar.bg-light-red {
                                                background-color: #ef8585e2; /* Light red color */
                                            }
                                            .progress-bar.bg-light-blue {
                                                background-color: #223D8De6; /* Light blue color */
                                            }
                                        </style>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Placeholder for other tabs' content (if any) -->
                <div class="tab-pane fade" id="budget" role="tabpanel" aria-labelledby="budget-tab">
                    <!-- Content for Assistance Budget -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Table 2: Assistance provided with cost.
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Pie Chart 1: Assistance Type Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Service Count</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="budgetPieChart1"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart 2: Sex Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Distribution per Gender</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="budgetPieChart2"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress Bars: Additional Data -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Most Requested Assistance</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Progress Bars -->
                                            <div class="container">
                                                <!-- Data Category 1 -->
                                                <h6 class="font-weight-bold">Medical</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 90%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Female: 1,465,654</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 80%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Male: 1,390,700</div>
                                                </div>

                                                <!-- Data Category 2 -->
                                                <h6 class="font-weight-bold">Burial</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 60%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Female: 261,400</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> Male: 174,000</div>
                                                </div>

                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">Food</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Female: 143,850</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Male: 58,000</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


 <!-- Table 3- Content for Assistance Release -->
                <div class="tab-pane fade" id="release" role="tabpanel" aria-labelledby="release-tab">
                    <!-- Content for Assistance Release -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Table 3: Beneficiaries served per client category.
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Pie Chart 3: Assistance Type Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Type of Assistance Distribution</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="releasePieChart1"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart 2: Sex Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Distribution Per Client Category</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="releasePieChart2"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress Bars: Additional Data -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Client With Most Assistance Release</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Progress Bars -->
                                            <div class="container">
                                                <!-- Data Category 1 -->
                                                <h6 class="font-weight-bold">FHONA</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 90%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">Female: 60%</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 80%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Male: 40%</div>
                                                </div>

                                                <!-- Data Category 2 -->
                                                <h6 class="font-weight-bold">WEDC</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 60%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Female: 50%</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Male: 50%</div>
                                                </div>

                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">CNSP</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Female: 30%</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Male: 70%</div>
                                                </div>


                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">YNSP</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Female: 30%</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Male: 70%</div>
                                                </div>


                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">SC</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Female: 30%</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Male: 70%</div>
                                                </div>

                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">PWD</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Female: 30%</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Male: 70%</div>
                                                </div>

                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">PLHIV</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Female: 30%</div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">Male: 70%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="table4" role="tabpanel" aria-labelledby="table4-tab">
                    <!-- Content for Assistance Budget -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Table 4: Beneficiaries Served per Age Group</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Pie Chart 1: Table 4 Type Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Type of Assistance</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="table4PieChart1"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart 2: Sex Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Distribution Per Age</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="table4PieChart2"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress Bars: Additional Data -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Most Requested Assistance</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Progress Bars -->
                                            <div class="container">
                                                <!-- Data Category 1 -->
                                                <h6 class="font-weight-bold">Medical</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 90%;" aria-valuenow="1465654" aria-valuemin="0" aria-valuemax="100">
                                                        Female: 1,465,654
                                                    </div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 80%;" aria-valuenow="1390700" aria-valuemin="0" aria-valuemax="100">
                                                        Male: 1,390,700
                                                    </div>
                                                </div>

                                                <!-- Data Category 2 -->
                                                <h6 class="font-weight-bold">Funeral</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 60%;" aria-valuenow="261400" aria-valuemin="0" aria-valuemax="100">
                                                        Female: 261,400
                                                    </div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 50%;" aria-valuenow="174000" aria-valuemin="0" aria-valuemax="100">
                                                        Male: 174,000
                                                    </div>
                                                </div>

                                                <!-- Data Category 3 -->
                                                <h6 class="font-weight-bold">Food</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 30%;" aria-valuenow="143850" aria-valuemin="0" aria-valuemax="100">
                                                        Female: 143,850
                                                    </div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 20%;" aria-valuenow="58000" aria-valuemin="0" aria-valuemax="100">
                                                        Male: 58,000
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="table5" role="tabpanel" aria-labelledby="table5-tab">
                    <!-- Content for Assistance Budget -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Table 5. Beneficiaries served per mode of admission.
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Pie Chart 1: Table 4 Type Distribution -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Mode of Admission</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="table5PieChart1"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pie Chart 2:  -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Distribution Per Gender</h6>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="table5PieChart2"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress Bars: Additional Data -->
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-sky-blue">
                                            <h6 class="m-0 font-weight-bold text-dark">Most Requested Assistance</h6>
                                        </div>
                                        <div class="card-body">
                                            <!-- Progress Bars -->
                                            <div class="container">
                                                <!-- Data Category 1 -->
                                                <h6 class="font-weight-bold">Referral</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 90%;" aria-valuenow="1465654" aria-valuemin="0" aria-valuemax="100">
                                                        Female: 1,465,654
                                                    </div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 80%;" aria-valuenow="1390700" aria-valuemin="0" aria-valuemax="100">
                                                        Male: 1,390,700
                                                    </div>
                                                </div>

                                                <!-- Data Category 2 -->
                                                <h6 class="font-weight-bold">Walk-In</h6>
                                                <!-- Female Progress Bar -->
                                                <div class="progress mb-2">
                                                    <div class="progress-bar bg-light-red" role="progressbar" style="width: 60%;" aria-valuenow="261400" aria-valuemin="0" aria-valuemax="100">
                                                        Female: 261,400
                                                    </div>
                                                </div>
                                                <!-- Male Progress Bar -->
                                                <div class="progress mb-4">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" style="width: 50%;" aria-valuenow="174000" aria-valuemin="0" aria-valuemax="100">
                                                        Male: 174,000
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

 <!-- Table 6 -->

 <div class="tab-pane fade" id="table6" role="tabpanel" aria-labelledby="table6-tab">
    <!-- Content for Assistance Budget -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-sky-blue">
            <h6 class="m-0 font-weight-bold text-dark">Table 6. Beneficiaries served per mode of admission.</h6>
        </div>
        <div class="card-body">
            <div class="row">

                <!-- Summary Section: Separate Card for Each Box -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="summary-box">
                                <p>Total Amount of Assistance</p>
                                <h3>₱3,493,604.77</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="summary-box">
                                <p>Total Number of Clients</p>
                                <h3>191</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="summary-box">
                                <p>Most Used Mode of Admission</p>
                                <h3>Referral</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart 1: Mode of Admission -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Mode of Admission</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="table6PieChart1"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart 2: Distribution Per Gender -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Distribution Per Gender</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="table6PieChart2"></canvas>
                        </div>
                    </div>

                    <!-- Gender Chart: Positioned Under Pie Chart 2 -->
                    <div class="col-md-12">
                        <div class="card shadow mb-4 mt-4">
                            <div class="card-header py-3 bg-sky-blue">
                                <h6 class="m-0 font-weight-bold text-dark">Gender Distribution Chart</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="genderBarChart"></canvas>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="tab-pane fade show active" id="table7" role="tabpanel" aria-labelledby="table7-tab">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-sky-blue">
            <h6 class="m-0 font-weight-bold text-dark">District Budget Release Heatmap</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Summary Section -->
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="summary-box">
                                <p>Total Budget Released</p>
                                <h3>₱10,000,000.00</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="summary-box">
                                <p>Total Districts</p>
                                <h3>4</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="summary-box">
                                <p>Largest Allocation</p>
                                <h3>Davao City 1st</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Budget Heatmap Chart -->
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-sky-blue">
                            <h6 class="m-0 font-weight-bold text-dark">Budget Allocation by Gender</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="budgetHeatmap"></canvas> <!-- Updated ID to match the script -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Improved Charts with Consistent Styles -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pieChartOptions = {
            responsive: true,
            maintainAspectRatio: true, // Ensures pie charts maintain the same aspect ratio
            plugins: {
                legend: {
                    position: 'left',
                    align: 'left',
                    labels: {
                        boxWidth: 15,
                        padding: 10,
                        font: {
                            size: 12,
                        },
                        usePointStyle: true // Makes the legend markers circular
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.label || '';
                            let value = context.raw || 0;
                            return `${label}: ${value.toLocaleString()}`;
                        }
                    }
                }
            }
        };

        const pieChartsData = [
            {
                id: 'assistancePieChart1',
                labels: ['0-13', '14-17', '18-29', '30-44', '45-59', '60-70', '71-79'],
                data: [500000, 100000, 600000, 800000, 200000],
                colors: ['#F66D44', '#FEAE65', '#E6F69D', '#ef8585e2', '#223D8D', '#2D87BB', '#AADEA7']
            },
            {
                id: 'assistancePieChart2',
                labels: ['Female', 'Male'],
                data: [120, 71],
                colors: ['#ef8585e2', '#223D8D']
            },
            {
                id: 'budgetPieChart1',
                labels: ['Medical', 'Burial', 'Food', 'Cash', 'Educational', 'Transportation', 'Hygiene & Sleeping Kits', 'Assistive Devices & Technologies', 'Psychosocial', 'Referral'],
                data: [356355, 135400, 201850, 456355, 435400, 1850, 6355, 5400, 1500, 800],
                colors: ['#DC143C', '#ffcc00', '#223D8D', '#E6F69D', '#ef8585e2', '#223D8D', '#2D87BB', '#AADEA7', '#FF6384', '#36A2EB']
            },
            {
                id: 'budgetPieChart2',
                labels: ['Female', 'Male'],
                data: [120, 71],
                colors: ['#ef8585e2', '#223D8D']
            },
            {
                id: 'releasePieChart1',
                labels: ['698517', '1773621', '714120', '302346', '5000'],
                data: [356355, 135400, 201850, 456355, 435400],
                colors: ['#DC143C', '#ffcc00', '#223D8D', '#E6F69D', '#ef8585e2']
            },
            {
                id: 'releasePieChart2',
                labels: ['FHONA', 'WEDC', 'CNSP', 'YNSP', 'SC', 'PWD', 'PLHIV'],
                data: [992658, 1676206, 120, 71, 484850, 293891, 46000],
                colors: ['#DC143C', '#ffcc00', '#223D8D', '#E6F69D', '#ef8585e2', '#223D8D', '#2D87BB']
            },
            {
                id: 'table4PieChart1',
                labels: ['Medical', 'Burial', 'Food', 'Cash', 'Educational', 'Transportation', 'Hygiene & Sleeping Kits', 'Assistive Devices & Technologies', 'Psychosocial', 'Referral'],
                data: [356355, 135400, 201850, 456355, 435400, 1850, 6355, 5400, 1500, 800],
                colors: ['#DC143C', '#ffcc00', '#223D8D', '#E6F69D', '#ef8585e2', '#223D8D', '#2D87BB', '#AADEA7', '#FF6384', '#36A2EB']
            },
            {
                id: 'table4PieChart2',
                labels: ['18-29', '30-44', '45-59', '60-70', '71-79'],
                data: [30, 80, 51, 29, 1],
                colors: ['#ef8585e2', '#223D8D', '#AADEA7', '#FF6384', '#36A2EB']
            },
            {
                id: 'table5PieChart1',
                labels: ['Referral', 'Walk-in'],
                data: [356355, 23400],
                colors: ['#223D8D', '#AADEA7']
            }
        ];

        pieChartsData.forEach(chart => {
            var ctx = document.getElementById(chart.id).getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: chart.labels,
                    datasets: [{
                        label: chart.labels,
                        data: chart.data,
                        backgroundColor: chart.colors,
                        borderColor: ['#e6e6e6'],
                        borderWidth: 1
                    }]
                },
                options: pieChartOptions
            });
        });
    });
</script>


<!-- Table 5 Pie Charts -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
       var ctx8 = document.getElementById('table5PieChart1').getContext('2d');
       var table5PieChart1 = new Chart(ctx8, {
       type: 'pie',
       data: {
           labels: [ 'Referral', 'Walk-in'],
           datasets: [{
               label: 'Mode of Admission',
               data: [356355, 23400],
               backgroundColor: ['#223D8D', '#AADEA7'],
               borderColor: ['#e6e6e6', '#e6e6e6'],
               borderWidth: 1
           }]
       },
       options: {
           responsive: true,
           plugins: {
               legend: {
                   position: 'left',
                   align: 'left',
                   labels: {
                       boxWidth: 15,
                       padding: 10,
                       usePointStyle: true,
                       font: {
                           size: 12,
                       }
                   }
               },
               tooltip: {
                   callbacks: {
                       label: function(context) {
                           let label = context.label || '';
                           let value = context.raw || 0;
                           return `${label}: ${value.toLocaleString()}`;
                       }
                   }
               }
           }
       }
   });
});

var ctx9 = document.getElementById('table5PieChart2').getContext('2d');
var table5PieChart2 = new Chart(ctx9, {
    type: 'pie',
    data: {
        labels: ['Referral', 'Walk-In'],
        datasets: [{
            label: 'Mode of Admission',
            data: [179, 29],
            backgroundColor: ['#223D8D', '#AADEA7'],
            borderColor: ['#e6e6e6', '#e6e6e6'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
                align: 'start',
                labels: {
                    boxWidth: 15,
                    padding: 10,
                    usePointStyle: true,
                    font: {
                        size: 12,
                    }
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.label || '';
                        let value = context.raw || 0;
                        let modeOfAdmission = label === 'Referral' ? 'Referral' : 'Walk-In';
                        return `Mode of Admission: ${modeOfAdmission}, Count: ${value.toLocaleString()}`;
                    }
                }
            }
        }
    }
});

</script>

<!-- Table 6 Piecharts -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Pie Chart 1: Mode of Admission
    var ctx11 = document.getElementById('table6PieChart1').getContext('2d');
    var table6PieChart1 = new Chart(ctx11, {
        type: 'pie',
        data: {
            labels: ['Referral', 'Walk-In'],
            datasets: [{
                data: [356355, 23400],
                backgroundColor: ['#223D8D', '#AADEA7'],
                borderColor: ['#e6e6e6', '#e6e6e6'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    align: 'start',
                    labels: {
                        boxWidth: 15,
                        padding: 10,
                        usePointStyle: true,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || 0;
                            return `Mode of Admission: ${label}, Count of Gender: ${value.toLocaleString()}`;
                        }
                    }
                }
            }
        }
    });

    // Pie Chart 2: Distribution Per Gender
    var ctx12 = document.getElementById('table6PieChart2').getContext('2d');
    var table6PieChart2 = new Chart(ctx12, {
        type: 'pie',
        data: {
            labels: ['Female', 'Male'],
            datasets: [{
                data: [1870904, 1622700],
                backgroundColor: ['#223D8D', '#AADEA7'],
                borderColor: ['#e6e6e6', '#e6e6e6'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    align: 'start',
                    labels: {
                        boxWidth: 15,
                        padding: 10,
                        usePointStyle: true,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || 0;
                            return `Gender: ${label}, Count: ${value.toLocaleString()}`;
                        }
                    }
                }
            }
        }
    });

    // Bar Chart: Gender Distribution
    var ctx13 = document.getElementById('genderBarChart').getContext('2d');
    var genderBarChart = new Chart(ctx13, {
        type: 'bar',
        data: {
            labels: ['Female', 'Male'],
            datasets: [{
                label: 'onsite',
                data: [1870904, 1622700],
                backgroundColor: ['#223D8D', '#AADEA7'],
                borderColor: ['#e6e6e6', '#e6e6e6'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            let value = context.raw || 0;
                            return `${label}: ${value.toLocaleString()}`;
                        }
                    }
                }
            }
        }
    });
});

</script>

<!-- Table 7 Piecharts -->
<script>
    const data = {
        datasets: [{
            tree: [
                {
                    name: 'Davao City 1st',
                    children: [
                        { name: 'Female', value: 556201 },
                        { name: 'Male', value: 738233 }
                    ]
                },
                {
                    name: 'Davao City 2nd',
                    children: [
                        { name: 'Female', value: 477921 },
                        { name: 'Male', value: 511928 }
                    ]
                },
                {
                    name: 'Davao City 3rd',
                    children: [
                        { name: 'Female', value: 299986 },
                        { name: 'Male', value: 107000 }
                    ]
                },
                {
                    name: 'Davao Occidental Lone District',
                    children: [
                        { name: 'Female', value: 299357 },
                        { name: 'Male', value: 0 }
                    ]
                }
            ],
            key: 'value',
            groups: ['name'],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)'
            ],
            borderWidth: 1,
            borderColor: '#fff',
            spacing: 1
        }]
    };

    const config = {
        type: 'treemap',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const name = context.raw.name;
                            const value = context.raw.v;
                            return `${name}: ₱${value.toLocaleString()}`;
                        }
                    }
                }
            }
        }
    };

    var ctx = document.getElementById('budgetHeatmap').getContext('2d'); // Updated to match the correct canvas ID
    new Chart(ctx, config);
</script>
<script>
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var ctx = document.getElementById('budgetHeatmap').getContext('2d');
        new Chart(ctx, config);
    });
</script>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-treemap"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .progress-bar-custom {
            height: 30px;
            border-radius: 5px;
        }
        .progress-container {
            margin-bottom: 20px;
        }
        .bg-sky-blue {
            background-color: #d6eaf1;
        }
        .container {
            width: 100%;
            margin: 20px auto;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .card-header {
            background-color: #87CEEB;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-body {
            padding: 20px;
        }
        .summary-box {
            text-align: center;
            margin-bottom: 20px;
        }
        .summary-box p {
            font-size: 1.2em;
            color: #555;
        }
        .summary-box h3 {
            font-size: 2em;
            color: #333;
        }
        canvas {
            background-color: #f4f4f4;
            border-radius: 10px;
        }
          .container {
            width: 80%;
            margin: 50px auto;
        }

    </style>
</div>
