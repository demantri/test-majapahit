
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrations Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('template') }}/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/libs/css/style.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" method="POST" action="/save_register">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="notif">
                        Something it's wrong:
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="Email" autocomplete="off">
                </div>

                {{-- <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div> --}}

                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" name="password" required="" placeholder="Password">
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg" id="confirm" type="password" name="password_confirmation" placeholder="Confirm">
                </div>

                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>

            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="/" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>
@include('script');

</html>
