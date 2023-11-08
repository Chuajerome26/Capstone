<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <form action="scholar-renew.php" method="get">
        <button type="submit">Go to Renew</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Scholar ID</th>
            <th>Total Subjects</th>
            <th>Total Units</th>
            <th>GWA</th>
            <th>Remark</th>
            <th>File</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        <?php
        // Include the database connection code
        include '../classes/database.php';

        // Create a new instance of the Database class
        $db = new Database();

        // Query the database to retrieve information (excluding the 'id' column)
        $stmt = $db->getConnection()->query("SELECT scholarID, `subject-total`, `unit-total`, gwa, remark, file, status, date FROM scholar_renew");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['scholarID']}</td>";
            echo "<td>{$row['subject-total']}</td>";
            echo "<td>{$row['unit-total']}</td>";
            echo "<td>{$row['gwa']}</td>";
            echo "<td>{$row['remark']}</td>";
            echo "<td>{$row['file']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['date']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
