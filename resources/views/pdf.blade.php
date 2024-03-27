<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 40%;
        }

        .w-half-2 {
            width: 60%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.products tr {
            background-color: rgb(96 165 250);
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;
            text-align: left;
        }

        table tr.items {
            background-color: rgb(241 245 249);
        }

        table tr.items td {
            padding: 0.5rem;
        }

        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
            font-weight: bold;
        }
        .text-right {
            text-align: right !important;
        }
    </style>
</head>
<body>
@foreach($data as $item)
    <table class="w-full">
        <tr>
            <td class="w-half-2">
                {{--            <img src="{{ asset('laraveldaily.png') }}" alt="laravel daily" width="200" />--}}
            </td>
            <td class="w-half">
                <h2>Invoice: {{ $item['number'] }}</h2>
                <div>Date of Issue: {{ $item['date'] }}</div>
                <div>Service Date: {{ $item['service_date'] }}</div>

            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half-2">
                    <div><h4>To:</h4></div>
                    <div>{{ $item['customer']->company_name }}</div>
                    <div>{{ $item['customer']->address }}</div>
                    <div>{{ $item['customer']->city }}</div>
                    <div>{{ $item['customer']->country }}</div>
                    <div>{{ $item['customer']->email }}</div>
                    <div>TIN: {{ $item['customer']->tax_identifier }}</div>

                </td>
                <td class="w-half">
                    <div><h4>Vendor:</h4></div>
                    <div>Yury Lukashevich</div>
                    <div>Jana Nowaka-Jezioranskiego 6</div>
                    <div>00-001 Warszawa</div>
                    <div>TIN: PL 5214002832</div>
                    <br>
                    <br>

                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Qty</th>
                <th>Item/Service Name</th>
                <th>Subtotal Price[USD]</th>
                <th>VAT</th>
                <th class="text-right">Subtotal Value[USD]</th>

            </tr>
            <tr class="items">

                <td>
                    {{ $item['quantity'] }}
                </td>
                <td>
                    Software creation and development
                    <br>
                    (Tworzenie i rozwój oprogramowania)
                </td>
                <td>
                    {{ '$ ' . number_format($item['amount'], 2, '.', ',') }}
                </td>
                <td>
                    NP
                </td>
                <td class="text-right">
                    {{ '$ ' . number_format($item['amount'], 2, '.', ',') }}
                </td>

            </tr>
        </table>
    </div>

    <div class="total">
        Total: {{ '$ ' . number_format($item['amount'], 2, '.', ',') }}
    </div>

    <div class="footer margin-top">
        <div>Thank you</div>

    </div>
@endforeach
</body>
</html>
