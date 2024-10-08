<?php
include 'dbconfig.php';

// Fetch unsettled invoices
$sql = "SELECT invoices.invoice_no, invoices.invoice_date, invoices.from_party_name, invoices.from_address, invoices.to_party_name, invoices.to_address, invoices.grand_total,
               IFNULL(income.amount_received, 0) AS amount_received,
               IFNULL(income.balance_amount, invoices.grand_total) AS balance_amount
        FROM invoices
        LEFT JOIN income ON invoices.id = income.invoice_id
        WHERE income.balance_amount > 0 OR income.invoice_id IS NULL";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsettled Invoices History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            color: #333;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h1>Unsettled Invoices History</h1>
<table>
    <tr>
        <th>Invoice No</th>
        <th>Invoice Date</th>
        <th>From Details</th>
        <th>To Details</th>
        <th>Invoice Amount</th>
        <th>Amount Received</th>
        <th>Balance Amount</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['invoice_no']) . "</td>";
        echo "<td>" . htmlspecialchars($row['invoice_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['from_party_name']) . "<br>" . htmlspecialchars($row['from_address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['to_party_name']) . "<br>" . htmlspecialchars($row['to_address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['grand_total']) . "</td>";
        echo "<td>" . htmlspecialchars($row['amount_received']) . "</td>";
        echo "<td>" . htmlspecialchars($row['balance_amount']) . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
