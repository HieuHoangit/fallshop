@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Liên hệ, góp ý</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.736468488049!2d108.2512875147148!3d15.975132788939106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1638735537966!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-4">
					<h2>thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						470 Đường Trần Đại Nghĩa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng<br>
						
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Yêu cầu hợp tác</h6>
					<p>
						Nếu bạn góp ý hay thắc mắc liên hệ gmail 
						<a href="https://mail.google.com/mail/u/0/#inbox">hdhieu.20it3@vku.udn.vn</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Ứng tuyển</h6>
					<p>
						Khi có thông báo tuyển nhân viên các bạn liên hệ <br>
						theo email <br>
						<a href="https://mail.google.com/mail/u/0/#inbox">hdhieu.20it3@vku.udn.vn</a>
					</p>
				</div>
				<div class="col-sm-8">
					<h2>Gửi góp ý cho chúng tôi tại đây</h2>
					<div class="space20">&nbsp;</div>
					<p>Mọi thắc mắc, góp ý xin hãy gửi đến chúng tôi để có thể được hỗ trợ nhanh nhất.</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên của bạn (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Email (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="chủ đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="tin nhắn"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi tin nhắn<i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection