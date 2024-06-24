<?php
include 'dbconfig.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $income_date = $_POST['income_date'];
    $income_type = $_POST['income_type'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $reference = $_POST['reference'];

    // SQL query to update the record in the database
    $sql_update = "UPDATE income SET 
                    income_date = '$income_date',
                    income_type = '$income_type',
                    amount = '$amount',
                    description = '$description',
                    reference = '$reference'
                    WHERE id = $id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Form submission method not allowed.";
}

$conn->close();
header('location:incomeedit.php');
?>
