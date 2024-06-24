<?php
include 'dbconfig.php';

if (isset($_GET['id'])) {
    $purchaseId = $_GET['id'];

    $sql = "SELECT * FROM purchase_bills WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => $conn->error]);
        exit;
    }
    $stmt->bind_param("i", $purchaseId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $purchaseData = $result->fetch_assoc();
        $purchaseData['items'] = [];
        $purchaseData['taxes'] = [];

        $itemsSql = "SELECT * FROM items WHERE purchase_bill_id = ?";
        $itemsStmt = $conn->prepare($itemsSql);
        if ($itemsStmt) {
            $itemsStmt->bind_param("i", $purchaseId);
            $itemsStmt->execute();
            $itemsResult = $itemsStmt->get_result();
            while ($itemRow = $itemsResult->fetch_assoc()) {
                $purchaseData['items'][] = $itemRow;
            }
        }

        $taxesSql = "SELECT * FROM taxes WHERE purchase_bill_id = ?";
        $taxesStmt = $conn->prepare($taxesSql);
        if ($taxesStmt) {
            $taxesStmt->bind_param("i", $purchaseId);
            $taxesStmt->execute();
            $taxesResult = $taxesStmt->get_result();
            while ($taxRow = $taxesResult->fetch_assoc()) {
                $purchaseData['taxes'][] = $taxRow;
            }
        }

        echo json_encode(['success' => true, 'data' => $purchaseData]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Purchase record not found']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid purchase ID']);
}

$conn->close();
?>
