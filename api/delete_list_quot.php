<?php


include 'connect.php';

// Check if expense ID is provided via POST request
if(isset($_POST['expense_id'])) {
    $expense_id = $_POST['expense_id'];


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM dependents WHERE id_dependent = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $expense_id);

    if (mysqli_stmt_execute($stmt)) {
        // Return success response if deletion is successful
        echo json_encode(array("success" => true));
    } else {
        // Return error response if deletion fails
        echo json_encode(array("success" => false, "error" => mysqli_error($conn)));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Return error response if expense ID is not provided
    echo json_encode(array("success" => false, "error" => "Expense ID is missing."));
}

?>
