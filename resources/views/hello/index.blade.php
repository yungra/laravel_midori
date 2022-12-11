<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Index</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{{  $msg  }}</p>
    <table border="1">
    @foreach ($data as $item)
    <tr>
    <th>{{ $item->id }}</th>
    <td>{{ $item->name }}</td>
    <td>{{ $item->mail }}</td>
    <td>{{ $item->age }}</td>
    @endforeach
    </tr>
    </table>
    <hr>
</body>
</html>

<style>
    th {background-color: red; padding:10px;}
    td {background-color: #eee; padding:10px;}
</style>