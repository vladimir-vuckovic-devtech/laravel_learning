<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Master Blade Template</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/layout.css") }}">
</head>
<body>
    <div class="container cust-cont">
        @yield("content")
    </div>
</body>
</html>