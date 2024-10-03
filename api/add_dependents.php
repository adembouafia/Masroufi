<?php

include 'connect.php';


$id_user = $_POST['id_user'];
$name = $_POST['name'];
$price = $_POST['price'];


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO dependents (id_user,name, price) VALUES (1,?, ?)";


$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sd", $name, $price);



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
