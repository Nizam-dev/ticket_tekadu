@extends('template-landingpage.master')

@section('css')

@endsection

@section('content')

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Thank You From Order Ticket</h1>
					<nav class="d-flex align-items-center">
						<a href="{{url('')}}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Pembelian Ticket</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation mb-0">Termakasih Telah Melakukan Pemesanan Tiket.</h3>
			<h3 class="title_confirmation mt-0">Harap Periksa Email untuk melakukan pembayaran.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-12">
					<div class="details_item">
						<h4>Informasi Pemesan</h4>
						<ul class="list">
							<li><a href="#"><span>Nama</span> : {{$customer->nama}}</a></li>
							<li><a href="#"><span>NO Whatsapp</span> : {{$customer->no_hp}}</a></li>
							<li><a href="#"><span>Email</span> : {{$customer->email}}</a></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="order_details_table">
				<h2>Pesanan Tiket</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Event</th>
								<th scope="col">Jenis Tiket</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Harga</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p>{{App\Models\event::find($transaksi->event_id)->nama_event}}</p>
								</td>
                                <td>
									<p>{{$transaksi->jenis_ticket}}</p>
								</td>
								<td>
									<h5>x {{$transaksi->total_ticket}}</h5>
								</td>
								<td>
									<p>@currency($harga_ticket)</p>
								</td>
							</tr>
				
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
                                <td>
									<h5></h5>
								</td>
								<td>
									<p>@currency($transaksi->total_pembayaran)</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->


@endsection

@section('js')

@endsection
