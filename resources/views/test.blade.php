<?php
/* @var string $test */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test page</title>
</head>
<body>
    <h2>Test page</h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, quaerat!
    </p>
    <p>
        {{ $test }}
    </p>

    <a href="{{ route('article', ['slug' => 99]) }}">go to article</a>
    {{ route('admin.post', ['id' => 567]) }}
</body>
</html>
