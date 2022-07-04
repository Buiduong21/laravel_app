@extends('master.admin')
@section('title', 'Toàn bộ trang blog')

@section('noidungadmin')


<!-- <form method="Get" class="form-inline" role="form">

    <div class="form-group">
        <input class="form-control" name="key" id="" placeholder="Input key">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus"> Thêm mới</i></a>
    <a href="{{route('category.transh')}}" class="btn btn-primary"><i class="fa fa-trash"> Phục hồi</i></a>

</form> -->


<p>
    <a href="{{route('blog.create')}}" class="btn btn-primary btn-lg">Thêm mới</a>
</p>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên blog</th>
            <th>Trạng thái</th>
            <th>Ngày đăng</th>
            <th>Ảnh</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blog as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <td>{{Str::words(strip_tags($model->description), 10)}}</td>
            <td>{{$model->created_at}}</td>
            <td><img src="{{url('public/uploads/'.$model->image)}}" alt="" width="45"></td>
            <td class="text-right">
                <form action="{{route('blog.delete', $model -> id)}}" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{route('blog.edit', $model -> id)}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i>Sửa</a>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i
                            class="fa fa-trash"></i> Xóa</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<hr>


@stop()