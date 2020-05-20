<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #007bff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #007bff;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body id="welcome">
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <h1>VMail</h1>
                </div>

                <div class="links">
                    <a id="login" href="login">Login</a>
                    <a id="register" href="register">Register</a>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
    <script type="text/javascript">

        window.addEventListener('click', function () {
            say('Hello, welcome to v mail! Use TAB key from third row and SHIFT key from fifth row ' +
                'to navigate through the website. use ENTER key to select.' +
                'Click anywhere to listen to the help.');
        });


        document.getElementById('login').addEventListener('focus', function () {
            say('Login');
        });

        document.getElementById('register').addEventListener('focus', function () {
            say('Register');
        });

    </script>


</html>
