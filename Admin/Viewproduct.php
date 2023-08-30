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

                    <div class="ibox-title">View Product</div>
                </div>
                <div class="ibox-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $fetchpro = mysqli_query($con,"SELECT pid,pname,pprice,pdesc,catname,brandname,image FROM product
                                INNER JOIN
                                category
                                ON
                                product.Category_ID = category.cid
                                INNER JOIN
                                brand
                                on 
                                product.brand_id = brand.bid");

                                while($row = mysqli_fetch_array($fetchpro))
                                {

                                
                            ?>
                            <tr>
                                <td><?php echo $row[0] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[3] ?></td>
                                <td><?php echo $row[4] ?></td>
                                <td><?php echo $row[5] ?></td>
                                <td>
                                    <img src="proimage/<?php echo $row[6] ?>" width="80" alt="">
                                </td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                    
                                </td>
                                
                               
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>