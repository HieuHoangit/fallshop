@extends('master')
@section('content')

	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm </h4>
							<div class="beta-products-details">
								<p class="pull-left">tìm thấy &nbsp;{{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($new->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
										<a href="{{route('sanpham',$new->id)}}">	<img src="source/image/product/{{$new->image}}" width="320px" height="270"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
												@if($new->promotion_price==0)
												
												<span class="flash-sale">{{number_format($new->unit_price)}}Đ</span>
												@else
												<span class="flash-del">{{number_format($new->unit_price)}}</span>
												<span class="flash-sale">{{number_format($new->promotion_price)}}Đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{Route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
									
								</div>
								
									
							</div>
						</div> 

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> 
			</div>
		</div>


@endsection