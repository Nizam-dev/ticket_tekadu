@extends('template.master')

@section('content')

<!-- show -->
<div class="row animate__animated animate__backInRight animate__faster" id="v-index">

    <div class="col-md-12">

        <div class="card">

            <div class="card-header bg-white">
                <h4 class="card-title">
                    Kategori Management
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
                            <th> Nama Kategori </th>
                            <th> Option </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($kategoris as $kategori)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kategori->kategori_event}}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" onClick="edit({{$kategori}})">
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

@include('admin.kategori_event.tambah')
@include('admin.kategori_event.edit')



@endsection

@section('js')


@include('admin.kategori_event.js')

@endsection