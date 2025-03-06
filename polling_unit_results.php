<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polling Unit Results</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Polling Unit Results</h2>
            <form method="GET">
                <label>Select Polling Unit:</label>
                <select name="polling_unit_id" required>
                    <option value="">-- Choose --</option>
                    <?php
                $query = "SELECT uniqueid, polling_unit_name FROM polling_unit";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['uniqueid']}'>{$row['polling_unit_name']}</option>";
                }
                ?>
                </select>
                <button type="submit">Get Results</button>
            </form>
        </div>

        <?php
        if (isset($_GET['polling_unit_id'])) {
            $polling_unit_id = intval($_GET['polling_unit_id']);
            $sql = "SELECT party_abbreviation, party_score FROM announced_pu_results WHERE polling_unit_uniqueid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $polling_unit_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Party</th><th>Score</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['party_abbreviation']}</td><td>{$row['party_score']}</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found for this polling unit.</p>";
            }
            $stmt->close();
        }
        ?>
    </div>
</body>

</html>