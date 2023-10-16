@extends('master')
@section('content')

<ol class="list-group list-group-numbered" style="margin-right: 125px; margin-left:125px;">
	<h4> Các đơn hàng đã đặt gần đây:</h4>
	 @foreach ($data as $key=>$value)
   <?php  
            $product = App\Product::where('id',$value->id_product)->get(); 
        ?> 
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
        @foreach ($product as $prd)
      <h5 class="card-title">{{$prd->name}}</h5>
       <div class="fw-bold"><img src="source/image/product/{{$prd->image}}" width="115px" height="115px"></div>
        @endforeach

      <div class="fw-bold">Số lượng: {{$value->quantity}} </div>
        <div class="fw-bold">Tổng tiền: {{$value->unit_price*$value->quantity}} </div>
       <div class="fw-bold">Tình trạng đơn: {{$value->orderStatus}} </div>
       <a href="{{route('huydonhang',$value->id)}}"><button type="button" class="btn btn-info" value="Hủy đơn hàng" name="remove" style="position: absolute; right: 45px; bottom: 105px;">Hủy đơn hàng</button></a>
          
         </li>
  @endforeach
 
</ol>

@endsection