<?php
include 'connect.php';




$sql=" SELECT SUM(amount) as amount FROM savings WHERE id_user=1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $amount = $row['amount'];
  echo $amount;
} else {
  echo "
  <script>
      Swal.fire({
          title: 'Error',
          text: 'Error while fetching user savings',
          icon: 'error',
          confirmButtonText: 'OK'
      }).then(function() {
          window.location = '../home.html';
      });
  </script>    
  ";
}




mysqli_close($conn);




?>