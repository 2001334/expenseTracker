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
        <!-- shortcut icon -->
        <link rel="shortcut icon" href="pictures/icon.jpg" type="image/x-icon">
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Manage Expenses - myExpenses Tracker</title>
        <link href="css/styles.css" rel="stylesheet" />

        <!-- datatables link -->
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <!-- my jquery -->
        <script src ="js/jquery-3.3.1.js" type = text/javascript></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        <script src="js/controller.js"></script>
        <!--  validation.js script  -->
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>

    </head>
    <body>
        <?php require "header.php"; ?>

        <div id="layoutSidenav">
            <?php require "sidenav.php"; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Manage Expenses</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item childy"><a href="adashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active childy">My Expenses</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    <div id="tabBox">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item tabList">
                                                <a href="#register" data-toggle="tab" class="nav-link">Add New Record</a>
                                            </li>

                                            <!-- <li class="nav-item tabList">
                                                <a href="#delete" data-toggle="tab" class="nav-link">Delete Admin</a>
                                            </li> -->

                                            <li class="nav-item tabList">
                                                <a href="#recover" data-toggle="tab" class="nav-link">Recover Deleted Data</a>
                                            </li>
                                        </ul>

                                        <!-- this is my login tab form -->
                                        <div class="tab-content">
                                            <!-- this is my register tab form -->
                                            <!-- this is my user registration form -->
                                            <div id="register" class="container tab-pane fade">
                                                <form action="" method="POST" id="myRegister">
                                                    <div id="error"></div>
                                                    
                                                    <div class="form-group input-box">
                                                        <i class="fa fa-user"></i>
                                                        <input class= "width80" name="ename" type="text" placeholder="Expenses name">
                                                    </div>

                                                    <div class="form-group input-box">
                                                        <i class="fa fa-pound-sign"></i>
                                                        <input class= "width80" name="amountSpent" type="text" placeholder="Amount spent">
                                                    </div>

                                                    <div class="form-group input-box">
                                                        <i class="fa fa-calendar"></i>
                                                        <input class= "width80" name="dateSpent" type="date">
                                                    </div>

                                                    <center>
                                                        <div class="form-group">
                                                            <button class="btn" name="register" type="submit" id="registerBtn">
                                                                Submit Data
                                                            </button>
                                                        </div>
                                                    </center>
                                                </form>
                                            </div>
                                            <!-- register form ends here -->

                                            <!-- recover expenses deleted -->
                                            <div id="recover" class="container tab-pane fade">
                                                <form action="" method="POST" id="recoverStaff">
                                                    <div id="error3"></div>
                                                    
                                                    <div class="form-group input-box">
                                                        <i class="fa fa-user"></i>
                                                        <input name="recoverID" type="text" placeholder="Enter the expenses ID as seen from the table below">
                                                    </div>

                                                    <center>
                                                        <div class="form-group">
                                                            <button class= "btn" name="recover" type="submit" id="recoverBtn">
                                                                Recover Data
                                                            </button>
                                                        </div>
                                                    </center>
                                                </form>

                                                <?php
                                                    $expenses = display_deleted_records("expenses");
                                                ?>
                                                <!-- datatable contents -->
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <i class="fas fa-table mr-1"></i>
                                                        List of deleted expenses records
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Expenses ID</th>
                                                                        <th>Expenses Name</th>
                                                                        <th>Amount Spent</th>
                                                                        <th>Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Expenses ID</th>
                                                                        <th>Expenses Name</th>
                                                                        <th>Amount Spent</th>
                                                                        <th>Date</th>
                                                                    </tr>
                                                                </tfoot>
                                                                <?php foreach ($expenses as $expense) : ?>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?= $expense['expenses_id']; ?></td>
                                                                        <td><?= $expense['expenses_name']; ?></td>
                                                                        <td><?= $expense['amount']; ?></td>
                                                                        <td><?= $expense['date_spent']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                                <?php endforeach ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end of recover staff tab -->
                                            
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                        <!-- <div style="height: 100vh;"></div> -->
                        <!-- main -->

                        
                        <?php
                            $expenses = display_expenses_records("expenses");
                        ?>
                        <!-- datatable contents -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                LIST OF RECORDED EXPENSES
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="controller.php" method="post">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Expenses ID</th>
                                                    <th>Expenses Name</th>
                                                    <th>Amount Spent</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Expenses ID</th>
                                                    <th>Expenses Name</th>
                                                    <th><?= "£" ." " .totalAmountOfExpenses("expenses"); ?></th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <?php $id= 1; ?>
                                        <?php foreach ($expenses as $expense) : ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $id ?></td>
                                                    <td><?= $expense['expenses_id'] ?></td>
                                                    <td><?= $expense['expenses_name']; ?></td>
                                                    <td><?= "£" ." " .$expense['amount']; ?></td>
                                                    <td><?= $expense['date_spent']; ?></td>
                                                    <!-- Checkbox -->
                                                    <td><input type='checkbox' name="checkbox[]" value='<?= $expense['expenses_id'] ?>' ></td>
                                                </tr>
                                            </tbody>
                                            <?php $id++; ?>
                                        <?php endforeach ?>
                                        </table>
                                    
                                        <div id="deleteButton">
                                            <!-- this is the edit selected expenses records button -->
                                            <button type="submit" id="editRecord" name="but_edit">
                                                Edit Selected Record
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <!-- this is the delete expenses button -->
                                            <button type="submit" id="trash" name="but_delete">
                                                Delete Selected Record(s)
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <?php include "footer.php"; ?>
            </div>
        </div>
        
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/chart-area-demo.js"></script> -->
        <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

