<?php
include 'connect.php';


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Calculate total monthly expense
$sql_monthly_expense = "SELECT SUM(amount) FROM monthly_expenses WHERE id_user = 1";
$result_monthly_expense = mysqli_query($conn, $sql_monthly_expense);
$row_monthly_expense = mysqli_fetch_array($result_monthly_expense);
$monthly_expense = $row_monthly_expense[0] ?? 0;

// salaire 
$sql_salaire = "SELECT salaire FROM users WHERE id_user = 1";
$result_salaire = mysqli_query($conn, $sql_salaire);
$row_salaire = mysqli_fetch_array($result_salaire);
$salaire=$row_salaire['salaire'] ?? 0;

// Calculate total daily dependencies
$sql_daily_dependencies = "SELECT SUM(d.price) from dependents d where id_user = 1";
$result_daily_dependencies = mysqli_query($conn, $sql_daily_dependencies);
$row_daily_dependencies = mysqli_fetch_array($result_daily_dependencies);
$daily_dependencies = $row_daily_dependencies[0] ?? 0;

// Fetch the "salaire" from the users table
$sql_salaire = "SELECT solde FROM users WHERE id_user = 1";
$result_salaire = mysqli_query($conn, $sql_salaire);
$row_salaire = mysqli_fetch_array($result_salaire);
$solde = $row_salaire['solde'] ?? 0;

$sql_sum_payments = "SELECT SUM(amount) FROM payments WHERE id_user = 1 and month(payment_date) = month(now()) and year(payment_date) = year(now()) and day(payment_date) = day(now())";
$result_sum_payments = mysqli_query($conn, $sql_sum_payments);
$row_sum_payments = mysqli_fetch_array($result_sum_payments);
$sum_payments = $row_sum_payments[0] ?? 0;

$currentDay = date('d');
$eq = 31-$currentDay ;

if ($currentDay == 1) {
    $solde = $salaire - $monthly_expense ; 
    $daily_expense=(($solde) / ($eq)) - $sum_payments * (1 - 1/$eq) ;
    echo $daily_expense;
}
else {
    $daily_expense=(($solde) / ($eq)) - $sum_payments * (1 - 1/$eq) ;
    echo $daily_expense;

}





mysqli_close($conn);
?>