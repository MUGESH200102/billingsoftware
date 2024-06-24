<?php
include 'dbconfig.php';

if (isset($_GET['id'])) {
    $invoiceId = $_GET['id'];

    $sql = "SELECT * FROM invoices WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => $conn->error]);
        exit;
    }
    $stmt->bind_param("i", $invoiceId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $invoiceData = $result->fetch_assoc();
        $invoiceData['items'] = [];

        $itemsSql = "SELECT * FROM invoice_items WHERE invoice_id = ?";
        $itemsStmt = $conn->prepare($itemsSql);
        if ($itemsStmt) {
            $itemsStmt->bind_param("i", $invoiceId);
            $itemsStmt->execute();
            $itemsResult = $itemsStmt->get_result();
            while ($itemRow = $itemsResult->fetch_assoc()) {
                $invoiceData['items'][] = $itemRow;
            }
        }

        echo json_encode(['success' => true, 'data' => $invoiceData]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invoice record not found']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid invoice ID']);
}

$conn->close();
?>
