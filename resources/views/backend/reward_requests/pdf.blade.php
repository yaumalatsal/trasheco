<!-- resources/views/reward_requests_pdf.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Reward Requests Report</title>
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
    <h1>Reward Requests Report</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Reward</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rewardRequests as $rewardRequest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rewardRequest->user->name }}</td>
                    <td>{{ $rewardRequest->reward->name }}</td>
                    <td>{{ $rewardRequest->qty }}</td>
                    <td>{{ ucfirst($rewardRequest->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
