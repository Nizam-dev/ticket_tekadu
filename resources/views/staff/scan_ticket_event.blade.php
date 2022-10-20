@extends('template.master')

@section('css')

@endsection

@section('content')

<div class="page-header ml-0">
    Scan Tiket
</div>

<div class="row  animate__animated animate__backInRight animate__faster">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pilih Event</label>
            <div class="col-sm-9">
                <select name="" class="form-control" id="pilihtiket">
                    <option disabled selected>-- Pilih Event --</option>
                    @foreach($events as $event)
                        <option value="{{$event->id}}" scanned="{{$event->scan_tiket_count}}" jumlah="{{$event->tiket_count}}">{{$event->nama_event}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <a href="" class="btn btn-sm btn-success float-right scan_event">Pilih</a>
    </div>

    <div class="card col-md-12 mt-5 event_card d-none">
        <div class="card-body">

            <address>
                <p class="font-weight-bold">Event Blababa</p>
                <p> Jumlah Tiket &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <span>3</span> </p>
                <p> Tiket Scanned &nbsp&nbsp&nbsp&nbsp : <span>3</span>  </p>
                <p> Tiket Unscanned &nbsp:  <span>3</span>  </p>
            </address>

        </div>
    </div>

</div>

@endsection

@section('js')



<script>

$(document).ready(()=>{
    if($("#pilihtiket").val() != null){
        $(".scan_event").attr('href',`{{url('scanticket')}}/${$("#pilihtiket").val()}`)
    }
})

    $("#pilihtiket").on('change',()=>{
        let jumlah = $("#pilihtiket option:selected").attr("jumlah");
        let scanned = $("#pilihtiket option:selected").attr("scanned");
        let unscanned = jumlah - scanned;
        let event = $("#pilihtiket option:selected").text();

        $(".event_card p:nth-child(1)").html(event)
        $(".event_card p:nth-child(2) span").html(jumlah)
        $(".event_card p:nth-child(3) span").html(scanned)
        $(".event_card p:nth-child(4) span").html(unscanned)
        $(".event_card").removeClass('d-none')
        $(".scan_event").attr('href',`{{url('scanticket')}}/${$("#pilihtiket").val()}`)
    })
</script>



@endsection