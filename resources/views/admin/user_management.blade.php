@extends('template.master')

@section('content')

<!-- show -->
<div class="row animate__animated animate__backInRight animate__faster" id="v-index">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header bg-white">
                <h4 class="card-title">
                    User Management
                    <button class="btn btn-sm btn-primary float-right" id="btn-tambah">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </h4>
            </div>

            <div class="card-body">
            <div class="table-responsive">

                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Nama </th>
                            <th> Email </th>
                            <th> No Hp </th>
                            <th> Vendor </th>
                            <th> Option </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </div>

</div>


<!-- Tambah  -->

<div class="row animate__animated animate__backInRight animate__faster d-none" id="v-tambah">

    <div class="col-md-12">

        <div class="card">
        <div class="card-header bg-white">
                <h4 class="card-title">
                    Tambah User
                    <button class="btn btn-sm btn-primary float-right" id="btn-close-tambah">
                        <i class="fa fa-close"></i>
                    </button>
                </h4>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="tambahuserform">

                    <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Hp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" 
                                 required>
                        </div>
                    </div>
                   
                    <button type="button" onclick="tambah_user_baru()" class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
        </div>

    </div>

</div>


@endsection

@section('js')


<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    @if(session()->has('success'))
        $.notify({
            title: '<i  class="mdi  mdi mdi-check text-success"> Success </i>' , 
            content: 'Berhasil ditambahkan', 
            timeout: 3000,
        });
    @endif

    $("#btn-tambah").on('click',()=>{
        $("#v-tambah").removeClass('d-none')
        $("#v-index").addClass('d-none')
        resetvalidateForm("#tambahuserform")
    })

    $("#btn-close-tambah").on('click',()=>{
        $("#v-index").removeClass('d-none')
        $("#v-tambah").addClass('d-none')
    })

    function tambah_user_baru() {
        validateForm("#tambahuserform")
    }

</script>

@endsection