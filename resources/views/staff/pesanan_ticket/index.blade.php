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
                    Pesanan Ticket
                </h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama</th>
                                <th> Nama Event</th>
                                <th> Jenis Tiket </th>
                                <th> Jumlah </th>
                                <th> Total </th>
                                <th> Bukti Pembayaran </th>
                                <th> Konfirmasi </th>
                            </tr>
                        </thead>
                        <tbody>

                           @foreach($transaksis as $transaksi)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$transaksi->nama}}</td>
                                <td>
                                    {{$transaksi->nama_event}}
                                </td>
                                <td>{{$transaksi->jenis_ticket}}</td>
                                <td>{{$transaksi->total_ticket}}</td>
                                <td>@currency($transaksi->total_pembayaran)</td>
                                <td>
                                    <a href="{{asset('public/image/bukti_pembayaran/'.$transaksi->foto_pembayaran)}}">
                                        <img src="{{asset('public/image/bukti_pembayaran/'.$transaksi->foto_pembayaran)}}" style="border-radius:0;" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('konfirmasipesanan/diterima/'.$transaksi->id)}}" class="btn btn-sm btn-success">Terima</a>
                                    <a href="{{url('konfirmasipesanan/ditolak/'.$transaksi->id)}}" class="btn btn-sm btn-danger">Tolak</a>
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



@endsection

@section('js')

<script>
    $("#example").dataTable()
</script>

@endsection