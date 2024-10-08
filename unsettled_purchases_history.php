<?php
include 'dbconfig.php';

// Fetch unsettled purchase invoices where balance amount is greater than zero
$sql = "SELECT purchases.id, purchases.purchase_bill_no, purchases.supplier_invoice_no, purchases.purchase_date, purchases.party_name, purchases.party_address, purchases.grand_total, COALESCE(SUM(payments.amount_paid), 0) AS amount_paid, purchases.grand_total - COALESCE(SUM(payments.amount_paid), 0) AS balance_amount 
        FROM purchase_bills purchases
        LEFT JOIN payments ON purchases.id = payments.invoice_id 
        GROUP BY purchases.id
        HAVING balance_amount > 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsettled Purchases History</title>
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

<h1>Unsettled Purchases History</h1>
<table>
    <tr>
        <th>Purchase Bill No</th>
        <th>Supplier Invoice No</th>
        <th>Purchase Date</th>
        <th>Party Details</th>
        <th>Invoice Amount</th>
        <th>Amount Paid</th>
        <th>Balance Amount</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['purchase_bill_no']) . "</td>";
        echo "<td>" . htmlspecialchars($row['supplier_invoice_no']) . "</td>";
        echo "<td>" . htmlspecialchars($row['purchase_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['party_name']) . "<br>" . htmlspecialchars($row['party_address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['grand_total']) . "</td>";
        echo "<td>" . htmlspecialchars($row['amount_paid']) . "</td>";
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
