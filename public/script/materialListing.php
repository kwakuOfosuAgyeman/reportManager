<?php
    // configure mysql database connection to `program2`
    $con = mysqli_connect('localhost', 'root', '', 'program2');

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
            // fetch data from `material_listings` from $from and to $to
            $query = "SELECT * FROM `material_listings` WHERE `Material Code` BETWEEN $from AND $to ORDER BY `Material Code`";
            $result = mysqli_query($con, $query);

            // insert new processed data to `report_output`
            while($row = mysqli_fetch_assoc($result)) {
                // multiple amount field by 2
                $row['Quantity'] *= 2;

                $query  = "INSERT INTO `report_output` ";
                $query .= "VALUES(";
                $query .=   $row['Material Code'] . ", ";
                $query .=   "'" . mysqli_real_escape_string($con, $row['Material Name']) . "', ";
                $query .=   $row['Quantity'];
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
    <title>Program 2</title>
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
        <a href="../program1/index.php">First Program</a> |
        <a href="index.php" class="active">Second Program</a>
    </nav>
    <hr/>
    <h1>Second Program</h1>


    <!-- Display Input Table -->
    <h2>Input Table</h2>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>Material Code</th>
                <th>Material Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM `material_listings` ORDER BY `Material Code`";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['Material Code'] . "</td>";
                    echo "<td>" . $row['Material Name'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <br/><br/>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <b>Material Code:</b>
        from
        <input type="number" name="from" required>
        to
        <input type="number" name="to" required>
        <button type="submit">EXECUTE</button>
    </form>
    <br/><hr/>
</body>
</html>
