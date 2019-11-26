<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>

<body>
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
    if (isset($_POST['submit1'])) {
        $name = $_POST['search'];
        $sql = "SELECT * FROM employee WHERE `name` LIKE :name";
        $name = "%$name%";
        $query = $dbh->prepare($sql);
        $query->bindValue(':name', $name);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($query->rowCount() > 0) {
            foreach ($results as $row) {
                $id = $row['id'];
                $username = $row['name'];
                $dept = $row['dept'];
                $salary = $row['salary'];
                $joindate = $row['creationdate'];
                $rank = $row['rank'];
                $leavecount = $row['leavec']; ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $dept; ?></td>
                <td><?php echo $salary; ?></td>
                <td><?php echo $joindate; ?></td>
                <td><?php echo $rank; ?></td>
                <td><?php echo $leavecount; ?></td>
            </tr>
            <?php
            }
        }
    }
    ?>
        </tbody>
    </table>
    <br>
    <p>Back to <a href="index.php">home</a></p>
</body>

</html>