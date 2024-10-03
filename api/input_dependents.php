<?php
// Read the JSON string from the request body
$jsonString = file_get_contents('php://input');

// Decode the JSON string into an array
$array = json_decode($jsonString, true);

include 'connect.php';

// Insert new dependents
$insertQuery = "INSERT INTO `payments` (`id_user`, `name_payement`, `payment_date`, `amount`) VALUES (?, ?, current_timestamp(), ?)";
$stmt = mysqli_prepare($conn, $insertQuery);
mysqli_stmt_bind_param($stmt, "isd", $id_user, $name, $price);

foreach ($array as $dependent_id) {
    $select_query = "SELECT * FROM dependents WHERE id_dependent = ?";
    $stmt_select = mysqli_prepare($conn, $select_query);
    mysqli_stmt_bind_param($stmt_select, "i", $dependent_id);
    mysqli_stmt_execute($stmt_select);
    $result = mysqli_stmt_get_result($stmt_select);
    $row = mysqli_fetch_array($result);
    $id_user = $row['id_user'];
    $name = $row['name'];
    $price = $row['price'];
    $remove_solde_query = "UPDATE users SET solde = solde - ".$price." WHERE id_user = 1";
    mysqli_query($conn, $remove_solde_query);
    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Output the array (for demonstration purposes)
print_r($array);
