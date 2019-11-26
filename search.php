<?php
include('config.php');
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