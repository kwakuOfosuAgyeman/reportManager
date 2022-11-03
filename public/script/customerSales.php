<?php
    // configure mysql database connection to `program1`
    $con = mysqli_connect('localhost', 'root', '', 'testData');

    // handle form submission
    if(isset($_POST['from']) && isset($_POST['to'])) {
        $from = intval($_POST['from']);
        $to   = intval($_POST['to']);

        // validate $from and $to
        if($from > $to)
            echo "<p style='color: red'><b>[from]</b> must be less than or equal to <b>[to]</b></p>";
        else {
            // delete all records from `report_output` (comment out if not needed)
            $query = "DELETE FROM `report_output` WHERE 1";
            mysqli_query($con, $query);


            // === MAIN SOLUTION =======================================================================================
            // fetch data from `customer_sales` from $from and to $to
            $query = "SELECT * FROM `customer_sales` WHERE `Customer Code` BETWEEN $from AND $to ORDER BY `Customer Code`";
            $result = mysqli_query($con, $query);

            // insert new processed data to `report_output`
            while($row = mysqli_fetch_assoc($result)) {
                // multiple amount field by 2
                $row['Amount'] *= 2;

                $query  = "INSERT INTO `report_output` ";
                $query .= "VALUES(";
                $query .=   $row['Customer Code'] . ", ";
                $query .=   "'" . mysqli_real_escape_string($con, $row['Customer Name']) . "', ";
                $query .=   "'" . mysqli_real_escape_string($con, $row['Invoice Number']) . "', ";
                $query .=   $row['Amount'];
                $query .= ")";
                mysqli_query($con, $query);
            }
            // =========================================================================================================
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program 1</title>
    <style>
        body {
            font-family: monospace;
        }
        th, td, input, button {
            padding: 5px;
        }
        input {
            width: 60px;
        }
        nav a {
            text-decoration: none;
        }
        nav a.active {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Little Navigation -->
    <nav>
        <a href="index.php" class="active">First Program</a> |
        <a href="../program2/index.php">Second Program</a>
    </nav>
    <hr/>
    <h1>First Program</h1>

    <!-- Display Input Table -->
    <h2>Input Table</h2>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>Customer Code</th>
                <th>Customer Name</th>
                <th>Invoice Number</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM `customer_sales` ORDER BY `Customer Code`";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Customer Code'] . "</td>";
                    echo "<td>" . $row['Customer Name'] . "</td>";
                    echo "<td>" . $row['Invoice Number'] . "</td>";
                    echo "<td>" . $row['Amount'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <br/><br/>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <b>Customer Code:</b>
        from
        <input type="number" name="from" required>
        to
        <input type="number" name="to" required>
        <button type="submit">EXECUTE</button>
    </form>
    <br/><hr/>
</body>
</html>
