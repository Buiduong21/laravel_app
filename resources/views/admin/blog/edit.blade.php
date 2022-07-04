@extends('master.admin')
@section('title', 'Chỉnh sửa danh mục')

@section('noidungadmin')



<form action="{{ route('blog.update', $blog -> id ) }}" method="POST" role="form" enctype="multipart/form-data">
    <legend>Chỉnh sửa Blog</legend>
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên Blog</label>
        <input type="text" class="form-control" name="name" value="{{$blog->name}}">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea class="form-control" id="content" name="description"
            placeholder="Mô tả">{{$blog->description}}</textarea>
        @error('description')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class=" form-group">
        <div>
            <label for="">Ảnh</label>
            <input type="file" class="form-control" name="upload" placeholder="Input field" id="upload">
            <img src="" alt="" id="show_image" style="width:300px">
            <img value="{{url('public/uploads/'.$blog->image)}}" alt="" width="300">
            @error('upload')
            <small class="help block">{{$message}}</small>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>



@stop()