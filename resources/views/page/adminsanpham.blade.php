@extends('master')
@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">tên sản phẩm</th>
      <th scope="col">Loại</th>
      <th scope="col">mô tả</th>
      <th scope="col">giá gốc</th>
      <th scope="col">giá khuyến mãi</th>
      <th scope="col">ảnh</th>
      <th scope="col">Kiểu bán</th>
       <th scope="col" colspan="2" >&nbsp;&nbsp;&nbsp;&ensp;Thao tác</th>
     
    </tr>
  </thead>
  <tbody>
  	@foreach($ManagerProduct as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td>@switch($data->id_type)
      		@case("1")
      		Áo tay dài Ulzzang
      		@break
      		@case("2")
      		Áo tay lỡ
      		@break
      		@case("3")
      		Hoodie và áo nỉ
      		@break
      		@case("4")
      		Quần đùi
      		@break
      		@case("5")
      		Mũ
      		@break
      		@case("6")
      		Vớ tất
      		@break
      		@case("7")
      		Sweater
      		@break
      		@endswitch
      </td>
      <td>{{$data->description}}</td>
      <td>{{number_format($data->unit_price)}}</td>
      <td>@if($data->promotion_price=="0")không giảm giá @else{{$data->promotion_price}}@endif</td>
      <td>{{$data->image}}</td>
      <td>{{$data->unit}}</td>
      <td><a href="{{route('suasanpham',$data->id)}}" title="">Chỉnh sửa</a></td>
      <td><a href="{{route('xoasanpham',$data->id)}}" title="">Xóa</a></td>
    </tr>
    @endforeach


 
   
  </tbody>
</table>
<button type="button" class="btn btn-outline-success btn-lg" style="margin-left:825px;"><a href="{{route('themsanpham')}}" title="">Tạo sản phẩm mới</a></button>
@endsection