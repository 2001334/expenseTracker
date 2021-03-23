<?php
    session_start();
    require_once "../lib/conn.php";
    require_once "../lib/config.php";

    if(isset($_POST['register']))
    {
        /**(1)
         * -Collecting data from the form fields.
         * -Collected data are assumed to be dangerous, so they are immediately cleaned-
         * before being passed into the database.
         */
        $ename= cleanData($_POST['ename']);
        $amount= mysqli_real_escape_string($conn, cleanData($_POST['amountSpent']));
        $date= mysqli_real_escape_string($conn, cleanData($_POST['dateSpent']));

        /**
         * -Inserting the cleansed data with php prepared statement
         */
        $sql= "INSERT INTO expenses(expenses_name, amount, date_spent, userid, deleted)
                        VALUES(?, ?, ?, ?, ?)
                ";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "notPrepared";
        }else{
            $userid= $_SESSION['id'];
            $deleted= 0;
            mysqli_stmt_bind_param($stmt, 'sisii', $ename, $amount, $date, $userid, $deleted);
            mysqli_stmt_execute($stmt);
            echo "registered";
        }
    }
    /**
     * end of the admin register form controller
     */


    /**(2)
      * Delete Unwanted record from the expenses table 
      */
    if(isset($_POST['but_delete']))
    {
        if(isset($_POST['checkbox'])){
            foreach($_POST['checkbox'] as $deleteid)
            {
                $deleteUser = "UPDATE expenses SET deleted = 1 WHERE expenses_id=".$deleteid;
                mysqli_query($conn, $deleteUser);
            }
        }
        redirect_to("manageexpenses", "task deleted successfully");
    }
    /**
     * END OF DELETE USER CONTROLLER 
     */

    
     /**(3)
     * recover deleted records
     */
    if(isset($_POST['recover']))
    {
        $recID= mysqli_real_escape_string($conn, cleanData($_POST['recoverID']));
        $sessID= $_SESSION['id'];

        $sql= "SELECT * FROM expenses WHERE expenses_id=? AND userid=?";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "notPrepared";
        }else{
            mysqli_stmt_bind_param($stmt, 'ii', $recID, $sessID);
            mysqli_stmt_execute($stmt);
            $result= mysqli_stmt_get_result($stmt);
            $expenses= mysqli_fetch_assoc($result);
            if(!$expenses['expenses_id'])
            {
                echo "notFound";
            }else{
                $sql= "UPDATE expenses
                        SET deleted=0
                        WHERE expenses_id=? AND userid=?
                ";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "notPrepared";
                }else{
                    mysqli_stmt_bind_param($stmt, 'ii', $recID, $sessID);
                    mysqli_stmt_execute($stmt);
                    echo "recovered";
                }
            }
        }
    }
    /**
     * END OF RECOVER deleted records CONTROLLER
     */


    /**
     * BEGINNING OF EDIT PROFILE FORM  
     */    
    if(isset($_POST['submit-edit']))
    {
        $fname= mysqli_real_escape_string($conn, cleanData($_POST['fname']));
        $lname= mysqli_real_escape_string($conn, cleanData($_POST['lname']));
        $email= mysqli_real_escape_string($conn, cleanData($_POST['email']));
        $phone= mysqli_real_escape_string($conn, cleanData($_POST['phone']));
        $adminID = $_SESSION['id'];

        $sql= "SELECT * FROM tbladmin WHERE adminID=?";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "notPrepared";
        }else{
            mysqli_stmt_bind_param($stmt, 's', $adminID);
            mysqli_stmt_execute($stmt);
            $result= mysqli_stmt_get_result($stmt);
            $admin= mysqli_fetch_assoc($result);
            if(!$admin['adminID'])
            {
                echo "notFound";
            }else{
                $sql= "UPDATE tbladmin
                        SET fname=?, lname=?, email=?, phone=?
                        WHERE adminID=?
                ";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "notPrepared";
                }else{
                    mysqli_stmt_bind_param($stmt, 'ssssi', $fname, $lname, $email, $phone, $adminID);
                    mysqli_stmt_execute($stmt);
                    echo "updated";
                }
                
            }
        }
    }
    /**
     * end of the admin edit profile form controller
     */


    /**
     * BEGINNING OF update password FORM  
     */    
    if(isset($_POST['updatePwd']))
    {
        $pwd= mysqli_real_escape_string($conn, cleanData($_POST['pwd']));
        $cpwd= mysqli_real_escape_string($conn, cleanData($_POST['cpwd']));
        
        $adminID = $_SESSION['id'];

        $sql= "SELECT * FROM tbladmin WHERE adminID=?";
        $stmt= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "notPrepared";
        }else{
            mysqli_stmt_bind_param($stmt, 's', $adminID);
            mysqli_stmt_execute($stmt);
            $result= mysqli_stmt_get_result($stmt);
            $admin= mysqli_fetch_assoc($result);
            if(!$admin['adminID'])
            {
                echo "notFound";
            }else{
                $hashedPwd= hashPwd($pwd);
                $sql= "UPDATE tbladmin
                        SET pwd=?
                        WHERE adminID=?
                ";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "notPrepared";
                }else{
                    mysqli_stmt_bind_param($stmt, 'si', $hashedPwd, $adminID);
                    mysqli_stmt_execute($stmt);
                    echo "updated";
                }
                
            }
        }
    }
    /**
     * end of the admin update profile form controller
     */