@extends('template.master')

@section('css')
<link href="{{asset('public/karma-master/css/select2.min.css')}}" rel="stylesheet" />
<style>
    .select2 {
        width: 100% !important;
    }

    .select2-selection {
        padding: 0 !important;
    }
</style>
@endsection

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
                                <th> Role </th>
                                <th> Option </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->no_hp == null ? '-' : $user->no_hp }}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onClick="edit({{$user}})">
                                        <i class=" mdi mdi-tooltip-edit "></i>
                                    </button>
                                </td>
                            </tr>

                            @endforeach

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
                    <button class="btn btn-sm btn-primary float-right btn-close-tambah">
                        <i class="fa fa-close"></i>
                    </button>
                </h4>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="tambahuserform" action="{{url('usermanagement')}}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select name="role" id="" class="form-control">
                                <option value="owner">Owner</option>
                                @if(auth()->user()->role == 'admin')
                                <option value="staff">Staff</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="det animate__animated animate__backInRight animate__faster">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                <select name="provinsi" id="" class="form-control">
                                    <option disabled selected>Pilih Provinsi</option>
                                    @foreach($provinsis as $provinsi)
                                    <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                <select name="kota" id="" class="form-control">
                                    <option disabled selected>Pilih Kota</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="instansi">
                            </div>
                        </div>



                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Hp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="no_hp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <button type="button" onclick="tambah_user_baru()"
                        class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
        </div>

    </div>

</div>

<!-- Tambah  -->

<div class="row animate__animated animate__backInRight animate__faster d-none" id="v-edit">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header bg-white">
                <h4 class="card-title">
                    Edit User
                    <button class="btn btn-sm btn-primary float-right btn-close-tambah">
                        <i class="fa fa-close"></i>
                    </button>
                </h4>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="edituserform" action="{{url('usermanagement')}}" method="post">
                    @csrf
                    @method('patch')

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>


                    <div class="det animate__animated animate__backInRight animate__faster">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                <select name="provinsi" id="" class="form-control">
                                    <option disabled>Pilih Provinsi</option>
                                    @foreach($provinsis as $provinsi)
                                    <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                <select name="kota" id="" class="form-control">
                                    <option disabled selected>Pilih Kota</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="instansi">
                            </div>
                        </div>



                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Hp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="no_hp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" placeholder="***************">
                        </div>
                    </div>

                    <button type="button" onclick="edit_user()" class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
        </div>

    </div>

</div>

@endsection

@section('js')
<script src="{{asset('public/karma-master/js/select2.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('#example').DataTable();
        $("#v-tambah [name='provinsi']").select2()
        $("#v-tambah [name='kota']").select2()
        $("#v-edit [name='provinsi']").select2()
        $("#v-edit [name='kota']").select2()
    });


    $("#btn-tambah").on('click', () => {
        $("#v-tambah").removeClass('d-none')
        $("#v-index").addClass('d-none')
        resetvalidateForm("#tambahuserform")
    })

    $(".btn-close-tambah").on('click', () => {
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

    async function edit(user) {
        $("#v-edit").removeClass('d-none')
        $("#v-index").addClass('d-none')
        resetvalidateForm("#edituserform")
        $("#edituserform").attr('action', `{{url('usermanagement')}}/${user.id}`)
        $("#edituserform [name='name']").val(user.name)
        $("#edituserform [name='email']").val(user.email)
        $("#edituserform [name='no_hp']").val(user.no_hp)
        $("#edituserform [name='alamat']").val(user.alamat)
        $("#edituserform [name='instansi']").val(user.instansi)
        if(user.role == "owner"){
            $("#edituserform .det").removeClass('d-none')
            $("#edituserform [name='provinsi']").val(user.provinsi)
            await axios.get(`{{url('getkota')}}/${user.provinsi}`)
            .then(res=>{
                $("#v-edit [name='kota']").empty()
                res.data.forEach((kota) => {
                    $("#v-edit [name='kota']").append(`
					<option value="${kota.id}" >${kota.name}</option>
				`)
                })
                $("#v-edit [name='kota']").val(user.kota)
            })
        }else{
            $("#edituserform .det").addClass('d-none')
        }


    }

    $("#v-tambah [name='role']").on('change', () => {
        let role = $("#v-tambah [name='role']").val()
        if (role == 'owner') {
            $("#v-tambah .det").removeClass('d-none')
        } else {
            $("#v-tambah .det").addClass('d-none')
        }

    })


    $("#v-tambah [name='provinsi']").on('change', () => {
        let provinsi = $("#v-tambah [name='provinsi']").val()
        axios.get(`{{url('getkota')}}/${provinsi}`)
            .then(res => {
                $("#v-tambah [name='kota']").empty()
                res.data.forEach((kota) => {
                    $("#v-tambah [name='kota']").append(`
					<option value="${kota.id}" >${kota.name}</option>
				`)
                })
            })
    })

    $("#v-edit [name='provinsi']").on('change', () => {
        let provinsi = $("#v-edit [name='provinsi']").val()
        axios.get(`{{url('getkota')}}/${provinsi}`)
            .then(res => {
                $("#v-edit [name='kota']").empty()
                res.data.forEach((kota) => {
                    $("#v-edit [name='kota']").append(`
					<option value="${kota.id}" >${kota.name}</option>
				`)
                })
            })
    })
</script>

@endsection