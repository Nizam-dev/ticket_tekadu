@extends('template.master')

@section('css')
<style>
        #reader__dashboard_section_swaplink{
            display: none !important;
        }
	canvas.drawing, canvas.drawingBuffer {
            position: absolute;
            left: 0;
            top: 0;
        }
        #reader__dashboard_section_csr button{
            background: #ffad46 !important;
            border-color: #ffad46 !important;
            color: #fff !important;
            font-size: 11px;
            padding: 7px 13px;
            opacity: 1;
            border-radius: 3px;
            border-style: none;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

<div class="row animate__fadeInDown">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <input type="text" id="hass" class="d-none">
            <div id="reader" width="600px"></div>
        </div>
    </div>
</div>

@endsection

@section('js')

@if(session()-> has('success'))
    <script>
        $.notify({
            title: '<i  class="mdi  mdi mdi-check text-success"> Success </i>',
            content: 'Berhasil ditambahkan',
            timeout: 3000,
        });
    </script>
@endif

<script>

// Start scan
var html5QrcodeScanner = new Html5QrcodeScanner(
	"reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);

// Ketika scan berhasil
async function onScanSuccess(decodedText, decodedResult) {
    $("#hass").val(decodedText)
    // $("#reader__dashboard_section_csr button:nth-child(2)").click()
    await absen(decodedText)
    html5QrcodeScanner.pause()
    setTimeout(() => {  html5QrcodeScanner.resume() }, 2000);
}



async function absen(nid) {
    $("#hass").prop('disabled', true);
    $("#hass").prop('disabled', false);
    $.notify({
        title: '<i  class="mdi  mdi mdi-check text-success"> Success </i>',
        content: 'Ticket berhasil',
        timeout: 2000,
    });
    playAudioSuccess()
}

function playAudioSuccess() {
  var audio = new Audio('{{asset("public/audio/success.wav")}}');
  audio.play();
}

function playAudioFailed() {
  var audio = new Audio('{{asset("public/audio/failed.wav")}}');
  audio.play();
}

</script>

@endsection