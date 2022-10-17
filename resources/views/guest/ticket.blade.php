    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ticket</title>
        
        <style>
            .cardWrap {
                width: 27em;
                margin: 3em auto;
                color: #fff;
                font-family: sans-serif;
            }

            .card {
                background: linear-gradient(to bottom, #3d98e8 0%, #3d90e8  26%, #ecedef 26%, #ecedef 100%);
                height: 11em;
                float: left;
                position: relative;
                padding: 1em;
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .cardLeft {
                border-top-left-radius: 8px;
                border-bottom-left-radius: 8px;
                width: 16em;
            }

            .cardRight {
                width: 6.5em;
                border-left: 0.18em dashed #fff;
                border-top-right-radius: 8px;
                border-bottom-right-radius: 8px;
            }

            .cardRight:before,
            .cardRight:after {
                content: "";
                position: absolute;
                display: block;
                width: 0.9em;
                height: 0.9em;
                background: #fff;
                border-radius: 50%;
                left: -0.5em;
            }

            .cardRight:before {
                top: -0.4em;
            }

            .cardRight:after {
                bottom: -0.4em;
            }

            h1 {
                font-size: 1.1em;
                margin-top: 0;
            }

            h1 span {
                font-weight: normal;
            }

            .title,
            .name,
            .seat,
            .time {
                text-transform: uppercase;
                font-weight: normal;
            }

            .title h2,
            .name h2,
            .seat h2,
            .time h2 {
                font-size: 0.9em;
                color: #525252;
                margin: 0;
            }

            .title span,
            .name span,
            .seat span,
            .time span {
                font-size: 0.7em;
                color: #a2aeae;
            }

            .title {
                margin: 2em 0 0 0;
            }

            .name,
            .seat {
                margin: 0.7em 0 0 0;
            }

            .time {
                margin: 0.7em 0 0 1em;
            }

            .seat,
            .time {
                float: left;
            }

            .eye {
                position: relative;
                width: 2em;
                height: 1.5em;
                margin: 0 auto;
                border-radius: 1em/0.6em;
                z-index: 1;
            }
            .eye img{
                width: 35px;
                margin-top: -7px;
            }

            .kode img{
                padding: 2px;
                border: 1px solid black;
                width: 75%;
                margin: auto;
                display: block;
            }
            .kode p{
                margin-top: 1px;
                color: #a2aeae;
                text-align: center;
            }


            .number {
                text-align: center;
                text-transform: uppercase;
            }

            .number h3 {
                color: #e84c3d;
                margin: 0.9em 0 0 0;
                font-size: 2.5em;
            }

            .number span {
                display: block;
                color: #a2aeae;
            }

            .mb-5{
                margin-bottom : 15px;
            }
        </style>
    </head>

    <body>

       @foreach($tickets as $tiket)

       <div class="cardWrap">
            <div class="card cardLeft">
                <h1>Ticket <span>Tekadu</span></h1>
                <div class="title">
                    <h2> {{$tiket->event->nama_event}} </h2><span>nama event</span>
                </div>
                <div class="name">
                    <h2> </h2><span> </span>
                </div>
                <div class="seat">
                    <h2>{{$tiket->event->tanggal_mulai->format('d M Y')}}</h2><span>Tanggal</span>
                </div>
                <div class="time">
                    <h2>{{ substr_replace($tiket->event->jam_mulai,'',5,7) }}</h2><span>Jam</span>
                </div>
            </div>
            <div class="card cardRight">
                <div class="eye">
                    <img src="{{asset('public/image/logo-ticket.png')}}" alt="" srcset="">
                </div>
                <div class="number">
                    <h3></h3><span>{{$tiket->type_ticket}}</span>
                </div>

                <div class="kode">
                    <img src="{{asset('public/image/qrcode/'.$tiket->kode_ticket.'.svg')}}" alt="" srcset="">
                </div>

                
            </div>
        </div>

       @endforeach


    </body>

    </html>