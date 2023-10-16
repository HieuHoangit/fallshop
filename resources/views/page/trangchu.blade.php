@extends('master')
@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl )
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>
					


						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy &nbsp;{{count($new_products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_products as $new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($new->promotion_price!=0)
										<div class="ribbon-wrapper"><div style="z-index: 1;" class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
										<a href="{{route('sanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" width="320px" height="270px"></a>
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
											<a style="background: #808080;" class="add-to-cart pull-left" href="{{Route('themgiohang',$new->id)}}"><div class="giohang"></div><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
									
								</div>
								<div class="row">{{$new_products->links()}}</div>
									
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi:</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy &nbsp;{{count($sale_products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							
							@foreach($sale_products as $sale)
							<div class="row">
								<div class="col-sm-3"style="height: 470px;">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('sanpham',$sale->id)}}"><img src="source/image/product/{{$sale->image}}" alt=""width="320px" height="270px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sale->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($sale->unit_price)}}Đ</span>
												<span class="flash-sale">{{number_format($sale->promotion_price)}}Đ</span>
											</p>
										</div>
										<div class="single-item-caption" style="margin-bottom: 12px;">
											<a style="background: #808080;" class="add-to-cart pull-left" href="{{Route('themgiohang',$sale->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{Route('sanpham',$sale->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						
							<div class="row" style="margin-left: 100px;">{{$sale_products->links()}}</div>
							
						</div> 
					</div>
				</div> 
			</div>
		</div>


@endsection