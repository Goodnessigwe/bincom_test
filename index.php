<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Results Portal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <ul>
            <li><a href="polling_unit_results.php">Polling Unit Results</a></li>
            <li><a href="lga_results.php">LGA Results</a></li>
            <li><a href="new_polling_unit.php">Add New Polling Unit</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Welcome to the Election Results Portal</h2>
        <p>This portal allows you to:</p>
        <ul>
            <li>View individual polling unit results</li>
            <li>Check the total results for a selected Local Government Area</li>
            <li>Add new results for a polling unit</li>
        </ul>
        <p>Use the navigation menu above to get started.</p>
    </div>

</body>

</html>