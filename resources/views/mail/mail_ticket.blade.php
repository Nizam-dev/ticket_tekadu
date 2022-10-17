<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tiket Tekadu</title>
</head>
<body>

    <p>Hallo <b>{{$details['nama']}}</b> terimakasih telah melakukan pembelian tiket, berikut adalah ticket anda:</p>
    <table>

      <tr>
        <td>Nama Event</td>
        <td>:</td>
        <td>{{$details['nama_event']}}</td>
      </tr>
      <tr>
        <td>Jumlah Ticket</td>
        <td>:</td>
        <td>{{$details['jumlah_ticket']}}</td>
      </tr>
      <tr>
        <td>Link Ticket</td>
        <td>:</td>
        <td>
            <a href="{{url('ticket/'.$details['nama_event'].'/'.$details['kode'])}}">Silahkan Lihat pada link ini</a>
        </td>
      </tr>
    </table>
</body>
</html>