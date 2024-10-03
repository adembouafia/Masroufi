<?php

include 'connect.php';


$id_user = $_POST['id_user'];
$name_p = $_POST['name'];
$prix = $_POST['prix'];



$sql = "INSERT INTO payments (id_user, name_payement, amount) VALUES (?, ?, ?)";


$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isd", $id_user, $name_p, $prix);

$sql_update_user_amount = "UPDATE users SET solde = solde - ? WHERE id_user = ?";
$stmt_update_user_amount = mysqli_prepare($conn, $sql_update_user_amount);
mysqli_stmt_bind_param($stmt_update_user_amount, "di", $prix, $id_user);


if (mysqli_stmt_execute($stmt) && mysqli_stmt_execute($stmt_update_user_amount)) {
    echo "
    <script>
        Swal.fire({
            title: 'Payment added successfully',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location = '../home.html';
        });
    </script>   
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_stmt_close($stmt_update_user_amount);
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
