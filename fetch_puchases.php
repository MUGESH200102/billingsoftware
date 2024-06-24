<?php
include 'dbconfig.php';

// Fetch purchase records
$result = $conn->query("SELECT * FROM purchases");

echo "<table class='table table-bordered'>";
echo "<thead><tr><th>ID</th><th>Bill No</th><th>Purchase Date</th><th>Supplier Invoice No</th><th>Party Name</th><th>Total</th><th>Actions</th></tr></thead><tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['bill_no']) . "</td>";
    echo "<td>" . htmlspecialchars($row['purchase_date']) . "</td>";
    echo "<td>" . htmlspecialchars($row['supplier_invoice_no']) . "</td>";
    echo "<td>" . htmlspecialchars($row['party_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['total']) . "</td>";
    echo "<td><button class='btn btn-info view-btn' data-id='" . htmlspecialchars($row['id']) . "'>View</button></td>";
    echo "</tr>";
}

echo "</tbody></table>";

$conn->close();
?>