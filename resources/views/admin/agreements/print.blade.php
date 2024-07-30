<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Receipt</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            /* padding: 20px; */
            font-size: 13px;

        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0px;
        }

        header img {
            width: 150px;
        }

        h1,
        h2,
        h3 {
            margin: 0;
            padding: 0;
        }

        /* main {
            border: 3px solid #221c1c;
            padding: 20px;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid #ddd;
        }

        th {
            text-align: left;
        }

        tfoot {
            font-weight: bold;
        }

        p {
            margin-top: 10px;
        }

        /* Customizing the layout for the invoice elements */

        .training-table,
        .software-table {
            margin-bottom: 10px;
        }

        .training-table th,
        .software-table th {
            text-align: center;
        }

        .training-table th:nth-child(odd),
        .software-table th:nth-child(odd) {
            width: 10%;
        }

        .training-table th:nth-child(2n),
        .software-table th:nth-child(2n) {
            width: 30%;
        }

        .training-table th:nth-child(3n),
        .software-table th:nth-child(3n),
        .training-table th:nth-child(4n),
        .software-table th:nth-child(4n),
        .training-table th:nth-child(5n),
        .software-table th:nth-child(5n),
        .training-table th:nth-child(6n),
        .software-table th:nth-child(6n) {
            width: 15%;
        }

        .training-table th:nth-child(7n),
        .software-table th:nth-child(7n),
        .training-table th:nth-child(8n),
        .software-table th:nth-child(8n),
        .training-table th:nth-child(9n),
        .software-table th:nth-child(9n),
        .training-table th:nth-child(10n),
        .software-table th:nth-child(10n),
        .training-table th:nth-child(11n),
        .software-table th:nth-child(11n),
        .training-table th:nth-child(12n),
        .software-table th:nth-child(12n) {
            width: 10%;
        }

        footer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            text-align: right;
            font-size: 10px;
            color: #888;
            /* Adjust color as needed */
        }


        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            header,
            main {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <main>
        <header>
            <table border="0" width="100%">
                <tr>
                    <td width="70%" style="border: 0px;">

                        <img src="{{ public_path('assets/img/logo/citizen.png') }}" alt="Aggrement Logo" width="200">
                        <p>Musanze K90<br>
                            Hotline: 33444<br>
                        </p>

                    </td>

                </tr>
            </table>
        </header>
        <center>
            <h1 style="padding : 1px;font-size : 28px; font-weight:900;"> <u>{{ $agreement->category }} </u></h1>
        </center>


        <p style="margin-bottom: -4px;"> <strong>Agreement Value : </strong>{{ number_format($agreement->amount) }} RWF </p>
        @php
        $start = explode(' to ', $agreement->duration)[0];
        $deadline = explode(' to ', $agreement->duration)[1];
        $days = \Carbon\Carbon::parse($deadline)->diffInDays(\Carbon\Carbon::now());
        @endphp
        <p style="margin-bottom: -4px;"> <strong>Start Date : </strong>{{ \Carbon\Carbon::parse($start)->format('M d, Y') }}</p>
        <p style="margin-bottom: -4px;"> <strong>Deadline : </strong>{{ \Carbon\Carbon::parse($deadline)->format('M d, Y') }}</p>
        <br>
        <p style="margin-bottom: -4px;"> {{ $agreement->description }}</p>

        <br>
        {{-- <hr> --}}

        <table border="0" width="100%">
            <tr>
                <td width="50%" style="border: 0px;">
                    <p style="margin-bottom: -4px;"> <strong>PARTY ONE</strong> </p>
                    <p style="margin-bottom: -4px;">{{ $agreement->party1->name }}</p>
                    <p style="margin-bottom: -4px;"> {{ $agreement->party1->national_id }}</p>
                    <p style="margin-bottom: -4px;">{{ $agreement->party1->phone }}</p>
                </td>
                    <td width="50%" style="border: 0px;">
                        <p style="margin-bottom: -4px;"> <strong>PARTY TWO</strong> </p>
                        <p style="margin-bottom: -4px;"> {{ $agreement->party2->name }}</p>
                        <p style="margin-bottom: -4px;"> {{ $agreement->party2->national_id }}</p>
                        <p style="margin-bottom: -4px;">{{ $agreement->party2->phone }}</p>
                    </td>

            </tr>
        </table>
    </main>
    <footer style="position: fixed; bottom: 0px; right: 20px;">
        <span style="color: #4a4a4a"> Powered by Civil Agreement System</span>
    </footer>

</body>

</html>
