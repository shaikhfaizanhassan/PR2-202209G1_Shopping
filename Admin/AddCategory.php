<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add New Category</div>

                </div>
                <div class="ibox-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Name</label>
                                <input class="form-control" required name="cname" type="text"
                                    placeholder="Enter Category">
                            </div>

                        </div>


                        <div class="form-group">
                            <input type="submit" name="btn" value="Save" class="btn btn-success" id="">

                        </div>
                    </form>
                    <?php
                    if (isset($_POST["btn"])) {
                        $cname = $_POST["cname"];
                        $query = mysqli_query($con, "INSERT INTO `category`(`catname`) VALUES ('$cname')");
                        if ($query > 0) {
                            echo "<script>window.location('ViewCategory.php')</script>";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>