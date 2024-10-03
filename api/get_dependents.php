<?php

include 'connect.php';

$sql = " SELECT * FROM dependents";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $dependents = array();
  $i = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    $dependents[$i][] = array(
      'id' => $row['id_dependent'],
      'name' => $row['name'],
      'price' => $row['price']
    );
    $i++;
  }


foreach ($dependents as $date => $dependent) {
  foreach ($dependent as $dep) {
      echo ("
      <div class='item my-3 d-flex justify-content-between align-items-center'>
        <div class='d-flex justify-content-between align-items-center'>
          <div class='d-flex flex-column'>
            <div class='item-title'>" . $dep['name'] . "</div>
          </div>
        </div>
        <div class='payement'>" . $dep['price'] . "</div>
        <div style='cursor: pointer' onclick='delete_dependents(".$dep['id'].")'>
            <i class='bi bi-trash3 fs-1 mx-2'></i>
        </div>
    </div>");
  }
}

} else {
  echo "
  <div class='d-flex mt-5 w-100 justify-content-center align-items-center flex-column'>
      <img src='assets/img/add 2.svg' alt='' width='140' />
      <span class='sad-bunny'>Aucune donnée trouvée...</span>
      <div class='month py-2 text-center'>
      Oups... il n'y a pas de données ici. Veuillez réessayer ou ajouter des
      éléments.
      </div>

      </a>
  </div>";
}

mysqli_close($conn);
