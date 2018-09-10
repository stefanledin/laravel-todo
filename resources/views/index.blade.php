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
            <div id="app">
                @isset ($todos)
                    <ul class="list-reset">
                        <li v-for="todo in todos" class="flex">
                            <input type="checkbox">
                            <span v-html="todo.label"></span>
                        </li>
                    </ul>
                @endisset
                <form action="/todos" method="POST" v-on:submit.prevent="onSubmit">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" v-model="new_todo" name="new_todo" class="border-grey border-solid border">
                    <input type="submit" value="Spara">
                </form>
            </div>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>