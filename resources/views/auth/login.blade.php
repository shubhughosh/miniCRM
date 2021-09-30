<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mini - CRM</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    </head>
    <body class="bg-light">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card border-0 shadow-sm mt-2">
                        <div class="card-body">
                            <h4 class="text-center" style="font-family:Quicksand;"> Account Sign In</h4>
                            <p class="text-center" style="font-family:Quicksand;">Please sign in with your Email and Password below:</p>

                            <div class="container">
                                <x-jet-validation-errors class="mb-4 text-danger" />
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group mt-4 mb-3">
                                        <label for="email" class="text-muted small m-0 p-0">Email ID</label>
                                        <input type="email" id="email" name="email" class="form-control shadow-none form-control-sm" placeholder="Enter your email id" required autofocus>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="text-muted small m-0 p-0">Password</label>
                                        <input type="password" id="password" name="password" class="form-control shadow-none form-control-sm" placeholder="Enter your password" required>
                                    </div>
                                    <div class="d-grid mt-4 mb-3">
                                        <button type="submit" class="btn btn-primary btn-sm shadow-none" type="button">Sign In</button>
                                      </div>
                                      <div class="text-center">
                                        <a href="{{route('password.request')}}" class="forgot-password"><small>Forgot Your Password?</small></a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>

</x-guest-layout>
