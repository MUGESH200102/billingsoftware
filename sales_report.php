<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Billing Software</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
            </li>
          <li class="nav-item dropdown d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="icon-air-play mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a class="dropdown-item preview-item">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
              <i class="icon-grid"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="images/faces/face28.png">
        </div>
        <div class="user-name">
        </div>
        <div class="user-designation">
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#purchase-details" aria-expanded="false" aria-controls="purchase-details">
                <i class="icon-bag menu-icon"></i>
                <span class="menu-title">Purchase</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="purchase-details">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="purchase.php">Purchase Entry</a></li>
                    <li class="nav-item"> <a class="nav-link" href="display_purchase.php">Display</a></li>
                    <li class="nav-item"> <a class="nav-link" href="purchase_report.php">Report</a></li>
                    <li class="nav-item"> <a class="nav-link" href="purchase_Income.php">Purchase Payment</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sales-details" aria-expanded="false" aria-controls="sales-details">
                <i class="icon-server menu-icon"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sales-details">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="sales.php">Sales Entry</a></li>
                    <li class="nav-item"> <a class="nav-link" href="sales_display.php">Display</a></li>
                    <li class="nav-item"> <a class="nav-link" href="sales_report.php">Report</a></li>
                </ul>
            </div>
            <li class="nav-item">
            <a class="nav-link" href="stock.php">
                <i class="icon-pie-graph menu-icon"></i>
                <span class="menu-title">Stock</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#income-details" aria-expanded="false" aria-controls="income-details">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Income</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="income-details">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="incomeentry.php">Income Entry </a></li>
                    <li class="nav-item"> <a class="nav-link" href="incomeedit.php">Income History </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#expenses-details" aria-expanded="false" aria-controls="expenses-details">
                <i class="icon-disc menu-icon"></i>
                <span class="menu-title">Expenses</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="expenses-details">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="expensesentry.php">New Entry</a></li>
                    <li class="nav-item"> <a class="nav-link" href="expensesedit.php">Edit/Delete</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profit.php">
                <i class="icon-pie-graph menu-icon"></i>
                <span class="menu-title">Profit/loss</span>
            </a>
        </li>
    </ul>
</nav>

      <!-- partial -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .modal-body {
            max-height: 500px;
            overflow-y: auto;
        }
        .modal-body p {
            margin-bottom: 0.5rem;
        }
        .modal-body h2 {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }
        .modal-body table {
            margin-bottom: 1rem;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Sales Report</h1>
        <form id="dateForm" class="border p-4 bg-white shadow-sm rounded mb-4" onsubmit="fetchReport(event)">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fromDate">From Date:</label>
                    <input type="date" class="form-control" id="fromDate" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="toDate">To Date:</label>
                    <input type="date" class="form-control" id="toDate" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Confirm</button>
        </form>

        <div class="border p-4 bg-white shadow-sm rounded">
            <div class="form-group">
                <label for="toPartyName">To Party Name:</label>
                <input type="text" class="form-control" id="toPartyName" placeholder="Search by To Party Name" onkeyup="filterByToPartyName()">
            </div>
        </div>

        <div id="reportResults" class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>From Party Name</th>
                        <th>From Address</th>
                        <th>From GST</th>
                        <th>To Party Name</th>
                        <th>To Address</th>
                        <th>To GST</th>
                        <th>Total Amount</th>
                        <th>SGST</th>
                        <th>CGST</th>
                        <th>Grand Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="reportTableBody">
                    <!-- Data will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Invoice Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Detailed information will be shown here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printInvoice()">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchReport(event) {
            event.preventDefault();
            const fromDate = document.getElementById('fromDate').value;
            const toDate = document.getElementById('toDate').value;

            fetch('fetch_sales_report.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ fromDate, toDate })
            })
            .then(response => response.json())
            .then(data => {
                const reportTableBody = document.getElementById('reportTableBody');
                reportTableBody.innerHTML = '';
                data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${row.invoice_no}</td>
                        <td>${row.invoice_date}</td>
                        <td>${row.from_party_name}</td>
                        <td>${row.from_address}</td>
                        <td>${row.from_gst}</td>
                        <td>${row.to_party_name}</td>
                        <td>${row.to_address}</td>
                        <td>${row.to_gst}</td>
                        <td>${row.total_amount}</td>
                        <td>${row.sgst}</td>
                        <td>${row.cgst}</td>
                        <td>${row.grand_total}</td>
                        <td><button class="btn btn-info btn-sm" onclick="viewDetails(${row.id})">View</button></td>
                    `;
                    reportTableBody.appendChild(tr);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function filterByToPartyName() {
            const input = document.getElementById('toPartyName');
            const filter = input.value.toLowerCase();
            const tableBody = document.getElementById('reportTableBody');
            const rows = tableBody.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const toPartyNameCell = rows[i].getElementsByTagName('td')[5]; // Assuming the 6th column is To Party Name
                if (toPartyNameCell) {
                    const toPartyName = toPartyNameCell.textContent || toPartyNameCell.innerText;
                    if (toPartyName.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        }

        function viewDetails(invoiceId) {
            console.log('View Details for Invoice ID:', invoiceId);  // Debug log
            fetch(`fetch_invoice_details.php?id=${invoiceId}`)
            .then(response => response.json())
            .then(data => {
                console.log('Fetched Data:', data);  // Debug log
                if (data.success) {
                    const modalBody = document.getElementById('modalBody');
                    const invoice = data.data;
                    
                    // Populate the modal with invoice details
                    modalBody.innerHTML = `
                        <div id="printableArea">
                            <p><strong>Invoice No:</strong> ${invoice.invoice_no}</p>
                            <p><strong>Invoice Date:</strong> <input type="date" value="${invoice.invoice_date}" disabled></p>
                            <p><strong>From Party Name:</strong> ${invoice.from_party_name}</p>
                            <p><strong>From Address:</strong> ${invoice.from_address}</p>
                            <p><strong>From GST:</strong> ${invoice.from_gst}</p>
                            <p><strong>To Party Name:</strong> ${invoice.to_party_name}</p>
                            <p><strong>To Address:</strong> ${invoice.to_address}</p>
                            <p><strong>To GST:</strong> ${invoice.to_gst}</p>
                            <p><strong>Total Amount:</strong> ${invoice.total_amount}</p>
                            <p><strong>SGST:</strong> ${invoice.sgst}</p>
                            <p><strong>CGST:</strong> ${invoice.cgst}</p>
                            <p><strong>Grand Total:</strong> ${invoice.grand_total}</p>
                            <h2>Items</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl.no</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Unit</th>
                                        <th>HSN Code</th>
                                        <th>GST</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${invoice.items.map((item, index) => `
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${item.description}</td>
                                            <td>${item.qty}</td>
                                            <td>${item.unit}</td>
                                            <td>${item.hsn_code}</td>
                                            <td>${item.gst}</td>
                                            <td>${item.unit_price}</td>
                                            <td>${item.total_price}</td>
                                        </tr>`).join('')}
                                    <tr>
                                        <td colspan="7" style="text-align: right;">Total Amount</td>
                                        <td>${invoice.total_amount}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                    $('#viewModal').modal('show');
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function printInvoice() {
            const printableArea = document.getElementById('printableArea').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printableArea;
            window.print();
            document.body.innerHTML = originalContents;

            window.location.reload(); // Refresh the page to restore the original content
        }
    </script>

    

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>