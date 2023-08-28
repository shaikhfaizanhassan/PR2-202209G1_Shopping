
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
                                <div class="ibox-title">Add New Product</div>
                              
                            </div>
                            <div class="ibox-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label> Name</label>
                                            <input class="form-control" name="pname" type="text" placeholder="Enter NAme">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label> Price</label>
                                            <input class="form-control" name="pprice" type="text" placeholder="Enter Price">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label> Description</label>
                                            <input class="form-control" name="pdesc" type="text" placeholder="Enter Description">
                                        </div>
                                         <div class="col-sm-6 form-group">
                                            <label> Select Category</label>
                                            <select name="selectCategory" id="" class="form-control">
                                                <?php 
                                                    $fetchcat = mysqli_query($con,"select * from category");
                                                    while($row = mysqli_fetch_array($fetchcat))
                                                    {

                                                    
                                                ?>
                                                <option value="" hidden="teue">Select Category</option>
                                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                                
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label> Select Brand</label>
                                            <select name="selectbrand" id="" class="form-control">
                                            <?php 
                                                    $fetchcat = mysqli_query($con,"select * from brand");
                                                    while($row = mysqli_fetch_array($fetchcat))
                                                    {

                                                    
                                                ?>
                                                <option value="" hidden="teue">Select Brand</option>
                                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                                
                                                <?php } ?>
                                                
                                            </select>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label> Image</label>
                                            <input class="form-control" name="filename" type="file" placeholder="Enter Category">
                                        </div>

                                    </div>
                                   
                                  
                                    <div class="form-group">
                                    <input type="submit" name="btn" value="Save" class="btn btn-success" id="">    
                                    
                              
                                    </div>
                                </form>

                                <?php 
                                    if(isset($_POST["btn"]))
                                    {
                                        $proname = $_POST["pname"];
                                        $proprice = $_POST["pprice"];
                                        $prodesc = $_POST["pdesc"];
                                        $procat = $_POST["selectCategory"];
                                        $probrand = $_POST["selectbrand"];
                                        $imagename = $_FILES["filename"]["name"]; //image name
                                        $imagelocation = $_FILES["filename"]["tmp_name"]; //temporyName

                                        move_uploaded_file($imagelocation,"proimage/".$imagename);

                                        $query = mysqli_query($con,"INSERT INTO `product`(`pname`, `pprice`, `pdesc`, `Category_ID`, `brand_id`, `image`) VALUES ('$proname','$proprice','$prodesc','$procat','$probrand','$imagename')");

                                        if($query>0)
                                        {
                                            echo "$proname Product Save";
                                        }
                                        else
                                        {
                                            echo "NoT Save";
                                        }

                                        
                                    }
                                ?>
                            </div>    
    </div>    
    </div>
    </div>
</body>
</html>