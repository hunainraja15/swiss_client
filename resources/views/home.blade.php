@extends('layouts.app')

@section('content')

@if($subscription == false && Auth::check() && Auth::user()->status == 'active')
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form id="dateRangeForm" action="{{ route('report.dashboard') }}" method="POST">
                    @csrf
                    <input type="text" name="daterange" class="form-control" id="daterange">
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 bg-success text-white p-2 pl-3 rounded-circle">
                            <i class='bx bx-user-circle rounded'></i>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>

                    <span class="fw-semibold d-block mb-1">Total Users</span>
                    <h3 class="card-title mb-2">{{ count($users) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 bg-success text-white p-2 pl-3 rounded-circle">
                            <i class='bx bx-user-circle rounded'></i>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>

                    <span class="fw-semibold d-block mb-1">Total Clients</span>
                    <h3 class="card-title mb-2">{{ count($clients) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 bg-primary text-white p-2 pl-3 rounded-circle">
                            <i class='bx bx-hdd rounded'></i>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>

                    <span class="fw-semibold d-block mb-1">User Total Space</span>
                    <h3 class="card-title mb-2">{{ $useTotalStorage }} GB</h3>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0 bg-danger text-white p-2 pl-3 rounded-circle">
                            <i class='bx bx-hdd rounded'></i>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                        </div>
                    </div>

                    <span class="fw-semibold d-block mb-1">Used Storage</span>
                    <h3 class="card-title mb-2">{{ $remainingSize }}</h3>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <div style="width: 100%;"><canvas id="fileChart"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartData = @json($chartData);
        new Chart(
            document.getElementById('fileChart'),
            {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Number of Files by Month',
                        data: chartData.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                font: {
                                    size: 10 // Adjust font size for legend
                                }
                            }
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                title: function(tooltipItems) {
                                    return tooltipItems[0].label;
                                },
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            },
                            bodyFont: {
                                size: 10 // Adjust font size for tooltip body
                            },
                            titleFont: {
                                size: 12 // Adjust font size for tooltip title
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 8 // Adjust font size for x-axis labels
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 16 // Adjust font size for y-axis labels
                                }
                            }
                        }
                    }
                }
            }
        );
    });
</script>
<script>
    $('input[name="daterange"]').daterangepicker(
        {
            locale: {
              format: 'YYYY-MM-DD'
            },
            startDate:  moment().subtract(1, 'years').format('YYYY-MM-DD'),
            endDate: moment().format('YYYY-MM-DD')
        }, 
        function(start, end, label) {
            $('#daterange').val(start.format('YYYY-MM-DD') + '-' + end.format('YYYY-MM-DD'));
            $('#dateRangeForm').submit(); // Trigger form submission here
        }
    );
</script>

@else
<div class="container">
    <div class="mt-5 alert alert-danger" role="alert">
        Your Account is not active
    </div>
</div>
@endif
@endsection
