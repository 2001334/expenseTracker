<?php 
    /**(1)
     * Function to calculate the founded year to current year
     */
    function copyright()
    {
        $devDate    = 2021;
        $currDate   = date('Y');
        if($devDate < $currDate){
            echo "Copyright &copy; {$devDate} - {$currDate}";
        }else{
            echo "Copyright &copy; {$currDate} ";
        }
    }

    /**(2)
     * Function to clean the data you are collecting from the user
     */
    function cleanData($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    /**(3)
     * Function to hash collected password
     */
    function hashPwd($data)
    {
        return password_hash($data, PASSWORD_DEFAULT);
    }

    /**(4)
     * Redirect to any page
     */
    function redirect_to($data, $statement)
    {
        return header("Location: $data?$statement");
    }

    /**(5)
     * select all registered expenses from a expenses table
     */
    function totalNoOfDataIn($table_name)
    {
        include "conn.php";
        $sql= "SELECT * FROM $table_name WHERE deleted= 0 AND userid= '$_SESSION[id]'";
        $result= mysqli_query($conn, $sql);
        
        $total= mysqli_num_rows($result);
        return $total;
    }

    /**(6)
     * select total amount of expenses made from the expenses table
     */
    function totalAmountOfExpenses($table_name)
    {
        include "conn.php";
        $sql= "SELECT SUM(amount) AS total FROM $table_name WHERE deleted= 0 AND userid= '$_SESSION[id]'";
        $result= mysqli_query($conn, $sql);
        
        $total= mysqli_fetch_assoc($result);
        return $total['total'];
    }

    /** (7)
     * display all deleted users from a particular table
     */
    function display_deleted_records($table_name)
    {
        include "conn.php";
        $sql= "SELECT * FROM $table_name WHERE deleted= 1 AND userid= '$_SESSION[id]' ORDER BY expenses_id DESC";
        $result= mysqli_query($conn, $sql);
        
        $expenses= [];
        while($expense= mysqli_fetch_assoc($result))
        {
            array_push($expenses, $expense);
        }
        return $expenses;
    }

    /**(6)
     * select all users from a particular table
     */
    function display_expenses_records($table_name)
    {
        include "conn.php";
        $sql= "SELECT * FROM $table_name WHERE deleted= 0 AND userid= '$_SESSION[id]' ORDER BY expenses_id DESC";
        $result= mysqli_query($conn, $sql);
        
        $expenses= [];
        while($expense= mysqli_fetch_assoc($result))
        {
            array_push($expenses, $expense);
        }
        return $expenses;
    }
?>