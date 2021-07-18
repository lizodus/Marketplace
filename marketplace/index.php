<?php
require_once 'header.php';
require_once 'connect.php';

session_start();
if( isset($_POST['delete'])){
    $sql = "DELETE FROM products WHERE id=" . $_POST['prodid'];
    if($con->query($sql) === TRUE){
        echo "<div class='alert alert-success'>Successfully delete Product</div>";
    }
}


        if(isset($_POST['logout'])){
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
           // unset($_SESSION["user_id"]);
            header("Location: index.php");
        }

            ?>

<?php if (isset($_SESSION['email'])) {
            echo "<div class='alert alert-warning'>
            <form action='index.php' action='logout' method='POST'> 
            <input class='btn btn-secondary' type='submit' value='Logout' name='logout' class='btn btn-warning' />
            </form>
            <a class='btn btn-primary' href='products.php'>Add A Product Here</a>
        </div>";

                $user = $_SESSION['email'];
                $password = $_SESSION['password'];
    
    $query = "SELECT * FROM products";
    $pQ = mysqli_query($con,$query) or die(mysql_error());
    if(mysqli_num_rows($pQ) >0){ ?>
        
                <h3 class="h3">Your Clothings </h3>
     <?php   while($prod = mysqli_fetch_assoc($pQ)){
            if($prod['owner'] == $user){  ?>
        <div class="card-columns">
                    

                            <div class="card w-75">
                                    <img class="card-img-top" style="width:140px" src="<?php echo $prod['image'] ?>" alt="">
                                    <div class="card-block">
                                        <h4 class="card-title"> <?php echo htmlspecialchars($prod['name']) ?></h4>
                                        <p class="card-text h5">
                                        <?php echo $prod["category"] ?>    
                                        </p>
                                    </div>
                                    <div class="card-body text-muted">
                                        
                                    </div>
                                    <div class="card-footer text-muted">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-dollar"></i></li>
                                            <li>
                                                <?php echo htmlspecialchars($prod['price']);
                                                echo "<form action='index.php' method='POST'>";
                                                echo "<input type='hidden' value='".$prod['id']."' name='prodid'/>"; //added
                                                echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
                                                echo "<td><a href='edit.php?id=".$prod['id']."' class='btn btn-info'>Edit</a></td>";
                                                    "</form>"
        ?>
                                  
                                </li>
                                        </ul>
                                    </div>
                                  
                                </div><!-- card -->
 
                                <?php                       } ?>
                                     
                </div><!-- container card-columns -->
            
          <?php  
          }
           

        
        }
    }else{
        echo "<div class='alert alert-warning'> You are logged out.
                <a class='btn btn-primary' href='products.php'>Add A Product Here</a>
            </div>";
    }
    
    




    $query = "SELECT * FROM products";
    $pQ = mysqli_query($con,$query) or die(mysql_error());
    if(mysqli_num_rows($pQ) >0){
       echo "<div class='alert alert-primary'>
         <h1>All Products</h1>
        </div>";
        while($prod = mysqli_fetch_assoc($pQ)){
              ?>
                <div class="card w-75">
                                    <img class="card-img-top" style="width:140px" src="<?php echo $prod['image'] ?>" alt="">
                                    <div class="card-block">
                                        <h4 class="card-title"> <?php echo htmlspecialchars($prod['name']) ?></h4>
                                        <p class="card-text h5">
                                        <?php echo $prod["category"] ?>    
                                        </p>
                                    </div>

                                    <div class="card-footer text-muted">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-dollar"></i></li>
                                            <li>
                                                <?php echo htmlspecialchars($prod['price']) ?>
                                            </li>
                                        </ul>
                                    </div>
                                  
                                </div><!-- card -->
               

    </div>
    
                
                 
          <?php  }
    }
          else{ 
                echo "<div class='alert alert-warning'> No products yet
                    <a href='products.php' class='btn btn-primary'>Add One Here</a>
                </div>";
            }
        
    
    
 

?>

<hr>
<?php

require_once 'footer.php'

?>