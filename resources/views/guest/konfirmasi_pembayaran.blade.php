@extends('template-landingpage.master')

@section('css')
<style>
    .nice-select {
        display: none !important;
    }
	.cont-image{
		border-style: dotted;
	}

	.cont-image i{
		font-size : 40px;
		cursor: pointer;
		color : rgb(255, 186, 0);
	}
	.cont-image img{
		cursor: pointer;
	}
</style>
@endsection
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Konfirmasi Pembayaran</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{url('')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Konfirmasi Pembayaran</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
		@if($transaksi->status_pembayaran == "pembayaran")
		<h3 class="title_confirmation mb-0">Pembayaran anda sedang dalam pengecekan admin.</h3>
		<h3 class="title_confirmation mt-0">Tiket akan dikirim ke email anda setelah proses pengecekan.</h3>
		@endif
        <div class="row order_d_inner">
            <div class="col-lg-12">
                <div class="details_item">
                    <h4>Informasi Pemesan</h4>
                    <ul class="list">
                        <li><a href="#"><span>Nama</span> : {{$customer->nama}}</a></li>
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
                                <p>@currency($transaksi->total_pembayaran / $transaksi->total_ticket)</p>
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

    @if($transaksi->status_pembayaran == "belum bayar" || $transaksi->status_pembayaran == "pembayaran ditolak")
	<div class="container">
        <div class="card">
            <div class="card-body">
				<p>Silahkan lakukan pembayaran ke nomor rekening di bawah ini dan silahkan unggah pembayaran !</p>
                <form action="{{url('konfirmasipembayaran/'.$transaksi->kode_transaksi)}}" enctype="multipart/form-data" method="post">
					@csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Nama Bank</label>

                        </div>
                        <div class="col-md-8">
                            <select name="nama_bank" id="" class="form-control d-block">
                                <option value="BNI">Bni</option>
                            </select>
                        </div>
                    </div>

					<div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Nomor Rekening</label>

                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" style="background: white;border-style: dotted;" readonly name="no_rekening" value="554 144 414">
                        </div>
                    </div>

					<div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Atas Nama</label>

                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" style="background: white;border-style: dotted;" readonly name="atas_nama" value="Sdr Khoirun Nizam">
                        </div>
                    </div>


					<div class="form-group row">
                        <div class="col-md-4">
                            <label for="">Unggah Bukti Pembayaran</label>

                        </div>
                        <div class="col-md-8">
							<div class="w-100 cont-image">
									<input required type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" onchange="readURL(this)"class="d-none" >
									<i class="fa fa-upload text-center d-block mt-4 mb-4"></i>
									<img src=""
									class="d-none mx-auto mt-2 mb-2" style="width:350px;" alt="">
							</div>
                        </div>
                    </div>

					<button type="submit" class="btn btn-primary float-right">Unggah Pembayaran</button>


                </form>
            </div>
        </div>
    </div>
	@endif

</section>
<!--================End Order Details Area =================-->


@endsection

@section('js')

<script>
	$(".cont-image i, .cont-image img").on("click",()=>{
		$("[name='bukti_pembayaran']").click();
	})



	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

			$(".cont-image i").removeClass('d-block').addClass('d-none')
			$(".cont-image img").removeClass('d-none').addClass('d-block')
            reader.onload = function (e) {
                $(".cont-image img").attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection