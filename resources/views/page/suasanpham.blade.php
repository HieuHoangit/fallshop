@extends('master')
@section('content')

<form action="{{route('editsanpham',$products->id)}}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group"style="margin-left: 25px;">
    <label for="exampleFormControlInput1">Tên sản phẩm:</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="{{$products->name}}" >
  </div>
  <div class="form-group"style="margin-left: 25px;">
    <label for="exampleFormControlSelect1">Loại</label>
    <select class="form-control" name="type">
      <option value="1">Áo tay dài Ulzzang</option>
      <option value="2">Áo tay lỡ</option>
      <option value="3">Hoodie và áo nỉ</option>
      <option value="4">Quần đùi</option>
      <option value="5">Mũ</option>
       <option value="6">Vớ tất</option>
        <option value="7">Sweater</option>
    </select>
  </div>
  
  <div class="form-group"style="margin-left: 25px;">
    <label for="exampleFormControlTextarea1">Mô tả:</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="{{$products->description}}"></textarea>
  </div>
		  <div class="input-group mb-3"style="margin: 25px;">
		  <div class="input-group-prepend">
		    <label for="exampleFormControlTextarea1">Up ảnh:</label>
		  </div>
		  <div class="custom-file">
		    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01"> 
		   
		  </div>
		</div>
  <div class="form-group"style="margin-left: 25px;">
    <label for="exampleFormControlInput1">Giá gốc:</label>
    <input type="text" name="unit_price" class="form-control" id="exampleFormControlInput1" placeholder="{{$products->unit_price}}">
  </div>
  <div class="form-group"style="margin-left: 25px;">
    <label for="exampleFormControlInput1">Giá khuyến mãi:</label>
    <input type="text" name="promotion_price" class="form-control" id="exampleFormControlInput1" placeholder="{{$products->promotion_price}}">
  </div>
  <div class="form-group"style="margin-left: 25px;">
    <label for="exampleFormControlInput1">kiểu bán:</label>
    <input type="text" name="unit" class="form-control" id="exampleFormControlInput1" placeholder="{{$products->unit}}">
  </div>
  <div class="form-group"style="margin-left: 25px;">
    <label for="exampleFormControlSelect1">Mới hay cũ:</label>
    <select class="form-control" name="new" id="exampleFormControlSelect1">
      <option value="1">Mới</option>
      <option value="0">Cũ</option>
    
    </select>
  </div>
  <div class="form-block"style="margin-left: 125px;">
		<button type="submit" class="btn btn-primary btn-lg ">sửa sản phẩm</button>
	</div>
</form>

@endsection