<?php
include('config.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz 2</title>
</head>

<body>

    <form action="search.php" method="post">
        Search: <input type="search" name="search"><br>
        <input type="submit" name="submit1" value="Search">
    </form>

    <br><br>
    <form method="post">
        <select name="sel" id="sel">
            <option>--Select--</option>
            <option value="salary">Salary</option>
            <option value="rank">Rank</option>
            <option value="leavec">Leave</option>
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Dept</th>
                <th>Salary</th>
                <th>Join Date</th>
                <th>Rank</th>
                <th>Leave Count</th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        if (isset($_POST['submit'])) {
            $value = $_POST['sel'];

            $sql5 = "SELECT * FROM `employee` ORDER BY $value DESC";
            $query5 = $dbh->prepare($sql5);

            $query5->bindParam(':value', $value, PDO::PARAM_STR);

            $query5->execute();
            $results = $query5->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query5->rowCount() > 0) {
                foreach ($results as $result5) {
                    ?>
            <tr>
                <th><?php echo htmlentities($cnt); ?></th>
                <td><?php echo htmlentities($result5->name); ?></td>
                <td><?php echo htmlentities($result5->dept); ?></td>
                <td><?php echo htmlentities($result5->salary); ?></td>
                <td><?php echo htmlentities($result5->creationdate); ?></td>
                <td><?php echo htmlentities($result5->rank); ?></td>
                <td><?php echo htmlentities($result5->leavec); ?></td>
            </tr>
            <?php $cnt = $cnt + 1;
                }
            }
        } ?>
        </tbody>
    </table>

</body>

</html>