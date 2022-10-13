<!-- plugins:js -->
<script src="{{asset('public/template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('public/template/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/template/assets/vendors/jquery-circle-progress/js/circle-progress.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('public/template/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('public/template/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('public/template/assets/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- <script src="{{asset('public/template/assets/js/dashboard.js')}}"></script> -->
<!-- End custom js for this page -->


<script src="{{asset('public/template/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/jquery.notify.js')}}"></script>
<script src="{{asset('public/template/assets/clockpicker/src/clockpicker.js')}}"></script>
<script src="{{asset('public/template/assets/js/html5qrcode.js')}}" type="text/javascript"></script>

<script src="{{asset('public/template/assets/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/template/assets/datepicker/locales/bootstrap-datepicker.id.min.js')}}"></script>

<script src="{{asset('public/template/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('public/template/assets/js/axios.min.js')}}"></script>

@if(session()-> has('success'))
    <script>
        $.notify({
            title: '<i  class="mdi  mdi mdi-check text-success"> Success </i>',
            content: '{{session()->get("success")}}',
            timeout: 3000,
        });
    </script>
@elseif(session()-> has('failed'))
    <script>
        $.notify({
            title: '<i  class="mdi mdi mdi-window-close text-danger"> Failed </i>',
            content: '{{session()->get("failed")}}',
            timeout: 3000,
        });
    </script>
@endif


<script>

$(document).ready(()=>{
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
})

function validateForm(el){
    let form = el
    $(el).find(".is-invalid").removeClass("is-invalid")
    if($(form)[0].checkValidity()){
        $(form).submit()
    }else{
        $(form+" :invalid").each(function(i, obj) {
            $(obj).addClass("is-invalid")
        });
        $(form+" :invalid").first().focus()
    }
}

function resetvalidateForm(el){
    let form = el
    $(el).find(".is-invalid").removeClass("is-invalid")
    $(el).find("input:not([type='hidden'])").val("")
    $(el).find("textarea").val("")
}

</script>

@yield('js')