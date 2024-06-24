<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice 045</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            background-color: #fff;
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        .invoice-box table td {
            padding: 8px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 35px;
            line-height: 35px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            text-align: center;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
            text-align: center;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .total-line {
            text-align: right;
            padding-right: 8px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title">
                                <h2>RAJASREE TRADERS</h2>
                            </td>
                            <td>
                                <br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="7">
                    <table>
                        <tr>
                            <td>
                                RAJASREE TRADERS<br>
                                66/5 BRYANT NAGAR, 12TH STREET,<br>
                                TUTICORIN - 628008.<br>
                                GSTIN: 33CWWPP0932J1Z2
                            </td>
                            <td>
                                G.R.BAGS,<br>
                                146 B/1 ETTAYAPURAM ROAD,<br>
                                TUTICORIN- 628002.<br>
                                GSTIN: 33LDTPS4031C2ZC
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>SL.NO</td>
                <td>DESCRIPTION</td>
                <td>HSN</td>
                <td>SIZE</td>
                <td>QTY</td>
                <td>UNIT RATE</td>
                <td>AMOUNT</td>
            </tr>
            <tr class="item">
                <td>1</td>
                <td>PP UNLAMINATION FABRICS (12" WHITE FABRIC - 3ROLLS)</td>
                <td>39269099</td>
                <td>12"</td>
                <td>158.80 KGS</td>
                <td>118.22</td>
                <td>18773.34</td>
            </tr>
            <tr class="item">
                <td>2</td>
                <td>YARN (2 BAGS)</td>
                <td>39269099</td>
                <td></td>
                <td>63.00 KGS</td>
                <td>122.90</td>
                <td>7742.70</td>
            </tr>
            <tr class="item last">
                <td>3</td>
                <td>PP UNLAMINATION FABRICS (16" WHITE FABRIC - 2ROLLS)</td>
                <td>39269099</td>
                <td>16"</td>
                <td>114.00 KGS</td>
                <td>116.11</td>
                <td>13236.54</td>
            </tr>
            <tr>
                <td colspan="6" class="total-line">Subtotal:</td>
                <td>39752.58</td>
            </tr>
            <tr>
                <td colspan="6" class="total-line">CGST 9%:</td>
                <td>3577.73</td>
            </tr>
            <tr>
                <td colspan="6" class="total-line">SGST 9%:</td>
                <td>3577.73</td>
            </tr>
            <tr>
                <td colspan="6" class="total-line">Total:</td>
                <td>46908.04</td>
            </tr>
            <tr>
                <td colspan="6" class="total-line">Round Off:</td>
                <td>-0.04</td>
            </tr>
            <tr>
                <td colspan="6" class="total-line">Grand Total:</td>
                <td>46908.00</td>
            </tr>
        </table>
        <br>
        <p><strong>AMOUNT IN WORDS:</strong> FORTY-SIX THOUSAND NINE HUNDRED AND EIGHT RUPEES ONLY</p>
        <p><strong>AUTHORISED SIGNATORY</strong></p>
    </div>
</body>
</html>
