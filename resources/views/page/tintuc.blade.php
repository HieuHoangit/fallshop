@extends('master')
@section('content')
<main role="main">

     

      <div class="container">
    	@foreach($news as $new)
        <div class="row">
          <div class="col-md-4">
            <h3 style="margin-bottom:30px; margin-top:15px;  display: -webkit-box;
                            max-height: 7.0rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp:2;
                            line-height: 2.0rem; cursor:auto;"><b>{{$new->title}}</b></h3>
            <div class="single-item-header">
			<a href="{{route('tintuc')}}"><img src="source/image/news/{{$new->image}}" width="270px" height="285px"></a>
				</div>
            <p style="display: -webkit-box;
                            max-height: 6.5rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp:2;
                            line-height: 2.0rem margin-bottom 18px;">{{$new->content}} </p>
            <p><a class="btn btn-secondary" href="{{route('tintuc')}}" role="button" style="color:  #FF9900;">Xem thêm »</a></p>
          </div>

          @endforeach
         
        
        </div>

       
      </div> <!-- /container -->

    </main>
   <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
   	<script src="source/assets/js/vendor/popper.min.js"></script>
   	<script src="source/dist/js/bootstrap.min.js"></script>
   	<iframe id="nr-ext-rsicon" style="position: absolute; display: none; width: 50px; height: 50px; z-index: 2147483647; border-style: none; background: transparent;"></iframe>


@endsection