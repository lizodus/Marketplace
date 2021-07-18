<?php
require_once 'header.php';
require_once 'connect.php';
session_start();
if(isset($_SESSION['email']) && $_SESSION['password']){ 
    echo "<div class='alert alert-warning'>
            <form action='index.php' action='logout' method='POST'> 
            <input class='btn btn-secondary' type='submit' value='Logout' name='logout' class='btn btn-warning' />
            </form>
        </div>";
        
    if(isset($_POST['logout'])){
        unset($_SESSION["email"]);
        unset($_SESSION["password"]);
       // unset($_SESSION["user_id"]);
        header("Location:index.php");
    }

    if(isset($_POST['logout'])){
        unset($_SESSION["email"]);
        unset($_SESSION["password"]);
       // unset($_SESSION["user_id"]);
        header("Location:index.php");
    }


    if(isset($_POST['add'])){

        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $email = $_SESSION['email'];

        
    if(empty(trim($name))){
        echo 'Name cannot be empty';
    }elseif(empty(trim($price))){
        echo 'Price cannot be empty';
    }elseif(empty(trim($category))){
        echo 'Category cannot be empty';
    }else{

        // $file = $_FILES['image'];
        // $file_new_name = time().$file['extension'];

        // $file->move('uploads/',$file_new_name);


        // $fileinfo=PATHINFO($_FILES["image"]["name"]);
		// $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		// move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $newFilename);
		// $location="uploads/" . $file_new_name;

            $sql = "INSERT INTO products(name,price,category,owner,image)
            VALUES('$name','$price','$category','$email', '$image')";
    
            if( $con->query($sql) === TRUE){
                session_start();
                echo "<div class='alert alert-success'>Successfully added new product</div>";
                
            
    
            header('Location: index.php');
                
            }else{
                echo "<div class='alert alert-danger'>Error: There was a msqli error</div>";
            }
            
            }
        }
    
    
    
    
    ?>

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Upload Products</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" class="alert alert-danger col-sm-12"></div>
                            
                        <form action="products.php" method="POST" enctype="multipart/form-data">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-cart"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="Name of products">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="number" class="form-control" name="price" placeholder="Price of Product">
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
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="text" class="form-control" name="image" placeholder="Paste Image Url">
                            </div>
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12">
                                      <input type="submit" name="add" class="btn btn-success" value="Submit">  
                                      
                                    </div>
                                </div>
   
                            </form>     



                        </div>                     
                    </div>  
        </div>



<?php } else{
    echo "<div class='col-sm-12'>
    <a class='btn btn-success' href='auth.php'>Login first</a>  
    
  </div>"
    ?>
    
    
    <?php } 
    require_once 'footer.php';
    ?>