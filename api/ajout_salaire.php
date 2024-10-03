<?php

include 'connect.php';

$id_user = $_POST['id_user'];
$salaire = $_POST['salaire'];
$solde = $_POST['solde'];


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE users SET salaire = ?, solde = ? WHERE id_user = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ddi", $salaire, $solde, $id_user);


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