<?php

include 'connect.php';


$sql = " SELECT * FROM savings WHERE id_user=1  order by saving_date desc";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $epargnes = array();
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $epargnes[$i][] = array(
            'date' => $row['saving_date'],
            'amount' => $row['amount']
        );
        $i++;
    }

    foreach ($epargnes as $date => $epargne) {

        foreach ($epargne as $epar) {
            echo ("
          <div class= 'item my-3 d-flex justify-content-between align-items-center'>
          <div class='d-flex justify-content-between align-items-center'>
              <div class=' m-1'>
                  <img src='assets/icons/money-recive.svg' width='40' alt=''>
              </div>
              <div class='d-flex flex-column'>
                  <div class='item-tirelire'>Ajouter</div>
                  <div class='transaction-tirelire'>" . $epar['date'] . "</div>
              </div>
          </div>
          <div class='ajout-epargne'>" . $epar['amount'] . "</div>
      </div>
              
          ");
        }
    }
} else {
    echo "
  <div class='d-flex w-100 justify-content-center align-items-center flex-column'>
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
