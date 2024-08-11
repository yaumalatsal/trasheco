<!-- resources/views/orders_pdf.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Orders Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Orders Report</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Order No.</th>
                <th>Name</th>
                <th>Total Amount</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ number_format($order->total_amount, 2) }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
