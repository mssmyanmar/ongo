@extends('template')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow py-2 dashborad-card-height">
                <div class="card-body text-center">
                    <div class="mt-3">
                        <i class="fa-solid fa-user fa-2xl"></i><br>
                        <span>Total Clients</span>
                        <h5>{{$clientCounts}}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow py-2 dashborad-card-height">
                <div class="card-body text-center">
                    <div class="mt-3">
                        <i class="fa-solid fa-users fa-2xl"></i><br>
                        <span>Total App users</span>
                        <h5>{{$appStaffCounts}}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow py-2 dashborad-card-height">
                <div class="card-body text-center">
                    <div class="mt-3">
                        <i class="fa-solid fa-user-tie fa-2xl"></i><br>
                        <span>Total staffs</span>
                        <h5>{{$allStaffCounts}}</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
                    {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @php
                        $tran = json_encode($transactions);
                    @endphp
                    <div class="chart-area" data-transactions="{{$tran}}">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transactions Of Clients</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @php
                        $tranClient = json_encode($clientTransaction);
                    @endphp
                    <div class="chart-pie pt-4 pb-2" data-transactions="{{$tranClient}}">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Client One
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Client Two
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('script')
<!-- Page level custom scripts -->
<script src="{{asset('template/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('template/js/demo/chart-pie-demo.js')}}"></script>
@endsection