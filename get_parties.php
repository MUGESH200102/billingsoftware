<?php
include 'dbconfig.php';



$sql_from_parties = "SELECT id, name, address, gst, 'from' as type FROM from_parties";
$sql_to_parties = "SELECT id, name, address, gst, 'to' as type FROM to_parties";

$result_from_parties = $conn->query($sql_from_parties);
$result_to_parties = $conn->query($sql_to_parties);

$parties = array();
if ($result_from_parties->num_rows > 0) {
    while($row = $result_from_parties->fetch_assoc()) {
        $parties[] = $row;
    }
}
if ($result_to_parties->num_rows > 0) {
    while($row = $result_to_parties->fetch_assoc()) {
        $parties[] = $row;
    }
}

echo json_encode($parties);

$conn->close();
?>
