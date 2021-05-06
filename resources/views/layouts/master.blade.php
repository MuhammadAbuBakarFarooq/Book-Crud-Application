<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yeild('title')</title>

        <link rel="stylesheet" type="text/css" href="{{URL::to('css/app.css')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
    </head>

    <body>
        

        <script type="text/javascript" src="{{URL::to('css/app.js')}}"></script>
        </body>
    </html>