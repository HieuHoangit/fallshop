@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title" style="font-size: 30px;">{{$namepd->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span style=" color:#0277b8">{{$namepd->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($list_Type as $list)
							<li><a href="{{route('loaisanpham',$list->id)}}">{{$list->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm đang có:</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy:&nbsp;{{count($pd_types)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach ($pd_types as $pd)
								<div class="col-sm-4">
									<div class="single-item">
										@if($pd->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('sanpham',$pd->id)}}"><img src="source/image/product/{{$pd->image}}" alt=""width="320px" height="270"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pd->name}}</p>
											<p class="single-item-price">											
											@if($pd->promotion_price!=0)
												<span class="flash-del">{{number_format($pd->unit_price)}}Đ</span>
												<span class="flash-sale">{{number_format($pd->promotion_price)}}Đ</span>
												
											@else
											<span>{{number_format($pd->unit_price)}}Đ</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{Route('themgiohang',$pd->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('sanpham',$pd->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4 style="margin-bottom: 25px; margin-top: 100px;">Sản phẩm đang hot</h4>
							
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($top_pd as $tpd)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{$tpd->image}}" alt=""width="320px" height="270"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$tpd->name}}</p>
											<p class="single-item-price" style="font-size:18px">
												@if($tpd->promotion_price!=0)
												<span class="flash-del">{{number_format($tpd->unit_price)}}Đ</span>
												<span class="flash-sale">{{number_format($tpd->promotion_price)}}Đ</span>
												
											@else
											<span>{{number_format($tpd->unit_price)}}Đ</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{Route('themgiohang',$tpd->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection