<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tiket Tekadu</title>
</head>
<body>

    <p>Hallo <b>{{$details['nama']}}</b> mohon maaf pembayaran anda ditolak dengan alasan tidak valid :</p>
    <table>

      <tr>
        <td>Nama Event</td>
        <td>:</td>
        <td>{{$details['nama_event']}}</td>
      </tr>
      <tr>
        <td>Total Pembayaran</td>
        <td>:</td>
        <td>@currency($details['total'])</td>
      </tr>

    </table>
</body>
</html>