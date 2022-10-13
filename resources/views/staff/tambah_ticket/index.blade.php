@extends('template.master')

@section('css')


@endsection

@section('content')

<!-- show -->
<div class="row animate__animated animate__backInRight animate__faster" id="v-index">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header bg-white">
                <h4 class="card-title">
                    Buat Tiket
                </h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Event</th>
                                <th> Jenis Tiket </th>
                                <th> Tambah</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($events as $event)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$event->nama_event}}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($event->jenis_ticket as $tikcet)
                                        <li class="mt-2">{{$tikcet->jenis_ticket}} -  @currency($tikcet->harga) ( {{$tikcet->jumlah}} Tiket ) 
                                            <button class="btn btn-sm float-right btn-warning" onClick="ubahTicket({{$tikcet}})" > <i class="fa fa-edit"></i></button>
                                            <button class="btn btn-sm float-right btn-danger mr-1" onClick="hapusTicket('{{$tikcet->id}}')" > <i class="fa fa-trash"></i></button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onClick="tambahTicket('{{$event->id}}')"
                                        type="button">
                                        <i class="mdi mdi-plus-circle"></i>
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


<!-- Modal tAMBAH -->
<div class="modal fade" id="md-tambah-tikcet" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post">
                <div class="modal-body bg-white">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Tiket</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="jenis_ticket" required> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="harga" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button  type="submit" class="btn btn-primary btn-hapus-gambar">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Ubah-->
<div class="modal fade" id="md-ubah-tikcet" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post">
                <div class="modal-body bg-white">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Tiket</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="jenis_ticket" required> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="harga" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button  type="submit" class="btn btn-primary btn-hapus-gambar">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Modal Ubah-->
<div class="modal fade" id="md-hapus-tikcet" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-white">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin menghapus jenis tiket?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post">
                    @csrf
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button  type="submit" class="btn btn-primary btn-hapus-gambar">Hapus</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection

@section('js')

<script>
    $("#example").dataTable()

    function tambahTicket(id) {
        $("#md-tambah-tikcet form").attr('action',`{{url('jenisticketmanagement')}}/${id}`)
        $("#md-tambah-tikcet").modal('show')
    }

    function ubahTicket(ticket) {
        $("#md-ubah-tikcet form").attr('action',`{{url('jenisticketmanagement/edit/')}}/${ticket.id}`)
        $("#md-ubah-tikcet [name='jenis_ticket']").val(ticket.jenis_ticket)
        $("#md-ubah-tikcet [name='harga']").val(ticket.harga)
        $("#md-ubah-tikcet [name='jumlah']").val(ticket.jumlah)
        $("#md-ubah-tikcet").modal('show')
    }

    function hapusTicket(id) {
        $("#md-hapus-tikcet form").attr('action',`{{url('jenisticketmanagement/hapus')}}/${id}`)
        $("#md-hapus-tikcet").modal('show')
    }
</script>

@endsection