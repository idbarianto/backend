<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/global/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->


</head>

<body>

    <div class="page-content">

        <div class="content-wrapper">

            <div class="content-inner">

                <div class="content d-flex justify-content-center align-items-center">

                    <form class="login-form" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i
                                    class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Your credentials</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                <div class="form-control-feedback">
                                    <i class="icon-envelop2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" placeholder="Password" name="password"  value="{{ old('password') }}" minlength="6" required>
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input">
                                    <span class="custom-control-label">Remember</span>
                                </label>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- Core JS files -->
    <script src="{{ asset('assets/global/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- /theme JS files -->

</body>


</html>