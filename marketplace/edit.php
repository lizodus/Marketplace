<?php

require_once 'connect.php';
require_once 'header.php';
session_start();
 // Using database connection file here
 if(!isset($_POST['update'])){ // when click on Update button

$id = $_GET['id']; // get id through query string

$sql = "SELECT * FROM products WHERE id=" . $id; // select query

// fetch data
$result = $con->query($sql);
$prod = $result->fetch_assoc();

}
 


if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    $id = $_POST['prodid'];
	
    // $edit = mysqli_query($con,"update tblemp
    //  set fullname='$fullname', age='$age' where id='$id'");
    if( empty($name) || empty($price))
    {
        echo "Please fillout all required fields";
    }

     $sql = "UPDATE products SET name = '$name',
      price = '$price', image = '$image', category = '$category' WHERE id = '$id' ";

    if( $con->query($sql) === TRUE){
        echo "<div class='alert alert-success'>Successfully updated</div>";
        mysqli_close($con); // Close connection
        header("location:index.php"); // redirects to all records page
        $_SESSION['success'] = 'Sucessfully updated';
        exit;
    
    }else{
        echo "<div class='alert alert-danger'>Error: There was an error while adding new todo</div>";
        echo mysqli_error($con);
    }

	
    
}
?>

<h3>Update Data</h3>

<form method="POST" action="edit.php">
<div class="col-md-6 col-md-offset-3">
<div class="container">
 <?php echo "<input type='hidden' value='". $prod['id']."' name='prodid' />"; //added ?>
<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $prod['name'] ?>" placeholder="Update Name" Required>    
</div>

    <div class="form-group">
    <label for="">Price</label>
     <input type="number" class="form-control" name="price" value="<?php echo $prod['price'] ?>" required placeholder="Enter Price">
    </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <select name="category" class="form-control">
                                            <option value="shoes">Shoes</option>
                                            <option value="accessories">Accessories</option>
                                            <option value="jewelleries">Jewelleries</option>
                                            <option value="shirt">Shirt</option>
                                        </select>
                            </div>

                            <div class="form-group">
    <label for="">Image</label>
    <input type="text" class="form-control" name="image" value="<?php echo $prod['image'] ?>" placeholder="Update Image Url" Required>    
        </div>
                        

    <input class="btn btn-primary" type="submit" name="update" value="Update">

</div>
</div>
</div>
</form>
<?php
require_once 'footer.php';