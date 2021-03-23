<?php
    /**
     * The line of code below help made the use of the database connection variable usable
     */
    require_once "lib/conn.php";

    /**
     * This line of code allows me to use the functions i created in the function.php file
     */
    require_once "lib/config.php";

    /**
     * (1)
     * This is the user registration controller
     * This code collects the user information through the POST superglobal array
     * and then storing it into the respective variable.
     * 
     * If(isset) checks to confirm that the user has clicked on the submit button
     */
    if(isset($_POST['regBtn']))
    {
        /**
         * (a)Collecting and saving the user information into the respective variable
         * (b)mysqli_real_escape_string() is a php method used to escape special characters
         * (c) further user data cleaning was done through the cleanData() method - 
         * the cleanData() method helps, trim, stripslashes and escape html special characters
         * which helps prevent the application from XSS(cross-site scripting) attack
         */
        $fname= mysqli_real_escape_string($conn, cleanData($_POST['fname']));
        $lname= mysqli_real_escape_string($conn, cleanData($_POST['lname']));
        $email= mysqli_real_escape_string($conn, cleanData($_POST['email']));
        $pwd= mysqli_real_escape_string($conn, cleanData($_POST['psword']));

        /**
         * The SQL code to insert data into the database.
         * The Select code help fetch the information of the email address so that we will -
         * be sure that, no user is registered twice.
         * The insertion was completed using PHP prepared statement, which helps cub any form
         * of unexpected attach from the hackers.
         */
        $sql= "SELECT * FROM users WHERE email= ?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            echo "notPrepared";
        }else{
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            /**
             * mysqli_stmt_get_result() method stores the result of the query as a resource ID(#)
             * which can now be accessed and converted to an array through the mysqli_fetch_assoc() method.
             */
            $result= mysqli_stmt_get_result($stmt);
            $user= mysqli_fetch_assoc($result);
            if($user['email'])
            {
                echo "1";
            }else{
                /**
                 * Protect the user password by using the password_hash function
                 * The password original characters will get replaced by some sets of long strings
                 * which can only be understood by another PHP method (password_verify).
                 */
                $hashedPwd= hashPwd($pwd);
                $sql= "INSERT INTO users(fname, lname, email, psword)
                        VALUES(?, ?, ?, ?)
                ";
                /**
                 * Mysqli_stmt_init() method initializes the database connection
                 * Security wise, it is always good to check for error first, this is why I-
                 * confirmed the statement was successfully prepared before binding and executing it.
                 */
                $stmt= mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "notPrepared";
                }else{
                    mysqli_stmt_bind_param($stmt, 'ssss', $fname, $lname, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    echo "registered";
                }
            }
            
        }
    }
    

    /**(2)
     * Confirm that the submit button is used
     */
    if(isset($_POST['logonBtn']))
    {
        // declare the needed variables
        $email=$pwd="";

        // initialize the declared variables
        $email= mysqli_real_escape_string($conn, cleanData($_POST['email']));
        $pwd= mysqli_real_escape_string($conn, cleanData($_POST['pwd']));

        /**
         * perform a validation process from the backend
         */
        
            $sql= "SELECT * FROM users WHERE email=?";
            $stmt= mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                echo "notPrepared";
            }else{
                mysqli_stmt_bind_param($stmt, 's', $email);
                mysqli_stmt_execute($stmt);
                $result= mysqli_stmt_get_result($stmt);
                $user= mysqli_fetch_assoc($result);
                    $userEmail = $user['email'];
                    $userPwd = $user['psword'];
                    if(!$userEmail)
                    {
                        echo "invalidEmail";
                    }else{
                        $pwdChk = password_verify($pwd, $userPwd);
                        if($pwdChk === false)
                        {
                            echo "wrongPwd";
                        }else{
                            session_start();
                            $_SESSION['email'] = $userEmail;
                            $_SESSION['fname'] = $user['fname'];
                            $_SESSION['lname'] = $user['lname'];
                            $_SESSION['id']= $user['userid'];
                            if(isset($_SESSION['id']))
                            {
                                echo "authenticated";
                            }
                        }
                    }
            }
    }
?>