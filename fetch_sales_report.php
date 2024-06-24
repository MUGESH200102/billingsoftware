<?php
include 'dbconfig.php';

$data = json_decode(file_get_contents('php://input'), true);
$fromDate = $data['fromDate'];
$toDate = $data['toDate'];

$sql = "SELECT * FROM invoices WHERE invoice_date BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $fromDate, $toDate);
$stmt->execute();
$result = $stmt->get_result();

$invoices = [];
while ($row = $result->fetch_assoc()) {
    $invoices[] = $row;
}

echo json_encode($invoices);

$stmt->close();
$conn->close();
?>
