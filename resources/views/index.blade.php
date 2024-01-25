<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>ATT Тестовое задание</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
    <style>
        @media (max-width: 767px) {
            body {
                font-size: 14px; /* Adjust the font size as needed */
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">User Orders</h1>
    <div class="table-responsive">
        <table id="users-table" class="table table-striped table-bordered table-sm">
            <thead>
            <tr>
                <th class="th-sm">UserName</th>
                <th class="th-sm">Product Name</th>
                <th class="th-sm">Cost</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{$row['username']}}</td>
                    <td>{{$row['title']}}</td>
                    <td>{{$row['cost']}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
<script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script>
  $(document).ready(function () {
    let table = $('#users-table').DataTable({
      'pageLength': 50
    });
    $('#users-table input')
        .off()
        .on('keyup', function () {
          console.log('event');
          table.column(2).search(this.value).draw();
        });
  });
</script>
</body>
</html>
