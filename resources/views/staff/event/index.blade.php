@extends('template.master')

@section('css')

<style>
    .bootstrap-select > .dropdown-toggle {
        background : white !important;
    }
    .bn-im img{
        max-width: 17rem;
        max-height: 17rem;
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
                                <th> Deskripsi </th>
                                <th> Tanggal Mulai</th>
                                <th> Tanggal Berakhir </th>
                                <th> Jam </th>
                                <th> Option </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($events as $event)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$event->nama_event}}</td>
                                <td>{{$event->type_event}}</td>
                                <td>{{$event->deskripsi}}</td>
                                <td>{{$event->tanggal_mulai->format('d/m/Y')}}</td>
                                <td>{{$event->tanggal_berakhir->format('d/m/Y')}}</td>
                                <td>{{substr_replace($event->jam_mulai,'',5,7).' - '.substr_replace($event->jam_berakhir,'',5,7)}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onClick="edit({{$event}},`{{$event->tanggal_mulai->format('Y-m-d')}}`,`{{$event->tanggal_berakhir->format('Y-m-d')}}`)">
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



@include('staff.event.tambah')
@include('staff.event.edit')

@endsection

@section('js')


@include('staff.event.js')

@endsection