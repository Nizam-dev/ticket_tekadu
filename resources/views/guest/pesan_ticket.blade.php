@extends('template-landingpage.master')

@section('css')

<link href="{{asset('public/karma-master/css/select2.min.css')}}" rel="stylesheet" />
<style>
    .jenis_container input[type='radio'] {
        display: none;
    }

    .jenis_container label {
        position: relative;
        color: #01cc65;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        border: 2px solid #01cc65;
        border-radius: 5px;
        padding: 2px 5px;
        display: flex;
        align-items: center;
        cursor: pointer;

    }


    .jenis_container label:before {
        content: '';
        height: 10px;
        width: 10px;
        border: 1px solid #01cc65;
        border-radius: 50%;
        margin-right: 20px;
        cursor: pointer;

    }

    .jenis_container input[type='radio']:checked+label {
        background-color: #01cc65;
        color: white;
    }

    .jenis_container input[type='radio']:checked+label:before {
        height: 10px;
        width: 10px;
        border: 1px solid white;
        background-color: #01cc65;
    }

    .s_product_text p {
        margin-bottom: 5px;
    }

    .nice-select {
        display: none !important;
    }

    select {
        display: block !important;
    }

    .select2 {
        width: 100% !important;
    }
</style>

@endsection

@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Event Details</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{url('')}}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Event Details</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">

                    @foreach($event->foto_event as $foto)
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{asset('public/image/banner_event/'.$foto->foto_event)}}" alt="">
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{$event->nama_event}}</h3>
                    <h2 class="harga_ticket">-</h2>
                    <ul class="list">
                        <li><a href="#"><span>Sisa Tiket</span> &nbsp &nbsp : <span id="sisa_ticket">0</span></a></li>
                        <li><a href="#"><span>Bentuk_Kegiatan</span> &nbsp &nbsp : {{$event->bentuk_kegiatan}}</a></li>
                        <li><a href="#"><span>Kategori Event</span> &nbsp &nbsp : {{$event->kategori_event}}</a></li>
                        <li><a href="#"><span>Type Event</span> &nbsp &nbsp : {{$event->type_event}}</a></li>
                    </ul>


                    <div class="jenis_container row mb-2 mt-3">

                        @foreach($event->jenis_ticket as $jt => $jenis)
                        <div class="col-md-3 mb-1">
                            <input type="radio" {{$jt == 0 ? 'checked':''}} name="jenis" value="{{$jenis->id}}"
                                onChange="gantiHarga(this)" harga="@currency($jenis->harga)" sisa="{{$jenis->jumlah}}" id="jt-{{$jt}}">
                            <label for="jt-{{$jt}}">{{$jenis->jenis_ticket}}</label>
                        </div>
                        @endforeach

                    </div>


                    <p>{{$event->deskripsi}}.</p>


                    <div class="card_area d-flex align-items-center">
                        <button type="button" class="primary-btn" onclick="pesanTiket()" style="border:none;"> <i
                                class="ti ti-ticket"></i> Beli Tiket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Jadwal</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false">Lokasi</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    {{$event->deskripsi}}
                </p>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Tanggal</h5>
                                </td>
                                <td>
                                    <h5> {{$event->tanggal_mulai->format('d-m-Y')}} sd
                                        {{$event->tanggal_berakhir->format('d-m-Y')}} </h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Jam</h5>
                                </td>
                                <td>
                                    <h5>{{$event->jam_mulai}} sd {{$event->jam_berakhir}}</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total_rate">
                            <div id='map' style='width: 100%; height: 400px;'
                                class="{{$event->latitude === null ? 'd-none' : '' }}"></div>
                        </div>
                        <div class="review_list">

                            <a target="_blank"
                                href="https://www.google.com/maps/search/?api=1&query={{$event->latitude.','.$event->longitude}}">Buka
                                di aplikasi</a>

                            <p>
                                {{$event->lokasi}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

<!-- Modal -->
<div class="modal fade fade" id="md-pesan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('pesanticket/'.$event->id)}}" method="post">

                <div class="modal-body">
                    @csrf
                    <input type="text" class="d-none" name="jenis_ticket" value="{{ $event->jenis_ticket[0]->id }}">

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="">No Whatsapp</label>
                        <input type="text" class="form-control" name="no_hp" required>
                    </div>



                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="provinsi" id="" class="form-control select2">
                            <option disabled selected>Pilih Provinsi</option>
                            @foreach($provinsi as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Kota</label>
                        <select name="kota" id="" class="form-control select2" disabled>
                            <option disabled selected>Pilih Kota</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>

                    <hr />

                    <div class="form-group">
                        <label for="">Jumlah Tiket yang dipesan</label>
                        <input type="number" name="total_ticket" class="form-control" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pesan</button>
                </div>
            </form>

        </div>
    </div>
</div>



@endsection

@section('js')
<script src="{{asset('public/karma-master/js/select2.min.js')}}"></script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkdyai5-p_kXTroX-gSz_mz-xeQ8Ht1iY&callback=initialize"
    type="text/javascript"></script>

<script>
    $(document).ready(() => {
        let harga = $("[name='jenis']:checked").attr('harga')
        let sisa_tiket = $("[name='jenis']:checked").attr('sisa')
        $(".harga_ticket").html(harga)
        $("#sisa_ticket").html(sisa_tiket)
        $("[name='provinsi']").select2({
            dropdownParent: $("#md-pesan .modal-content")
        })
        $("[name='kota']").select2({
            dropdownParent: $("#md-pesan .modal-content")
        })
    })

    function gantiHarga(el) {
        $(".harga_ticket").html(`${$(el).attr('harga')}`)
        $('[name="jenis_ticket"]').val($(el).val())
        $("#sisa_ticket").html(`${$(el).attr('sisa')}`)

    }

    function pesanTiket() {
        $("#md-pesan").modal('show')
    }

    $("[name='provinsi']").on('change', () => {
        let provinsi = $("[name='provinsi']").val()
        axios.get(`{{url('getkota')}}/${provinsi}`)
            .then(res => {
                $("[name='kota']").empty()
                $("[name='kota']").prop('disabled', false)
                res.data.forEach((kota) => {
                    $("[name='kota']").append(`
					<option value="${kota.name}" >${kota.name}</option>
				`)
                })
            })
    })


    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-8.648782419411326, 116.32478714990327),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);

        var marker = new google.maps.Marker({
            map: peta,
            position: new google.maps.LatLng(-8.648782419411326, 116.32478714990327)
        });


    }
</script>
@endsection