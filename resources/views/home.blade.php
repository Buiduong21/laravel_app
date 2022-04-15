<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
</head>

<body>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Trạng Thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cats as $modal)
            <tr>
                <td>{{$modal -> id}}</td>
                <td>{{$modal -> name}}</td>
                <td>{{$modal -> start == 1 ? 'Tạm ẩn' : 'Hiển thị'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>