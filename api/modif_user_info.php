<?php


include 'connect.php';

$id_user = $_POST['id_user'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];


$sql = "UPDATE users SET nom = ?, prenom = ?, email = ? WHERE id_user = ?";


$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $nom, $prenom, $email, $id_user );



if (mysqli_stmt_execute($stmt)) {
    echo "
        jfjf
    ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);


?>
