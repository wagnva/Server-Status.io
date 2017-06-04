<html>
<head>
    <title>Dashboard</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css">

</head>
<body>

    <div id="app">
        <base-layout>
            <router-view></router-view>
        </base-layout>
    </div>


    <script src="{{ asset('js/app.js') }}" ></script>

</body>
</html>