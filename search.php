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
                $leavecount = $row['leavec'];
                echo $id;
                echo $username;
                echo $dept;
                echo $salary;
                echo $joindate;
                echo $rank;
                echo $leavecount;
            }
        } else {
            echo 'There is nothing to show';
        }
    }
    ?>
</body>

</html>