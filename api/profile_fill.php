<?php
include 'connect.php';

$sql = "SELECT nom, prenom, email FROM users WHERE id_user = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $email = $row['email'];
    echo "
    <div class='mb-2'>
        <h3>Nom:</h3>
        <p>".$nom."</p>
    </div>
    <div class='mb-2'>
        <h3>Pénom:</h3>
        <p>".$prenom."</p>
    </div>
    <div class='mb-2'>
        <h3>Email:</h3>
        <p>".$email."</p>
    </div>
    <div class='mb-2'>
        <h3>Password:</h3>
        <p>************</p>
    </div>
    ";
} else {
    echo "
    <script>
        Swal.fire({
            title: 'Error',
            text: 'Error while fetching user info',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location = '../home.html';
        });
    </script>    
    ";
}

mysqli_close($conn);
