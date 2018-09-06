<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel Todo</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="bg-red-dark">

        <div class="container mx-auto bg-white">
            <h1>Laravel Todo</h1>
            <ul class="list-reset">
                <li class="flex">
                    <input type="checkbox">
                    <span>Todo 1</span>
                </li>
            </ul>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>