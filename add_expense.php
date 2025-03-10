<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $expense_date = $_POST['expense_date'];

    $sql = "INSERT INTO expenses (title, amount, category, expense_date) VALUES ('$title', '$amount', '$category', '$expense_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Expense added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
header("Location: index.php");
?>
