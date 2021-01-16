<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" href="{{ asset('amplop.svg') }}" type="image/svg">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/adminty/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/adminty/assets/icon/feather/css/feather.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/adminty/assets/css/style.css') }}">
    <style>
        .input-group span {
            position: absolute;
            right: 5px;
            z-index: 100;
            height: 100%;
            /* background: pink; */
            display: flex;
            align-items: center;
        }

    </style>
</head>
<body style="height: 100vh;">
        <div class="row align-items-center h-100" >
            <div class="col-sm-4 m-auto" >
                <div class="card my-auto">
                    <div class="card-body">
                        <h4 class="card-title"><i class="feather icon-lock"></i> Login</h4>
                        <form action="/login" method="POST" class="form" id="login-form">
                            @csrf()
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <input type="text" name="username" placeholder="Username" class="form-control">
                                    <span>
                                        <i class="feather icon-user"></i>
                                    </span>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" placeholder="*****" class="form-control">
                                    <span>
                                        <i class="feather icon-eye-off"></i>
                                    </span>
                                </div>
                               
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <div class="captcha">
                                    <span>{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        ↻
                                    </button>
                                </div>
                            </div>
    
                            <div class="form-group mb-4">
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Masuk</button>
                            </div>
                        </form>
                    </div>
                    @if($errors->any())
                    <div class="card-footer">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('vendors/adminty/bower_components/jquery/js/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                var passwordField = $('input[name="password"]')
                passwordField.siblings('span').click(function(){
                    $(this).find('i').toggleClass('icon-eye icon-eye-off')
                    passwordField.prop('type', passwordField.prop('type') == 'password' ? 'text' : 'password')
                })

                $('#reload').click(function () {
                    $.ajax({
                        type: 'GET',
                        url: 'reload-captcha',
                        success: function (data) {
                            $(".captcha span").html(data.captcha);
                        }
                    });
                });
            })
        </script>
</body>
</html>