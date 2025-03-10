<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Expense Tracker</title>
</head>
<body>
    <h2>Expense Tracker</h2>
    <form action="add_expense.php" method="POST">
        <input type="text" name="title" placeholder="Expense Title" required>
        <input type="number" name="amount" placeholder="Amount" required>
        <input type="text" name="category" placeholder="Category">
        <input type="date" name="expense_date" required>
        <button type="submit">Add Expense</button>
    </form>
    <h3>Expense List</h3>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Amount</th>
            <th>Category</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM expenses ORDER BY expense_date DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>\${$row['amount']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['expense_date']}</td>
                    <td><a href='delete_expense.php?id={$row['id']}'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
