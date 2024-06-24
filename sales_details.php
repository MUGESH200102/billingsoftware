<?php
include 'dbconfig.php';

// Check if invoice ID is provided
if (isset($_GET['id'])) {
    $invoiceId = $_GET['id'];

    // Fetch invoice data
    $sql = "SELECT * FROM invoices WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $invoiceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $invoice = $result->fetch_assoc();

    // Fetch invoice items
    $sql_items = "SELECT * FROM invoice_items WHERE invoice_id = ?";
    $stmt_items = $conn->prepare($sql_items);
    $stmt_items->bind_param("i", $invoiceId);
    $stmt_items->execute();
    $result_items = $stmt_items->get_result();
    $items = $result_items->fetch_all(MYSQLI_ASSOC);

    if (!$invoice) {
        die(json_encode(["error" => "Invoice not found."]));
    }

    // Function to convert number to words
    function numberToWords($num) {
        $ones = array(
            0 => "Zero", 1 => "One", 2 => "Two", 3 => "Three", 4 => "Four", 5 => "Five", 6 => "Six", 7 => "Seven",
            8 => "Eight", 9 => "Nine", 10 => "Ten", 11 => "Eleven", 12 => "Twelve", 13 => "Thirteen", 14 => "Fourteen",
            15 => "Fifteen", 16 => "Sixteen", 17 => "Seventeen", 18 => "Eighteen", 19 => "Nineteen"
        );
        $tens = array(
            0 => "Zero", 1 => "Ten", 2 => "Twenty", 3 => "Thirty", 4 => "Forty", 5 => "Fifty", 6 => "Sixty",
            7 => "Seventy", 8 => "Eighty", 9 => "Ninety"
        );
        $hundreds = array("", "Hundred", "Thousand", "Lakh", "Crore");
        if ($num == 0) {
            return "Zero";
        } else {
            $num = number_format($num, 2, ".", ",");
            $num_arr = explode(".", $num);
            $wholenum = $num_arr[0];
            $decnum = $num_arr[1];
            $whole_arr = array_reverse(explode(",", $wholenum));
            krsort($whole_arr, 1);
            $rettxt = "";
            foreach ($whole_arr as $key => $i) {
                while (substr($i, 0, 1) == "0")
                    $i = substr($i, 1, 5);
                if ($i < 20) {
                    $rettxt .= $ones[$i];
                } elseif ($i < 100) {
                    if (substr($i, 0, 1) != "0")
                        $rettxt .= $tens[substr($i, 0, 1)];
                    if (substr($i, 1, 1) != "0")
                        $rettxt .= " " . $ones[substr($i, 1, 1)];
                } else {
                    if (substr($i, 0, 1) != "0")
                        $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[1];
                    if (substr($i, 1, 1) != "0")
                        $rettxt .= " " . $tens[substr($i, 1, 1)];
                    if (substr($i, 2, 1) != "0")
                        $rettxt .= " " . $ones[substr($i, 2, 1)];
                }
                if ($key > 0) {
                    $rettxt .= " " . $hundreds[$key] . " ";
                }
            }
            if ($decnum > 0) {
                $rettxt .= " and ";
                if ($decnum < 20) {
                    $rettxt .= $ones[$decnum];
                } elseif ($decnum < 100) {
                    $rettxt .= $tens[substr($decnum, 0, 1)];
                    $rettxt .= " " . $ones[substr($decnum, 1, 1)];
                }
            }
            return $rettxt . " Rupees Only";
        }
    }

    $invoice['items'] = $items;
    $invoice['amount_in_words'] = numberToWords($invoice['grand_total']);

    header('Content-Type: application/json');
    echo json_encode($invoice);

} else {
    die(json_encode(["error" => "Invalid Invoice ID"]));
}

$conn->close();
?>
