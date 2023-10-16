@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi tiết:&nbsp;{{$productDetail->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Thông tin chi tiết</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$productDetail->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" style="font-size:30px; margin-bottom: 20px; color:red;">{{$productDetail->name}}</p>
								<p class="single-item-price">
								@if($productDetail->promotion_price!=0)
												<span class="flash-del">{{number_format($productDetail->unit_price)}}Đ</span>
												<span class="flash-sale">{{number_format($productDetail->promotion_price)}}Đ</span>
												
											@else
											<span>{{number_format($productDetail->unit_price)}}Đ</span>
											@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$productDetail->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{Route('themgiohang',$productDetail->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$productDetail->description}}</p>
						</div>
					
					</div>

	@if(Auth::check())
	<form action="{{route('comment',$productDetail->id)}}" method="POST" accept-charset="utf-8">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-floating">
  	<textarea class="form-control" placeholder="Viết bình luận tại đây" id="floatingTextarea" name="comment"></textarea>
</div>	
	<div></div>
	<div class="col-12">
    <button type="submit" class="btn btn-primary" style="margin-top:10px;">bình luận</button>
  </div>
		</form>	 
	@endif
	@if(Auth::check())
	<div class="headings d-flex justify-content-between align-items-center mb-3">
                <h5>Bình Luận gần đây ({{count($comment)}})</h5>     
            </div>
	@foreach($comment as $cmt)
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
          
            <div class="card p-3 mt-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"> <img src="source/image/comment.png" width="30" class="user-img rounded-circle mr-2"> <span><large class="font-weight-bold text-primary">{{$cmt->full_name}}</large> 

                    	<large class="font-weight-bold">{{$cmt->comment}}</large></span> </div> <small>{{$cmt->created_at}}</small>
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    
                    <div class="icons align-items-center"> <i class="fa fa-check-circle-o check-icon text-primary"></i> </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endforeach
	@else
	<div class="alert-danger" style="text-align: center; font-size: 25px; width:970px; height:55px; margin-top: 55px; margin-bottom:20px;"> bạn chưa đăng nhập để có thể bình luận</div>
		
	</div>
	@endif
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4 style="color: #CC0033; margin-bottom:12px;">Sản phẩm tương tự</h4>

						<div class="row">
							@foreach($similarProduct as $sipd)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$sipd->image}}" alt="" width="320px" height="270"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title" style="font-size:17px;">{{$sipd->name}}</p>
										<p class="single-item-price">
											@if($sipd->promotion_price!=0)
												<span class="flash-del">{{number_format($sipd->unit_price)}}Đ</span>
												<span class="flash-sale">{{number_format($sipd->promotion_price)}}Đ</span>
												
											@else
											<span>{{number_format($sipd->unit_price)}}Đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
		
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection