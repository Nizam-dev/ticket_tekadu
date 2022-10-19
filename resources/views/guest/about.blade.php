@extends('template-landingpage.master')

@section('css')

@endsection

@section('content')

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>About</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">About</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid mx-auto d-block" src="{{asset('public/image/bg-konser.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">Event,</a>
                                    <a href="#">Business</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li><a href="#">Mustamar<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#">12 Dec, 2022<i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="#">Lombok<i class="lnr lnr-map"></i></a></li>
                                    <li><a href="#">62 811 0000 0000<i class="lnr lnr-phone"></i></a></li>
                                </ul>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>Tiket Tekadu Lombok</h2>
                            <p class="excert">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction.
                            </p>
                            <p>
                                Boot camps have its supporters and its detractors. Some people do not understand why
                                you should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a fraction of the camp price. However, who has the willpower to actually
                                sit through a self-imposed MCSE training. who has the willpower to actually sit through
                                a self-imposed
                            </p>
                            <p>
                                Boot camps have its supporters and its detractors. Some people do not understand why
                                you should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a fraction of the camp price. However, who has the willpower to actually
                                sit through a self-imposed MCSE training. who has the willpower to actually sit through
                                a self-imposed
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="quotes">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction of the camp price. However, who has the willpower to
                                actually sit through a self-imposed MCSE training.
                            </div>
                            
                        </div>
                    </div>

                </div>
               
            </div>
        </div>
    </section>


@endsection

@section('js')

@endsection
