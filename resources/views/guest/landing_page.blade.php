@extends('template-landingpage.master')

@section('css')
<style>
    .nice-select {
        display: none !important;
    }

    .single-product {
        margin-bottom: 20px;
    }

    .owl-carousel .owl-item .banner-img img {
        height: 441px;
    }

    .owl-carousel .owl-item img.produk-img, .single-product img.produk-img {
        height: 253px;
    }

	.title_confirmation {
		text-align: center;
		color: #28d500;
		font-size: 18px;
		margin-top: -50px;
		margin-bottom: 20px;
	}

	.title_notfound {
		text-align: center;
		color: red;
		font-size: 18px;
		margin-top: -50px;
		margin-bottom: 20px;
	}


    @media (max-width: 768px) {
        .owl-carousel .owl-item img.produk-img, .single-product img.produk-img  {
            height: 153px;
        }
    }
</style>
@endsection

@section('content')


<!-- start banner Area -->
<section class="banner-area"
    style="background : url({{asset('public/karma-master/img/banner/banner-bg.jpg')}}) center no-repeat;">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Tiket Event !<br>Tekadu</h1>
                                <p>Ada berbagai pilihan event dengan harga spesial, lho. Jangan sampai kehabisan ya.</p>


                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img banner-img">
                                <img class="img-fluid" src="{{asset('public/image/bg-konser.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single-slide -->
                    <div class="row single-slide">
                        <div class="col-lg-5">
                            <div class="banner-content">
                                <h1>Tiket Event !<br>Tekadu</h1>

                                <p>Ada berbagai pilihan event dengan harga spesial, lho. Jangan sampai kehabisan ya.</p>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img banner-img">
                                <img class="img-fluid" src="{{asset('public/image/bg-konser.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container px-2 cd-search">
        <div class="card">
            <div class="card-body">
                <form action="{{url('')}}" method="get">
                    <div class="row mt-4 mb-4">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Cari Event</label>
                                <input type="search" placeholder="Cari..." name="nama_event" value="{{request()->get('nama_event')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Kategori Event</label>
                                <select name="kategori_event" id="" class="form-control d-block">
                                    <option value="">Semua</option>
                                    @foreach($kategori as $kateg)
                                    <option value="{{$kateg->kategori_event}}" {{request()->get('kategori_event') == $kateg->kategori_event ? 'selected' : '' }} >{{$kateg->kategori_event}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal Event</label>
                                <input type="date" name="tanggal_event" value="{{request()->get('tanggal_event')}}"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for=""></label>
                            <button type="submit" class="btn btn-primary form-control">Cari</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->

@if($cari)

<h3 class="title_confirmation">{{$cari}}</h3>

<section class="lattest-product-area pb-40 category-list">
    <div class="container">
        <div class="row">
            <!-- single product -->

			@if($events->isEmpty())
				<div class="col-md-12">
				<h3 class="title_notfound mt-5">Tidak Ditemukan...</h3>
				</div>
			@endif

			@foreach($events as $event)
                @if(!$event->jenis_ticket->isEmpty())

                <!-- single product -->
                <div class="col-lg-3 col-md-6 col-6">
                    <a href="{{url('pesanticket/'.$event->id)}}">
                        <div class="single-product  border card">
                            <img class="img-fluid produk-img"
                                src="{{asset('public/image/banner_event/'.$event->foto_event[0]->foto_event)}}" alt="">
                            <div class="product-details px-2">
                                <h6> {{$event->nama_event}} </h6>
                                <div class="price">
                                    <h6
                                        class="@if($event->bentuk_kegiatan == 'offline') bg-success @elseif($event->bentuk_kegiatan == 'online') bg-primary @else bg-warning @endif text-white">
                                        {{$event->bentuk_kegiatan}}</h6>
                                    <h6 class="l-through">{{$event->tanggal_mulai->format('d/m/Y')}}</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="{{url('pesanticket/'.$event->id)}}" class="social-info">
                                        <span class="ti-ticket"></span>
                                        <p class="hover-text">Beli Ticket</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @endif
                @endforeach

        </div>
    </div>
</section>

@else

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Events</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($events as $event)
                @if(!$event->jenis_ticket->isEmpty())

                <!-- single product -->
                <div class="col-lg-3 col-md-6 col-6">
                    <a href="{{url('pesanticket/'.$event->id)}}">
                        <div class="single-product  border card">
                            <img class="img-fluid produk-img"
                                src="{{asset('public/image/banner_event/'.$event->foto_event[0]->foto_event)}}" alt="">
                            <div class="product-details px-2">
                                <h6> {{$event->nama_event}} </h6>
                                <div class="price">
                                    <h6
                                        class="@if($event->bentuk_kegiatan == 'offline') bg-success @elseif($event->bentuk_kegiatan == 'online') bg-primary @else bg-warning @endif text-white">
                                        {{$event->bentuk_kegiatan}}</h6>
                                    <h6 class="l-through">{{$event->tanggal_mulai->format('d/m/Y')}}</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="{{url('pesanticket/'.$event->id)}}" class="social-info">
                                        <span class="ti-ticket"></span>
                                        <p class="hover-text">Beli Ticket</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @endif
                @endforeach

            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Coming Event</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($events as $event)
                @if(!$event->jenis_ticket->isEmpty())

                <!-- single product -->
                <div class="col-lg-3 col-md-6 col-6">
                    <a href="{{url('pesanticket/'.$event->id)}}">
                        <div class="single-product  border card">
                            <img class="img-fluid produk-img"
                                src="{{asset('public/image/banner_event/'.$event->foto_event[0]->foto_event)}}" alt="">
                            <div class="product-details px-2">
                                <h6> {{$event->nama_event}} </h6>
                                <div class="price">
                                    <h6
                                        class="@if($event->bentuk_kegiatan == 'offline') bg-success @elseif($event->bentuk_kegiatan == 'online') bg-primary @else bg-warning @endif text-white">
                                        {{$event->bentuk_kegiatan}}</h6>
                                    <h6 class="l-through">{{$event->tanggal_mulai->format('d/m/Y')}}</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="{{url('pesanticket/'.$event->id)}}" class="social-info">
                                        <span class="ti-ticket"></span>
                                        <p class="hover-text">Beli Ticket</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->

@endif




<!-- Start exclusive deal Area -->
<!-- <section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 no-padding exclusive-left" style="background: url({{asset('public/image/test_konser.jpeg')}}) no-repeat center; background-size : cover;">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Exclusive Hot Deal Ends Soon!</h1>
							<p>Who are in extremely love with eco friendly system.</p>
						</div>
					
					</div>
				</div>
				<div class="col-lg-6 no-padding exclusive-right">
				<h4>addidas New Hammer sole
									for Sports person</h4>
				
				</div>
			</div>
		</div>
	</section> -->
<!-- End exclusive deal Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>
<!-- End brand Area -->


@endsection