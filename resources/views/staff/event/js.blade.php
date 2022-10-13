
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkdyai5-p_kXTroX-gSz_mz-xeQ8Ht1iY&callback=initialize"
        type="text/javascript"></script>

<script>
var marker, marker2, peta, peta2;

function initialize() {
    var propertiPeta = {
      center: new google.maps.LatLng(-8.648782419411326, 116.32478714990327),
      zoom: 12,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };
  
    peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
    peta2 = new google.maps.Map(document.getElementById("map2"), propertiPeta);
  
    google.maps.event.addListener(peta, 'click', function(event) {
      taruhMarker(event.latLng);
    });

    google.maps.event.addListener(peta2, 'click', function(event) {
      taruhMarker2(event.latLng);
    });
  
  
    marker = new google.maps.Marker({
          map: peta
        });

    marker2 = new google.maps.Marker({
      map: peta2
    });
  
  
  }


  function taruhMarker(posisiTitik){
      marker.setPosition(posisiTitik);
      $("#tambahform input[name='latitude']").val(posisiTitik.lat())
      $("#tambahform input[name='longitude']").val(posisiTitik.lng())
      
  }

  function taruhMarker2(posisiTitik){
      marker2.setPosition(posisiTitik);
      $("#ubahform input[name='latitude']").val(posisiTitik.lat())
      $("#ubahform input[name='longitude']").val(posisiTitik.lng())
      
  }
  
  

</script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();

        $('.clockpicker').clockpicker();

    });

    $("#btn-tambah").on('click', () => {
        $("#v-tambah").removeClass('d-none')
        $("#v-index").addClass('d-none')
        marker.setPosition(null)
        resetvalidateForm("#tambahform")
    })

    $(".btn-close-tambah").on('click', () => {
        $("#v-index").removeClass('d-none')
        $("#v-tambah").addClass('d-none')
        $("#v-edit").addClass('d-none')
    })

    function edit(event,tgl_mulai,tgl_berakhir) {
        $("#v-index").addClass('d-none')
        $("#v-edit").removeClass('d-none')
        resetvalidateForm("#ubahform")
        $("#ubahform").attr('action',`{{url("eventmanagement")}}/${event.id}`)
        $("#ubahform [name='nama_event']").val(event.nama_event)
        $("#ubahform [name='type_event']").val(event.type_event)
        $("#ubahform [name='deskripsi']").val(event.deskripsi)
        $("#ubahform [name='tanggal_mulai']").val(tgl_mulai)
        $("#ubahform [name='tanggal_berakhir']").val(tgl_berakhir)
        $("#ubahform [name='jam_mulai']").val(event.jam_mulai.substring(0, 5))
        $("#ubahform [name='jam_berakhir']").val(event.jam_berakhir.substring(0, 5))
        $("#ubahform [name='lokasi']").val(event.lokasi)
        $("#ubahform [name='bentuk_kegiatan']").val(event.bentuk_kegiatan)
        let kategori_event = event.kategori_event.split(",")
        $("#ubahform [name='kategori_event[]']").selectpicker('val',[])
        $("#ubahform [name='kategori_event[]']").selectpicker('val',kategori_event)
        marker2.setPosition(null)
        if(event.latitude != null){
          marker2.setPosition(new google.maps.LatLng(event.latitude, event.longitude))
          peta2.setCenter(new google.maps.LatLng(event.latitude, event.longitude))
          peta2.setZoom(17)
        }
        
        $("#ubahform [name='latitude']").val(event.latitude)
        $("#ubahform [name='longitude']").val(event.longitude)

        $(".edit-banner-container").empty()
        event.foto_event.forEach(foto =>{
          $(".edit-banner-container").append(`
            <div class="card bn-im mb-1 border col-md-6" style="width: 18rem;">
              <div class="card-header bg-white mx-auto py-0 d-block">
                  <button type="button" onClick="hapusFoto(this,'${foto.id}')" class="btn btn-danger mx-auto"><i class="fa fa-trash"></i> Hapus</button>
              </div>
              <img class="card-img-top mx-auto" src="{{asset('public/image/banner_event')}}/${foto.foto_event}"
                  alt="Card image cap">

            </div>
          `)
          
        })


       

    }

    function tambah_event_baru() {
        validateForm("#tambahform")
    }

    function update_event() {
        validateForm("#ubahform")
    }

    function tambahkan_gambar(el) {
        $(el).parent().parent().parent().find(".banner_all").append(`
                <div class="row col-sm-12">
                    <div class="col-sm-9">
                        <input type="file" name="banner_event[]" class="form-control" accept="image/*" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-sm btn-danger" onClick="kurangi_gambar(this)">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
        `)
    }

    function kurangi_gambar(el) {
        $(el).parent().parent().remove()
    }

    let el_foto;
    let id_foto_hapus;
    function hapusFoto(el,id_foto) {
      el_foto = $(el).parent().parent()
      id_foto_hapus = id_foto;
      $("#md-hapusBanner").modal('show')
    }

    $("#md-hapusBanner .btn-hapus-gambar").on('click',async ()=>{
        $(el_foto).remove()
        $("#md-hapusBanner").modal('hide')
        let url_hapus = `{{url('hapusfotobanner')}}/${id_foto_hapus}`
        axios(url_hapus).then(res=>{

          $.notify({
            title: '<i  class="mdi  mdi mdi-check text-success"> Success </i>',
            content: `${res.data.success}`,
            timeout: 3000,
          });
          
        })
    });

   




</script>
