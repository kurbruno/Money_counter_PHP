<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">

        <label for="nickel">How much nickels do You have : </label><br>
        <input type="number" name="nickel" min="0"><br>

        <!-- Nickel amount -->

        <label for="dime">How much dimes do You have : </label><br>
        <input type="number" name="dime" min="0"><br>

        <!-- Dime amount -->

        <label for="quarter">How much quarters do You have : </label><br>
        <input type="number" name="quarter" min="0"><br>

        <!-- Quarter amount -->

        <input type="checkbox" name="euro">EUR<br>

        <!-- EURO currency checbox -->

        <input type="submit" name="submit_button" value="Submit">

        <!-- Submit button -->
    </form>


</body>

</html>

<?php

// Check if Submit button is set

if (isset($_POST["submit_button"])) {


    // Define nickel, dime and quarter coin amount value

    $nickel = (int)$_POST["nickel"];
    $dime = (int)$_POST["dime"];
    $quarter = (int)$_POST["quarter"];

    // Define nickel, dime and quarter money value


    $nickel_money = (int)$_POST["nickel"] * 0.05;
    $dime_money = (int)$_POST["dime"] * 0.10;
    $quarter_money = (int)$_POST["quarter"] * 0.25;

    // When Submit button is set, check if nickel, dime, quarter values are empty

    if (empty($nickel || $dime || $quarter)) {
        echo "Insert coin amount! <br>";

        // When Submit button is set, check if EURO currency is set and calculate money in Euros
        // Format total number wiht 2 decimal places

    } else if (isset($_POST["euro"])) {
        $total_coins = $nickel + $dime + $quarter;
        $total = ($nickel_money + $dime_money + $quarter_money) * 1.05;
        $total_money = number_format($total, 2);

        echo "Nickels: {$nickel} <br>";
        echo "Dimes: {$dime} <br>";
        echo "Quarters: {$quarter} <br>";
        echo "Total coins : {$total_coins} <br>";
        echo "Your total is : {$total_money} &euro;!";

        // When Submit button is set and EURO currency is not set, calculate money in Dollars
        // Format total number with 2 decimal places

    } else {
        $total_coins = $nickel + $dime + $quarter;
        $total = ($nickel_money + $dime_money + $quarter_money);
        $total_money = number_format($total, 2);

        echo "Nickels: {$nickel} <br>";
        echo "Dimes: {$dime} <br>";
        echo "Quarters: {$quarter} <br>";
        echo "Total coins : {$total_coins} <br>";
        echo "Your total is : {$total_money} $!";
    }
}

?>