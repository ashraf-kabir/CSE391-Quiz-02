<?php
session_start();
error_reporting(0);
include('config.php');
if (!empty($_SESSION['login'])) {
    header("location: index.php");
} else {
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $salary = $_POST['salary'];
        $rank = $_POST['rank'];
        $leavec = $_POST['leavec'];

        $sql = "INSERT INTO `employee` (`name`,`dept`,`salary`,`rank`,`leavec`) VALUES(:name,:dept,:salary,:rank,:leavec)";
        $query = $dbh->prepare($sql);

        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':dept', $dept, PDO::PARAM_STR);
        $query->bindParam(':salary', $salary, PDO::PARAM_STR);
        $query->bindParam(':rank', $rank, PDO::PARAM_STR);
        $query->bindParam(':leavec', $leavec, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>alert('Registration successful!');document.location = 'index.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register</title>

        <script src="includes/jquery.min.js"></script>
        <script src="includes/jquery-ui.min.js"></script>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">

    </head>

    <body class="bg-transparent">


        <div class="container" style="padding-bottom: 150px;">

            <div class="row" style="margin-top: 4%">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="account-content">
                        <br>
                        <h1 style="font-family: sans-serif; text-align: center; font-weight: bold;">User
                                                                                                    Registration</h1>
                        <br>
                        <form class="form-horizontal" method="post" name="signup">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input id="name" class="form-control" type="text" required="" name="name"
                                           placeholder="Enter name" autocomplete="off"">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="dept">Dept</label>
                                    <input id="dept" class="form-control" type="text" required="" name="dept"
                                           placeholder="Enter dept" autocomplete="off"">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="salary">Salary</label>
                                    <input id="salary" class="form-control" type="text" required="" name="salary"
                                           placeholder="Enter dept" autocomplete="off"">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="rank">Rank</label>
                                    <input id="rank" class="form-control" type="text" required="" name="rank"
                                           placeholder="Enter rank" autocomplete="off"">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="leavec">Leave Count</label>
                                    <input id="leavec" class="form-control" type="text" required="" name="leavec"
                                           placeholder="Enter dept" autocomplete="off"">
                                </div>
                            </div>

                            <div class="form-group account-btn text-center m-t-10">
                                <div class="col-md-12">
                                    <button class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                            type="submit" id="submit" name="signup">Register
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-md-12">
                                Already have an account? <a href="login.php">Log in</a>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                    </div>
                </div>

                <!-- Blog Entries Column -->
                <div class="col-md-3"></div>

            </div>

        </div>


        <?php include('includes/footer.php'); ?>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>
<?php } ?>