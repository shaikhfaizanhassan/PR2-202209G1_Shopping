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
                                <div class="ibox-title">Add New Brand</div>
                              
                            </div>
                            <div class="ibox-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Name</label>
                                            <input class="form-control" required name="bname" type="text" placeholder="Enter Brand">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" name="btn" value="Save" class="btn btn-success" id="">    
                                </div>
                                </form>
                                <?php 
                                    if(isset($_POST["btn"]))
                                    {
                                        $bname = $_POST["bname"];
                                        $query = mysqli_query($con,"INSERT INTO `brand`(`brandname`) VALUES ('$bname')");
                                        if($query>0)
                                        {
                                            echo "$bname Data Save ";
                                        }
                                    }
                                
                                ?>
                            </div>    
    </div>    
    </div>
    </div>
</body>
</html>