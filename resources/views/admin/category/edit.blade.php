@extends('master.admin')
@section('title', 'Chỉnh sửa danh mục')

@section('noidungadmin')



<form action="{{ route('category.update', $category -> id ) }}" method="POST" role="form">
    <legend>Chỉnh sửa danh mục</legend>
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Trạng thái</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="1" {{$category -> status == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="input" value="2" {{$category -> status == 2 ? 'checked' : ''}}>
                Tạm ẩn
            </label>
        </div>

    </div>


    <button type="submit" class="btn btn-primary">Cập nhập</button>
</form>



@stop()