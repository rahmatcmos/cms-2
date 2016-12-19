@extends('theme.bptheme1.layouts.app')

@section('content')
<section class="slider has-pattern main_bg">
<div class="container">
	<div>
		<div class="col-md-7 slidercontent">
			<div class="overview">
				<h2 class="title animated fadeInUp delayp1" >Beyond Plus CMS</h2>
				<h5> Innovation Means Never Stop Learning </h5>
				<ul class="summary animated fadeInUp delayp2" style="opacity: 0;">
					<li><i class="fa fa-paint-brush"></i> Creative Web Design</li>
					<li><i class="fa fa-pencil"></i> PHP Web Development </li>
					<li><i class="fa fa-rocket"></i> Java SE Development</li>
					<li><i class="fa fa-android"></i> Android Development</li>
				</ul>
				<p>* Trust our service</p>
				<div class="button fadeInUp delayp2">
					<a href="http://www.beyondplus.net/service" class="btn btn-primary"><i class="fa fa-desktop"></i> Our Service </a>
					<a href="http://www.beyondplus.net/about-us" class="btn btn-success"><i class="fa fa-desktop"></i> About Us </a>
				</div>
			</div>
		</div>

		<div class="col-md-5">
			<div class="homeimage">
				<img src="{{ asset("/public/assets/bptheme1/img/homeimage.png") }}" alt="Home Image" class="img-responsive" />
				<p></p>
			</div>
		</div>
	</div>
</div>

</section>

	<div class="col-md-12">
		@foreach (posts(10) as $post)
     		<div class="col-md-4">
      			<a href="{{url('/detail/'.$post->post_link) }}" name="" ><h2>{{ $post->title }}</h2></a>
      			@if($post->featured_img != '')
      				<img src="{{ url('/public/uploads/'.$post->featured_img)}}" class="img-responsive" />
      			@else
    			<p>{{  $post->body }}</p>
    			@endif
      		</div>
    	@endforeach
    </div>


	<div class="col-md-12 main_goal">
		<div class="col-md-1"></div>
		<div class="col-md-10 listcontainer">
				<div class="col-md-12">
					<h2>Our Goal</h2>
					<hr>
					Today is Globalization so Marketing Strategies are changing to Digital World.
					 Market places are also moving forward to Digital World.
		        </div>
	  </div>
	  <div class="col-md-1"></div>
	</div>

@stop

