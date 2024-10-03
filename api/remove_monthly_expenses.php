<?php

include 'connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentMonth = date('m');
$currentYear = date('Y');

$sql = "SELECT SUM(amount) AS total_expenses FROM monthly_expenses WHERE MONTH(expense_date) = '$currentMonth' AND YEAR(expense_date) = '$currentYear' and id_user=1 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalExpenses = $row["total_expenses"];

    $sql = "SELECT solde FROM users WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentSavings = $row["solde"];

        $newSavings = $currentSavings - $totalExpenses;

        $updateSql = "UPDATE users SET solde = $newSavings + salaire and   WHERE id = 1";
        if ($conn->query($updateSql) === TRUE) {
            echo "Savings updated successfully. Monthly expenses deducted.";
        } else {
            echo "Error updating savings: " . $conn->error;
        }
    } else {
        echo "No savings found in the database.";
    }
} else {
    echo "No expenses found for the current month and year.";
}


// Add this script to the crontab to run it monthly
// Run the following command to open the crontab file
// crontab -e
// 0 0 1 * * /usr/bin/php /api/remove_monthly_expenses.php




$conn->close();
?>
