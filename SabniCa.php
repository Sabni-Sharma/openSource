<!DOCTYPE html>



<head>

    <title>PHP Project </title>

</head>



<?php

$result_str = $result = '';

if (isset($_POST['unit-submit'])) {

    $units = $_POST['units'];

    if (!empty($units)) {

        $result = calculate_bill($units);

        $result_str = 'Total amount of ' . $units . ' - ' . $result;

    }

}



function calculate_bill($units) {

    $unit_cost_first = 9;

    $unit_cost_second = 12;

    $unit_cost_third = 15;





    if($units <= 50) {

        $bill = $units * $unit_cost_first;

    }

    else if($units > 50 && $units <= 100) {

        $temp = 50 * $unit_cost_first;

        $remaining_units = $units - 50;

        $bill = $temp + ($remaining_units * $unit_cost_second);

    }

    else {

        $temp = (50 * 9) + (50 * $unit_cost_second);

        $remaining_units = $units - 100;

        $bill = $temp + ($remaining_units * $unit_cost_third);

    }



    return number_format((float)$bill, 2, '.', '');

}



?>



<body>



        <h1>Electricity Bill</h1>



        <form action="" method="post">

                <input type="number" name="units" id="unit" placeholder="enter no. of Units" />

                <br>

                <br>

                <input type="submit" name="unit-submit" id="unit-submit" value="Submit" />

        </form>





            <?php echo '<br />' . $result_str; ?>



</body>

</html>
