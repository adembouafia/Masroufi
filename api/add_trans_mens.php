<?php
include 'connect.php';


$id_user = $_POST['id_user'];
$sujet = $_POST['subject'];
$amount = $_POST['amount'];




$sql = "INSERT INTO monthly_expenses (id_user, subject, amount) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isd", $id_user, $sujet, $amount);



if (mysqli_stmt_execute($stmt)) {
  echo "
    ...  
  ";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);



?>