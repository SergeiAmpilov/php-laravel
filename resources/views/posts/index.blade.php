<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <h2>Posts list</h2>
    <ul>
        <li>
            <a href="{{ route('posts.show', ['slug' => 1]) }}">Post 1</a>
            |
            <a href="{{ route('posts.edit', ['slug' => 1]) }}">Edit</a>
            |
            <form method="post" action="{{route('posts.destroy', ['slug' => 1])}}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        <li>
            <a href="{{ route('posts.show', ['slug' => 2]) }}">Post 2</a>
            |
            <a href="{{ route('posts.edit', ['slug' => 2]) }}">Edit</a>
            |
            <form method="post" action="{{route('posts.destroy', ['slug' => 2])}}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        <li>
            <a href="{{ route('posts.show', ['slug' => 3]) }}">Post 3</a>
            |
            <a href="{{ route('posts.edit', ['slug' => 3]) }}">Edit</a>
            |
            <form method="post" action="{{route('posts.destroy', ['slug' => 3])}}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>

    </ul>
</body>
</html>
