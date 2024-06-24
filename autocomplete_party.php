<?php
include 'dbconfig.php';

$query = $_GET['query'];
$sql = "SELECT party_name, party_address, party_gst FROM parties WHERE party_name LIKE '%$query%' LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $party = $result->fetch_assoc();
    echo json_encode($party);
} else {
    echo json_encode(null);
}

$conn->close();
?>
