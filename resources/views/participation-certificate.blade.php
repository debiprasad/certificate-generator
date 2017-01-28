<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GDG BBSR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .message {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;                
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .input {
                color: #636b6f;
                height: 30px;
                width: 420px;
                font-size: 14px;
                font-weight: 600;
                text-decoration: none;
            }

            .button {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                text-decoration: none;
                height: 30px;
                width: 100px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="{{ url('/') }}">Home</a>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    Devlympics 2016
                </div>

                <div class="message m-b-md">
                    Please enter your email ID which you have used to register for the event
                </div>

                {!! Form::open(['url' => '/generate/participation-certificate', 'class' => 'm-b-md']) !!}
                    {!! Form::text('email', null, ['class' => 'input']); !!}
                    {!! Form::submit('Submit', ['class' => 'button']); !!}
                {!! Form::close() !!}

                <div class="message">
                    If you have participated, then your participation certificate will be<br>
                    downloaded in few seconds after submitting your email ID. In case<br>
                    of any issue, please email debiprasad@gdgbbsr.com.
                </div>
            </div>
        </div>
    </body>
</html>
