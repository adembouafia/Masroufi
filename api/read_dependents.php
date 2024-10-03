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
        <div id='" . $dep['id'] . "' class='item-quot d-flex justify-content-center align-items-center flex-column my-2' onclick='quotList(this.id)'>    
                <div>" . $dep['name'] . "</div>
                <div class='type-transaction'>
                    " . $dep['price'] . " DT
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
