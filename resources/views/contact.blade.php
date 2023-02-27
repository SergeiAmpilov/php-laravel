<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact page</title>
</head>
<body>
    <h2>Contact</h2>
    <form action="{{ route('contact2') }}" method="post">
{{--        <input type="hidden" name="_token" value="<?= csrf_token() ?>">--}}
{{--        {{ csrf_field() }}--}}
        @csrf
        Name: <input type="text" name="name" id=""><br>
        Email: <input type="email" name="email" id=""><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>
