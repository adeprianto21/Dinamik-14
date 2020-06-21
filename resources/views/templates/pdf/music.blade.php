<!doctype html>
<html lang="en">

<head>
    <title>Tiket Dinamik</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        * {
            font-family: "Mont Regular", "Segoe UI", Roboto, Helvetica, Arial, sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-size: 20px;
        }

        .black {
            font-family: "Mont Bold";
            font-weight: 900;
        }

        .bold {
            font-family: "Mont Bold";
            font-weight: bold;
        }

        .italic {
            font-family: "Mont Regular Italic";
            font-style: italic;
        }

        .w-900 {
            font-weight: 900;
        }

        .body {
            width: 100%;
        }

        .text-success {
            color: green;
        }

        .text-extra-lg {
            font-size: 32px;
        }

        .text-lg {
            font-size: 26px;
        }

        .text-sm {
            font-size: 16px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {

            text-align: right;
        }

        .mt-mid {
            margin-top: 30px;
        }

        .mt-high {
            margin-top: 50px;
        }

        .mb-high {
            margin-bottom: 50px;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .d-block {
            display: block;
            margin-top: 3px;
        }

        .header {
            background-color: black;
        }

        .header img {
            width: 100%;
        }

        .footer {
            background-color: black;
            width: 100%;
            height: 100px;
        }

        table {
            width: 80%;
        }

        table tr td.table-header,
        table tr td.table-footer {
            padding: 10px 35px;
            background-color: #cccccc;
        }

        table tr td.table-body {
            padding: 10px 35px;
            background-color: #eeeeee;
            border-bottom: 3px solid white;
            border-top: 3px solid white;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="https://i.ibb.co/kgBTwLF/header-email.png" alt="">
    </div>
    <div class="body">
        <div class="mt-mid">
            <span class="black text-extra-lg text-center d-block">{{$participant['nama']}}</span>
            <span class="text-sm text-center d-block">{{$participant['email']}}</span>
            <span class="text-sm text-center d-block">{{$participant['no_telp']}}</span>
        </div>
        <div class="mt-mid">
            <span class="bold text-center d-block">Transaksi anda berhasil diproses,</span>
            <span class="bold text-center d-block">berikut detail transaksi beserta e-voucher</span>
            <span class="text-center italic d-block">Your transaction has been successfull,</span>
            <span class="text-center italic d-block">here is your transaction detail and e-voucher</span>
        </div>
        <div class="mt-mid">
            <span class="black text-extra-lg text-center text-success d-block">Paid</span>
            <span class="bold text-center d-block">Status Pembayaran</span>
            <span class="text-center italic d-block">Payment Status</span>
        </div>
        <div class="mt-high mb-high">
            <table class="mx-auto">
                <tr>
                    <td class="text-sm bold table-header">Price/Section</td>
                    <td class="text-sm bold table-header">Quantity</td>
                    <td class="text-sm bold table-header">No. Ticket</td>
                    <td class="text-sm bold table-header">Total</td>
                </tr>
                <tr>
                    <td class="table-body">
                        <span class="text-sm bold d-block">
                            SWARAKARA Festival Music
                        </span>
                        <span class="text-sm d-block">
                            Lapang Parkir Gymnasium UPI
                        </span>
                        <span class="text-sm d-block">
                            Sabtu, 30 November 2019
                        </span>
                        <span class="text-sm d-block">
                            at 18.00 WIB
                        </span>
                        <span class="text-sm bold d-block">
                            Rp. {{ 20000 * $participant['jml_ticket'] }}
                        </span>
                    </td>
                    <td class="text-sm bold table-body">
                        @if ($participant['jml_ticket'] > 1)
                        x{{$participant['jml_ticket']}}
                        @else
                        x1
                        @endif
                    </td>
                    <td class="text-sm bold table-body">
                        @if ($participant['jml_ticket'] > 1)
                        {{$participant['no_ticket'] .' - '. ($participant['no_ticket'] + $participant['jml_ticket'])}}
                        @else
                        {{$participant['no_ticket']}}
                        @endif
                    </td>
                    <td class="text-sm bold table-body">Rp. {{ 20000 * $participant['jml_ticket'] }}</td>
                </tr>
                <tr>
                    <td class="text-sm bold table-header"></td>
                    <td class="text-sm bold table-header"></td>
                    <td class="text-sm bold table-header">Total</td>
                    <td class="text-sm bold table-header">Rp. {{ 20000 * $participant['jml_ticket'] }}</td>
                </tr>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>