@extends('template.master')

@section('content')

<!-- show -->
<div class="row animate__animated animate__backInRight animate__faster" id="v-index">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header bg-white">
                <h4 class="card-title">
                    Event Management
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
                                <th> Nama Event</th>
                                <th> Type Event </th>
                                <th> Tanggal Mulai</th>
                                <th> Tanggal Berakhir </th>
                                <th> Jam </th>
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
                    Tambah Event
                    <button class="btn btn-sm btn-primary float-right" id="btn-close-tambah">
                        <i class="fa fa-close"></i>
                    </button>
                </h4>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="tambahform">

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Event</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type Event</label>
                        <div class="col-sm-9">
                            <select name="" class="form-control">
                                <option value="sekali">Sekali</option>
                                <option value="berulang">Berlanjut</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jam</label>
                        <div class="col-sm-4">
                            <div class="input-group  clockpicker">
                                <input type="text" class="form-control" value="09:30">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="mdi mdi-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-sm-1 text-center col-form-label">Sampai</label>

                        <div class="col-sm-4">
                            <div class="input-group  clockpicker">
                                <input type="text" class="form-control" value="09:30">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="mdi mdi-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>



                    <button type="button" onclick="tambah_user_baru()"
                        class="btn btn-primary float-right">Simpan</button>

                </form>
            </div>
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
    $(document).ready(function () {
        $('#example').DataTable();

        $('.clockpicker').clockpicker();

    });

    $("#btn-tambah").on('click', () => {
        $("#v-tambah").removeClass('d-none')
        $("#v-index").addClass('d-none')
        resetvalidateForm("#tambahform")
    })

    $("#btn-close-tambah").on('click', () => {
        $("#v-index").removeClass('d-none')
        $("#v-tambah").addClass('d-none')
    })

    function tambah_user_baru() {
        validateForm("#tambahform")
    }
</script>

@endsection