<?php


include 'connect.php';

$sql = "SELECT salaire FROM users WHERE id_user = 1";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
  die("Prepare statement failed: " . mysqli_error($conn));
}


if (mysqli_stmt_execute($stmt)) {
  mysqli_stmt_bind_result($stmt, $salaire);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  echo $salaire;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
