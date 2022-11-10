<?php
    // configure mysql database connection to `program1`
    $con = mysqli_connect('localhost', 'root', '', 'testData');


    // die('false');
    // === MAIN SOLUTION =======================================================================================
    // fetch data from `customer_sales` from $from and to $to
    $query = "SELECT * FROM `customer_sales`";
    $result = mysqli_fetch_all(mysqli_query($con, $query), MYSQLI_ASSOC);


    // var_dump($result) ;
    // print_r
    echo json_encode($result);


?>


