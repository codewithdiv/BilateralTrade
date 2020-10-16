<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bilateral Trade</title>
    <link rel="stylesheet" href="/css/app.css">
    <script>
    (function() {
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    };
    })();
</script>
</head>
<body>
    <div id="app">
        <mainapp></mainapp>
    </div>
</body>
</html>
<script src="{{mix('/js/app.js')}}"></script>
