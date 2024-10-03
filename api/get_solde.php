<?php

include 'connect.php';

$currentDay = date('d');

$sql_salaire = "SELECT salaire FROM users WHERE id_user = 1";
$result_salaire = mysqli_query($conn, $sql_salaire);
$row_salaire = mysqli_fetch_array($result_salaire);
$salaire=$row_salaire['salaire'] ?? 0;

$sql_solde = "SELECT solde FROM users WHERE id_user = 1";
$result_solde = mysqli_query($conn, $sql_solde);
$row_solde = mysqli_fetch_array($result_solde);
$solde = $row_solde['solde'] ?? 0;



$sql_monthly_expense = "SELECT SUM(amount) FROM monthly_expenses WHERE id_user = 1";
$result_monthly_expense = mysqli_query($conn, $sql_monthly_expense);
$row_monthly_expense = mysqli_fetch_array($result_monthly_expense);
$monthly_expense = $row_monthly_expense[0] ?? 0;

$sql = "SELECT solde FROM users WHERE id_user = 1";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
  die("Prepare statement failed: " . mysqli_error($conn));
}


if (mysqli_stmt_execute($stmt)) {
  mysqli_stmt_bind_result($stmt, $solde);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  if ($currentDay == 1){
    $solde = $salaire - $monthly_expense;
    echo $solde ;
  }
  else{
    echo $solde ; 
  }
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>