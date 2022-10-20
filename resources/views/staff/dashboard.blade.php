@extends('template.master')

@section('css')


@endsection

@section('content')

<h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>

<div class="row">
    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Events</h5>
                <div
                    class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                    <i class="mdi mdi-cube icon-md absolute-center text-dark" style="top:45%;"></i></div>
                <p class="mt-4 mb-0">Total</p>
                <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$event}}</h3>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Tikets</h5>
                <div
                    class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent">
                    <i class="mdi mdi-ticket icon-md absolute-center text-dark" style="top:45%;"></i></div>
                <p class="mt-4 mb-0">Total</p>
                <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$tiket}}</h3>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="mb-2 text-dark font-weight-normal">Terjual</h5>
                <div
                    class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                    <i class="mdi mdi-ticket icon-md absolute-center text-dark" style="top:45%;"></i></div>
                <p class="mt-4 mb-0">Total</p>
                <h3 class="mb-0 font-weight-bold mt-2 text-dark">{{$terjual}}</h3>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')


<!-- <script src="{{asset('public/template/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('public/template/assets/js/misc.js')}}"></script> -->
<script src="{{asset('public/template/assets/vendors/jquery-circle-progress/js/circle-progress.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/dashboard2.js')}}"></script>

<script>

</script>

@endsection