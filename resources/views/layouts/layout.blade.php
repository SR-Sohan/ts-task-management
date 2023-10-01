<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks Managemnet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("assets/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/toastify.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/dataTables.min.css")}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset("assets/js/dataTables.min.js")}}"></script>
    <script src="{{asset("assets/js/axios.min.js")}}"></script>
    <script src="{{asset("assets/js/toastify.js")}}"></script>
    <script src="{{asset("assets/js/main.js")}}"></script>
</head>
<body>
    <div id="loader" class="loaderSpiner d-none">
        <div class="load"></div>
    </div>
    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>