<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tiket Tekadu</title>
</head>
<body>

    <p>Hallo <b>{{$details['nama']}}</b> terimakasih telah melakukan pembelian tiket, silahkan melakukan pembayaran pada link di bawah ini:</p>
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
      <tr>
        <td>Link Pembayaran</td>
        <td>:</td>
        <td>
            <a href="{{url('konfirmasipembayaran/'.$details['transaksi'])}}">Silahkan Bayar pada link ini</a>
        </td>
      </tr>
    </table>
</body>
</html>