<?php
    /**
     * This is the database connection file
     * @param $servername= "localhost"
     * @param $username= "root"
     * @param $password= ""
     * @param $dbname= "blitzflowers"
     */

    //declare the needed variables
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "expense_tracker";

    $conn=mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn)
    {
        die("Database not connected!" .mysqli_error($conn));
    }
?>