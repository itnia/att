<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>ATT Тестовое задание</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
</head>
<body>
<div class="container">
    <h1 class="text-center">User Orders</h1>
    <div class="table-responsive">
        <div class="input-group pb-3 search-bar">
            <input id="search-input" type="search" class="form-control rounded" placeholder="Search By Name"
                   aria-label="Search"
                   aria-describedby="search-addon"/>
            <button id="search-button" type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search
            </button>
        </div>
        <table id="users-table" class="table table-striped table-bordered table-sm">
            <thead>
            <tr>
                <th class="th-sm">UserName</th>
                <th class="th-sm">Product Name</th>
                <th class="th-sm">Cost</th>
            </tr>
            </thead>
            <tbody>
            @include('partials.table-content')
            </tbody>
        </table>
        <div class="pagination">
            {!! $data->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
</body>
</html>
