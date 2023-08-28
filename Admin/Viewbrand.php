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

                                <div class="ibox-title">View Brand</div>
                            </div>
                            <div class="ibox-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                     </thead>
                                    <tbody>
                                    <?php 
                                            $fetchcat = mysqli_query($con,"select * from brand");
                                            while($row = mysqli_fetch_array($fetchcat))
                                            {
                                        ?>
                                        <tr>
                                            <td><?php echo $row[0] ?></td>
                                            <td><?php echo $row[1] ?></td>
                                            <td>
                                                <a href="" class="btn btn-success">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>    
    </div>    
    </div>
    </div>
</body>
</html>