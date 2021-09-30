<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MiniCRM - Administration</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
</head>
<body class="bg-light" style="font-family: Quicksand">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="#"><b><span class="text-primary">MINI</span>CRM</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <span><i class="fas fa-user-circle text-secondary fa-lg"></i>&nbsp; Administration</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 p-0 m-0" style="position:fixed">
                <div class="card rounded-0 border-0 shadow-sm">
                    <div class="card-body m-0 p-0" style="height:100vh">
                        <div class="container p-0">
                            <div class="list-group list-group-flush">
                                <hr class="mt-0">

                                <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action border-bottom-0 border-top-0 mt-1">&nbsp;<i class="fas fa-tachometer-alt"></i>&nbsp; Dashboard</a>

                                <a href="{{ route('company.index') }}" class="list-group-item list-group-item-action border-bottom-0 border-top-0 mt-1">&nbsp;<i class="fas fa-building"></i>&nbsp; Company</a>

                                <a href="{{ route('employee.index') }}" class="list-group-item list-group-item-action border-bottom-0 border-top-0 mt-1">&nbsp;<i class="fas fa-users"></i>&nbsp; Employee</a>

                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="mt-2 list-group-item list-group-item-action border-top-0 border-bottom-0">&nbsp;<i class="fas fa-power-off text-danger"></i>&nbsp; Logout</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 offset-3 mt-4">
                @yield('content')
            </div>
        </div>
    </div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
