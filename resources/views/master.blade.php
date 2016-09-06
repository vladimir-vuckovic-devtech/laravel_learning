<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Master Blade Template</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/layout.css") }}">
</head>
<body>
    <div class="container cust-cont">
        <h1>@yield("content")</h1>
    </div>
</body>
</html>