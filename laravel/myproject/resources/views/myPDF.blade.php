<!DOCTYPE html>
<html>

<head>
    <title>Hardik</title>
</head>

<body>
    <!-- <h1>hardik</h1> -->
    <table>

        @foreach($data as $d)
        <tr>
            <!-- <th>{{ $sr }}</th> -->
            <th>{{ $d->title }}</th>
            <th>{{ $d->discription }}</th>
            <th>{{ $d->price }}</th>
            <th>{{ $d->quantity }}</th>
        </tr>
        @endforeach
    </table>


</body>

</html>