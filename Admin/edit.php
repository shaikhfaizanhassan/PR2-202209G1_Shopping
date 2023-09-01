<?php
include("connection.php");
if(isset($_GET["editid"]))
{
    $eid = $_GET["editid"];
    $fetchall = mysqli_query($con,"SELECT pid,pname,pprice,pdesc,catname,brandname FROM product
    INNER JOIN
    category
    ON
    product.Category_ID = category.cid
    INNER JOIN
    brand
    on 
    product.brand_id = brand.bid WHERE pid = '$eid'");
    $row1 = mysqli_fetch_array($fetchall);
}
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
                                <input class="form-control" value="<?php echo $row1[1] ?>" name="pname" type="text" placeholder="Enter NAme">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label> Price</label>
                                <input class="form-control" value="<?php echo $row1[2] ?>"  name="pprice" type="text" placeholder="Enter Price">
                            </div>
                            
                            <div class="col-sm-6 form-group">
                                <label> Select Category</label>
                                <select name="selectCategory"  id="" class="form-control">
                                    <?php
                                    $fetchcat = mysqli_query($con, "select * from category");
                                    while ($row = mysqli_fetch_array($fetchcat)) {


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
                                    $fetchcat = mysqli_query($con, "select * from brand");
                                    while ($row = mysqli_fetch_array($fetchcat)) {


                                        ?>
                                        <option value="" hidden="teue"><?php echo $row1[4] ?></option>
                                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label> Description</label>
                    <input type="text" class="form-control" name="pdesc" value="<?php echo $row1[3] ?>">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label> Image</label>
                                <input class="form-control" name="filename" type="file" placeholder="Enter Category">
                            </div>
                        <img src="proimage/<?php echo $row1[6] ?>" width="200" alt="">

                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" value="Save" class="btn btn-success" id="">


                        </div>
                    </form>

                    <?php
                    if (isset($_POST["btn"])) {
                        $eid = $_GET["editid"];
                        $proname = $_POST["pname"];
                        $proprice = $_POST["pprice"];
                        $prodesc = $_POST["pdesc"];
                        $procat = $_POST["selectCategory"];
                        $probrand = $_POST["selectbrand"];
                        $imagename = $_FILES["filename"]["name"]; //image name
                        $imagelocation = $_FILES["filename"]["tmp_name"]; //temporyName
                    
                        move_uploaded_file($imagelocation, "proimage/" . $imagename);

                        $query = mysqli_query($con, "UPDATE `product` SET `pname`='$proname',`pprice`='$proprice',`pdesc`='$prodesc',`Category_ID`='$procat',`brand_id`='$probrand',`image`='$imagename' WHERE pid='$eid'");

                        if ($query > 0) {
                            echo "$proname Product Update";
                        } else {
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
