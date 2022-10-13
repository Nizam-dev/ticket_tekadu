<!-- Ubah -->

<div class="row animate__animated animate__backInRight animate__faster d-none" id="v-edit">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header bg-white">
                <h4 class="card-title">
                    Edit Event
                    <button class="btn btn-sm btn-primary float-right btn-close-tambah">
                        <i class="fa fa-close"></i>
                    </button>
                </h4>
            </div>
            <div class="card-body">

                <form method="post" class="forms-sample" id="ubahform" action="{{url('eventmanagement')}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Event</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_event" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type Event</label>
                        <div class="col-sm-9">
                            <select name="type_event" class="form-control">
                                <option value="sekali">Sekali</option>
                                <option value="berulang">berulang</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Bentuk Kegiatan</label>
                        <div class="col-sm-9">
                            <select name="bentuk_kegiatan" class="form-control">
                                <option value="offline">Offline</option>
                                <option value="Online">Online</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jeinis Kegiatan</label>
                        <div class="col-sm-9">
                            <select class="selectpicker form-control" name="kategori_event[]" multiple
                                data-live-search="true">
                                @foreach($kategoris as $kategori)
                                <option value="{{$kategori->kategori_event}}">{{$kategori->kategori_event}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea name="deskripsi" required class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tanggal_mulai" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_berakhir" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jam</label>
                        <div class="col-sm-4">
                            <div class="input-group  clockpicker">
                                <input type="text" name="jam_mulai" required class="form-control" placeholder='00:00'
                                    value="00:00">
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
                                <input type="text" name="jam_berakhir" required class="form-control" placeholder='00:00'
                                    value="00:00">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="mdi mdi-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Banner Event</label>

                        <div class="col-sm-9">

                            <div class="row edit-banner-container">

                            </div>


                        </div>

                        <label class="col-sm-3 col-form-label"></label>

                        <div class="col-sm-9 row">
                            <div class="col-sm-8">

                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-sm btn-success float-right" onClick="tambahkan_gambar(this)">
                                    Tambah <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <label class="col-sm-3 col-form-label"></label>

                        <div class="banner_all col-sm-9 row">

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lokasi</label>
                        <div class="col-sm-9">
                            <textarea name="lokasi" required class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lokasi Maps</label>
                        <div class="col-sm-9">
                            <input type="text" name="latitude" class="d-none">
                            <input type="text" name="longitude" class="d-none">
                            <div id='map2' style='width: 100%; height: 400px;'></div>
                        </div>
                    </div>


                    <button type="button" onclick="update_event()" class="btn btn-primary float-right">Simpan</button>

                </form>
            </div>
        </div>

    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="md-hapusBanner" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda mau menghapus gambar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-hapus-gambar">Hapus</button>
            </div>
        </div>
    </div>
</div>