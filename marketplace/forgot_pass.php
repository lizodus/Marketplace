<?php
require_once 'header.php';

require_once 'connect.php';

session_start();
if(isset($_POST['sub'])){
    $email = $_POST['email'];
//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'";
        if( $con->query($query) === TRUE){
            $_SESSION['email'] = $email;

            header('Loaction: password.php');

            mysqli_close($con); // Close connection
            }else{
                echo "<div class='form'>
                <h3>Email does not exist.</h3>
                <br/>Click here to <a href='auth.php'>Login or Register</a></div>";
            }

         }
 
    ?>

    <div class="mt-4 container">
        <h4>Enter Registered Email</h4>
       <form class="form-horizontal" action="forgot_pass.php" method="POST">
                     

    <div style="margin-bottom: 25px" class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" class="form-control" name="email" placeholder="Email">
    <div class="col-sm-12">
<input id="btn-login" type="submit" name="sub" class="btn btn-success" value="Submit">  
                                      
                                    </div>
                                         
</div>

</div>
</form>
<?php
require_once 'footer.php';
?>
