<?php


include 'connect.php';


$sql = " SELECT * FROM monthly_expenses WHERE id_user=1  order by expense_date desc";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $expenses = array();
  $i = 0;
  while ($row = mysqli_fetch_assoc($result)) {
      $expenses[$i][] = array(
          'id' => $row['id_monthly_expense'],
          'date' => $row['expense_date'],
          'sujet' => $row['subject'],
          'amount' => $row['amount']
      );
      $i++;
  }

  foreach ($expenses as $date => $expense) {

      foreach ($expense as $exp) {
          echo ("
          <div
        class='item my-3 d-flex justify-content-between align-items-center py-2'
      >
        <div class='d-flex justify-content-between align-items-center'>
          <div class='d-flex flex-column'>
            <div class='item-title'>" . $exp['sujet']."</div>
          </div>
        </div>
        <div class='d-flex align-items-center'>
          <div class='payement'> ". $exp['amount'] ." DT</div>
          <div style='cursor: pointer' onclick='deleteExpense(".$exp['id'].")'>
            <i class='bi bi-trash3 fs-1 mx-2'></i>
          </div>
        </div>
      </div>
              
          ");
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




?>