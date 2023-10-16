@extends('master')
@section('content')
<form action="{{route('suadonhang2',$billOrder->id)}}" method="post">
		@csrf
<label for="exampleFormControlInput1">Cập nhật trạng thái đơn hàng:</label>
<select class="form-control" name="status">
      <option value="chờ xử lý">Chờ xử lý</option>
      <option value="đã nhận đơn">Đã nhận đơn</option>
      <option value="đang đóng gói">Đang đóng gói</option>
      <option value="đã gửi bên vận chuyển">Đã gửi bên vận chuyển</option>
      
    </select>
<div class="form-block"style="margin-left: 625px; margin-top:25px;">
		<button type="submit" class="btn btn-primary btn-lg ">Cập nhật trạng thái</button>
	</div>
</form>
@endsection