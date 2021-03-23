<?php
    session_start();
    require_once "../lib/config.php";
    require_once "../lib/conn.php";
    if(!isset($_SESSION['id']))
    {
        redirect_to("../index", "Use the login page");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#2ba9ff" />
        
        <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1">
        <title> User Dashboard| Expenses Tracker</title>

        <!-- shortcut icon -->
        <link rel="shortcut icon" href="pictures/icon.jpg" type="image/x-icon">

        <!-- my external css style -->
        <link type="text/css" href="css/styles.css" rel="stylesheet" />

        <!-- datatables link -->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <!-- my jquery -->
        <script src = "js/jquery-3.3.1.js" type = text/javascript></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        <script src="js/controller.js"></script>
        
        <!--  validation.js script  -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>

    </head>
    <body class="sb-nav-fixed">
        <?php require "header.php"; ?>

        <div id="layoutSidenav">
            <?php require "sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4 childy">
                            <li class="breadcrumb-item active childy">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total No of Expenses</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p><?= totalNoOfDataIn("expenses"); ?> -record(s) registered</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Amount of Expenses</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p><?= "£" .totalAmountOfExpenses("expenses"); ?> -spent in total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $expenses= display_expenses_records("expenses");
                        ?>

                        <!-- datatable contents -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                LIST OF RECORDED EXPENSES
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Expenses Name</th>
                                                <th>Amount Spent</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Expenses Name</th>
                                                <th>Amount Spent</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                        <?php $id= 1; ?>
                                    <?php foreach ($expenses as $expense) : ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $expense['expenses_name']; ?></td>
                                                <td><?= "£" .$expense['amount']; ?></td>
                                                <td><?= $expense['date_spent']; ?></td>
                                            </tr>
                                        </tbody>
                                        <?php $id++; ?>
                                    <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include "footer.php"; ?>
            </div>
        </div>

        <!-- my scripts -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
