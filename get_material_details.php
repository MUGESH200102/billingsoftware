<?php
include 'dbconfig.php';

// Get the input values from the POST request
$materialName = $_POST['material_name'] ?? '';
$fromDate = $_POST['from_date'] ?? '';
$toDate = $_POST['to_date'] ?? '';

// Validate the input values
if (empty($materialName) || empty($fromDate) || empty($toDate)) {
    echo '<div class="alert alert-danger">All fields are required.</div>';
    exit;
}

// Initialize total weights to 0 in case there are no records found
$totalLoadingWeight = 0;
$totalUnloadingWeight = 0;

try {
    // Query to get the total weight from the loading table within the date range
    $loadingQuery = "SELECT SUM(weight) AS total_loading_weight FROM loading WHERE material_name = ? AND loading_date BETWEEN ? AND ?";
    $stmt = $conn->prepare($loadingQuery);
    $stmt->bind_param("sss", $materialName, $fromDate, $toDate);
    $stmt->execute();
    $loadingResult = $stmt->get_result();
    if ($loadingResult->num_rows > 0) {
        $loadingRow = $loadingResult->fetch_assoc();
        $totalLoadingWeight = $loadingRow['total_loading_weight'] ?? 0;
    }
    $stmt->close();

    // Query to get the total weight from the unloading table within the date range
    $unloadingQuery = "SELECT SUM(weight) AS total_unloading_weight FROM unloading WHERE material_name = ? AND unloading_date BETWEEN ? AND ?";
    $stmt = $conn->prepare($unloadingQuery);
    $stmt->bind_param("sss", $materialName, $fromDate, $toDate);
    $stmt->execute();
    $unloadingResult = $stmt->get_result();
    if ($unloadingResult->num_rows > 0) {
        $unloadingRow = $unloadingResult->fetch_assoc();
        $totalUnloadingWeight = $unloadingRow['total_unloading_weight'] ?? 0;
    }
    $stmt->close();

    // Calculate the balance weight
    $balanceWeight = $totalLoadingWeight - $totalUnloadingWeight;

    // Display the stock details
    echo "<center><h1>Stock Details for " . htmlspecialchars($materialName) . "</h1></center><br><br>";
    echo "<center><h5>Total Weight from Loading: " . htmlspecialchars($totalLoadingWeight) . "</h5></center>";
    echo "<center><h5>Total Weight from Unloading: " . htmlspecialchars($totalUnloadingWeight) . "</h5></center>";
    echo "<center><h5>Balance Weight: " . htmlspecialchars($balanceWeight) . "</h5></center><br><br><br>";

    // Fetch detailed records from the loading table within the date range
    $loadingDetailsQuery = "SELECT * FROM loading WHERE material_name = ? AND loading_date BETWEEN ? AND ?";
    $stmt = $conn->prepare($loadingDetailsQuery);
    $stmt->bind_param("sss", $materialName, $fromDate, $toDate);
    $stmt->execute();
    $loadingDetailsResult = $stmt->get_result();

    echo "<h3>Loading Details:</h3>";
    if ($loadingDetailsResult->num_rows > 0) {
        echo "<div class='table-responsive'><table class='table table-bordered'>";
        echo "<thead><tr><th>Date</th><th>Material Name</th><th>Place From</th><th>Place To</th><th>Time</th><th>Vehicle Number</th><th>Party Name</th><th>Weight</th></tr></thead><tbody>";
        while ($row = $loadingDetailsResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["loading_date"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["material_name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["place_from"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["place_to"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["timing"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["vehicle_number"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["party_name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["weight"]) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "<center>No Loading Records Found</center>";
    }
    $stmt->close();

    // Fetch detailed records from the unloading table within the date range
    $unloadingDetailsQuery = "SELECT * FROM unloading WHERE material_name = ? AND unloading_date BETWEEN ? AND ?";
    $stmt = $conn->prepare($unloadingDetailsQuery);
    $stmt->bind_param("sss", $materialName, $fromDate, $toDate);
    $stmt->execute();
    $unloadingDetailsResult = $stmt->get_result();

    echo "<h3>Unloading Details:</h3>";
    if ($unloadingDetailsResult->num_rows > 0) {
        echo "<div class='table-responsive'><table class='table table-bordered'>";
        echo "<thead><tr><th>Date</th><th>Material Name</th><th>Place From</th><th>Place To</th><th>Time</th><th>Vehicle Number</th><th>Party Name</th><th>Weight</th></tr></thead><tbody>";
        while ($row = $unloadingDetailsResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["unloading_date"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["material_name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["place_from"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["place_to"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["timing"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["vehicle_number"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["party_name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["weight"]) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "<center>No Unloading Records Found</center>";
    }
    $stmt->close();

} catch (Exception $e) {
    echo '<div class="alert alert-danger">An error occurred: ' . htmlspecialchars($e->getMessage()) . '</div>';
} finally {
    // Close the database connection
    $conn->close();
}
?>