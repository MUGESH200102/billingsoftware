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
        die("Invoice not found.");
    }
} else {
    die("Invalid Invoice ID");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-container {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .from-to div {
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }
        .details th, .details td {
            text-align: center;
        }
        .totals td {
            font-weight: bold;
        }
        .tax-details th, .tax-details td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container invoice-container">
        <div class="header text-center mb-4">
            <h1>Tax Invoice</h1>
            <p>Invoice No.: <?php echo htmlspecialchars($invoice['invoice_no']); ?></p>
            <p>Date: <input type="date" value="<?php echo $invoice['invoice_date']; ?>" disabled></p>
        </div>

        <div class="row from-to mb-4">
            <div class="col-md-6">
                <p><strong>From:</strong><br>
                    <?php echo htmlspecialchars($invoice['from_party_name']); ?><br>
                    <?php echo htmlspecialchars($invoice['from_address']); ?><br>
                    GST: <?php echo htmlspecialchars($invoice['from_gst']); ?>
                </p>
            </div>
            <div class="col-md-6">
                <p><strong>To:</strong><br>
                    <?php echo htmlspecialchars($invoice['to_party_name']); ?><br>
                    <?php echo htmlspecialchars($invoice['to_address']); ?><br>
                    GST: <?php echo htmlspecialchars($invoice['to_gst']); ?>
                </p>
            </div>
        </div>

        <table class="table table-bordered details mb-4">
            <thead class="thead-light">
                <tr>
                    <th>Sl. No</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>HSN Code</th>
                    <th>GST %</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sl_no = 1;
                foreach ($items as $item) {
                    echo "<tr>";
                    echo "<td>{$sl_no}</td>";
                    echo "<td>" . htmlspecialchars($item['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['qty']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['unit']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['hsn_code']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['gst']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['unit_price']) . "</td>";
                    echo "<td>" . htmlspecialchars($item['total_price']) . "</td>";
                    echo "</tr>";
                    $sl_no++;
                }
                ?>
                <tr class="totals">
                    <td colspan="7" class="text-right">Total Amount</td>
                    <td><?php echo htmlspecialchars($invoice['total_amount']); ?></td>
                </tr>
                <tr class="totals">
                    <td colspan="7" class="text-right">SGST</td>
                    <td><?php echo htmlspecialchars($invoice['sgst']); ?></td>
                </tr>
                <tr class="totals">
                    <td colspan="7" class="text-right">CGST</td>
                    <td><?php echo htmlspecialchars($invoice['cgst']); ?></td>
                </tr>
                <tr class="totals">
                    <td colspan="7" class="text-right">Grand Total</td>
                    <td><?php echo htmlspecialchars($invoice['grand_total']); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="tax-details mb-4">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>SGST %</th>
                        <th>Value</th>
                        <th>CGST %</th>
                        <th>Value</th>
                        <th>Total Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $taxRates = [2.5, 6, 9, 14];
                    $totals = [];

                    foreach ($taxRates as $rate) {
                        $totals[$rate] = [
                            'sgstValue' => 0,
                            'cgstValue' => 0,
                            'totalValue' => 0
                        ];
                    }

                    foreach ($items as $item) {
                        $gst = floatval($item['gst']);
                        $totalPrice = floatval($item['total_price']);
                        $halfGst = $gst / 2;

                        foreach ($taxRates as $rate) {
                            if ($halfGst == $rate) {
                                $value = $totalPrice * ($rate / 100);
                                $totals[$rate]['sgstValue'] += $value;
                                $totals[$rate]['cgstValue'] += $value;
                                $totals[$rate]['totalValue'] += $value * 2;
                            }
                        }
                    }

                    foreach ($totals as $rate => $values) {
                        if ($values['sgstValue'] > 0) {
                            echo "<tr>";
                            echo "<td>{$rate}%</td>";
                            echo "<td>" . number_format($values['sgstValue'], 2) . "</td>";
                            echo "<td>{$rate}%</td>";
                            echo "<td>" . number_format($values['cgstValue'], 2) . "</td>";
                            echo "<td>" . number_format($values['totalValue'], 2) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="footer text-right">
            <p><strong>Amount in Words:</strong> <?php echo convertNumberToWords($invoice['grand_total']); ?> Rupees Only</p>
            <p>For (Company Name)</p>
            <br><br><br>
            <p>Authorized Signatory</p>
        </div>
    </div>

    <?php
    function convertNumberToWords($number) {
        $words = array(
            '0' => 'Zero',
            '1' => 'One',
            '2' => 'Two',
            '3' => 'Three',
            '4' => 'Four',
            '5' => 'Five',
            '6' => 'Six',
            '7' => 'Seven',
            '8' => 'Eight',
            '9' => 'Nine',
            '10' => 'Ten',
            '11' => 'Eleven',
            '12' => 'Twelve',
            '13' => 'Thirteen',
            '14' => 'Fourteen',
            '15' => 'Fifteen',
            '16' => 'Sixteen',
            '17' => 'Seventeen',
            '18' => 'Eighteen',
            '19' => 'Nineteen',
            '20' => 'Twenty',
            '30' => 'Thirty',
            '40' => 'Forty',
            '50' => 'Fifty',
            '60' => 'Sixty',
            '70' => 'Seventy',
            '80' => 'Eighty',
            '90' => 'Ninety',
            '100' => 'Hundred',
            '1000' => 'Thousand',
            '100000' => 'Lakh',
            '10000000' => 'Crore'
        );

        if ($number == 0) {
            return 'Zero';
        }

        $no = intval($number);
        $decimal = round($number - $no, 2) * 100;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');

        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;

            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred :
                    $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }

        $rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "and " . $words[$decimal - $decimal % 10] . " " . $words[$decimal % 10] . ' Paise' : '';
        return ($rupees ? $rupees . 'Rupees ' : '') . $paise . " Only";
    }

    $conn->close();
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
