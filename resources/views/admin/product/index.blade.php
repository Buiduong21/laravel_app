@extends('master.admin')
@section('title', 'Thêm mới sản phẩm')

@section('noidungadmin')


<form action="" method="Get" class="form-inline" role="form">

    <div class="form-group">
        <input class="form-control" name="key" id="" placeholder="Input key">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('product.create')}}" class="btn btn-primary"><i class="fa fa-plus"> Thêm mới</i></a>

</form>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Tên sản phẩm</th>
            <th>Trạng thái</th>
            <th>Ảnh</th>
            <th>Giá sản phẩm</th>
            <th>Giá KM</th>
            <th>Mô tả</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->cat->name}}</td>
            <td>{{$model->name}}</td>
            <td>
                @if($model->status == 0)
                <span class="label label-success">Tạm ẩn</span>
                @else
                <span class="label label-danger">Hiển thị</span>
                @endif
            </td>

            <td><img src="{{url('public/uploads/'.$model->image)}}" alt="" width="45"></td>
            <td>{{$model->price}}</td>
            <td>{{$model->sale_price}}</td>
            <td width:50px>{{Str::words(strip_tags($model->description), 10)}}</td>
            <td class="text-right">
                <form action="{{route('product.delete', $model -> id)}}" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{route('product.edit', $model -> id)}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i>Sửa</a>
                    <a href="{{route('product.chitiet', $model -> id)}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i>Chi tiết</a>
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