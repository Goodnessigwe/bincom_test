<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LGA Results</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="polling_unit_results.php">Polling Unit Results</a></li>
            <li><a href="lga_results.php">LGA Results</a></li>
            <li><a href="new_polling_unit.php">Add New Polling Unit</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="form-container">

            <h2>Total LGA Results</h2>
            <form method="POST">
                <label for="lga_id">Select Local Government:</label>
                <select name="lga_id" id="lga_id" required>
                    <option value="">-- Choose --</option>
                    <?php
                    $query = "SELECT lga_id, lga_name FROM lga";
                    $result = $conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['lga_id']}'>{$row['lga_name']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Get Results</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lga_id']) && !empty($_POST['lga_id'])) {
                $lga_id = intval($_POST['lga_id']);


                $sql = "SELECT pr.party_abbreviation, SUM(pr.party_score) AS total_score
                        FROM announced_pu_results pr
                        JOIN polling_unit pu ON pr.polling_unit_uniqueid = pu.uniqueid
                        WHERE pu.lga_id = ?
                        GROUP BY pr.party_abbreviation";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $lga_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr><th>Party</th><th>Total Score</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['party_abbreviation']}</td><td>{$row['total_score']}</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No results found for this LGA.</p>";
                }
                $stmt->close();
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<p style='color: red;'>Please select an LGA.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>