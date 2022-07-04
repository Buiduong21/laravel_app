@extends('master.admin')
@section('title', 'Toàn bộ danh mục')

@section('noidungadmin')


<form method="Get" class="form-inline" role="form">

    <div class="form-group">
        <input class="form-control" name="key" id="" placeholder="Input key">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus"> Thêm mới</i></a>
    <a href="{{route('category.transh')}}" class="btn btn-primary"><i class="fa fa-trash"> Phục hồi</i></a>

</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục(tổng số sản phẩm)</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}} ({{$model->products->count()}})</td>
            <td>{{$model->status}}</td>
            <td class="text-right">
                <form action="{{route('category.delete', $model -> id)}}" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{route('category.edit', $model -> id)}}" class="btn btn-sm btn-primary"><i
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
{{$data->appends(request()->all())->links()}}

@stop()