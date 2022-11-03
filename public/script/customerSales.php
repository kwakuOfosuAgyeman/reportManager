<?php
    // configure mysql database connection to `program1`
    $con = mysqli_connect('localhost', 'root', '', 'testData');


    // === MAIN SOLUTION =======================================================================================
    // fetch data from `customer_sales` from $from and to $to
    $query = "SELECT * FROM `customer_sales` WHERE `Customer Code` BETWEEN $from AND $to ORDER BY `Customer Code`";
    $result = mysqli_query($con, $query);


?>


