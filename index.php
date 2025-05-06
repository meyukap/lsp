<?php
// API endpoint
$url = "https://apex.oracle.com/pls/apex/meyukap/pustaka/anggota/";

// Get data from API
$response = file_get_contents($url);

// Decode JSON response
$data = json_decode($response, true);

// Check if data exists
$members = $data['items'] ?? [];

// Contoh Code Review
?>

<!DOCTYPE html>
<html>
<head>
    <title>Member List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h2>List of Members</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($members)): ?>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= htmlspecialchars($member['nama']) ?></td>
                        <td><?= htmlspecialchars($member['alamat']) ?></td>
                        <td><?= htmlspecialchars($member['no_telepon']) ?></td>
                        <td><?= htmlspecialchars($member['tanggal_daftar']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No data found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
