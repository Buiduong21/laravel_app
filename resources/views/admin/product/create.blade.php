@extends('master.admin')
@section('title', 'Thêm mới sản phẩm')

@section('noidungadmin')



<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    <legend>Thêm mới sản phẩm</legend>
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                <small class="help block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea class="form-control" id="content" name="description"
                    placeholder="Mô tả">{{old('description')}}</textarea>
                @error('description')
                <small class="help block">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <select name="category_id" id="inputcategories_id" class="form-control" required="required">
                    <option value=""></option>
                    @foreach($cat as $cats)
                    <option value=" {{$cats -> id}}" {{old('category_id')==$cats->id ? 'selected' :
                        ''}}>{{$cats -> name}}</option>
                    @endforeach
                </select>

                @error('category_id')
                <small class="help block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" value="{{old('price')}}">
                @error('price')
                <small class=" help block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giá khuyến mại</label>
                <input type="text" class="form-control" name="sale_price" value="{{old('sale_price')}}">
                @error('sale_price')
                <small class=" help block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Trạng thái sản phẩm</label>

                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="input" value="1" checked="checked" {{old('status') ==1
                            ? 'checked' : '' }}>
                        Hiển thị
                    </label>
                </div>
                <div class=" radio">
                    <label>
                        <input type="radio" name="status" id="input" value="2" {{old('status') ==2 ? 'checked' : '' }}>
                        Tạm ẩn
                    </label>
                </div>

            </div>
            <div class=" form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" name="upload" placeholder="Input field" id="upload">
                <img src="" alt="" id="show_image" style="width:300px">
                @error('upload')
                <small class="help block">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-block">Thêm mới</button>
        </div>
    </div>

</form>



@stop()


@section('js')
<script>
$('#upload').change(function(ev) {
    var input = $(this)[0];
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
})
</script>
@stop