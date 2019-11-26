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
            
            echo $row['id'];
            echo $row['name'];
            echo $row['dept'];
            echo $row['salary'];
            echo $row['creationdate'];
            echo $row['rank'];
            echo $row['leavec'];
        }
    } else {
        echo 'There is nothing to show';
    }
}
?>