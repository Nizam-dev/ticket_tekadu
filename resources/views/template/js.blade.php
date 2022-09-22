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


<script>

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
    $(el).find("input").val("")
    $(el).find("textarea").val("")
}

</script>

@yield('js')