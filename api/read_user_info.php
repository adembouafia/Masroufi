<?php


include 'connect.php';

$sql = "SELECT nom, prenom FROM users WHERE id_user = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom'];
    $prenom = $row['prenom'];

    echo $nom . $prenom;
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
