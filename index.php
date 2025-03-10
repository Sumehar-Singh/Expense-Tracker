<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-2xl mx-auto mt-10 p-5 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-5">Expense Tracker</h2>

        <!-- Expense Form -->
        <form action="add_expense.php" method="POST" class="mb-5">
            <input type="text" name="title" placeholder="Expense Title" required 
                class="w-full px-3 py-2 border rounded-md mb-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="number" name="amount" placeholder="Amount" required 
                class="w-full px-3 py-2 border rounded-md mb-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="text" name="category" placeholder="Category" 
                class="w-full px-3 py-2 border rounded-md mb-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="date" name="expense_date" required 
                class="w-full px-3 py-2 border rounded-md mb-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">
                Add Expense
            </button>
        </form>

        <!-- Expense List -->
        <h3 class="text-xl font-semibold text-gray-700 mb-3">Expense List</h3>
        <table class="w-full border-collapse border border-gray-300 bg-white shadow-md">
            <tr class="bg-gray-200 text-gray-700">
                <th class="border border-gray-300 px-3 py-2">Title</th>
                <th class="border border-gray-300 px-3 py-2">Amount</th>
                <th class="border border-gray-300 px-3 py-2">Category</th>
                <th class="border border-gray-300 px-3 py-2">Date</th>
                <th class="border border-gray-300 px-3 py-2">Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM expenses ORDER BY expense_date DESC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='text-center'>
                        <td class='border border-gray-300 px-3 py-2'>{$row['title']}</td>
                        <td class='border border-gray-300 px-3 py-2 text-green-500'>\${$row['amount']}</td>
                        <td class='border border-gray-300 px-3 py-2'>{$row['category']}</td>
                        <td class='border border-gray-300 px-3 py-2'>{$row['expense_date']}</td>
                        <td class='border border-gray-300 px-3 py-2'>
                            <a href='delete_expense.php?id={$row['id']}' class='text-red-500 hover:underline'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
