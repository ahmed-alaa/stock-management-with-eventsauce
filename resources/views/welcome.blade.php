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
                color: #636b6f;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 32px;
            }

            .title > a {
                text-decoration: none;
                font-style: italic;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .text-grey {
                color: #3d4852;
            }

            .text-red {
                color: #be2323
            }

            .button-green {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                min-width: 150px;
            }

            .button-grey {
                background-color: #e7e7e7;
                color: black;
                border: none;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                min-width: 150px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Stock Management using <a href="https://eventsauce.io"><span class="text-grey">Event</span><span class="text-red">Sauce</span></a>
                </div>

                <div class="links">
                    <a class="button-green" href="https://eventsauce.io/docs">EventSauce Docs</a>
                    <a class="button-grey" href="">Try me!</a>
                </div>
            </div>
        </div>
    </body>
</html>
