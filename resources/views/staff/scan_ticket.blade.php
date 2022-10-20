@extends('template.master')

@section('css')
<style>
    #reader__dashboard_section_swaplink {
        display: none !important;
    }

    canvas.drawing,
    canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 0;
    }

    #reader__dashboard_section_csr button {
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

<div class="page-header">
    <a href="{{url('scanticket')}}"> <i class="mdi mdi-arrow-left-bold "></i> Back</a>
</div>

<div class="row animate__fadeInDown">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <input type="text" id="hass" class="d-none">
            <div id="reader" width="600px"></div>
        </div>
    </div>
</div>

<div class="col-md-8 mx-auto mt-2">
        <div class="border">
            <table class="table table-striped">
                <tbody class="container_status">
                    <!-- <tr>
                        <td> Herman Beck </td>
                        <td> <label class="badge badge-success">Completed</label> </td>
                    </tr>

                    <tr class="text-danger">
                        <td> Herman Beck </td>
                        <td> <label class="badge badge-danger">Not Found</label> </td>
                    </tr> -->

                </tbody>
            </table>
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
        "reader", {
            fps: 10,
            qrbox: 250
        });
    html5QrcodeScanner.render(onScanSuccess);

    // Ketika scan berhasil
    async function onScanSuccess(decodedText, decodedResult) {
        $("#hass").val(decodedText)
        // $("#reader__dashboard_section_csr button:nth-child(2)").click()
        await absen(decodedText)
        html5QrcodeScanner.pause()
        setTimeout(() => {
            html5QrcodeScanner.resume()
        }, 2000);
    }



    async function absen(nid) {
        $("#hass").prop('disabled', true);
        $("#hass").prop('disabled', false);
        await axios.patch("{{url('scanticket/'.$id)}}",{kode_ticket : nid})
        .then(res=>{

            let waktu = new Date(res.data.waktu)
            let tgl = `${waktu.getDate()}/${waktu.getMonth()}/${waktu.getFullYear()} ${waktu.getHours()}:${waktu.getMinutes()}:${waktu.getSeconds()}`

            if(res.data.status == 'success'){
                $.notify({
                    title: '<i  class="mdi  mdi mdi-check text-success"> Success </i>',
                    content: 'Ticket berhasil',
                    timeout: 2000,
                });
                $('.container_status').prepend(`
                    <tr>
                        <td> ${nid} </td>
                        <td> <label class="badge badge-success">Completed</label> </td>
                        <td> ${tgl} </td>
                    </tr>
                `)
                playAudioSuccess()
            }else{
                $.notify({
                    title: '<i  class="mdi  mdi mdi-window-close text-danger"> Failed </i>',
                    content: 'Ticket gagal',
                    timeout: 2000,
                });
                $('.container_status').prepend(`
                    <tr>
                        <td> ${nid} </td>
                        <td> <label class="badge badge-danger">Not Found</label> </td>
                        <td> ${tgl} </td>
                    </tr>

                `)
                playAudioFailed()
            }
        })
        
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