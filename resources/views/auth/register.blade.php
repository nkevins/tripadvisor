<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
    <title>My Trip Advisor</title>
    <!-- Custom CSS -->
    <style type="text/css">
        @CHARSET "UTF-8";

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            outline: none;
        }
        body {
            background: #1a3d58 !important;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
        }

        form[role=login] {
            font: 16px/1.6em Lato, serif;
            color: #919191;
            background: #fff;
            margin-top: 100px;
            padding: 0 50px 25px 50px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
        }
        form[role=login] > section {
            text-align: center;
            font-size: 14px;
            margin-top: 2em;
        }
        form[role=login] section a {
            color: #3796ba;
        }
        form[role=login] h3 {
            font-size: 30px;
            text-align: center;
            color: #c0c0c0;
            padding: 35px 0 12px 0;
        }
        form[role=login] h3 b {
            color: #013781;
        }

        form[role=login] span.glyphicon {
            color: #adadad;
        }
        form[role=login] input,
        form[role=login] button {
            font-size: 16px;
            margin: 5px 0;
        }
        form[role=login] input {
            color: #c1c4c5;
            background: #fafafa;
            border: none;
            padding-left: 40px;
            border: 1px solid #EDEDED;
        }
        form[role=login] input::-webkit-input-placeholder {
            color: #c1c4c5;
        }
        form[role=login] input:-moz-placeholder {
            color: #c1c4c5;
        }
        form[role=login] input::-moz-placeholder {
            color: #c1c4c5;
        }
        form[role=login] input:-ms-input-placeholder {
            color: #c1c4c5;
        }
        form[role=login] button {
            line-height: 30px;
            font-weight: bold;
            -webkit-box-shadow: 0px 3px 0px 0px rgba(24, 121, 158, 1);
            -moz-box-shadow: 0px 3px 0px 0px rgba(24, 121, 158, 1);
            box-shadow: 0px 3px 0px 0px rgba(24, 121, 158, 1);
            background: #3796ba;
            border: none;
        }
        form[role=login] button:hover {
            background: #4eaccf;
        }

        .login-form .form-control {
            padding-left: 40px;
        }
        .login-form .form-control + .glyphicon {
            position: absolute;
            left: 0;
            top: 22%;
            padding: 6px 0 0 27px;
        }
    </style>
    <!-- Google Font -->
    <link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery Library -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<section class="container">
    <section class="login-form">
        <form method="post" action="{{ route('postRegister') }}" role="login">
            <h3><b>Register</b></h3>
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-xs-12">
                    <input type="text" name="name" placeholder="Name" required class="form-control input-lg" value="{{ old('name') }}" />
                    <span class="glyphicon glyphicon-user"></span>
                </div>
                <div class="col-xs-12">
                    <input type="email" name="email" placeholder="Email Address" required class="form-control input-lg" value="{{ old('email') }}" />
                    <span class="glyphicon glyphicon-envelope"></span>
                </div>
                <div class="col-xs-12">
                    <input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
                    <span class="glyphicon glyphicon-lock"></span>
                </div>
                <div class="col-xs-12">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="form-control input-lg" />
                    <span class="glyphicon glyphicon-lock"></span>
                </div>
            </div>
            <button type="submit" name="go" class="btn btn-lg btn-block btn-success">REGISTER</button>
        </form>
    </section>
</section>

</body>
</html>