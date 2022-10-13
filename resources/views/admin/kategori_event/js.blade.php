<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });


    $("#btn-tambah").on('click',()=>{
        $("#v-tambah").removeClass('d-none')
        $("#v-index").addClass('d-none')
        resetvalidateForm("#tambahuserform")
    })

    $(".btn-close-tambah").on('click',()=>{
        $("#v-index").removeClass('d-none')
        $("#v-tambah").addClass('d-none')
        $("#v-edit").addClass('d-none')
    })

    function tambah_user_baru() {
        validateForm("#tambahuserform")
    }

    function edit_user() {
        validateForm("#edituserform")
    }

    function edit(user) {
        $("#v-edit").removeClass('d-none')
        $("#v-index").addClass('d-none')
        resetvalidateForm("#edituserform")
        console.log(user)
        $("#edituserform").attr('action',`{{url('kategorimanagement')}}/${user.id}`)
        $("#edituserform [name='kategori_event']").val(user.kategori_event)
    }

</script>