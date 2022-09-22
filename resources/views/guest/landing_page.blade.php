@extends('template-landingpage.master')

@section('content')

	<!-- Slider -->

	<div class="main_slider animate__animated animate__zoomInDown" style="background-image:url({{asset('public/image/bg-tekadu-3.jpg')}})" id="home">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6 class="text-white">Tekadu / Beli Tiket Event dengan Mudah</h6>
						<h1 class="text-white">Get up to 30% Off New Arrivals</h1>
						<div class="red_button shop_now_button"><a href="#ticket">Pesan Tiket</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- New Arrivals -->

	<div class="new_arrivals animate__animated animate__zoomInDown" id="ticket">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Tiket</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".konser">konser</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".workshop">workshop</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".acara">acara</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->

						<div class="product-item konser">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="{{asset('public/image/test_konser.jpeg')}}" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>20% Off</span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="#">Tiket Konser Iwan Fals</a></h6>
									<div class="product_price">Rp. 20.000<span>Rp. 35.000</span></div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-ticket" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>pesan tiket</h6>
							<p>Pilih tiket dan isi Form Pemesanan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>konfirmasi pembayaran</h6>
							<p>Periksa Email untuk konfirmasi pembayaran</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-barcode" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>barcode</h6>
							<p>Link Barcode dikirim melalui email setelah pembayaran selesai</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>opening all day</h6>
							<p>24 Hours</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blogs -->

	<div class="blogs">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">
						<h2>Latest Blogs</h2>
					</div>
				</div>
			</div>
			<div class="row blogs_container">
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(images/blog_1.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url(images/blog_2.jpg)"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 blog_item_col">
					<div class="blog_item">
						<div class="blog_background" style="background-image:url({{asset('public/coloshop/images/blog_3.jpg')}})"></div>
						<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
							<h4 class="blog_title">Here are the trends I see coming this fall</h4>
							<span class="blog_meta">by admin | dec 01, 2017</span>
							<a class="blog_more" href="#">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection