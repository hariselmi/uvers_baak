@include('landing.head_no_slider')
<!-- Content -->
<div class="section section-contents section-pad">
	<!-- Content -->
	<div class="section section-contents section-pad bg-light">
		<div class="container">
			{{-- {!!Get_field::get_data('1', 'pages', 'content')!!} --}}

			
			@foreach($articles_kemahasiswaan as $index=>$value) 

			<div class="post post-boxed col-sm-4 res-s-bttm-lg mt-x2">
				<div class="post-thumbs">
					<a href="/articles_details/{{$value->id}}"><img alt="" src="{{asset('images/article')}}/{!!$value->thumbnail!!}"></a>
					<div class="post-meta"><span class="pub-date"><strong>{{date('d',strtotime($value->date))}}</strong> {{date('m',strtotime($value->date))}}</span></div>
				</div>
				<div class="post-entry">
					<h3><a href="/articles_details/{{$value->id}}">{!!$value->title!!}</a></h3>




					{{-- <p class="alignjustify">{!!$value->content!!}</p> --}}
					<a class="btn-link link-arrow-sm" href="/articles_details/{{$value->id}}">Read More</a>
				</div>
			</div>

			  @endforeach

		</div>
	</div>
	
	<!-- End Content -->
</div>
@include('landing.foot')