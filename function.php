<?php
function getStockDetails($conn, $materialName) {
    if (empty($materialName)) {
        return null;
    }

    // Prepare the loading query
    $loadingQuery = "SELECT * FROM loading WHERE material_name = ?";
    $loadingStmt = $conn->prepare($loadingQuery);
    $loadingStmt->bind_param("s", $materialName);
    $loadingStmt->execute();
    $loadingResult = $loadingStmt->get_result();
    $loadingRecords = $loadingResult->fetch_all(MYSQLI_ASSOC);

    // Prepare the unloading query
    $unloadingQuery = "SELECT * FROM unloading WHERE material_name = ?";
    $unloadingStmt = $conn->prepare($unloadingQuery);
    $unloadingStmt->bind_param("s", $materialName);
    $unloadingStmt->execute();
    $unloadingResult = $unloadingStmt->get_result();
    $unloadingRecords = $unloadingResult->fetch_all(MYSQLI_ASSOC);

    // Prepare the total weight query
    $totalWeightQuery = "SELECT SUM(weight) AS total_loading_weight FROM loading WHERE material_name = ?";
    $totalLoadingStmt = $conn->prepare($totalWeightQuery);
    $totalLoadingStmt->bind_param("s", $materialName);
    $totalLoadingStmt->execute();
    $totalLoadingResult = $totalLoadingStmt->get_result();
    $totalLoadingRow = $totalLoadingResult->fetch_assoc();
    $totalLoadingWeight = $totalLoadingRow['total_loading_weight'];

    $totalWeightQuery = "SELECT SUM(weight) AS total_unloading_weight FROM unloading WHERE material_name = ?";
    $totalUnloadingStmt = $conn->prepare($totalWeightQuery);
    $totalUnloadingStmt->bind_param("s", $materialName);
    $totalUnloadingStmt->execute();
    $totalUnloadingResult = $totalUnloadingStmt->get_result();
    $totalUnloadingRow = $totalUnloadingResult->fetch_assoc();
    $totalUnloadingWeight = $totalUnloadingRow['total_unloading_weight'];

    $balanceWeight = $totalLoadingWeight - $totalUnloadingWeight;

    return [
        'loading_records' => $loadingRecords,
        'unloading_records' => $unloadingRecords,
        'total_loading_weight' => $totalLoadingWeight,
        'total_unloading_weight' => $totalUnloadingWeight,
        'balance_weight' => $balanceWeight,
    ];
}