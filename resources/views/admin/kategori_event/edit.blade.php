<!-- Edit -->

<div class="row animate__animated animate__backInRight animate__faster d-none" id="v-edit">

    <div class="col-md-12">

        <div class="card">
        <div class="card-header bg-white">
                <h4 class="card-title">
                    Edit Kategori
                    <button class="btn btn-sm btn-primary float-right btn-close-tambah">
                        <i class="fa fa-close"></i>
                    </button>
                </h4>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="edituserform" action="{{url('kategorimanagement')}}" method="post">
                    @csrf
                    @method('patch')

                    <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Nama Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kategori_event" required>
                            </div>
                    </div>
                   
                    <button type="button" onclick="edit_user()" class="btn btn-primary float-right">Submit</button>

                </form>
            </div>
        </div>

    </div>

</div>
