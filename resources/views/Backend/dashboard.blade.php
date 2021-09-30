@extends('Backend.base')

@section('content')

    <div class="container mt-1">
        <div class="row">
            <div class="col-4">
                <div class="card bg-info border-0 shadow-sm rounded-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7"><br>
                                <h1 class="ml-2">{{ $ccount->count() }}</h1>
                                <h6 class="my-3">Registered Companies</h6>
                            </div>
                            <div class="col-5"><br>
                                <ul class="ml-auto my-2">
                                    <i class="fas fa-building fa-4x"></i>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 ms-3">
                <div class="card bg-secondary border-0 shadow-sm rounded-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6"><br>
                                <h1 class="ml-2">{{ $ecount->count() }}</h1>
                                <h6 class="my-3">Total Employees</h6>
                            </div>
                            <div class="col-5"><br>
                                <ul class="ml-auto my-2">
                                    <i class="fas fa-users fa-4x"></i>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
