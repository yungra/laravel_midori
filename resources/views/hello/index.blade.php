<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Index</title>
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{!! $msg !!}</p>
    <ul>
        @foreach ($data as $item)
            {{-- <li>{!! $item !!}</li> --}}
            <li>{{  $item  }}</li>
        @endforeach
    </ul>
    <form action="/hello/other" method="post"
    enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <input type="submit">
    </form>
</body>
</html>

<style>
    th {background-color: red; padding:10px;}
    td {background-color: #eee; padding:10px;}
</style>