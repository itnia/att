@foreach($data as $row)
    <tr>
        <td>{{$row['username']}}</td>
        <td>{{$row['title']}}</td>
        <td>{{$row['cost']}}</td>
    </tr>
@endforeach