<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>

    ---NUMBER 3---
        <?php
        $stmt = $pdo->prepare("SELECT * FROM Concerts");

        if ($stmt->execute()){
        echo "<pre>";
        print_r($stmt->fetchAll());
        echo "</pre>";
        }
        ?>

    ---NUMBER 4---
        <?php
        $stmt = $pdo->prepare("SELECT * FROM Seats");

        if ($stmt->execute()){
        echo "<pre>";
        print_r($stmt->fetch());
        echo "</pre>";
        }
        ?>

    ---NUMBER 5---
        <?php

        $query = "INSERT INTO Concerts (ConcertID, ConcertName, ConcertDate, Venue) VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $executeQuery = $stmt->execute(
        [0, 'BTS 2021 Muster Sowoozoo', '2024-10-25', 'Seoul Olympic Stadium']
        );

        if ($executeQuery){
            echo "Query Successfull!";
        }
        else {
            echo "Query Failed!";
        }
        ?>

    ---NUMBER 6---
        <?php

        $query = "DELETE FROM Concerts WHERE ConcertID = 0";

        $stmt = $pdo->prepare($query);

        $executeQuery = $stmt->execute();

        if ($executeQuery) {
            echo "Deletion successfull!";
        }
        else {
            echo "Query Failed";}
        ?>

    ---NUMBER 7---
        <?php

        $query = "UPDATE Concerts SET ConcertName = ?, Venue = ? WHERE ConcertID = 0";

        $stmt = $pdo->prepare($query);

        $executeQuery = $stmt->execute(
            ["BTS MOTS CONCERT", "Philippine Arena"]);

        if ($execuetQuery) {
            echo "Upadte Seccuessfull";
        }
        else {
            echo "Query failed";
        }
        ?>

    ---NUMBER 8---    
        <?php

        $query = "SELECT * FROM Concerts";

        $stmt = $pdo->prepare($query);
        
        $executeQuery = $stmt->execute();

        if ($executeQuery) {
            $customers = $stmt->fetchAll();
        }

        else {
            echo "Query failed";
        }
        
        ?>
        <table>
        <tr>
            <th>Concert ID</th>
            <th>Concert Name</th>
            <th>Concert Date </th>
            <th>Venue</th>
        </tr>

        <?php foreach ($customers as $row) { ?>
        <tr>
            <td><?php echo $row['ConcertID']; ?></td>
            <td><?php echo $row['ConcertName']; ?></td>
            <td><?php echo $row['ConcertDate']; ?></td>
            <td><?php echo $row['Venue']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>