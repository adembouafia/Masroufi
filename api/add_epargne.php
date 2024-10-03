<?php

include 'connect.php';



$id_user = $_POST['id_user'];
$amount = $_POST['amount'];


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO savings (id_user, amount) VALUES (?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "id", $id_user, $amount);

$sql_update_user_balance = "UPDATE users SET solde = solde - ? WHERE id_user = ?";
$stmt_update_user_balance = mysqli_prepare($conn, $sql_update_user_balance);
mysqli_stmt_bind_param($stmt_update_user_balance, "di", $amount, $id_user);


if (mysqli_stmt_execute($stmt) && mysqli_stmt_execute($stmt_update_user_balance)) {
  echo "
    ...  
  ";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_stmt_close($stmt_update_user_balance);
mysqli_stmt_close($stmt);
mysqli_close($conn);



?>