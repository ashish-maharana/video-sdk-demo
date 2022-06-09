<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('SITE_NAME')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" crossorigin="anonymous">
    <!-- CSS only -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- GTranslate: https://gtranslate.io/ -->

<!-- React root DOM -->
<main id="root"><Example></Example></main>


<!-- React JS -->
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
