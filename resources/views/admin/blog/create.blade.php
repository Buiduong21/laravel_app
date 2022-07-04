@extends('master.admin')
@section('title', 'Thêm mới trang blog')

@section('noidungadmin')



<form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
    <legend>Thêm mới blog</legend>
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên blog</label>
                <input type="text" class="form-control" name="name">
                @error('name')
                <small class="help block">{{$message}}</small>
                @enderror
            </div>

            <div class=" form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" name="upload" placeholder="Input field" id="upload">
                <img src="" alt="" id="show_image" style="width:300px">
                @error('upload')
                <small class="help block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea class="form-control" id="content" name="description" placeholder="Mô tả"></textarea>
                @error('description')
                <small class="help block">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Thêm mới</button>
        </div>

    </div>

</form>

@stop()